<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editor de Colagem — Com Classe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom-prod.css') }}">
    <link rel="stylesheet" href="{{ route('css.hero-collage') }}">
    <link rel="stylesheet" href="{{ asset('css/collage-editor.css') }}">
</head>
<body class="collage-editor-body">
    <header class="collage-editor-toolbar">
        <div class="collage-editor-toolbar__title">
            <strong>Editor da colagem</strong>
            <span>Arraste para posicionar · canto inferior direito para redimensionar</span>
        </div>
        <div class="collage-editor-toolbar__actions">
            <span id="collageEditorStatus" class="collage-editor-status" aria-live="polite"></span>
            <button type="button" id="collageEditorSave" class="collage-editor-btn collage-editor-btn--primary">
                <i class="bi bi-save"></i> Salvar alterações
            </button>
            <form method="POST" action="{{ route('admin.collage.logout') }}">
                @csrf
                <button type="submit" class="collage-editor-btn">Sair</button>
            </form>
        </div>
    </header>

    <div class="collage-editor-layout">
        <aside class="collage-editor-panel">
            <h2>Peças</h2>
            <ul id="collageItemList" class="collage-editor-list"></ul>

            <div id="collageItemDetails" class="collage-editor-details is-hidden">
                <h3 id="collageSelectedLabel">Peça</h3>
                <label class="collage-editor-field">
                    <span>Texto alternativo</span>
                    <input type="text" id="collageAltInput">
                </label>
                <label class="collage-editor-field">
                    <span>Camada (z-index)</span>
                    <input type="number" id="collageZIndexInput" min="0" max="999">
                </label>
                <label class="collage-editor-field">
                    <span>Trocar imagem</span>
                    <input type="file" id="collageUploadInput" accept="image/jpeg,image/png,image/webp">
                </label>
                <p class="collage-editor-hint">A nova imagem é salva em <code>public/imagens_hero/Colagem/</code>.</p>
            </div>
        </aside>

        <main class="collage-editor-canvas-wrap">
            <div class="collage-editor-stage-shell">
                <div
                    id="collageEditorStage"
                    class="collage-editor-stage hero-moodboard"
                    data-stage-width="{{ $collage['stage']['width'] ?? 1920 }}"
                    data-stage-height="{{ $collage['stage']['height'] ?? 1080 }}"
                >
                    <div class="moodboard-stage collage-editor-moodboard-stage" id="collageEditorMoodboard">
                        @foreach($collage['items'] as $item)
                            <div
                                class="collage-editor-item {{ implode(' ', $item['classes'] ?? []) }} {{ $item['id'] }}"
                                data-item-id="{{ $item['id'] }}"
                                data-top="{{ $item['top'] }}"
                                data-left="{{ $item['left'] }}"
                                data-width="{{ $item['width'] }}"
                                data-height="{{ $item['height'] ?? '' }}"
                                data-z-index="{{ $item['z_index'] }}"
                                data-alt="{{ $item['alt'] ?? '' }}"
                                data-src="{{ $item['src'] }}"
                                data-label="{{ $item['label'] ?? $item['id'] }}"
                                style="top: {{ $item['top'] }}%; left: {{ $item['left'] }}%; width: {{ $item['width'] }}%; @if(!empty($item['height'])) height: {{ $item['height'] }}%; @endif z-index: {{ $item['z_index'] }};"
                            >
                                <img src="{{ $imageBase }}/{{ $item['src'] }}" alt="{{ $item['alt'] ?? '' }}">
                                <span class="collage-editor-item__label">{{ $item['label'] ?? $item['id'] }}</span>
                                <span class="collage-editor-resize-handle" data-resize-handle aria-hidden="true"></span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        window.__COLLAGE_EDITOR__ = {
            collage: @json($collage),
            routes: {
                save: @json(route('admin.collage.save')),
                upload: @json(route('admin.collage.upload')),
            },
            imageBase: @json($imageBase),
        };
    </script>
    <script src="{{ asset('js/collage-editor.js') }}"></script>
</body>
</html>
