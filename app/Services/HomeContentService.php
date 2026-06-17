<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use RuntimeException;

class HomeContentService
{
    public function configPath(): string
    {
        return config_path('home-content.json');
    }

    public function cssOutputPath(): string
    {
        return public_path('css/home-content.generated.css');
    }

    public function publicPath(): string
    {
        return public_path();
    }

    public function load(): array
    {
        $path = $this->configPath();

        if (! File::exists($path)) {
            $data = $this->defaults();
            $this->save($data);

            return $data;
        }

        $data = json_decode(File::get($path), true);

        if (! is_array($data) || ! isset($data['elements'])) {
            throw new RuntimeException('Configuração home-content inválida.');
        }

        return $this->mergeDefaults($data);
    }

    public function elementsById(): array
    {
        $indexed = [];
        foreach ($this->load()['elements'] as $element) {
            $indexed[$element['id']] = $element;
        }

        return $indexed;
    }

    public function element(string $id): ?array
    {
        return $this->elementsById()[$id] ?? null;
    }

    public function save(array $data): void
    {
        $data['version'] = $data['version'] ?? 1;

        foreach ($data['elements'] as &$element) {
            $styles = $this->normalizeStyles($element['styles'] ?? null);
            $element['styles'] = $styles === [] ? new \stdClass() : $styles;
            $element['classes'] = is_array($element['classes'] ?? null) ? array_values($element['classes']) : [];

            if ($element['upload_dir'] === null) {
                $element['upload_dir'] = '';
            }

            if (isset($element['position']) && is_array($element['position'])) {
                foreach (['top', 'left', 'width', 'height'] as $key) {
                    if (isset($element['position'][$key]) && $element['position'][$key] !== null) {
                        $element['position'][$key] = round((float) $element['position'][$key], 3);
                    }
                }
            }
        }
        unset($element);

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
        File::put($this->cssOutputPath(), $this->generateCss($data));
    }

