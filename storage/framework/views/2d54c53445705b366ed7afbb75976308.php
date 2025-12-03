<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Com Classe Assessoria e Cerimonial'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Comemore seus Sonhos, Celebre Com Classe! Assessoria e Cerimonial de casamentos elegantes e inesquecíveis.'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favico.ico')); ?>">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('logo.png')); ?>" alt="Com Classe" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicos">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#equipe">Equipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeria">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('contact.index')); ?>">Contato</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-login-nav" href="<?php echo e(route('login')); ?>">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Acesso ao Sistema
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="footer-elegant" style="background: linear-gradient(180deg, #2c2c2c 0%, #1a1a1a 100%); color: #ffffff; padding: 4rem 0 2rem;">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-4 fw-light" style="color: #d4af37; letter-spacing: 1px; font-size: 1.3rem;">
                        Com Classe<br>
                        <span style="font-size: 0.9rem; color: #ffffff;">Assessoria e Cerimonial</span>
                    </h5>
                    <p style="color: #cccccc; line-height: 1.8; font-size: 0.95rem;">
                        Comemore seus Sonhos,<br>
                        Celebre Com Classe!
                    </p>
                    <p style="color: #888; font-size: 0.85rem; margin-top: 1rem;">
                        Desde 2009 criando eventos inesquecíveis
                    </p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h6 class="mb-4 fw-light" style="color: #d4af37; letter-spacing: 1px;">Navegação</h6>
                    <ul class="list-unstyled" style="line-height: 2.5;">
                        <li><a href="#sobre" style="color: #cccccc; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#cccccc'">Sobre Nós</a></li>
                        <li><a href="#servicos" style="color: #cccccc; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#cccccc'">Serviços</a></li>
                        <li><a href="#equipe" style="color: #cccccc; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#cccccc'">Equipe</a></li>
                        <li><a href="#galeria" style="color: #cccccc; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#cccccc'">Galeria</a></li>
                        <li><a href="<?php echo e(route('contact.index')); ?>" style="color: #cccccc; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#cccccc'">Contato</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-4 fw-light" style="color: #d4af37; letter-spacing: 1px;">Contato</h6>
                    <div style="line-height: 2; color: #cccccc;">
                        <p class="mb-3">
                            <i class="bi bi-envelope me-2" style="color: #d4af37;"></i>
                            <a href="mailto:contato@comclasse.com.br" style="color: #cccccc; text-decoration: none;">contato@comclasse.com.br</a>
                        </p>
                        <p class="mb-3">
                            <i class="bi bi-telephone me-2" style="color: #d4af37;"></i>
                            <a href="tel:+551143270919" style="color: #cccccc; text-decoration: none;">(11) 4327-0919</a>
                        </p>
                        <p class="mb-0">
                            <a href="https://wa.me/551143270919" target="_blank" class="btn btn-sm" style="background-color: #25D366; color: white; border: none; border-radius: 0; padding: 0.5rem 1.5rem; margin-top: 0.5rem;">
                                <i class="bi bi-whatsapp me-2"></i>WhatsApp
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1); margin: 2rem 0;">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0" style="color: #888; font-size: 0.9rem;">
                        &copy; <?php echo e(date('Y')); ?> Com Classe Assessoria e Cerimonial. Todos os direitos reservados.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0" style="color: #888; font-size: 0.85rem; letter-spacing: 1px;">
                        Feito com <span style="color: #d4af37;">&hearts;</span> para eventos especiais
                    </p>
                </div>
            </div>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    
    <?php if(file_exists(public_path('js/custom.js'))): ?>
        <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <?php endif; ?>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/layouts/app.blade.php ENDPATH**/ ?>