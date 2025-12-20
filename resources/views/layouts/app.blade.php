<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Com Classe Assessoria e Cerimonial')</title>
    <meta name="description" content="@yield('description', 'Comemore seus Sonhos, Celebre Com Classe! Assessoria e Cerimonial de casamentos elegantes e inesquecíveis.')">
    <link rel="icon" type="image/x-icon" href="{{ asset('favico.ico') }}">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tipografia e ícones --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@300;400;500;600&family=Allura&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- CSS Customizado --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="site-body @if(request()->routeIs('login')) login-page @endif">
    <header class="site-header">
        <div class="site-container header-inner">
            <a href="{{ route('home') }}#inicio" class="header-brand">
                <img src="{{ asset('logo.png') }}" alt="Com Classe" class="header-logo">
            </a>
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="header-nav" id="headerNav">
                <a href="{{ route('home') }}#quem-somos">Quem somos</a>
                <a href="{{ route('home') }}#atuacao">Atuação</a>
                <a href="{{ route('home') }}#depoimentos">Depoimentos</a>
                <a href="{{ route('home') }}#contato">Contato</a>
            </nav>
            <a class="header-cta" href="{{ route('login') }}">Acessar Sistema</a>
        </div>
    </header>

    <main class="page-shell">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="site-container footer-base">
            <div class="footer-brand">
                <img src="{{ asset('logo.png') }}" alt="Com Classe" class="footer-logo">
                <p>Com Classe Assessoria e Cerimonial</p>
            </div>
            <div class="footer-text">
                <p class="footer-cta">siga no instagram</p>
                <a href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener" class="footer-handle">@comclassecasamentos</a>
            </div>
            <div class="footer-links">
                <a href="{{ route('home') }}#inicio">Início</a>
                <a href="{{ route('home') }}#quem-somos">Quem somos</a>
                <a href="{{ route('home') }}#atuacao">Nossa atuação</a>
                <a href="{{ route('home') }}#contato">Contato</a>
                <a href="{{ route('login') }}" class="login-link"><i class="bi bi-box-arrow-in-right"></i> Acesso</a>
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JS Customizado - sempre carrega se existir --}}
    @if(file_exists(public_path('js/custom.js')))
        <script src="{{ asset('js/custom.js') }}"></script>
    @endif

    @stack('scripts')
    
    <script>
    // Menu Hambúrguer Mobile
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const headerNav = document.getElementById('headerNav');
        
        if (mobileMenuToggle && headerNav) {
            mobileMenuToggle.addEventListener('click', function() {
                this.classList.toggle('active');
                headerNav.classList.toggle('active');
                document.body.style.overflow = headerNav.classList.contains('active') ? 'hidden' : '';
            });
            
            // Fechar menu ao clicar em um link
            const navLinks = headerNav.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenuToggle.classList.remove('active');
                    headerNav.classList.remove('active');
                    document.body.style.overflow = '';
                });
            });
            
            // Fechar menu ao clicar fora
            document.addEventListener('click', function(e) {
                if (!headerNav.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                    mobileMenuToggle.classList.remove('active');
                    headerNav.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        }
    });
    </script>
</body>
</html>

