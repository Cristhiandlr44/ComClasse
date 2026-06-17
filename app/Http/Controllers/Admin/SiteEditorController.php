<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\HeroCollageService;
use App\Services\HomeContentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteEditorController extends Controller
{
    public function __construct(
        private HeroCollageService $collage,
        private HomeContentService $homeContent
    ) {}

    public function gate(Request $request): View|RedirectResponse
    {
        if ($request->session()->get(config('collage_admin.session_key')) === true) {
            return redirect()->route('admin.site.editor');
        }

        return view('admin.collage-login');
    }

    public function login(Request $request): RedirectResponse
    {
        $password = (string) config('collage_admin.password');

        if ($password === '') {
            return back()->withErrors([
                'password' => 'Defina ADMIN_COLLAGE_PASSWORD no arquivo .env do servidor.',
            ]);
        }

        $request->validate([
            'password' => 'required|string',
        ]);

        if (! hash_equals($password, (string) $request->input('password'))) {
            return back()->withErrors([
                'password' => 'Senha incorreta.',
            ]);
        }

        $request->session()->put(config('collage_admin.session_key'), true);

        return redirect()->route('admin.site.editor');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(config('collage_admin.session_key'));

        return redirect()->route('admin.site.gate');
    }

    public function editor(): View
    {
        $this->collage->ensureGeneratedCss();
        $this->homeContent->ensureGeneratedCss();

        return view('admin.site-editor', [
            'collage' => $this->collage->load(),
            'homeContent' => $this->homeContent->load(),
            'collageImageBase' => asset($this->collage->imageUrlBase()),
        ]);
    }

    public function saveCollage(Request $request): JsonResponse
    {
        $payload = $request->validate([
            'version' => 'nullable|integer',
            'stage' => 'nullable|array',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|string|max:80',
            'items.*.label' => 'nullable|string|max:120',
            'items.*.src' => 'required|string|max:255',
            'items.*.alt' => 'nullable|string|max:255',
            'items.*.classes' => 'nullable|array',
            'items.*.top' => 'required|numeric|min:0|max:100',
            'items.*.left' => 'required|numeric|min:0|max:100',
            'items.*.width' => 'required|numeric|min:0.1|max:100',
            'items.*.height' => 'nullable|numeric|min:0.1|max:100',
            'items.*.z_index' => 'required|integer|min:0|max:999',
            'items.*.loading' => 'nullable|string|in:lazy,eager',
            'items.*.styles' => 'nullable|array',
        ]);

        $payload['version'] = $payload['version'] ?? 1;
        $payload['stage'] = $payload['stage'] ?? ['width' => 1920, 'height' => 1080];

        $this->collage->save($payload);

        return response()->json([
            'ok' => true,
            'message' => 'Colagem salva.',
        ]);
    }

    public function saveHome(Request $request): JsonResponse
    {
        $request->validate([
            'version' => 'nullable|integer',
            'hero_settings' => 'nullable|array',
            'elements' => 'required|array|min:1',
            'elements.*.id' => 'required|string|max:80',
            'elements.*.type' => 'required|string|in:text,image,link',
            'elements.*.section' => 'nullable|string|max:80',
            'elements.*.label' => 'nullable|string|max:120',
            'elements.*.content' => 'nullable|string',
            'elements.*.href' => 'nullable|string|max:2000',
            'elements.*.src' => 'nullable|string|max:255',
            'elements.*.alt' => 'nullable|string|max:255',
            'elements.*.classes' => 'nullable|array',
            'elements.*.font_family' => 'nullable|string|max:80',
            'elements.*.font_size' => 'nullable|string|max:40',
            'elements.*.line_height' => 'nullable|string|max:40',
            'elements.*.color' => 'nullable|string|max:40',
            'elements.*.text_align' => 'nullable|string|max:20',
            'elements.*.upload_dir' => 'nullable|string|max:120',
            'elements.*.position' => 'nullable|array',
            'elements.*.position.enabled' => 'nullable|boolean',
            'elements.*.position.top' => 'nullable|numeric',
            'elements.*.position.left' => 'nullable|numeric',
            'elements.*.position.width' => 'nullable|numeric',
            'elements.*.position.height' => 'nullable|numeric',
            'elements.*.position.z_index' => 'nullable|integer',
            'elements.*.styles' => 'nullable|array',
            'elements.*.styles.*' => 'nullable|string|max:200',
        ]);

        $this->homeContent->save([
            'version' => (int) $request->input('version', 1),
            'hero_settings' => $request->input('hero_settings', []),
            'elements' => $request->input('elements', []),
        ]);

        return response()->json([
            'ok' => true,
            'message' => 'Conteúdo da home salvo.',
        ]);
    }

    public function uploadCollage(Request $request): JsonResponse
    {
        return $this->uploadImage($request, function ($file, $id) {
            return $this->collage->uploadImage($file, $id);
        }, 'collage');
    }

    public function uploadHome(Request $request): JsonResponse
    {
        return $this->uploadImage($request, function ($file, $id) {
            return $this->homeContent->uploadImage($file, $id);
        }, 'home');
    }

    private function uploadImage(Request $request, callable $handler, string $context): JsonResponse
    {
        try {
            $request->validate([
                'item_id' => 'required|string|max:80',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            ]);

            $filename = $handler($request->file('image'), $request->input('item_id'));

            return response()->json([
                'ok' => true,
                'filename' => $filename,
                'url' => $context === 'collage'
                    ? asset($this->collage->imageUrlBase().'/'.$filename)
                    : asset($filename),
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'ok' => false,
                'message' => $exception->getMessage(),
            ], 422);
        }
    }
}
