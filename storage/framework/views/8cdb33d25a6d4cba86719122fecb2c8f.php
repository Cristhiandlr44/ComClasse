

<?php $__env->startSection('title', 'Com Classe Assessoria e Cerimonial'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section com Colagem de Fotos -->
<section class="hero-section-with-collage"
    style="background: #ffffff; overflow: hidden; padding-top: 100px; padding-bottom: 80px;">
    <div class="container">
        <!-- Logo Grande -->
        <div class="text-center mb-5 hero-logo-wrapper">
            <img src="<?php echo e(asset('logo.png')); ?>" alt="Com Classe Assessoria e Cerimonial" class="hero-logo">
            <p class="lead mb-0 mt-3" style="color: #666; font-size: 1.3rem; line-height: 1.8;">
                Comemore seus Sonhos,<br>
                Celebre Com Classe!
            </p>
        </div>

        <!-- Colagem de Fotos -->
        <div class="photo-collage-wrapper">
            <div class="photo-collage">
                <div class="collage-photo photo-1">
                    <img src="<?php echo e(asset('imagens_hero/1.jpg')); ?>" alt="Casamento Elegante" loading="lazy">
                </div>
                <div class="collage-photo photo-2">
                    <img src="<?php echo e(asset('imagens_hero/2.jpg')); ?>" alt="Noivos" loading="lazy">
                </div>
                <div class="collage-photo photo-3">
                    <img src="<?php echo e(asset('imagens_hero/3.jpg')); ?>" alt="Mesa Decorada" loading="lazy">
                </div>
                <div class="collage-photo photo-4">
                    <img src="<?php echo e(asset('imagens_hero/4.jpg')); ?>" alt="Festa" loading="lazy">
                </div>
                <div class="collage-photo photo-5">
                    <img src="<?php echo e(asset('imagens_hero/5.jpg')); ?>" alt="Bufê" loading="lazy">
                </div>
                <div class="collage-photo photo-6">
                    <img src="<?php echo e(asset('imagens_hero/6.jpg')); ?>" alt="Cerimônia" loading="lazy">
                </div>
                <div class="collage-photo photo-7">
                    <img src="<?php echo e(asset('imagens_hero/7.jpg')); ?>" alt="Mesa de Evento" loading="lazy">
                </div>
                <div class="collage-photo photo-8">
                    <img src="<?php echo e(asset('imagens_hero/8.jpg')); ?>" alt="Evento Elegante" loading="lazy">
                </div>
                <div class="collage-photo photo-9">
                    <img src="<?php echo e(asset('imagens_hero/9.jpg')); ?>" alt="Casamento" loading="lazy">
                </div>
                <div class="collage-photo photo-10">
                    <img src="<?php echo e(asset('imagens_hero/10.jpg')); ?>" alt="Noivos Elegantes" loading="lazy">
                </div>
                <div class="collage-photo photo-11">
                    <img src="<?php echo e(asset('imagens_hero/11.jpg')); ?>" alt="Decoração" loading="lazy">
                </div>
                <div class="collage-photo photo-12">
                    <img src="<?php echo e(asset('imagens_hero/12.jpg')); ?>" alt="Celebração" loading="lazy">
                </div>
            </div>
        </div>

        <!-- Desde 2009 -->
        <div class="text-center mt-5 desde-2009-text">
            <p style="color: #888; font-size: 1.1rem; letter-spacing: 1px;">
                Desde 2009
            </p>
        </div>
    </div>
</section>

<!-- Divisor de Seção -->
<div class="section-divider"></div>

<!-- Sobre Section -->
<section id="sobre" class="py-5" style="background: #ffffff;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="h3 fw-light mb-4" style="color: #2c2c2c;">Sobre Nós</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-5">
                    <div class="col-md-4 text-center">
                        <h3 class="h4 mb-4 fw-light" style="color: #2c2c2c;">O que fazemos:</h3>
                        <p style="color: #666; line-height: 1.8;">
                            Criamos eventos que acolhem e comunicam a essência e valores dos anfitriões.
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h3 class="h4 mb-4 fw-light" style="color: #2c2c2c;">Como fazemos:</h3>
                        <p style="color: #666; line-height: 1.8;">
                            Com rigor técnico, criatividade e leveza, respeitando e valorizando todas as pessoas
                            envolvidas no processo.
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h3 class="h4 mb-4 fw-light" style="color: #2c2c2c;">Por quê fazemos:</h3>
                        <p style="color: #666; line-height: 1.8;">
                            Porque acreditamos que festas são experiências que fazem com que as pessoas se sintam
                            validadas, amadas e fortalecidas.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Polaroids na Seção Sobre - Desktop -->
        <div class="row justify-content-center mt-5 desktop-gallery">
            <div class="col-12">
                <div class="polaroid-gallery d-flex flex-wrap justify-content-center gap-4">
                    <div class="polaroid polaroid-large">
                        <img src="<?php echo e(asset('imagens_2_secao/Casamento Elegante.jpg')); ?>" alt="Casamento Elegante"
                            loading="lazy">
                        <p class="polaroid-caption">Casamento Elegante</p>
                    </div>
                    <div class="polaroid polaroid-large">
                        <img src="<?php echo e(asset('imagens_2_secao/Decoração Sofisticada.jpg')); ?>" alt="Decoração Sofisticada"
                            loading="lazy">
                        <p class="polaroid-caption">Decoração Sofisticada</p>
                    </div>
                    <div class="polaroid polaroid-large">
                        <img src="<?php echo e(asset('imagens_2_secao/Momentos Especiais.jpg')); ?>" alt="Momentos Especiais"
                            loading="lazy">
                        <p class="polaroid-caption">Momentos Especiais</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrossel Mobile Seção Sobre -->
        <div class="mobile-carousel-wrapper mt-5">
            <div id="sobreCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center">
                            <div class="polaroid polaroid-mobile" style="transform: none;">
                                <img src="<?php echo e(asset('imagens_2_secao/Casamento Elegante.jpg')); ?>"
                                    alt="Casamento Elegante" loading="lazy">
                                <p class="polaroid-caption">Casamento Elegante</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="polaroid polaroid-mobile" style="transform: none;">
                                <img src="<?php echo e(asset('imagens_2_secao/Decoração Sofisticada.jpg')); ?>"
                                    alt="Decoração Sofisticada" loading="lazy">
                                <p class="polaroid-caption">Decoração Sofisticada</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="polaroid polaroid-mobile" style="transform: none;">
                                <img src="<?php echo e(asset('imagens_2_secao/Momentos Especiais.jpg')); ?>"
                                    alt="Momentos Especiais" loading="lazy">
                                <p class="polaroid-caption">Momentos Especiais</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#sobreCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#sobreCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Divisor de Seção -->
<div class="section-divider"></div>

<!-- Serviços Section -->
<section id="servicos" class="py-5" style="background: #f8f8f8;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="h3 fw-light mb-4" style="color: #2c2c2c;">Nossos Serviços</h2>
                <p style="color: #666;">
                    Oferecemos uma assessoria completa para tornar seu evento único e inesquecível.
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="service-card p-4 bg-white h-100" style="border-left: 3px solid #d4af37;">
                    <h4 class="h5 mb-3 fw-light">Cerimonial Completo</h4>
                    <p style="color: #666; line-height: 1.8;">
                        Planejamento e execução completa do seu evento, cuidando de cada detalhe com excelência.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-card p-4 bg-white h-100" style="border-left: 3px solid #d4af37;">
                    <h4 class="h5 mb-3 fw-light">Assessoria Personalizada</h4>
                    <p style="color: #666; line-height: 1.8;">
                        Consultoria especializada para criar um evento que reflita sua personalidade e valores.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-card p-4 bg-white h-100" style="border-left: 3px solid #d4af37;">
                    <h4 class="h5 mb-3 fw-light">Coordenação de Eventos</h4>
                    <p style="color: #666; line-height: 1.8;">
                        Coordenação no dia do evento para garantir que tudo aconteça perfeitamente.
                    </p>
                </div>
            </div>
        </div>

        <!-- Polaroids na Seção Serviços - Desktop -->
        <div class="row justify-content-center mt-5 desktop-gallery">
            <div class="col-12">
                <div class="polaroid-gallery d-flex flex-wrap justify-content-center gap-4">
                    <div class="polaroid polaroid-large">
                        <img src="<?php echo e(asset('imagens_3_secao/Planejamento Detalhado.jpg')); ?>"
                            alt="Planejamento Detalhado" loading="lazy">
                        <p class="polaroid-caption">Planejamento Detalhado</p>
                    </div>
                    <div class="polaroid polaroid-large">
                        <img src="<?php echo e(asset('imagens_3_secao/Execução Perfeita.jpg')); ?>" alt="Execução Perfeita"
                            loading="lazy">
                        <p class="polaroid-caption">Execução Perfeita</p>
                    </div>
                    <div class="polaroid polaroid-large">
                        <img src="<?php echo e(asset('imagens_3_secao/Resultados Excepcionais.jpg')); ?>"
                            alt="Resultados Excepcionais" loading="lazy">
                        <p class="polaroid-caption">Resultados Excepcionais</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrossel Mobile Seção Serviços -->
        <div class="mobile-carousel-wrapper mt-5">
            <div id="servicosCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center">
                            <div class="polaroid polaroid-mobile" style="transform: none;">
                                <img src="<?php echo e(asset('imagens_3_secao/Planejamento Detalhado.jpg')); ?>"
                                    alt="Planejamento Detalhado" loading="lazy">
                                <p class="polaroid-caption">Planejamento Detalhado</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="polaroid polaroid-mobile" style="transform: none;">
                                <img src="<?php echo e(asset('imagens_3_secao/Execução Perfeita.jpg')); ?>" alt="Execução Perfeita"
                                    loading="lazy">
                                <p class="polaroid-caption">Execução Perfeita</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="polaroid polaroid-mobile" style="transform: none;">
                                <img src="<?php echo e(asset('imagens_3_secao/Resultados Excepcionais.jpg')); ?>"
                                    alt="Resultados Excepcionais" loading="lazy">
                                <p class="polaroid-caption">Resultados Excepcionais</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#servicosCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#servicosCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Divisor de Seção -->
<div class="section-divider"></div>

<!-- Equipe Section -->
<section id="equipe" class="py-5" style="background: #ffffff;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="h3 fw-light mb-4" style="color: #2c2c2c;">Nossa Equipe</h2>
                <p style="color: #666;">
                    Profissionais dedicados e experientes para tornar seu evento inesquecível
                </p>
            </div>
        </div>
        <!-- Equipe Desktop -->
        <div class="desktop-gallery">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="team-member text-center">
                        <div class="team-photo mb-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&h=300&fit=crop"
                                alt="Membro da Equipe 1" class="rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #d4af37;"
                                loading="lazy"
                                onerror="this.src='https://via.placeholder.com/200x200/f5f5f5/2c2c2c?text=Equipe'; this.onerror=null;">
                        </div>
                        <h4 class="h5 mb-2 fw-light" style="color: #2c2c2c;">Nome da Pessoa</h4>
                        <p class="mb-2" style="color: #d4af37; font-weight: 500;">Cargo/Função</p>
                        <p style="color: #666; font-size: 0.9rem; line-height: 1.6;">
                            Descrição breve da pessoa e sua experiência.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="team-member text-center">
                        <div class="team-photo mb-4">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop"
                                alt="Membro da Equipe 2" class="rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #d4af37;"
                                loading="lazy"
                                onerror="this.src='https://via.placeholder.com/200x200/f5f5f5/2c2c2c?text=Equipe'; this.onerror=null;">
                        </div>
                        <h4 class="h5 mb-2 fw-light" style="color: #2c2c2c;">Nome da Pessoa</h4>
                        <p class="mb-2" style="color: #d4af37; font-weight: 500;">Cargo/Função</p>
                        <p style="color: #666; font-size: 0.9rem; line-height: 1.6;">
                            Descrição breve da pessoa e sua experiência.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="team-member text-center">
                        <div class="team-photo mb-4">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop"
                                alt="Membro da Equipe 3" class="rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #d4af37;"
                                loading="lazy"
                                onerror="this.src='https://via.placeholder.com/200x200/f5f5f5/2c2c2c?text=Equipe'; this.onerror=null;">
                        </div>
                        <h4 class="h5 mb-2 fw-light" style="color: #2c2c2c;">Nome da Pessoa</h4>
                        <p class="mb-2" style="color: #d4af37; font-weight: 500;">Cargo/Função</p>
                        <p style="color: #666; font-size: 0.9rem; line-height: 1.6;">
                            Descrição breve da pessoa e sua experiência.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrossel Mobile Equipe -->
        <div class="mobile-carousel-wrapper">
            <div id="equipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="team-member text-center">
                            <div class="team-photo mb-4">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&h=300&fit=crop"
                                    alt="Membro da Equipe 1" class="rounded-circle"
                                    style="width: 180px; height: 180px; object-fit: cover; border: 3px solid #d4af37;"
                                    loading="lazy"
                                    onerror="this.src='https://via.placeholder.com/180x180/f5f5f5/2c2c2c?text=Equipe'; this.onerror=null;">
                            </div>
                            <h4 class="h5 mb-2 fw-light" style="color: #2c2c2c;">Nome da Pessoa</h4>
                            <p class="mb-2" style="color: #d4af37; font-weight: 500;">Cargo/Função</p>
                            <p style="color: #666; font-size: 0.9rem; line-height: 1.6;">
                                Descrição breve da pessoa e sua experiência.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="team-member text-center">
                            <div class="team-photo mb-4">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop"
                                    alt="Membro da Equipe 2" class="rounded-circle"
                                    style="width: 180px; height: 180px; object-fit: cover; border: 3px solid #d4af37;"
                                    loading="lazy"
                                    onerror="this.src='https://via.placeholder.com/180x180/f5f5f5/2c2c2c?text=Equipe'; this.onerror=null;">
                            </div>
                            <h4 class="h5 mb-2 fw-light" style="color: #2c2c2c;">Nome da Pessoa</h4>
                            <p class="mb-2" style="color: #d4af37; font-weight: 500;">Cargo/Função</p>
                            <p style="color: #666; font-size: 0.9rem; line-height: 1.6;">
                                Descrição breve da pessoa e sua experiência.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="team-member text-center">
                            <div class="team-photo mb-4">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop"
                                    alt="Membro da Equipe 3" class="rounded-circle"
                                    style="width: 180px; height: 180px; object-fit: cover; border: 3px solid #d4af37;"
                                    loading="lazy"
                                    onerror="this.src='https://via.placeholder.com/180x180/f5f5f5/2c2c2c?text=Equipe'; this.onerror=null;">
                            </div>
                            <h4 class="h5 mb-2 fw-light" style="color: #2c2c2c;">Nome da Pessoa</h4>
                            <p class="mb-2" style="color: #d4af37; font-weight: 500;">Cargo/Função</p>
                            <p style="color: #666; font-size: 0.9rem; line-height: 1.6;">
                                Descrição breve da pessoa e sua experiência.
                            </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#equipeCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#equipeCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Divisor de Seção -->
<div class="section-divider"></div>

<!-- Biografia Section -->
<section id="biografia" class="py-5" style="background: #f8f8f8;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2">
                <div class="biography-image-wrapper">
                    <img src="<?php echo e(asset('biografia/1.jpg')); ?>" alt="Biografia" class="img-fluid"
                        style="border-radius: 4px; box-shadow: 0 10px 40px rgba(0,0,0,0.15);" loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <h2 class="h3 fw-light mb-4" style="color: #2c2c2c;">Nossa História</h2>
                <div class="biography-text" style="color: #666; line-height: 1.8;">
                    <p class="mb-4">
                        Desde 2009, a <strong>Com Classe Assessoria e Cerimonial</strong> transforma sonhos em
                        realidade, criando eventos que marcam a vida das pessoas de forma única e inesquecível.
                    </p>
                    <p class="mb-4">
                        Com mais de uma década de experiência no mercado, desenvolvemos uma metodologia própria que
                        combina rigor técnico, criatividade e sensibilidade para entender cada casal e família que nos
                        procura.
                    </p>
                    <p class="mb-4">
                        Nossa missão vai além de organizar eventos. Buscamos criar experiências emocionais que reflitam
                        a essência dos anfitriões, seus valores e sua história, sempre com elegância, sofisticação e
                        atenção aos mínimos detalhes.
                    </p>
                    <p>
                        Acreditamos que cada celebração é única e merece ser tratada com dedicação, carinho e
                        profissionalismo, garantindo que os momentos especiais sejam vividos com tranquilidade e
                        alegria.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Divisor de Seção -->
<div class="section-divider"></div>

<!-- Galeria Section -->
<section id="galeria" class="py-5" style="background: #ffffff;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="h3 fw-light mb-4" style="color: #2c2c2c;">Nossa Galeria</h2>
                <p style="color: #666;">
                    Alguns momentos especiais dos eventos que realizamos
                </p>
            </div>
        </div>

        <div class="gallery-carousel-wrapper">
            <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4 justify-content-center desktop-gallery-row">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/1.jpg')); ?>" alt="Galeria 1" loading="lazy">
                                    <p class="polaroid-caption">Casamento Elegante</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/2.jpg')); ?>" alt="Galeria 2" loading="lazy">
                                    <p class="polaroid-caption">Momentos Únicos</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/3.jpg')); ?>" alt="Galeria 3" loading="lazy">
                                    <p class="polaroid-caption">Decoração Sofisticada</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/4.jpg')); ?>" alt="Galeria 4" loading="lazy">
                                    <p class="polaroid-caption">Celebração</p>
                                </div>
                            </div>
                        </div>
                        <!-- Linha única para mobile -->
                        <div class="row mobile-gallery-row g-3">
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/1.jpg')); ?>" alt="Galeria 1" loading="lazy">
                                    <p class="polaroid-caption">Casamento Elegante</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/2.jpg')); ?>" alt="Galeria 2" loading="lazy">
                                    <p class="polaroid-caption">Momentos Únicos</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/3.jpg')); ?>" alt="Galeria 3" loading="lazy">
                                    <p class="polaroid-caption">Decoração Sofisticada</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/4.jpg')); ?>" alt="Galeria 4" loading="lazy">
                                    <p class="polaroid-caption">Celebração</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/5.jpg')); ?>" alt="Galeria 5" loading="lazy">
                                    <p class="polaroid-caption">Bufê Exclusivo</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/6.jpg')); ?>" alt="Galeria 6" loading="lazy">
                                    <p class="polaroid-caption">Cerimônia</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/7.jpg')); ?>" alt="Galeria 7" loading="lazy">
                                    <p class="polaroid-caption">Mesa Decorada</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="polaroid" style="transform: none; width: 100%;">
                                    <img src="<?php echo e(asset('imagens_hero/8.jpg')); ?>" alt="Galeria 8" loading="lazy">
                                    <p class="polaroid-caption">Evento Especial</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row g-4 justify-content-center desktop-gallery-row">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/5.jpg')); ?>" alt="Galeria 5" loading="lazy">
                                    <p class="polaroid-caption">Bufê Exclusivo</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/6.jpg')); ?>" alt="Galeria 6" loading="lazy">
                                    <p class="polaroid-caption">Cerimônia</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/7.jpg')); ?>" alt="Galeria 7" loading="lazy">
                                    <p class="polaroid-caption">Mesa Decorada</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="polaroid">
                                    <img src="<?php echo e(asset('imagens_hero/8.jpg')); ?>" alt="Galeria 8" loading="lazy">
                                    <p class="polaroid-caption">Evento Especial</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel"
                    data-bs-slide="prev" style="width: 50px; opacity: 0.8;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel"
                    data-bs-slide="next" style="width: 50px; opacity: 0.8;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Botão Entre em Contato -->
<section class="py-5" style="background: linear-gradient(135deg, #2c2c2c 0%, #1a1a1a 100%);">
    <div class="container text-center">
        <h2 class="h3 fw-light mb-4" style="color: #ffffff;">Pronto para Começar?</h2>
        <p class="lead mb-4" style="color: #d4af37;">
            Entre em contato e vamos transformar seu evento em uma celebração inesquecível
        </p>
        <a href="<?php echo e(route('contact.questionnaire')); ?>" class="btn btn-light px-5 py-3"
            style="font-weight: 300; letter-spacing: 1px; border-radius: 0;">
            Entre em Contato
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/home.blade.php ENDPATH**/ ?>