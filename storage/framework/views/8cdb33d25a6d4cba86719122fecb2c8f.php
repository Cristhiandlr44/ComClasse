

<?php $__env->startSection('title', 'Com Classe Assessoria e Cerimonial'); ?>

<?php $__env->startSection('content'); ?>
<section id="inicio" class="section-block header-hero">
    <div class="site-container">
        <div class="logo-band">
            <img src="<?php echo e(asset('logo.png')); ?>" alt="Com Classe Assessoria e Cerimonial" class="logo-main">
        </div>

        <div class="hero-collage">
            <div class="left-column">
                <div class="left-stack">
                    <div class="photo-vertical">
                        <img src="<?php echo e(asset('imagens_hero/1.jpg')); ?>" alt="Destaque 1" loading="lazy">
                    </div>
                    <div class="photo-vertical">
                        <img src="<?php echo e(asset('imagens_hero/2.jpg')); ?>" alt="Destaque 2" loading="lazy">
                    </div>
                </div>
                <div class="hero-text">
                    <p class="impact-line font-antic-didone">Comemore seus sonhos.</p>
                    <p class="impact-line font-abramo">Celebre Com Classe.</p>
                </div>
            </div>

            <div class="right-stack">
                <div class="right-top">
                    <img src="<?php echo e(asset('imagens_hero/3.jpg')); ?>" alt="Destaque horizontal" loading="lazy">
                </div>
                <div class="right-bottom">
                    <div class="photo-vertical">
                        <img src="<?php echo e(asset('imagens_hero/4.jpg')); ?>" alt="Destaque 4" loading="lazy">
                    </div>
                    <div class="photo-vertical">
                        <img src="<?php echo e(asset('imagens_hero/5.jpg')); ?>" alt="Destaque 5" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="quem-somos" class="section-block who-values-section">
    <div class="site-container who-block">
        <div class="who-row first">
            <div class="who-media">
                <img src="<?php echo e(asset('biografia/1.jpg')); ?>" alt="Fundadora Com Classe" loading="lazy">
            </div>
            <div class="who-text">
                <p class="eyebrow font-abramo">Quem somos</p>
                <h2 class="font-antic-didone">A base de tudo</h2>
                <p>Sou Ana Cláudia, fundadora da Com Classe. <br>
                <br>
                    Casada desde 2013 e mãe de duas meninas, tenho na família meu maior patrimônio e inspiração. Sou movida pela fé, pelo amor ao belo e pela busca constante pela excelência.</p>
                <p>Atuo há mais de 16 anos no mercado de casamentos, conduzindo eventos com método, sensibilidade e verdade. </p>
                    <p>Além de planejar celebrações, já formei e ajudei diversas cerimonialistas, compartilhando o propósito de viver os próprios sonhos enquanto realizam os de outros.</p>
                <p>E isso é só metade do que sou. Muito prazer, Ana Com Classe.</p>
            </div>
        </div>

        <div class="who-row second">
            <div class="who-media outlined">
                <img src="<?php echo e(asset('imagens_hero/7.jpg')); ?>" alt="Equipe Com Classe" loading="lazy">
            </div>
            <div class="who-text second">
                <h2 class="font-antic-didone">A estrutura</h2>
                <p>Nosso time é a essência da Com Classe: uma equipe exclusiva, guiada por rigor técnico, sensibilidade estética e compromisso absoluto com a ética.</p>
                <p>Nossa arquiteta integra o processo criativo desde o início, elevando o olhar técnico e o refinamento de cada detalhe. Juntos, transformamos sonhos em experiências verdadeiramente memoráveis.</p>
            </div>
        </div>

        <div class="values-layout">
            <div class="values-copy">
                <div class="values-header">
                    <h2 class="values-title font-abramo">Nossos valores</h2>
                    <div class="values-line-long"></div>
                </div>
            </div>
            <div class="values-grid flat inline">
                <div class="value-card">
                    <h3 class="titulo-valor">Excelência</h3>
                    <p>Buscamos ser excelentes em cada entrega, com técnica, dedicação e compromisso.</p>
                </div>
                <div class="value-card">
                    <h3 class="titulo-valor">Sensibilidade</h3>
                    <p>Cuidamos de pessoas, não apenas de eventos. Nosso trabalho começa pela escuta.</p>
                </div>
                <div class="value-card">
                    <h3 class="titulo-valor">Elegância</h3>
                    <p>A elegância está nos detalhes. Harmonia, leveza e bom gosto em tudo o que criamos.</p>
                </div>
                <div class="value-card">
                    <h3 class="titulo-valor">Ética</h3>
                    <p>Agir com respeito, verdade e responsabilidade em todas as relações.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="impact-full">
        <img src="<?php echo e(asset('imagens_hero/1.jpg')); ?>" alt="Celebração com classe" loading="lazy">
    </div>
</section>

