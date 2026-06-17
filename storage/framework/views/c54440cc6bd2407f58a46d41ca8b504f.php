<section id="inicio" class="section-block header-hero" data-he-section="inicio">
    <div class="hero-moodboard-wrap">
        <div class="hero-logo-band <?php echo e($he->positionedParentClass('hero-logo')); ?>">
            <img
                src="<?php echo e($he->src('hero-logo')); ?>"
                alt="<?php echo e($he->alt('hero-logo', 'Com Classe Assessoria e Cerimonial')); ?>"
                class="<?php echo e($he->classes('hero-logo', 'logo-main logo-main--hero')); ?>"
                <?php echo $he->attrs('hero-logo', 'image'); ?>

            >
        </div>

        <div class="hero-moodboard" aria-label="Moodboard Com Classe" <?php if(!empty($editMode)): ?> id="collageEditorStage" <?php endif; ?>>
            <div class="moodboard-stage" <?php if(!empty($editMode)): ?> id="collageEditorMoodboard" <?php endif; ?>>
                <?php $__currentLoopData = $collageItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($editMode)): ?>
                        <div
                            class="collage-editor-item <?php echo e(implode(' ', array_merge($item['classes'] ?? [], [$item['id']]))); ?>"
                            data-item-id="<?php echo e($item['id']); ?>"
                            data-label="<?php echo e($item['label'] ?? $item['id']); ?>"
                            data-top="<?php echo e($item['top']); ?>"
                            data-left="<?php echo e($item['left']); ?>"
                            data-width="<?php echo e($item['width']); ?>"
                            data-height="<?php echo e($item['height'] ?? ''); ?>"
                            data-z-index="<?php echo e($item['z_index']); ?>"
                            data-alt="<?php echo e($item['alt'] ?? ''); ?>"
                            data-src="<?php echo e($item['src']); ?>"
                            style="top: <?php echo e($item['top']); ?>%; left: <?php echo e($item['left']); ?>%; width: <?php echo e($item['width']); ?>%; <?php if(!empty($item['height'])): ?> height: <?php echo e($item['height']); ?>%; <?php endif; ?> z-index: <?php echo e($item['z_index']); ?>;"
                        >
                            <img src="<?php echo e($collageImageBase); ?>/<?php echo e($item['src']); ?>" alt="<?php echo e($item['alt'] ?? ''); ?>">
                            <span class="collage-editor-item__label"><?php echo e($item['label'] ?? $item['id']); ?></span>
                            <span class="collage-editor-resize-handle" data-resize-handle aria-hidden="true"></span>
                        </div>
                    <?php else: ?>
                        <img
                            class="<?php echo e(implode(' ', array_merge($item['classes'] ?? [], [$item['id']]))); ?>"
                            src="<?php echo e($collageImageBase); ?>/<?php echo e($item['src']); ?>"
                            alt="<?php echo e($item['alt'] ?? ''); ?>"
                            loading="<?php echo e($item['loading'] ?? 'lazy'); ?>"
                        >
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div id="heroImageModal" class="hero-image-modal" aria-hidden="true">
        <div class="hero-image-modal__backdrop" data-hero-image-close></div>
        <div class="hero-image-modal__dialog" role="dialog" aria-modal="true" aria-label="Imagem ampliada">
            <button type="button" class="hero-image-modal__close" aria-label="Fechar imagem" data-hero-image-close>
                <i class="bi bi-x-lg"></i>
            </button>
            <figure class="hero-image-modal__figure">
                <img class="hero-image-modal__img" src="" alt="">
            </figure>
        </div>
    </div>
</section>

