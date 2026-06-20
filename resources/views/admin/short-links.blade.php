<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Encaminhamentos — Com Classe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-tools.css') }}?v={{ filemtime(public_path('css/admin-tools.css')) }}">
</head>
<body class="admin-tools-body">
    <header class="admin-tools-header">
        <div class="admin-tools-header__main">
            <div class="admin-tools-header__title">
                <strong><i class="bi bi-signpost-split" aria-hidden="true"></i> Links de encaminhamento</strong>
                <span>Crie caminhos como <code>{{ $siteHost }}/emily15anos</code> que redirecionam para qualquer URL.</span>
            </div>
            @include('partials.admin-tools-nav')
        </div>
        <div class="admin-tools-header__actions">
            <span id="shortLinksStatus" class="admin-tools-status" aria-live="polite"></span>
            <button type="button" id="shortLinkCreateBtn" class="admin-tools-btn admin-tools-btn--primary">
                <i class="bi bi-plus-circle" aria-hidden="true"></i> Novo link
            </button>
            <form method="POST" action="{{ route('admin.site.logout') }}">
                @csrf
                <button type="submit" class="admin-tools-btn">Sair</button>
            </form>
        </div>
    </header>

    <main class="admin-tools-main">
        <section class="short-links-intro">
            <div class="short-links-intro__card">
                <i class="bi bi-lightning-charge" aria-hidden="true"></i>
                <div>
                    <h2>Como funciona</h2>
                    <p>Ideal para confirmações de presença, formulários externos ou links de apps — sem precisar de site próprio do cliente.</p>
                </div>
            </div>
        </section>

        <section id="shortLinksList" class="short-links-grid" aria-live="polite">
            @forelse($links as $link)
                <article class="short-link-card @if(!$link['is_active']) is-inactive @endif" data-link-id="{{ $link['id'] }}">
                    <div class="short-link-card__icon">
                        <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                    </div>
                    <div class="short-link-card__body">
                        <h3>{{ $link['title'] ?: $link['slug'] }}</h3>
                        <a href="{{ $link['public_url'] }}" target="_blank" rel="noopener" class="short-link-card__path">
                            <i class="bi bi-link-45deg" aria-hidden="true"></i>
                            {{ $siteHost }}/{{ $link['slug'] }}
                        </a>
                        <p class="short-link-card__dest" title="{{ $link['destination_url'] }}">
                            <i class="bi bi-arrow-return-right" aria-hidden="true"></i>
                            {{ $link['destination_url'] }}
                        </p>
                        <div class="short-link-card__meta">
                            <span><i class="bi bi-eye" aria-hidden="true"></i> {{ $link['hits'] }} acessos</span>
                            @if($link['updated_at'])
                                <span><i class="bi bi-clock" aria-hidden="true"></i> {{ $link['updated_at'] }}</span>
                            @endif
                            @if(!$link['is_active'])
                                <span class="short-link-card__badge">Inativo</span>
                            @endif
                        </div>
                    </div>
                    <div class="short-link-card__actions">
                        <button type="button" class="short-link-action" data-action="edit" aria-label="Editar">
                            <i class="bi bi-pencil-square" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="short-link-action short-link-action--danger" data-action="delete" aria-label="Excluir">
                            <i class="bi bi-trash3" aria-hidden="true"></i>
                        </button>
                    </div>
                </article>
            @empty
                <div id="shortLinksEmpty" class="short-links-empty">
                    <i class="bi bi-inboxes" aria-hidden="true"></i>
                    <p>Nenhum encaminhamento criado ainda.</p>
                    <button type="button" class="admin-tools-btn admin-tools-btn--primary" data-open-create>
                        <i class="bi bi-plus-circle" aria-hidden="true"></i> Criar o primeiro link
                    </button>
                </div>
            @endforelse
        </section>
    </main>

    <dialog id="shortLinkModal" class="short-link-modal">
        <form id="shortLinkForm" method="dialog" class="short-link-modal__panel">
            <div class="short-link-modal__header">
                <h2 id="shortLinkModalTitle">Novo encaminhamento</h2>
                <button type="button" class="short-link-modal__close" data-close-modal aria-label="Fechar">
                    <i class="bi bi-x-lg" aria-hidden="true"></i>
                </button>
            </div>
            <div class="short-link-modal__body">
                <label class="short-link-field">
                    <span>Caminho (slug)</span>
                    <div class="short-link-field__prefix">
                        <span>{{ $siteHost }}/</span>
                        <input type="text" id="shortLinkSlug" name="slug" required maxlength="80" placeholder="emily15anos" autocomplete="off" pattern="[a-z0-9]+(?:-[a-z0-9]+)*">
                    </div>
                    <small>Somente letras minúsculas, números e hífen.</small>
                </label>
                <label class="short-link-field">
                    <span>Nome do evento (opcional)</span>
                    <input type="text" id="shortLinkTitle" name="title" maxlength="160" placeholder="Emily — 15 anos">
                </label>
                <label class="short-link-field">
                    <span>URL de destino</span>
                    <input type="url" id="shortLinkDestination" name="destination_url" required maxlength="2000" placeholder="https://...">
                </label>
                <label class="short-link-field short-link-field--checkbox">
                    <input type="checkbox" id="shortLinkActive" name="is_active" checked>
                    <span>Link ativo</span>
                </label>
            </div>
            <div class="short-link-modal__footer">
                <button type="button" class="admin-tools-btn" data-close-modal>Cancelar</button>
                <button type="submit" class="admin-tools-btn admin-tools-btn--primary">
                    <i class="bi bi-check2-circle" aria-hidden="true"></i> Salvar
                </button>
            </div>
        </form>
    </dialog>

    <script>
        window.shortLinksAdmin = {
            siteHost: @json($siteHost),
            links: @json($links),
            routes: {
                store: @json(route('admin.site.links.store')),
                update: @json(url(trim(config('collage_admin.path'), '/').'/links')),
            },
        };
    </script>
    <script src="{{ asset('js/short-links-admin.js') }}?v={{ filemtime(public_path('js/short-links-admin.js')) }}"></script>
</body>
</html>
