<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ShortLinkRedirectController extends Controller
{
    public function __invoke(string $slug): RedirectResponse|Response
    {
        $slug = strtolower(trim($slug));

        if ($slug === '' || $this->isReserved($slug)) {
            abort(404);
        }

        $link = ShortLink::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (! $link) {
            abort(404);
        }

        $link->increment('hits');

        return redirect()->away($link->destination_url, 302);
    }

    private function isReserved(string $slug): bool
    {
        return in_array($slug, array_map('strtolower', config('short_links.reserved_slugs', [])), true);
    }
}
