<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use RuntimeException;

class HeroCollageService
{
    public function configPath(): string
    {
        return config_path('hero-collage.json');
    }

    public function cssOutputPath(): string
    {
        return storage_path('app/site-layout/hero-collage.generated.css');
    }

    public function imageDirectory(): string
    {
        return public_path('imagens_hero/Colagem');
    }

    public function imageUrlBase(): string
    {
        return 'imagens_hero/Colagem';
    }

    public function load(): array
    {
        $path = $this->configPath();

        if (! File::exists($path)) {
            throw new RuntimeException('Arquivo de configuração da colagem não encontrado.');
        }

        $data = json_decode(File::get($path), true);

        if (! is_array($data) || ! isset($data['items']) || ! is_array($data['items'])) {
            throw new RuntimeException('Configuração da colagem inválida.');
        }

        return $data;
    }

    public function save(array $data): void
    {
        $data['version'] = $data['version'] ?? 1;
        $data['stage'] = $data['stage'] ?? ['width' => 1920, 'height' => 1080];

        foreach ($data['items'] as &$item) {
            $item['top'] = round((float) $item['top'], 3);
            $item['left'] = round((float) $item['left'], 3);
            $item['width'] = round((float) $item['width'], 3);
            if ($item['height'] !== null && $item['height'] !== '') {
                $item['height'] = round((float) $item['height'], 3);
            } else {
                $item['height'] = null;
            }
            $item['z_index'] = (int) $item['z_index'];
            $item['styles'] = is_array($item['styles'] ?? null) ? $item['styles'] : [];
            $item['classes'] = is_array($item['classes'] ?? null) ? array_values($item['classes']) : [];
        }
        unset($item);

        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        File::put($this->configPath(), $json.PHP_EOL);
        $this->writeCssFile($data);
    }

    public function ensureGeneratedCss(): void
    {
        if (! File::exists($this->configPath())) {
            return;
        }

        if ($this->cssMatchesConfigHash(md5_file($this->configPath()))) {
            return;
        }

        $this->writeCssFile();
    }

    private function cssMatchesConfigHash(string $configHash): bool
    {
        $cssPath = $this->cssOutputPath();

        if (! File::exists($cssPath)) {
            return false;
        }

        return (bool) preg_match('/config-hash:\s*'.preg_quote($configHash, '/').'/', File::get($cssPath));
    }

    public function writeCssFile(?array $data = null): void
    {
        $data ??= $this->load();
        $css = $this->generateCss($data);
        $path = $this->cssOutputPath();

        File::ensureDirectoryExists(dirname($path));
        File::put($path, $css);
    }

    public function generateCss(array $data): string
    {
        $configHash = File::exists($this->configPath())
            ? md5_file($this->configPath())
            : md5(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        $lines = [
            '/* Gerado automaticamente pelo editor de colagem — não editar manualmente */',
            '/* config-hash: '.$configHash.' */',
            '/* Salvo em: '.now()->toDateTimeString().' */',
            '',
        ];

        foreach ($data['items'] as $item) {
            $selector = '.'.($item['id'] ?? '');
            $rules = ['position: absolute'];

            $rules[] = 'top: '.$this->formatPercent($item['top']);
            $rules[] = 'left: '.$this->formatPercent($item['left']);
            $rules[] = 'width: '.$this->formatPercent($item['width']);

            if ($item['height'] === null || $item['height'] === '') {
                if (! isset($item['styles']['height'])) {
                    $rules[] = 'height: auto';
                }
            } else {
                $rules[] = 'height: '.$this->formatPercent($item['height']);
            }

            $rules[] = 'z-index: '.(int) $item['z_index'];

            foreach ($item['styles'] ?? [] as $property => $value) {
                if ($property === 'height' && ($item['height'] === null || $item['height'] === '')) {
                    $rules[] = 'height: '.$value;
                    continue;
                }

                if (in_array($property, ['top', 'left', 'width', 'height', 'z-index'], true)) {
                    continue;
                }

                $rules[] = $property.': '.$value;
            }

            $lines[] = $selector.' {';
            foreach ($rules as $rule) {
                $lines[] = '    '.$rule.';';
            }
            $lines[] = '}';
            $lines[] = '';
        }

        return implode(PHP_EOL, $lines);
    }

    public function uploadImage(UploadedFile $file, string $itemId): string
    {
        $data = $this->load();
        $item = collect($data['items'])->firstWhere('id', $itemId);

        if (! $item) {
            throw new RuntimeException('Peça da colagem não encontrada.');
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg');
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (! in_array($extension, $allowed, true)) {
            throw new RuntimeException('Formato de imagem não permitido.');
        }

        if ($extension === 'jpeg') {
            $extension = 'jpg';
        }

        $baseName = preg_replace('/[^a-z0-9\-_]/i', '-', $itemId);
        $filename = $baseName.'-'.date('YmdHis').'.'.$extension;
        $destination = $this->imageDirectory().DIRECTORY_SEPARATOR.$filename;

        $file->move($this->imageDirectory(), $filename);

        if (! File::exists($destination)) {
            throw new RuntimeException('Falha ao salvar a imagem.');
        }

        foreach ($data['items'] as &$current) {
            if ($current['id'] === $itemId) {
                $current['src'] = $filename;
                break;
            }
        }
        unset($current);

        $this->save($data);

        return $filename;
    }

    private function formatPercent(float|string $value): string
    {
        $number = round((float) $value, 3);
        $formatted = rtrim(rtrim(number_format($number, 3, '.', ''), '0'), '.');

        return $formatted.'%';
    }
}
