<?php

namespace App\Support;

class HomeElementHelper
{
    public function __construct(
        private array $elements
    ) {}

    public function has(string $id): bool
    {
        return isset($this->elements[$id]);
    }

    public function get(string $id): array
    {
        return $this->elements[$id] ?? [];
    }

    public function content(string $id, string $default = ''): string
    {
        $element = $this->get($id);

        if ($element['type'] === 'link') {
            return (string) ($element['content'] ?? $default);
        }

        return (string) ($element['content'] ?? $default);
    }

    public function href(string $id, string $default = '#'): string
    {
        $href = (string) ($this->get($id)['href'] ?? $default);

        return $this->normalizeHref($href, $default);
    }

    private function normalizeHref(string $href, string $fallback): string
    {
        if ($href === '' || $href === '#') {
            return $fallback;
        }

        if (str_starts_with($href, '/') && ! str_starts_with($href, '//')) {
            return url($href);
        }

        $host = strtolower((string) parse_url($href, PHP_URL_HOST));

        if (in_array($host, ['localhost', '127.0.0.1'], true)) {
            return url(parse_url($href, PHP_URL_PATH) ?: '/');
        }

        return $href;
    }

    public function src(string $id, string $default = ''): string
    {
        $src = (string) ($this->get($id)['src'] ?? $default);

        return $src !== '' ? asset($src) : '';
    }

    public function alt(string $id, string $default = ''): string
    {
        return (string) ($this->get($id)['alt'] ?? $default);
    }

    public function classes(string $id, string $fallback = ''): string
    {
        $classes = $this->get($id)['classes'] ?? [];

        if (! is_array($classes) || $classes === []) {
            return trim($fallback);
        }

        $font = $this->get($id)['font_family'] ?? null;
        if ($font && ! in_array($font, $classes, true)) {
            $classes[] = $font;
        }

        return implode(' ', array_unique($classes));
    }

    public function attrs(string $id, string $type): string
    {
        $attributes = [
            'data-he-id' => $id,
            'data-he-type' => $type,
        ];

        $parts = [];
        foreach ($attributes as $key => $value) {
            $parts[] = $key.'="'.e($value).'"';
        }

        return implode(' ', $parts);
    }

    public function positionedParentClass(string $id): string
    {
        $position = $this->get($id)['position'] ?? [];

        return ! empty($position['enabled']) ? 'he-position-root' : '';
    }
}