<section id="quem-somos" class="section-block who-values-section" data-he-section="quem-somos">
    <div class="site-container who-block">
        <div class="who-row first">
            <div class="who-media he-position-root <?php echo e($he->positionedParentClass('quem-img-1')); ?>">
                <img
                    src="<?php echo e($he->src('quem-img-1')); ?>"
                    alt="<?php echo e($he->alt('quem-img-1')); ?>"
                    class="<?php echo e($he->classes('quem-img-1')); ?>"
                    loading="lazy"
                    <?php echo $he->attrs('quem-img-1', 'image'); ?>

                >
            </div>
            <div class="who-text">
                <p class="<?php echo e($he->classes('quem-eyebrow', 'eyebrow font-abramo')); ?>" <?php echo $he->attrs('quem-eyebrow', 'text'); ?>><?php echo e($he->content('quem-eyebrow')); ?></p>
                <h2 class="<?php echo e($he->classes('quem-title-1', 'font-antic-didone')); ?>" <?php echo $he->attrs('quem-title-1', 'text'); ?>><?php echo e($he->content('quem-title-1')); ?></h2>
                <p <?php echo $he->attrs('quem-p-1', 'text'); ?>><?php echo e($he->content('quem-p-1')); ?></p>
                <p <?php echo $he->attrs('quem-p-2', 'text'); ?>><?php echo e($he->content('quem-p-2')); ?></p>
                <p <?php echo $he->attrs('quem-p-3', 'text'); ?>><?php echo e($he->content('quem-p-3')); ?></p>
                <p <?php echo $he->attrs('quem-p-4', 'text'); ?>><?php echo e($he->content('quem-p-4')); ?></p>
            </div>
        </div>

        <div class="who-row second">
            <div class="who-media outlined he-position-root <?php echo e($he->positionedParentClass('quem-img-2')); ?>">
                <img
                    src="<?php echo e($he->src('quem-img-2')); ?>"
                    alt="<?php echo e($he->alt('quem-img-2')); ?>"
                    class="<?php echo e($he->classes('quem-img-2')); ?>"
                    loading="lazy"
                    <?php echo $he->attrs('quem-img-2', 'image'); ?>

                >
            </div>
            <div class="who-text second">
                <h2 class="<?php echo e($he->classes('quem-title-2', 'font-antic-didone')); ?>" <?php echo $he->attrs('quem-title-2', 'text'); ?>><?php echo e($he->content('quem-title-2')); ?></h2>
                <p <?php echo $he->attrs('quem-p-5', 'text'); ?>><?php echo e($he->content('quem-p-5')); ?></p>
            </div>
        </div>

        <div class="values-layout">
            <div class="values-copy">
                <div class="values-header">
                    <h2 class="<?php echo e($he->classes('valores-title', 'values-title font-abramo')); ?>" <?php echo $he->attrs('valores-title', 'text'); ?>><?php echo e($he->content('valores-title')); ?></h2>
                    <div class="values-line-long"></div>
                </div>
            </div>
            <div class="values-grid flat inline">
                <div class="value-card">
                    <h3 class="<?php echo e($he->classes('valor-1-title', 'titulo-valor')); ?>" <?php echo $he->attrs('valor-1-title', 'text'); ?>><?php echo e($he->content('valor-1-title')); ?></h3>
                    <p <?php echo $he->attrs('valor-1-text', 'text'); ?>><?php echo e($he->content('valor-1-text')); ?></p>
                </div>
                <div class="value-card">
                    <h3 class="<?php echo e($he->classes('valor-2-title', 'titulo-valor')); ?>" <?php echo $he->attrs('valor-2-title', 'text'); ?>><?php echo e($he->content('valor-2-title')); ?></h3>
                    <p <?php echo $he->attrs('valor-2-text', 'text'); ?>><?php echo e($he->content('valor-2-text')); ?></p>
                </div>
                <div class="value-card">
                    <h3 class="<?php echo e($he->classes('valor-3-title', 'titulo-valor')); ?>" <?php echo $he->attrs('valor-3-title', 'text'); ?>><?php echo e($he->content('valor-3-title')); ?></h3>
                    <p <?php echo $he->attrs('valor-3-text', 'text'); ?>><?php echo e($he->content('valor-3-text')); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="impact-full he-position-root <?php echo e($he->positionedParentClass('quem-impact')); ?>">
        <img
            src="<?php echo e($he->src('quem-impact')); ?>"
            alt="<?php echo e($he->alt('quem-impact')); ?>"
            loading="lazy"
            <?php echo $he->attrs('quem-impact', 'image'); ?>

        >
    </div>
