@extends('layouts.app')

@section('title', 'Com Classe Assessoria e Cerimonial')

@section('content')
    <!-- Hero Section com Colagem de Fotos -->
    <section class="hero-section-with-collage" style="background: #ffffff; overflow: hidden; padding-top: 100px; padding-bottom: 80px;">
        <div class="container">
            <!-- Nome da Empresa e Slogan -->
            <div class="text-center mb-5">
                <h1 class="display-1 fw-light mb-3" style="letter-spacing: 2px; color: #2c2c2c;">
                    Com Classe<br>
                    <span class="fw-normal" style="font-size: 0.6em;">Assessoria e Cerimonial</span>
                </h1>
                <p class="lead mb-0" style="color: #666; font-size: 1.3rem; line-height: 1.8;">
                    Comemore seus Sonhos,<br>
                    Celebre Com Classe!
                </p>
            </div>
            
            <!-- Colagem de Fotos -->
            <div class="photo-collage-wrapper">
                <div class="photo-collage">
                <div class="collage-photo photo-1">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=400&h=500&fit=crop" alt="Evento 1">
                </div>
                <div class="collage-photo photo-2">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=400&h=500&fit=crop" alt="Evento 2">
                </div>
                <div class="collage-photo photo-3">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=500&fit=crop" alt="Evento 3">
                </div>
                <div class="collage-photo photo-4">
                    <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=400&h=500&fit=crop" alt="Evento 4">
                </div>
                <div class="collage-photo photo-5">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=400&h=500&fit=crop" alt="Evento 5">
                </div>
                <div class="collage-photo photo-6">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=400&h=500&fit=crop" alt="Evento 6">
                </div>
                <div class="collage-photo photo-7">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=400&h=500&fit=crop" alt="Evento 7">
                </div>
                <div class="collage-photo photo-8">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=500&fit=crop" alt="Evento 8">
                </div>
                <div class="collage-photo photo-9">
                    <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=400&h=500&fit=crop" alt="Evento 9">
                </div>
                <div class="collage-photo photo-10">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=400&h=500&fit=crop" alt="Evento 10">
                </div>
                <div class="collage-photo photo-11">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=400&h=500&fit=crop" alt="Evento 11">
                </div>
                <div class="collage-photo photo-12">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=400&h=500&fit=crop" alt="Evento 12">
                </div>
                </div>
            </div>
            
            <!-- Desde 2009 -->
            <div class="text-center mt-5">
                <p style="color: #888; font-size: 1.1rem; letter-spacing: 1px;">
                    Desde 2009
                </p>
            </div>
        </div>
    </section>

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
                                Com rigor técnico, criatividade e leveza, respeitando e valorizando todas as pessoas envolvidas no processo.
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h3 class="h4 mb-4 fw-light" style="color: #2c2c2c;">Por quê fazemos:</h3>
                            <p style="color: #666; line-height: 1.8;">
                                Porque acreditamos que festas são experiências que fazem com que as pessoas se sintam validadas, amadas e fortalecidas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Polaroids na Seção Sobre -->
            <div class="row justify-content-center mt-5">
                <div class="col-12">
                    <div class="polaroid-gallery d-flex flex-wrap justify-content-center gap-4">
                        <div class="polaroid">
                            <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=300&h=300&fit=crop" alt="Trabalho 1">
                            <p class="polaroid-caption">Casamento Elegante</p>
                        </div>
                        <div class="polaroid">
                            <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=300&h=300&fit=crop" alt="Trabalho 2">
                            <p class="polaroid-caption">Decoração Sofisticada</p>
                        </div>
                        <div class="polaroid">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=300&h=300&fit=crop" alt="Trabalho 3">
                            <p class="polaroid-caption">Momentos Especiais</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            
            <!-- Polaroids na Seção Serviços -->
            <div class="row justify-content-center mt-5">
                <div class="col-12">
                    <div class="polaroid-gallery d-flex flex-wrap justify-content-center gap-4">
                        <div class="polaroid">
                            <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=300&h=300&fit=crop" alt="Serviço 1">
                            <p class="polaroid-caption">Planejamento Detalhado</p>
                        </div>
                        <div class="polaroid">
                            <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=300&h=300&fit=crop" alt="Serviço 2">
                            <p class="polaroid-caption">Execução Perfeita</p>
                        </div>
                        <div class="polaroid">
                            <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=300&h=300&fit=crop" alt="Serviço 3">
                            <p class="polaroid-caption">Resultados Excepcionais</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="team-member text-center">
                        <div class="team-photo mb-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&h=300&fit=crop" alt="Membro da Equipe 1" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #d4af37;">
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
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop" alt="Membro da Equipe 2" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #d4af37;">
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
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop" alt="Membro da Equipe 3" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #d4af37;">
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
    </section>
@endsection
