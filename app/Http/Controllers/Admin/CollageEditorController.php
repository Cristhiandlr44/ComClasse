<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\HeroCollageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollageEditorController extends Controller
{
    public function __construct(
        private HeroCollageService $collage
    ) {}

    public function gate(Request $request): View|RedirectResponse
    {
        if ($request->session()->get(config('collage_admin.session_key')) === true) {
            return redirect()->route('admin.collage.editor');
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

        return redirect()->route('admin.collage.editor');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(config('collage_admin.session_key'));

        return redirect()->route('admin.collage.gate');
    }

    public function editor(): View
    {
        $collage = $this->collage->load();

        return view('admin.collage-editor', [
            'collage' => $collage,
            'imageBase' => asset($this->collage->imageUrlBase()),
        ]);
    }

    public function save(Request $request): JsonResponse
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
            'message' => 'Colagem salva. CSS e JSON atualizados no repositório.',
        ]);
    }

    public function upload(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'item_id' => 'required|string|max:80',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            ]);

            $filename = $this->collage->uploadImage(
                $request->file('image'),
                $request->input('item_id')
            );

            return response()->json([
                'ok' => true,
                'filename' => $filename,
                'url' => asset($this->collage->imageUrlBase().'/'.$filename),
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'ok' => false,
                'message' => $exception->getMessage(),
            ], 422);
        }
    }
}
