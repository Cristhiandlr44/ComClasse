<section id="inicio" class="section-block header-hero" data-he-section="inicio">
    <div class="hero-moodboard-wrap">
        <div class="hero-logo-band {{ $he->positionedParentClass('hero-logo') }}">
            <img
                src="{{ $he->src('hero-logo') }}"
                alt="{{ $he->alt('hero-logo', 'Com Classe Assessoria e Cerimonial') }}"
                class="{{ $he->classes('hero-logo', 'logo-main logo-main--hero') }}"
                {!! $he->attrs('hero-logo', 'image') !!}
            >
        </div>

        <div class="hero-moodboard" aria-label="Moodboard Com Classe" @if(!empty($editMode)) id="collageEditorStage" @endif>
            <div class="moodboard-stage" @if(!empty($editMode)) id="collageEditorMoodboard" @endif>
                @foreach($collageItems as $item)
                    @if(!empty($editMode))
                        <div
                            class="collage-editor-item {{ implode(' ', array_merge($item['classes'] ?? [], [$item['id']])) }}"
                            data-item-id="{{ $item['id'] }}"
                            data-label="{{ $item['label'] ?? $item['id'] }}"
                            data-top="{{ $item['top'] }}"
                            data-left="{{ $item['left'] }}"
                            data-width="{{ $item['width'] }}"
                            data-height="{{ $item['height'] ?? '' }}"
                            data-z-index="{{ $item['z_index'] }}"
                            data-alt="{{ $item['alt'] ?? '' }}"
                            data-src="{{ $item['src'] }}"
                            style="top: {{ $item['top'] }}%; left: {{ $item['left'] }}%; width: {{ $item['width'] }}%; @if(!empty($item['height'])) height: {{ $item['height'] }}%; @endif z-index: {{ $item['z_index'] }};"
                        >
                            <img src="{{ $collageImageBase }}/{{ $item['src'] }}" alt="{{ $item['alt'] ?? '' }}">
                            <span class="collage-editor-item__label">{{ $item['label'] ?? $item['id'] }}</span>
                            <span class="collage-editor-resize-handle" data-resize-handle aria-hidden="true"></span>
                        </div>
                    @else
                        <img
                            class="{{ implode(' ', array_merge($item['classes'] ?? [], [$item['id']])) }}"
                            src="{{ $collageImageBase }}/{{ $item['src'] }}"
                            alt="{{ $item['alt'] ?? '' }}"
                            loading="{{ $item['loading'] ?? 'lazy' }}"
                        >
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('modals')
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
@endpush

