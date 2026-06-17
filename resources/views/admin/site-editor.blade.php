<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editor da Home — Com Classe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom-prod.css') }}">
    <link rel="preload" href="{{ asset('fonts/Belights.ttf') }}" as="font" type="font/ttf" crossorigin>
    @php
        $heroCollageConfig = config_path('hero-collage.json');
        $homeContentConfig = config_path('home-content.json');
    @endphp
    <link rel="stylesheet" href="{{ route('css.hero-collage') }}@if(file_exists($heroCollageConfig))?v={{ filemtime($heroCollageConfig) }}@endif">
    <link rel="stylesheet" href="{{ route('css.home-content') }}@if(file_exists($homeContentConfig))?v={{ filemtime($homeContentConfig) }}@endif">
    <style id="site-editor-live-styles"></style>
    <link rel="stylesheet" href="{{ asset('css/collage-editor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site-editor.css') }}">
</head>
<body class="site-editor-body">
    <header class="site-editor-toolbar">
        <div class="site-editor-toolbar__title">
            <strong><i class="bi bi-pencil-square" aria-hidden="true"></i> Editor da página inicial</strong>
            <span><i class="bi bi-hand-index" aria-hidden="true"></i> Clique no elemento para editar · canto dourado para redimensionar imagens</span>
        </div>
        <div class="site-editor-toolbar__actions">
            <select id="siteEditorSectionFilter" class="site-editor-select" aria-label="Filtrar seção">
                <option value="">Todas as seções</option>
                <option value="inicio">Colagem</option>
                <option value="quem-somos">Quem somos</option>
                <option value="atuacao">Atuação</option>
                <option value="mentorias">Mentorias</option>
                <option value="depoimentos">Depoimentos</option>
                <option value="instagram">Instagram</option>
                <option value="contato">Contato</option>
            </select>
            <span id="siteEditorStatus" class="site-editor-status" aria-live="polite"></span>
            <button type="button" id="siteEditorSave" class="site-editor-btn site-editor-btn--primary">
                <i class="bi bi-save"></i> Salvar tudo
            </button>
            <form method="POST" action="{{ route('admin.site.logout') }}">
                @csrf
                <button type="submit" class="site-editor-btn">Sair</button>
            </form>
        </div>
    </header>

    <div class="site-editor-layout">
        <aside class="site-editor-panel">
            <h2 id="siteEditorPanelTitle">Elemento</h2>
            <p id="siteEditorPanelHint" class="site-editor-hint">Selecione um texto, imagem ou link na página.</p>

            <div id="siteEditorTextFields" class="site-editor-fields is-hidden">
                <label class="site-editor-field">
                    <span>Texto</span>
                    <textarea id="siteEditorTextContent" rows="6"></textarea>
                </label>
                <label class="site-editor-field">
                    <span>Fonte</span>
                    <select id="siteEditorFontFamily">
                        <option value="">Padrão da seção</option>
                        <option value="font-abramo">Abramo / BridalRoutine</option>
                        <option value="font-antic-didone">Antic Didone</option>
                        <option value="font-belights">Belights</option>
                        <option value="font-servico">Fira Sans</option>
                    </select>
                </label>
                <label class="site-editor-field">
                    <span>Tamanho da fonte</span>
                    <input type="text" id="siteEditorFontSize" placeholder="ex: 1.05rem">
                </label>
                <label class="site-editor-field">
                    <span>Alinhamento</span>
                    <select id="siteEditorTextAlign">
                        <option value="">Padrão</option>
                        <option value="left">Esquerda</option>
                        <option value="center">Centro</option>
                        <option value="right">Direita</option>
                    </select>
                </label>
                <label class="site-editor-field site-editor-field--inline">
                    <input type="checkbox" id="siteEditorPositionEnabled">
                    <span>Posição livre (%)</span>
                </label>
            </div>

            <div id="siteEditorLinkFields" class="site-editor-fields is-hidden">
                <label class="site-editor-field">
                    <span>Texto do link</span>
                    <input type="text" id="siteEditorLinkContent">
                </label>
                <label class="site-editor-field">
                    <span>URL</span>
                    <input type="url" id="siteEditorLinkHref">
                </label>
            </div>

            <div id="siteEditorImageFields" class="site-editor-fields is-hidden">
                <label class="site-editor-field">
                    <span>Trocar imagem</span>
                    <input type="file" id="siteEditorImageUpload" accept="image/jpeg,image/png,image/webp">
                </label>
                <label class="site-editor-field">
                    <span>Texto alternativo</span>
                    <input type="text" id="siteEditorImageAlt">
                </label>
                <label class="site-editor-field site-editor-field--inline">
                    <input type="checkbox" id="siteEditorImagePositionEnabled">
                    <span>Posição livre (arrastar no bloco)</span>
                </label>
                <p class="site-editor-hint">Use o canto dourado da imagem para redimensionar. Logos e fotos aceitam troca de arquivo acima.</p>
            </div>
        </aside>

        <main class="site-editor-canvas" id="siteEditorCanvas">
            @php
                $editMode = true;
                $he = new \App\Support\HomeElementHelper(collect($homeContent['elements'])->keyBy('id')->all());
            @endphp
            <div class="site-editor-page site-body">
                @include('partials.home-body', [
                    'editMode' => true,
                    'collageItems' => $collage['items'],
                    'collageImageBase' => $collageImageBase,
                    'he' => $he,
                ])
            </div>
        </main>
    </div>

    <script>
        window.__SITE_EDITOR__ = {
            collage: @json($collage),
            homeContent: @json($homeContent),
            routes: {
                saveCollage: @json(route('admin.site.save.collage')),
                saveHome: @json(route('admin.site.save.home')),
                uploadCollage: @json(route('admin.site.upload.collage')),
                uploadHome: @json(route('admin.site.upload.home')),
            },
            collageImageBase: @json($collageImageBase),
        };
    </script>
    <script src="{{ asset('js/site-editor.js') }}"></script>
    @if(file_exists(public_path('js/custom.js')))
        <script src="{{ asset('js/custom.js') }}"></script>
    @endif
</body>
</html>