<section id="atuacao" class="section-block atuacao-section">
    <div class="site-container">
        <div class="atuacao-header">
            <h2 class="atuacao-title font-abramo">Nossa atuação</h2>
        </div>
        <p class="atuacao-subtitle">Oferecemos uma assessoria completa para tornar seu evento único e inesquecível.</p>

        <div class="atuacao-thumbs">
            <div class="atuacao-item ">
                <img src="<?php echo e(asset('imagens_3_secao/Planejamento Detalhado.jpg')); ?>" alt="Assessoria completa" loading="lazy">
                <p class="font-antic-didone">Assessoria completa e<br>personalizada</p>
            </div>
            <div class="atuacao-item">
                <img src="<?php echo e(asset('imagens_3_secao/Execução Perfeita.jpg')); ?>" alt="Projetos exclusivos" loading="lazy">
                <p class="font-antic-didone">Criação de projetos<br>exclusivos</p>
            </div>
            <div class="atuacao-item">
                <img src="<?php echo e(asset('imagens_3_secao/Resultados Excepcionais.jpg')); ?>" alt="Execução impecável" loading="lazy">
                <p class="font-antic-didone">Execução impecável<br>de tudo que foi sonhado</p>
            </div>
        </div>

        <div class="atuacao-cta">
            <a class="atuacao-btn" href="<?php echo e(route('servicos')); ?>">Quero Saber Mais</a>
        </div>
    </div>
</section>

<section id="depoimentos" class="section-block testimonials-section">
    <div class="site-container">
        <h2 class="testimonials-title font-abramo">Depoimentos</h2>
        <div id="testimonialsCarousel" class="testimonials-carousel" aria-label="Depoimentos">
            <div class="testimonials-track">
                <div class="testimonial-slide">
                    <div class="testimonial-item">
                        <i class="bi bi-quote"></i>
                        <p class="quote">“A equipe traduziu nossa essência em cada detalhe. Foi além do que sonhamos.”</p>
                        <div class="testimonial-sep"></div>
                        <p class="author">Mariana &amp; Rafael</p>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-item">
                        <i class="bi bi-quote"></i>
                        <p class="quote">“Processo organizado, fornecedores alinhados e condução impecável no grande dia.”</p>
                        <div class="testimonial-sep"></div>
                        <p class="author">Ana Paula</p>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-item">
                        <i class="bi bi-quote"></i>
                        <p class="quote">“Elegância e acolhimento definem o trabalho. Nos sentimos cuidados do início ao fim.”</p>
                        <div class="testimonial-sep"></div>
                        <p class="author">Camila &amp; João</p>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-item">
                        <i class="bi bi-quote"></i>
                        <p class="quote">“Timeline claro e execução precisa. Ficamos tranquilos para aproveitar cada momento.”</p>
                        <div class="testimonial-sep"></div>
                        <p class="author">Fernanda &amp; Luiz</p>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-item">
                        <i class="bi bi-quote"></i>
                        <p class="quote">“Sensibilidade para entender nossos desejos e transformá-los em uma experiência única.”</p>
                        <div class="testimonial-sep"></div>
                        <p class="author">Beatriz &amp; Henrique</p>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-item">
                        <i class="bi bi-quote"></i>
                        <p class="quote">“Equipe presente e discreta, garantindo fluidez e elegância em cada momento.”</p>
                        <div class="testimonial-sep"></div>
                        <p class="author">Renata &amp; Felipe</p>
                    </div>
                </div>
            </div>
            <button class="testimonials-arrow testimonials-arrow-prev" type="button" aria-label="Anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="testimonials-arrow testimonials-arrow-next" type="button" aria-label="Próximo">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<section id="contato" class="section-block contact-section">
    <div class="site-container">
        <p class="subtitle lead-highlight contact-lead font-antic-didone">Quer um casamento inesquecível?</p>
        <h2 class="contact-title font-abramo">Entre em Contato!</h2>
        <div class="contact-cta">
            <a class="btn-primary btn-wide" href="https://assessoriavip.com.br/funnelFormLead/63dada70-1556-11eb-ac90-0d7b933d6c56?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAGngeorDPpsaeKED35hDBrdhCgZt9kz2uzwGDUZHQmP-1zqiKRGbWVFpXrZIac_aem_ZiRNOjiv2hIKL16D8VFcfQ" target="_blank" rel="noopener">Quero falar com a Com Classe</a>
        </div>
    </div>
</section>

<section id="instagram" class="section-block insta-section">
    <div class="site-container insta-area center">
        <div class="insta-header">
            <p class="footer-cta font-antic-didone">siga no instagram</p>
            <a href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener" class="footer-handle font-antic-didone">@comclassecasamentos</a>
        </div>
        <div class="insta-carousel" id="instaCarousel">
            <button class="insta-arrow insta-prev" type="button" aria-label="Anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="insta-track">
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_hero/1.jpg')); ?>" alt="Instagram 1" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_hero/3.jpg')); ?>" alt="Instagram 2" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_hero/5.jpg')); ?>" alt="Instagram 3" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_hero/7.jpg')); ?>" alt="Instagram 4" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_hero/9.jpg')); ?>" alt="Instagram 5" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_hero/11.jpg')); ?>" alt="Instagram 6" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_2_secao/Casamento Elegante.jpg')); ?>" alt="Instagram 7" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_2_secao/Decoração Sofisticada.jpg')); ?>" alt="Instagram 8" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_2_secao/Momentos Especiais.jpg')); ?>" alt="Instagram 9" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_3_secao/Planejamento Detalhado.jpg')); ?>" alt="Instagram 10" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_3_secao/Execução Perfeita.jpg')); ?>" alt="Instagram 11" loading="lazy">
                </a>
                <a class="insta-item" href="https://www.instagram.com/comclassecasamentos/" target="_blank" rel="noopener">
                    <span class="insta-multi"><i class="bi bi-collection"></i></span>
                    <img src="<?php echo e(asset('imagens_3_secao/Resultados Excepcionais.jpg')); ?>" alt="Instagram 12" loading="lazy">
                </a>
            </div>
            <button class="insta-arrow insta-next" type="button" aria-label="Próximo">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/home.blade.php ENDPATH**/ ?>