<section id="quem-somos" class="section-block who-values-section" data-he-section="quem-somos">
    <div class="site-container who-block">
        <div class="who-row first">
            <div class="who-media he-position-root {{ $he->positionedParentClass('quem-img-1') }}">
                <img
                    src="{{ $he->src('quem-img-1') }}"
                    alt="{{ $he->alt('quem-img-1') }}"
                    class="{{ $he->classes('quem-img-1') }}"
                    loading="lazy"
                    {!! $he->attrs('quem-img-1', 'image') !!}
                >
            </div>
            <div class="who-text">
                <p class="{{ $he->classes('quem-eyebrow', 'eyebrow font-abramo') }}" {!! $he->attrs('quem-eyebrow', 'text') !!}>{{ $he->content('quem-eyebrow') }}</p>
                <h2 class="{{ $he->classes('quem-title-1', 'font-antic-didone') }}" {!! $he->attrs('quem-title-1', 'text') !!}>{{ $he->content('quem-title-1') }}</h2>
                <p {!! $he->attrs('quem-p-1', 'text') !!}>{{ $he->content('quem-p-1') }}</p>
                <p {!! $he->attrs('quem-p-2', 'text') !!}>{{ $he->content('quem-p-2') }}</p>
                <p {!! $he->attrs('quem-p-3', 'text') !!}>{{ $he->content('quem-p-3') }}</p>
                <p {!! $he->attrs('quem-p-4', 'text') !!}>{{ $he->content('quem-p-4') }}</p>
            </div>
        </div>

        <div class="who-row second">
            <div class="who-media outlined he-position-root {{ $he->positionedParentClass('quem-img-2') }}">
                <img
                    src="{{ $he->src('quem-img-2') }}"
                    alt="{{ $he->alt('quem-img-2') }}"
                    class="{{ $he->classes('quem-img-2') }}"
                    loading="lazy"
                    {!! $he->attrs('quem-img-2', 'image') !!}
                >
            </div>
            <div class="who-text second">
                <h2 class="{{ $he->classes('quem-title-2', 'font-antic-didone') }}" {!! $he->attrs('quem-title-2', 'text') !!}>{{ $he->content('quem-title-2') }}</h2>
                <p {!! $he->attrs('quem-p-5', 'text') !!}>{{ $he->content('quem-p-5') }}</p>
            </div>
        </div>

        <div class="values-layout">
            <div class="values-copy">
                <div class="values-header">
                    <h2 class="{{ $he->classes('valores-title', 'values-title font-abramo') }}" {!! $he->attrs('valores-title', 'text') !!}>{{ $he->content('valores-title') }}</h2>
                    <div class="values-line-long"></div>
                </div>
            </div>
            <div class="values-grid flat inline">
                <div class="value-card">
                    <h3 class="{{ $he->classes('valor-1-title', 'titulo-valor') }}" {!! $he->attrs('valor-1-title', 'text') !!}>{{ $he->content('valor-1-title') }}</h3>
                    <p {!! $he->attrs('valor-1-text', 'text') !!}>{{ $he->content('valor-1-text') }}</p>
                </div>
                <div class="value-card">
                    <h3 class="{{ $he->classes('valor-2-title', 'titulo-valor') }}" {!! $he->attrs('valor-2-title', 'text') !!}>{{ $he->content('valor-2-title') }}</h3>
                    <p {!! $he->attrs('valor-2-text', 'text') !!}>{{ $he->content('valor-2-text') }}</p>
                </div>
                <div class="value-card">
                    <h3 class="{{ $he->classes('valor-3-title', 'titulo-valor') }}" {!! $he->attrs('valor-3-title', 'text') !!}>{{ $he->content('valor-3-title') }}</h3>
                    <p {!! $he->attrs('valor-3-text', 'text') !!}>{{ $he->content('valor-3-text') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="impact-full he-position-root {{ $he->positionedParentClass('quem-impact') }}">
        <img
            src="{{ $he->src('quem-impact') }}"
            alt="{{ $he->alt('quem-impact') }}"
            loading="lazy"
            {!! $he->attrs('quem-impact', 'image') !!}
        >
    </div>
</section>

<section id="atuacao" class="section-block atuacao-section" data-he-section="atuacao">
    <div class="site-container">
        <div class="atuacao-header">
            <h2 class="{{ $he->classes('atuacao-title', 'atuacao-title font-abramo') }}" {!! $he->attrs('atuacao-title', 'text') !!}>{!! $he->content('atuacao-title', 'Nossa Atua<span class="font-belights">ção</span>') !!}</h2>
        </div>
        <p class="{{ $he->classes('atuacao-subtitle', 'atuacao-subtitle') }}" {!! $he->attrs('atuacao-subtitle', 'text') !!}>{{ $he->content('atuacao-subtitle') }}</p>

        <div class="atuacao-thumbs">
            @foreach([1, 2, 3] as $n)
                <div class="atuacao-item he-position-root {{ $he->positionedParentClass('atuacao-img-'.$n) }}">
                    <img
                        src="{{ $he->src('atuacao-img-'.$n) }}"
                        alt="{{ $he->alt('atuacao-img-'.$n) }}"
                        class="{{ $he->classes('atuacao-img-'.$n) }}"
                        loading="lazy"
                        {!! $he->attrs('atuacao-img-'.$n, 'image') !!}
                    >
                    <p class="{{ $he->classes('atuacao-text-'.$n, 'font-antic-didone') }}" {!! $he->attrs('atuacao-text-'.$n, 'text') !!}>{!! nl2br(e($he->content('atuacao-text-'.$n))) !!}</p>
                </div>
            @endforeach
        </div>

        <div class="atuacao-cta">
            <a class="{{ $he->classes('atuacao-cta', 'atuacao-btn') }}" href="{{ $he->href('atuacao-cta', route('servicos')) }}" {!! $he->attrs('atuacao-cta', 'link') !!}>{{ $he->content('atuacao-cta') }}</a>
        </div>
    </div>
</section>

<section id="mentorias-cursos" class="section-block mentorias-section" data-he-section="mentorias">
    <div class="site-container">
        <div class="mentorias-header">
            <h2 class="{{ $he->classes('mentorias-title', 'mentorias-title font-abramo') }}" {!! $he->attrs('mentorias-title', 'text') !!}>{{ $he->content('mentorias-title') }}</h2>
        </div>
        <p class="{{ $he->classes('mentorias-subtitle', 'mentorias-subtitle font-antic-didone') }}" {!! $he->attrs('mentorias-subtitle', 'text') !!}>{{ $he->content('mentorias-subtitle') }}</p>
        <div class="mentorias-cta">
            <a class="{{ $he->classes('mentorias-cta', 'btn-primary btn-wide') }}" href="{{ $he->href('mentorias-cta') }}" target="_blank" rel="noopener" {!! $he->attrs('mentorias-cta', 'link') !!}>{{ $he->content('mentorias-cta') }}</a>
        </div>
    </div>
</section>

<section id="depoimentos" class="section-block testimonials-section" data-he-section="depoimentos">
    <div class="site-container">
        <h2 class="{{ $he->classes('depoimentos-title', 'testimonials-title font-abramo') }}" {!! $he->attrs('depoimentos-title', 'text') !!}>{{ $he->content('depoimentos-title') }}</h2>
        <div id="testimonialsCarousel" class="testimonials-carousel" aria-label="Depoimentos">
            <button class="testimonials-arrow testimonials-arrow-prev" type="button" aria-label="Anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="testimonials-viewport">
            <div class="testimonials-track">
                @for($n = 1; $n <= 6; $n++)
                    <div class="testimonial-slide">
                        <div class="testimonial-item">
                            <i class="bi bi-quote"></i>
                            <div class="quote-wrap">
                                <p class="{{ $he->classes('depoimento-'.$n.'-quote', 'quote') }}" {!! $he->attrs('depoimento-'.$n.'-quote', 'text') !!}>{{ $he->content('depoimento-'.$n.'-quote') }}</p>
                            </div>
                            <span class="testimonial-read-hint">Clique para ler completo</span>
                            <div class="testimonial-sep"></div>
                            <p class="{{ $he->classes('depoimento-'.$n.'-author', 'author') }}" {!! $he->attrs('depoimento-'.$n.'-author', 'text') !!}>{{ $he->content('depoimento-'.$n.'-author') }}</p>
                        </div>
                    </div>
                @endfor
            </div>
            </div>
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
            <p class="{{ $he->classes('insta-cta', 'footer-cta font-antic-didone') }}" {!! $he->attrs('insta-cta', 'text') !!}>{{ $he->content('insta-cta') }}</p>
            <a href="{{ $he->href('insta-handle') }}" target="_blank" rel="noopener" class="{{ $he->classes('insta-handle', 'footer-handle font-antic-didone') }}" {!! $he->attrs('insta-handle', 'link') !!}>{{ $he->content('insta-handle') }}</a>
        </div>
        <div class="insta-carousel" id="instaCarousel">
            <button class="insta-arrow insta-prev" type="button" aria-label="Anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="insta-viewport">
            <div class="insta-track">
                @for($n = 1; $n <= 11; $n++)
                    <a class="insta-item" href="{{ $he->href('insta-link-'.$n) }}" target="_blank" rel="noopener" {!! $he->attrs('insta-link-'.$n, 'link') !!}>
                        <span class="insta-multi"><i class="bi bi-collection"></i></span>
                        <img
                            src="{{ $he->src('insta-img-'.$n) }}"
                            alt="{{ $he->alt('insta-img-'.$n) }}"
                            loading="lazy"
                            {!! $he->attrs('insta-img-'.$n, 'image') !!}
                        >
                    </a>
                @endfor
            </div>
            </div>
            <button class="insta-arrow insta-next" type="button" aria-label="Próximo">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<section id="contato" class="section-block contact-section" data-he-section="contato">
    <div class="site-container">
        <p class="{{ $he->classes('contato-lead', 'subtitle lead-highlight contact-lead font-antic-didone') }}" {!! $he->attrs('contato-lead', 'text') !!}>{{ $he->content('contato-lead') }}</p>
        <h2 class="{{ $he->classes('contato-title', 'contact-title font-abramo') }}" {!! $he->attrs('contato-title', 'text') !!}>{{ $he->content('contato-title') }}</h2>
        <div class="contact-cta">
            <a class="{{ $he->classes('contato-cta', 'btn-primary btn-wide') }}" href="{{ $he->href('contato-cta') }}" target="_blank" rel="noopener" {!! $he->attrs('contato-cta', 'link') !!}>{{ $he->content('contato-cta') }}</a>
        </div>
    </div>
</section>