</section>

<section id="atuacao" class="section-block atuacao-section" data-he-section="atuacao">
    <div class="site-container">
        <div class="atuacao-header">
            <h2 class="<?php echo e($he->classes('atuacao-title', 'atuacao-title font-abramo')); ?>" <?php echo $he->attrs('atuacao-title', 'text'); ?>><?php echo $he->content('atuacao-title', 'Nossa Atua<span class="font-belights">ção</span>'); ?></h2>
        </div>
        <p class="<?php echo e($he->classes('atuacao-subtitle', 'atuacao-subtitle')); ?>" <?php echo $he->attrs('atuacao-subtitle', 'text'); ?>><?php echo e($he->content('atuacao-subtitle')); ?></p>

        <div class="atuacao-thumbs">
            <?php $__currentLoopData = [1, 2, 3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="atuacao-item he-position-root <?php echo e($he->positionedParentClass('atuacao-img-'.$n)); ?>">
                    <img
                        src="<?php echo e($he->src('atuacao-img-'.$n)); ?>"
                        alt="<?php echo e($he->alt('atuacao-img-'.$n)); ?>"
                        class="<?php echo e($he->classes('atuacao-img-'.$n)); ?>"
                        loading="lazy"
                        <?php echo $he->attrs('atuacao-img-'.$n, 'image'); ?>

                    >
                    <p class="<?php echo e($he->classes('atuacao-text-'.$n, 'font-antic-didone')); ?>" <?php echo $he->attrs('atuacao-text-'.$n, 'text'); ?>><?php echo nl2br(e($he->content('atuacao-text-'.$n))); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="atuacao-cta">
            <a class="<?php echo e($he->classes('atuacao-cta', 'atuacao-btn')); ?>" href="<?php echo e($he->href('atuacao-cta', route('servicos'))); ?>" <?php echo $he->attrs('atuacao-cta', 'link'); ?>><?php echo e($he->content('atuacao-cta')); ?></a>
        </div>
    </div>
</section>

<section id="mentorias-cursos" class="section-block mentorias-section" data-he-section="mentorias">
    <div class="site-container">
        <div class="mentorias-header">
            <h2 class="<?php echo e($he->classes('mentorias-title', 'mentorias-title font-abramo')); ?>" <?php echo $he->attrs('mentorias-title', 'text'); ?>><?php echo e($he->content('mentorias-title')); ?></h2>
        </div>
        <p class="<?php echo e($he->classes('mentorias-subtitle', 'mentorias-subtitle font-antic-didone')); ?>" <?php echo $he->attrs('mentorias-subtitle', 'text'); ?>><?php echo e($he->content('mentorias-subtitle')); ?></p>
        <div class="mentorias-cta">
            <a class="<?php echo e($he->classes('mentorias-cta', 'btn-primary btn-wide')); ?>" href="<?php echo e($he->href('mentorias-cta')); ?>" target="_blank" rel="noopener" <?php echo $he->attrs('mentorias-cta', 'link'); ?>><?php echo e($he->content('mentorias-cta')); ?></a>
        </div>
    </div>
</section>

<section id="depoimentos" class="section-block testimonials-section" data-he-section="depoimentos">
    <div class="site-container">
        <h2 class="<?php echo e($he->classes('depoimentos-title', 'testimonials-title font-abramo')); ?>" <?php echo $he->attrs('depoimentos-title', 'text'); ?>><?php echo e($he->content('depoimentos-title')); ?></h2>
        <div id="testimonialsCarousel" class="testimonials-carousel" aria-label="Depoimentos">
            <div class="testimonials-track">
                <?php for($n = 1; $n <= 6; $n++): ?>
                    <div class="testimonial-slide">
                        <div class="testimonial-item">
                            <i class="bi bi-quote"></i>
                            <div class="quote-wrap">
                                <p class="<?php echo e($he->classes('depoimento-'.$n.'-quote', 'quote')); ?>" <?php echo $he->attrs('depoimento-'.$n.'-quote', 'text'); ?>><?php echo e($he->content('depoimento-'.$n.'-quote')); ?></p>
                            </div>
                            <span class="testimonial-read-hint">Clique para ler completo</span>
                            <div class="testimonial-sep"></div>
                            <p class="<?php echo e($he->classes('depoimento-'.$n.'-author', 'author')); ?>" <?php echo $he->attrs('depoimento-'.$n.'-author', 'text'); ?>><?php echo e($he->content('depoimento-'.$n.'-author')); ?></p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <button class="testimonials-arrow testimonials-arrow-prev" type="button" aria-label="Anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="testimonials-arrow testimonials-arrow-next" type="button" aria-label="Próximo">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

        <div id="testimonialModal" class="testimonial-modal" aria-hidden="true">
            <div class="testimonial-modal__backdrop" data-testimonial-close></div>
            <div class="testimonial-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="testimonialModalAuthor">
                <button type="button" class="testimonial-modal__close" aria-label="Fechar depoimento" data-testimonial-close>
                    <i class="bi bi-x-lg"></i>
                </button>
                <i class="bi bi-quote testimonial-modal__icon"></i>
                <p class="testimonial-modal__quote"></p>
                <div class="testimonial-modal__sep"></div>
                <p class="testimonial-modal__author" id="testimonialModalAuthor"></p>
            </div>
        </div>
    </div>
</section>

<section id="instagram" class="section-block insta-section" data-he-section="instagram">
    <div class="site-container insta-area center">
        <div class="insta-header">
            <p class="<?php echo e($he->classes('insta-cta', 'footer-cta font-antic-didone')); ?>" <?php echo $he->attrs('insta-cta', 'text'); ?>><?php echo e($he->content('insta-cta')); ?></p>
            <a href="<?php echo e($he->href('insta-handle')); ?>" target="_blank" rel="noopener" class="<?php echo e($he->classes('insta-handle', 'footer-handle font-antic-didone')); ?>" <?php echo $he->attrs('insta-handle', 'link'); ?>><?php echo e($he->content('insta-handle')); ?></a>
        </div>
        <div class="insta-carousel" id="instaCarousel">
            <button class="insta-arrow insta-prev" type="button" aria-label="Anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="insta-track">
                <?php for($n = 1; $n <= 11; $n++): ?>
                    <a class="insta-item" href="<?php echo e($he->href('insta-link-'.$n)); ?>" target="_blank" rel="noopener" <?php echo $he->attrs('insta-link-'.$n, 'link'); ?>>
                        <span class="insta-multi"><i class="bi bi-collection"></i></span>
                        <img
                            src="<?php echo e($he->src('insta-img-'.$n)); ?>"
                            alt="<?php echo e($he->alt('insta-img-'.$n)); ?>"
                            loading="lazy"
                            <?php echo $he->attrs('insta-img-'.$n, 'image'); ?>

                        >
                    </a>
                <?php endfor; ?>
            </div>
            <button class="insta-arrow insta-next" type="button" aria-label="Próximo">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<section id="contato" class="section-block contact-section" data-he-section="contato">
    <div class="site-container">
        <p class="<?php echo e($he->classes('contato-lead', 'subtitle lead-highlight contact-lead font-antic-didone')); ?>" <?php echo $he->attrs('contato-lead', 'text'); ?>><?php echo e($he->content('contato-lead')); ?></p>
        <h2 class="<?php echo e($he->classes('contato-title', 'contact-title font-abramo')); ?>" <?php echo $he->attrs('contato-title', 'text'); ?>><?php echo e($he->content('contato-title')); ?></h2>
        <div class="contact-cta">
            <a class="<?php echo e($he->classes('contato-cta', 'btn-primary btn-wide')); ?>" href="<?php echo e($he->href('contato-cta')); ?>" target="_blank" rel="noopener" <?php echo $he->attrs('contato-cta', 'link'); ?>><?php echo e($he->content('contato-cta')); ?></a>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/partials/home-body.blade.php ENDPATH**/ ?>