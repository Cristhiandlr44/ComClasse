<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShortLink extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'destination_url',
        'is_active',
        'hits',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'hits' => 'integer',
    ];

    public static function normalizeSlug(string $value): string
    {
        $slug = Str::slug($value, '-');

        return trim($slug, '-');
    }

    public function publicPath(): string
    {
        return '/'.$this->slug;
    }

    public function publicUrl(): string
    {
        return url($this->publicPath());
    }
}