    public function generateCss(array $data): string
    {
        $configHash = File::exists($this->configPath())
            ? md5_file($this->configPath())
            : md5(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        $lines = [
            '/* Gerado pelo editor da home — não editar manualmente */',
            '/* config-hash: '.$configHash.' */',
            '/* Salvo em: '.now()->toDateTimeString().' */',
            '',
        ];

        if (isset($data['hero_settings']) && is_array($data['hero_settings'])) {
            $lines[] = '.section-block.header-hero {';
            foreach ($data['hero_settings'] as $property => $value) {
                if ($value === null || $value === '') {
                    continue;
                }
                $lines[] = '    '.$property.': '.$value.';';
            }
            $lines[] = '}';
            $lines[] = '';
        }

        foreach ($data['elements'] as $element) {
            $selector = $this->elementSelector($element);
            $rules = [];

            if (! empty($element['font_size'])) {
                $rules[] = 'font-size: '.$element['font_size'];
            }

            if (! empty($element['line_height'])) {
                $rules[] = 'line-height: '.$element['line_height'];
            }

            if (! empty($element['color'])) {
                $rules[] = 'color: '.$element['color'];
            }

            if (! empty($element['text_align'])) {
                $rules[] = 'text-align: '.$element['text_align'];
            }

            $position = $element['position'] ?? null;
            $positionEnabled = is_array($position) && ! empty($position['enabled']);

            if ($positionEnabled) {
                $rules[] = 'position: absolute';
                foreach (['top', 'left', 'width', 'height'] as $key) {
                    if (isset($position[$key]) && $position[$key] !== null && $position[$key] !== '') {
                        $rules[] = $key.': '.$this->formatPercent($position[$key]);
                    }
                }
                if (! empty($position['z_index'])) {
                    $rules[] = 'z-index: '.(int) $position['z_index'];
                }
            }

            foreach ($this->normalizeStyles($element['styles'] ?? null) as $property => $value) {
                if ($value === null || $value === '') {
                    continue;
                }

                if ($positionEnabled && in_array($property, ['top', 'left', 'width', 'height', 'position', 'z-index'], true)) {
                    continue;
                }

                $rules[] = $property.': '.$value;
            }

            if ($rules === []) {
                continue;
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

    /**
     * Garante objeto associativo — JSON [] não pode guardar width/height.
     *
     * @return array<string, string>
     */
    private function normalizeStyles(mixed $styles): array
    {
        if ($styles instanceof \stdClass) {
            $styles = (array) $styles;
        }

        if (! is_array($styles) || $styles === [] || array_is_list($styles)) {
            return [];
        }

        $normalized = [];
        foreach ($styles as $property => $value) {
            if (! is_string($property) || $value === null || $value === '') {
                continue;
            }
            $normalized[$property] = (string) $value;
        }

        return $normalized;
    }

    private function elementSelector(array $element): string
    {
        $id = $element['id'];
        $classes = array_values(array_filter($element['classes'] ?? []));
        $classPart = $classes !== [] ? '.'.implode('.', $classes) : '';
        $attr = '[data-he-id="'.$id.'"]';

        if (($element['type'] ?? '') === 'image') {
            $parent = match (true) {
                $id === 'hero-logo' => '.hero-logo-band',
                str_starts_with($id, 'quem-img') => '.who-media',
                $id === 'quem-impact' => '.impact-full',
                str_starts_with($id, 'atuacao-img') => '.atuacao-item',
                str_starts_with($id, 'insta-img') => '.insta-item',
                default => '',
            };

            if ($parent !== '') {
                return $parent.' img'.$classPart.$attr;
            }

            return 'img'.$classPart.$attr;
        }

        if ($classes === []) {
            return $attr;
        }

        return '.'.implode('.', $classes).$attr;
    }

    public function uploadImage(UploadedFile $file, string $elementId): string
    {
        $data = $this->load();
        $index = null;

        foreach ($data['elements'] as $i => $element) {
            if ($element['id'] === $elementId) {
                $index = $i;
                break;
            }
        }

        if ($index === null) {
            throw new RuntimeException('Elemento não encontrado.');
        }

        $element = $data['elements'][$index];
        $uploadDir = trim((string) ($element['upload_dir'] ?? 'uploads/home'), '/');
        $directory = $uploadDir === ''
            ? $this->publicPath()
            : $this->publicPath().DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $uploadDir);

        if (! File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg');
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (! in_array($extension, $allowed, true)) {
            throw new RuntimeException('Formato de imagem não permitido.');
        }

        if ($extension === 'jpeg') {
            $extension = 'jpg';
        }

        $filename = preg_replace('/[^a-z0-9\-_]/i', '-', $elementId).'-'.date('YmdHis').'.'.$extension;
        $file->move($directory, $filename);

        $relative = $uploadDir === '' ? $filename : $uploadDir.'/'.$filename;
        $data['elements'][$index]['src'] = $relative;
        $this->save($data);

        return $relative;
    }

    private function formatPercent(float|string $value): string
    {
        $number = round((float) $value, 3);
        $formatted = rtrim(rtrim(number_format($number, 3, '.', ''), '0'), '.');

        return $formatted.'%';
    }

    private function mergeDefaults(array $data): array
    {
        $defaults = collect($this->defaults()['elements'])->keyBy('id');
        $merged = [];

        foreach ($data['elements'] as $element) {
            $base = $defaults->get($element['id'], []);
            $item = array_replace_recursive($base, $element);
            $styles = $this->normalizeStyles($item['styles'] ?? null);
            $item['styles'] = $styles;
            $merged[] = $item;
        }

        foreach ($defaults as $id => $element) {
            if (! collect($merged)->contains(fn ($item) => $item['id'] === $id)) {
                $merged[] = $element;
            }
        }

        $data['elements'] = array_values($merged);

        if (! isset($data['hero_settings'])) {
            $data['hero_settings'] = $this->defaults()['hero_settings'];
        }

        return $data;
    }

    public function defaults(): array
    {
        return [
            'version' => 1,
            'hero_settings' => [
                '--moodboard-zoom' => '1.04',
                '--hero-moodboard-shift-x' => '2.5%',
            ],
            'elements' => $this->defaultElements(),
        ];
    }

    private function defaultElements(): array
    {
        $text = fn (string $id, string $section, string $label, string $content, array $classes = [], ?string $font = null) => [
            'id' => $id,
            'type' => 'text',
            'section' => $section,
            'label' => $label,
            'content' => $content,
            'classes' => $classes,
            'font_family' => $font,
            'font_size' => null,
            'line_height' => null,
            'color' => null,
            'text_align' => null,
            'position' => ['enabled' => false, 'top' => null, 'left' => null, 'width' => null, 'height' => null, 'z_index' => 1],
            'styles' => [],
        ];

        $image = fn (string $id, string $section, string $label, string $src, string $alt = '', array $classes = [], string $uploadDir = 'biografia') => [
            'id' => $id,
            'type' => 'image',
            'section' => $section,
            'label' => $label,
            'src' => $src,
            'alt' => $alt,
            'classes' => $classes,
            'upload_dir' => $uploadDir,
            'position' => ['enabled' => false, 'top' => null, 'left' => null, 'width' => null, 'height' => null, 'z_index' => 1],
            'styles' => [],
        ];

        $link = fn (string $id, string $section, string $label, string $content, string $href, array $classes = []) => [
            'id' => $id,
            'type' => 'link',
            'section' => $section,
            'label' => $label,
            'content' => $content,
            'href' => $href,
            'classes' => $classes,
            'font_family' => null,
            'font_size' => null,
            'position' => ['enabled' => false, 'top' => null, 'left' => null, 'width' => null, 'height' => null, 'z_index' => 1],
            'styles' => [],
        ];

        return array_merge(
            [
                $image('hero-logo', 'inicio', 'Logo hero', 'logo.png', 'Com Classe Assessoria e Cerimonial', ['logo-main', 'logo-main--hero'], ''),
            ],
            [
                $image('quem-img-1', 'quem-somos', 'Foto fundadora', 'biografia/1.png', 'Fundadora Com Classe', ['img-pos-left'], 'biografia'),
                $text('quem-eyebrow', 'quem-somos', 'Eyebrow', 'Quem somos', ['eyebrow', 'font-abramo'], 'font-abramo'),
                $text('quem-title-1', 'quem-somos', 'Título', 'A base de tudo', ['font-antic-didone'], 'font-antic-didone'),
                $text('quem-p-1', 'quem-somos', 'Parágrafo 1', 'ANA COM CLASSE é mente idealizadora da Com Classe desde 2016, mas foi em 2008 que iniciou sua carreira no universo de eventos norte-mineiro.', []),
                $text('quem-p-2', 'quem-somos', 'Parágrafo 2', 'Especialista em planejamento e gestão de eventos, construiu sua carreira combinando organização no processo, sensibilidade com as pessoas e um olhar apurado para os detalhes.', []),
                $text('quem-p-3', 'quem-somos', 'Parágrafo 3', 'Atuo há mais de 16 anos no mercado de casamentos, conduzindo eventos com método, sensibilidade e verdade.', []),
                $text('quem-p-4', 'quem-somos', 'Parágrafo 4', 'É criteriosa, enérgica e profundamente apaixonada pela vida. Daquelas que acreditam que a cultura de excelência transforma o simples em extraordinário. Cristã, bem-casada, mãe e empresária. Ama celebrar pessoas e suas histórias. Encontra alegria em transformar momentos importantes em memórias leves, elegantes e inesquecíveis.', []),
                $image('quem-img-2', 'quem-somos', 'Foto equipe', 'imagens_hero/7.png', 'Equipe Com Classe', [], 'imagens_hero'),
                $text('quem-title-2', 'quem-somos', 'O que fazemos — título', 'O que fazemos', ['font-antic-didone'], 'font-antic-didone'),
                $text('quem-p-5', 'quem-somos', 'O que fazemos — texto', 'Organizamos eventos que comunicam a identidade dos anfitriões com rigor técnico e um apreço enorme pelo belo. Nós transformamos sonhos em experiências verdadeiramente autênticas e memoráveis.', []),
                $text('valores-title', 'quem-somos', 'Nossos valores — título', 'Nossos valores', ['values-title', 'font-abramo'], 'font-abramo'),
                $text('valor-1-title', 'quem-somos', 'Valor 1 — título', 'Sensibilidade', ['titulo-valor']),
                $text('valor-1-text', 'quem-somos', 'Valor 1 — texto', 'Cuidamos de pessoas, não apenas de eventos. Nosso trabalho começa pela escuta.', []),
                $text('valor-2-title', 'quem-somos', 'Valor 2 — título', 'Elegância', ['titulo-valor']),
                $text('valor-2-text', 'quem-somos', 'Valor 2 — texto', 'A elegância está em nosso DNA. Harmonia, bom gosto e sensatez em tudo que criamos.', []),
                $text('valor-3-title', 'quem-somos', 'Valor 3 — título', 'Ética', ['titulo-valor']),
                $text('valor-3-text', 'quem-somos', 'Valor 3 — texto', 'Agimos com verdade, respeito, prudência e responsabilidade em todas as relações.', []),
                $image('quem-impact', 'quem-somos', 'Imagem impacto', 'imagens_hero/1.jpg', 'Celebração com classe', [], 'imagens_hero'),
            ],
            [
                $text('atuacao-title', 'atuacao', 'Título', 'Nossa Atua<span class="font-belights">ção</span>', ['atuacao-title', 'font-abramo'], 'font-abramo'),
                $text('atuacao-subtitle', 'atuacao', 'Subtítulo', 'Oferecemos uma assessoria profissional com abordagem individualizada para que nossos casais se sintam seguros e tranquilos do início ao fim do processo.', ['atuacao-subtitle']),
                $image('atuacao-img-1', 'atuacao', 'Assessoria', 'imagens_3_secao/Planejamento Detalhado.png', 'Assessoria completa', [], 'imagens_3_secao'),
                $text('atuacao-text-1', 'atuacao', 'Texto 1', "Assessoria completa e\npersonalizada", ['font-antic-didone'], 'font-antic-didone'),
                $image('atuacao-img-2', 'atuacao', 'Projetos', 'imagens_3_secao/Execução Perfeita.png', 'Projetos exclusivos', [], 'imagens_3_secao'),
                $text('atuacao-text-2', 'atuacao', 'Texto 2', "Criação de projetos\nexclusivos", ['font-antic-didone'], 'font-antic-didone'),
                $image('atuacao-img-3', 'atuacao', 'Execução', 'imagens_3_secao/Resultados Excepcionais.jpg', 'Execução impecável', ['img-pos-bottom'], 'imagens_3_secao'),
                $text('atuacao-text-3', 'atuacao', 'Texto 3', "Execução impecável\nde tudo que foi sonhado", ['font-antic-didone'], 'font-antic-didone'),
                $link('atuacao-cta', 'atuacao', 'Botão CTA', 'Quero Saber Mais', route('servicos'), ['atuacao-btn']),
            ],
            [
                $text('mentorias-title', 'mentorias', 'Título', 'Mentorias e Cursos', ['mentorias-title', 'font-abramo'], 'font-abramo'),
                $text('mentorias-subtitle', 'mentorias', 'Subtítulo', 'Formação e acompanhamento para cerimonialistas e profissionais de eventos.', ['mentorias-subtitle', 'font-antic-didone'], 'font-antic-didone'),
                $link('mentorias-cta', 'mentorias', 'WhatsApp', 'Falar no WhatsApp', 'https://wa.me/message/WBFMLONCMS3PH1', ['btn-primary', 'btn-wide']),
            ],
            [
                $text('depoimentos-title', 'depoimentos', 'Título', 'Depoimentos', ['testimonials-title', 'font-abramo'], 'font-abramo'),
            ],
            $this->defaultTestimonials($text),
            [
                $text('insta-cta', 'instagram', 'CTA Instagram', 'siga no instagram', ['footer-cta', 'font-antic-didone'], 'font-antic-didone'),
                $link('insta-handle', 'instagram', 'Handle', '@comclassecasamentos', 'https://www.instagram.com/comclassecasamentos/', ['footer-handle', 'font-antic-didone']),
            ],
            $this->defaultInstagram($image, $link),
            [
                $text('contato-lead', 'contato', 'Lead', 'Sonha com um casamento exclusivo?', ['subtitle', 'lead-highlight', 'contact-lead', 'font-antic-didone'], 'font-antic-didone'),
                $text('contato-title', 'contato', 'Título', 'Entre em Contato!', ['contact-title', 'font-abramo'], 'font-abramo'),
                $link('contato-cta', 'contato', 'Botão', 'Quero falar com a Com Classe', 'https://assessoriavip.com.br/funnelFormLead/63dada70-1556-11eb-ac90-0d7b933d6c56', ['btn-primary', 'btn-wide']),
            ],
        );
    }

    private function defaultTestimonials(callable $text): array
    {
        $items = require config_path('depoimentos-full.php');

        $elements = [];
        foreach ($items as $i => $item) {
            $n = $i + 1;
            $elements[] = $text("depoimento-{$n}-quote", 'depoimentos', "Depoimento {$n}", trim($item['quote']), ['quote']);
            $elements[] = $text("depoimento-{$n}-author", 'depoimentos', "Autor {$n}", $item['author'], ['author']);
        }

        return $elements;
    }

    private function defaultInstagram(callable $image, callable $link): array
    {
        $urls = [
            'https://www.instagram.com/p/DZdvTVXiW5x/?img_index=1',
            'https://www.instagram.com/p/DZiGGOfDkRG/?img_index=1',
            'https://www.instagram.com/p/DSNUjJdjpZN/?img_index=1',
            'https://www.instagram.com/p/DOcAOVXD_lr/',
            'https://www.instagram.com/p/DMAjqCSur8Y/?img_index=1',
            'https://www.instagram.com/p/DLkqHR5uuer/?img_index=1',
            'https://www.instagram.com/p/DHNLRHkOj0f/?img_index=1',
            'https://www.instagram.com/p/DAJYIchOR_0/?img_index=1',
            'https://www.instagram.com/p/C8izL0SOqDp/?img_index=1',
            'https://www.instagram.com/p/C4bW_0NObJc/?img_index=1',
            'https://www.instagram.com/p/C4Bt-YoOLka/?img_index=1',
        ];

        $elements = [];
        foreach ($urls as $i => $href) {
            $n = $i + 1;
            $elements[] = $image("insta-img-{$n}", 'instagram', "Instagram {$n}", "imagens_instagram/{$n}.jpg", "Instagram {$n}", [], 'imagens_instagram');
            $elements[] = $link("insta-link-{$n}", 'instagram', "Link Instagram {$n}", '', $href, ['insta-item']);
        }

        return $elements;
    }
}
