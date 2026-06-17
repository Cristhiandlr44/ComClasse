<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Com Classe Assessoria e Cerimonial'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Comemore seus Sonhos, Celebre Com Classe! Assessoria e Cerimonial de casamentos elegantes e inesquecíveis.'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favico.ico')); ?>">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@300;400;500;600&family=Allura&family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,400;0,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    
    <?php
        $customProdCss = public_path('css/custom-prod.css');
        $heroCollageConfig = config_path('hero-collage.json');
        $homeContentConfig = config_path('home-content.json');
    ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom-prod.css')); ?><?php if(file_exists($customProdCss)): ?>?v=<?php echo e(filemtime($customProdCss)); ?><?php endif; ?>">
    <?php if(file_exists($heroCollageConfig)): ?>
        <link rel="stylesheet" href="<?php echo e(route('css.hero-collage')); ?>?v=<?php echo e(filemtime($heroCollageConfig)); ?>">
    <?php endif; ?>
    <?php if(file_exists($homeContentConfig)): ?>
        <link rel="stylesheet" href="<?php echo e(route('css.home-content')); ?>?v=<?php echo e(filemtime($homeContentConfig)); ?>">
    <?php endif; ?>

    
    <link rel="preload" href="<?php echo e(asset('fonts/Belights.ttf')); ?>" as="font" type="font/ttf" crossorigin>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="site-body <?php if(request()->routeIs('login')): ?> login-page <?php endif; ?>">
    <header class="site-header">
        <div class="site-container header-inner">
            <a href="<?php echo e(route('home')); ?>#inicio" class="header-brand">
                <img src="<?php echo e(asset('logo.png')); ?>" alt="Com Classe" class="header-logo">
            </a>
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="header-nav" id="headerNav">
                <a href="<?php echo e(route('home')); ?>#quem-somos">Quem somos</a>
                <a href="<?php echo e(route('home')); ?>#atuacao">Atuação</a>
                <a href="<?php echo e(route('home')); ?>#depoimentos">Depoimentos</a>
                <a href="<?php echo e(route('home')); ?>#mentorias-cursos">Cursos e mentorias</a>
                <a href="<?php echo e(route('home')); ?>#contato">Contato</a>
            </nav>
            <a class="header-cta" href="<?php echo e(route('login')); ?>">Acessar Sistema</a>
        </div>
    </header>

    <main class="page-shell">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="site-footer">
        <div class="site-container footer-base">
            <div class="footer-brand">
                <img src="<?php echo e(asset('logo.png')); ?>" alt="Com Classe" class="footer-logo">
                <p>Com Classe Assessoria e Cerimonial</p>
            </div>
            <div class="footer-text">
                <p class="footer-cta">siga no instagram</p>
                <a href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener" class="footer-handle">@comclassecasamentos</a>
            </div>
            <div class="footer-links">
                <a href="<?php echo e(route('home')); ?>#inicio">Início</a>
                <a href="<?php echo e(route('home')); ?>#quem-somos">Quem somos</a>
                <a href="<?php echo e(route('home')); ?>#atuacao">Atuação</a>
                <a href="<?php echo e(route('home')); ?>#depoimentos">Depoimentos</a>
                <a href="<?php echo e(route('home')); ?>#mentorias-cursos">Cursos e mentorias</a>
                <a href="<?php echo e(route('home')); ?>#contato">Contato</a>
                <a href="<?php echo e(route('login')); ?>" class="login-link"><i class="bi bi-box-arrow-in-right"></i> Acesso</a>
            </div>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <?php if(file_exists(public_path('js/custom.js'))): ?>
        <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    <script>
    // Evitar barra de rolagem dupla: scroll só no html, main nunca rola
    (function() {
        document.documentElement.style.overflowY = 'auto';
        document.body.style.overflow = 'visible';
        var main = document.querySelector('main.page-shell');
        if (main) {
            main.style.setProperty('overflow', 'visible', 'important');
            main.style.setProperty('overflow-y', 'visible', 'important');
        }
    })();
    window.addEventListener('load', function() {
        var main = document.querySelector('main.page-shell');
        if (main) {
            main.style.setProperty('overflow', 'visible', 'important');
            main.style.setProperty('overflow-y', 'visible', 'important');
        }
    });
    
    // Menu Hambúrguer Mobile
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const headerNav = document.getElementById('headerNav');
        const siteHeader = document.querySelector('.site-header');

        function syncHeaderHeight() {
            if (!siteHeader) return;
            document.documentElement.style.setProperty('--header-height', siteHeader.offsetHeight + 'px');
        }

        syncHeaderHeight();
        window.addEventListener('resize', syncHeaderHeight);
        
        if (mobileMenuToggle && headerNav) {
            mobileMenuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = headerNav.classList.toggle('active');
                this.classList.toggle('active', isOpen);
                document.body.classList.toggle('mobile-menu-open', isOpen);
                document.body.style.overflow = isOpen ? 'hidden' : '';
            });
            
            // Fechar menu ao clicar em um link
            const navLinks = headerNav.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenuToggle.classList.remove('active');
                    headerNav.classList.remove('active');
                    document.body.classList.remove('mobile-menu-open');
                    document.body.style.overflow = '';
                });
            });
            
            // Fechar menu ao clicar fora
            document.addEventListener('click', function(e) {
                if (!headerNav.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                    mobileMenuToggle.classList.remove('active');
                    headerNav.classList.remove('active');
                    document.body.classList.remove('mobile-menu-open');
                    document.body.style.overflow = '';
                }
            });
        }
    });
    </script>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\ComClasse\resources\views\layouts\app.blade.php ENDPATH**/ ?>