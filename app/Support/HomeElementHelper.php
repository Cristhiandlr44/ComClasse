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
        return (string) ($this->get($id)['href'] ?? $default);
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
