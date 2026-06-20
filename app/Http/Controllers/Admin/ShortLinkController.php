<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ShortLinkController extends Controller
{
    public function index(): View
    {
        $links = ShortLink::query()
            ->orderByDesc('updated_at')
            ->get()
            ->map(fn (ShortLink $link) => [
                'id' => $link->id,
                'slug' => $link->slug,
                'title' => $link->title,
                'destination_url' => $link->destination_url,
                'is_active' => $link->is_active,
                'hits' => $link->hits,
                'public_url' => $link->publicUrl(),
                'updated_at' => $link->updated_at?->format('d/m/Y H:i'),
            ]);

        return view('admin.short-links', [
            'links' => $links,
            'siteHost' => parse_url(config('app.url'), PHP_URL_HOST) ?: 'comclasse.com.br',
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validatedPayload($request);

        $link = ShortLink::create($data);

        return response()->json([
            'ok' => true,
            'message' => 'Encaminhamento criado.',
            'link' => $this->serialize($link),
        ]);
    }

    public function update(Request $request, ShortLink $shortLink): JsonResponse
    {
        $data = $this->validatedPayload($request, $shortLink->id);

        $shortLink->update($data);

        return response()->json([
            'ok' => true,
            'message' => 'Encaminhamento atualizado.',
            'link' => $this->serialize($shortLink->fresh()),
        ]);
    }

    public function destroy(ShortLink $shortLink): JsonResponse
    {
        $shortLink->delete();

        return response()->json([
            'ok' => true,
            'message' => 'Encaminhamento removido.',
        ]);
    }

    private function validatedPayload(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'slug' => [
                'required',
                'string',
                'min:2',
                'max:80',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('short_links', 'slug')->ignore($ignoreId),
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if ($this->isReservedSlug((string) $value)) {
                        $fail('Este caminho já é usado pelo site.');
                    }
                },
            ],
            'title' => 'nullable|string|max:160',
            'destination_url' => 'required|url|max:2000',
            'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = strtolower($data['slug']);
        $data['is_active'] = (bool) ($data['is_active'] ?? true);

        return $data;
    }

    private function isReservedSlug(string $slug): bool
    {
        return in_array(strtolower($slug), array_map('strtolower', config('short_links.reserved_slugs', [])), true);
    }

    private function serialize(ShortLink $link): array
    {
        return [
            'id' => $link->id,
            'slug' => $link->slug,
            'title' => $link->title,
            'destination_url' => $link->destination_url,
            'is_active' => $link->is_active,
            'hits' => $link->hits,
            'public_url' => $link->publicUrl(),
            'updated_at' => $link->updated_at?->format('d/m/Y H:i'),
        ];
    }
}
