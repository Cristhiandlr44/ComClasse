<?php

namespace App\Support;

use Illuminate\Support\Facades\File;

class PublicAssetPublisher
{
    /**
     * Em hospedagens como Hostinger o document root costuma ser public_html,
     * enquanto o Laravel grava em public_html/laravel/public.
     */
    public static function resolveWebRoot(): string
    {
        if ($override = env('PUBLIC_WEB_ROOT')) {
            return rtrim(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $override), DIRECTORY_SEPARATOR);
        }

        $public = realpath(public_path());
        if (! $public) {
            return public_path();
        }

        $candidate = realpath(dirname($public, 2));
        if (! $candidate) {
            return $public;
        }

        $indexFile = $candidate.DIRECTORY_SEPARATOR.'index.php';
        $laravelDir = $candidate.DIRECTORY_SEPARATOR.'laravel';

        if (file_exists($indexFile) && is_dir($laravelDir)) {
            return $candidate;
        }

        return $public;
    }

    public static function publish(string $relativePath, string $contents): array
    {
        $relativePath = ltrim(str_replace('\\', '/', $relativePath), '/');
        $written = [];

        foreach (self::targetPaths($relativePath) as $path) {
            File::ensureDirectoryExists(dirname($path));
            File::put($path, $contents);
            $written[] = $path;
        }

        return $written;
    }

    /**
     * @return array<int, string>
     */
    public static function targetPaths(string $relativePath): array
    {
        $relativePath = ltrim(str_replace('\\', '/', $relativePath), '/');
        $paths = [public_path($relativePath)];

        $webRoot = self::resolveWebRoot();
        $public = realpath(public_path());

        if ($public && $webRoot !== $public) {
            $paths[] = $webRoot.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $relativePath);
        }

        return array_values(array_unique($paths));
    }
}
