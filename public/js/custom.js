// Smooth scroll em âncoras internas
(function() {
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            if (!anchor) return;
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (!href) return;
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSmoothScroll);
    } else {
        initSmoothScroll();
    }
})();

// Validação simples de campos obrigatórios
(function() {
    function initFormValidation() {
        document.querySelectorAll('form').forEach(form => {
            if (!form) return;
            form.addEventListener('submit', event => {
                const requiredFields = form.querySelectorAll('input[required], textarea[required]');
                let invalid = false;

                requiredFields.forEach(field => {
                    if (!field) return;
                    if (!field.value.trim()) {
                        invalid = true;
                        field.classList.add('field-error');
                    } else {
                        field.classList.remove('field-error');
                    }
                });

                if (invalid) event.preventDefault();
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFormValidation);
    } else {
        initFormValidation();
    }
})();

// Carrossel de depoimentos - nova abordagem baseada no container
(function () {
    const carousel = document.getElementById('testimonialsCarousel');
    if (!carousel) {
        return;
    }

    const inner = carousel.querySelector('.testimonials-track');
    if (!inner) {
        return;
    }
    const items = Array.from(inner.querySelectorAll('.testimonial-slide'));
    const prevBtn = carousel.querySelector('.testimonials-arrow-prev');
    const nextBtn = carousel.querySelector('.testimonials-arrow-next');
    
    if (!items.length || !prevBtn || !nextBtn) {
        return;
    }

    let currentIndex = 0;
    let autoTimer;

    const getPerView = () => {
        const width = window.innerWidth;
        return width < 768 ? 1 : width < 992 ? 2 : 3;
    };

    const updateCarousel = (animate = true) => {
        const perView = getPerView();
        const maxIndex = Math.max(0, items.length - perView);
        
        // Limita o índice
        if (currentIndex > maxIndex) currentIndex = maxIndex;
        if (currentIndex < 0) currentIndex = 0;

        // Deslocamento real: usa offsetLeft que considera gap, largura real e qualquer responsividade
        const target = items[currentIndex];
        if (!target) {
            return;
        }
        
        const translateX = target.offsetLeft;
        
        inner.style.transition = animate ? 'transform 0.45s ease' : 'none';
        inner.style.transform = `translateX(-${translateX}px)`;
    };

    const nextSlide = () => {
        const perView = getPerView();
        const maxIndex = Math.max(0, items.length - perView);
        currentIndex = currentIndex >= maxIndex ? 0 : currentIndex + 1;
        updateCarousel();
    };

    const prevSlide = () => {
        const perView = getPerView();
        const maxIndex = Math.max(0, items.length - perView);
        currentIndex = currentIndex <= 0 ? maxIndex : currentIndex - 1;
        updateCarousel();
    };

    const startAutoPlay = () => {
        clearInterval(autoTimer);
        autoTimer = setInterval(nextSlide, 4500);
    };

    nextBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        nextSlide();
        startAutoPlay();
    });

    prevBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        prevSlide();
        startAutoPlay();
    });

    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            currentIndex = 0;
            updateCarousel(false);
            startAutoPlay();
        }, 100);
    });

    // Inicialização
    const init = () => {
        updateCarousel(false);
        startAutoPlay();
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        setTimeout(init, 100);
    }
})();

// Depoimentos – truncar e expandir no modal
(function () {
    if (document.body.classList.contains('site-editor-body')) return;

    const modal = document.getElementById('testimonialModal');
    if (!modal) return;

    const modalQuote = modal.querySelector('.testimonial-modal__quote');
    const modalAuthor = modal.querySelector('.testimonial-modal__author');
    const closeTargets = modal.querySelectorAll('[data-testimonial-close]');
    const items = Array.from(document.querySelectorAll('.testimonial-item'));

    if (!items.length || !modalQuote || !modalAuthor) return;

    let activeItem = null;

    const markTruncated = () => {
        items.forEach((item) => {
            const quote = item.querySelector('.quote');
            item.classList.remove('is-truncated');
            item.removeAttribute('role');
            item.removeAttribute('tabindex');
            item.setAttribute('aria-expanded', 'false');

            if (!quote) return;

            if (quote.scrollHeight > quote.clientHeight + 2) {
                item.classList.add('is-truncated');
                item.setAttribute('role', 'button');
                item.setAttribute('tabindex', '0');
            }
        });
    };

    const openModal = (item) => {
        const quote = item.querySelector('.quote');
        const author = item.querySelector('.author');
        if (!quote || !author) return;

        activeItem = item;
        modalQuote.textContent = quote.textContent.trim();
        modalAuthor.textContent = author.textContent.trim();
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('testimonial-modal-open');
        item.setAttribute('aria-expanded', 'true');
        modal.querySelector('.testimonial-modal__close')?.focus();
    };

    const closeModal = () => {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('testimonial-modal-open');
        if (activeItem) {
            activeItem.setAttribute('aria-expanded', 'false');
            activeItem.focus();
            activeItem = null;
        }
    };

    items.forEach((item) => {
        item.addEventListener('click', () => {
            if (!item.classList.contains('is-truncated')) return;
            openModal(item);
        });

        item.addEventListener('keydown', (event) => {
            if (!item.classList.contains('is-truncated')) return;
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                openModal(item);
            }
        });
    });

    closeTargets.forEach((el) => {
        el.addEventListener('click', closeModal);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && modal.classList.contains('is-open')) {
            closeModal();
        }
    });

    const init = () => {
        markTruncated();
    };

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(markTruncated, 120);
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        setTimeout(init, 150);
    }
})();

// Carrossel do Instagram (11 fotos)
(function () {
    const wrapper = document.getElementById('instaCarousel');
    if (!wrapper) return;
    const track = wrapper.querySelector('.insta-track');
    if (!track) return;
    const items = Array.from(track.querySelectorAll('.insta-item'));
    const prev = wrapper.querySelector('.insta-prev');
    const next = wrapper.querySelector('.insta-next');
    if (!items.length || !prev || !next) return;

    const TOTAL_ITEMS = 11;
    let idx = 0;
    let perView = 5;
    let itemSpan = 0;

    const calcPerView = () => {
        const w = window.innerWidth;
        if (w < 768) return 2;
        if (w < 992) return 3;
        if (w < 1200) return 4;
        return 5;
    };

    const measure = () => {
        perView = Math.min(calcPerView(), items.length, TOTAL_ITEMS);
        wrapper.style.setProperty('--insta-visible', String(perView));
        const gap = parseFloat(getComputedStyle(track).gap || 0);
        const viewport = wrapper.clientWidth;
        const itemWidth = (viewport - (perView - 1) * gap) / perView;
        wrapper.style.setProperty('--insta-item-width', `${itemWidth}px`);
        itemSpan = itemWidth + gap;
    };

    const update = (animate = true) => {
        measure();
        const maxIndex = Math.max(0, items.length - perView);
        if (idx > maxIndex) idx = maxIndex;
        if (idx < 0) idx = 0;
        track.style.transition = animate ? 'transform 0.35s ease' : 'none';
        track.style.transform = `translateX(-${itemSpan * idx}px)`;
        prev.disabled = idx === 0;
        next.disabled = idx >= maxIndex;
        prev.style.opacity = idx === 0 ? '0.45' : '1';
        next.style.opacity = idx >= maxIndex ? '0.45' : '1';
    };

    next.addEventListener('click', () => {
        idx += 1;
        update();
    });

    prev.addEventListener('click', () => {
        idx -= 1;
        update();
    });

    window.addEventListener('resize', () => update(false));
    update(false);
})();

// Scroll reveal animation para seções
(function() {
    // Aguardar carregamento completo do DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollReveal);
    } else {
        initScrollReveal();
    }
    
    function initScrollReveal() {
        const sections = document.querySelectorAll('.section-block:not(.header-hero)');
        
        if (sections.length === 0) return;
        
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -80px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('scroll-visible');
                    // Parar de observar após aparecer para melhor performance
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        sections.forEach(section => {
            observer.observe(section);
        });
    }
})();

// Hero moodboard – parallax sensível à rolagem
(function() {
    const hero = document.querySelector('.header-hero');
    if (!hero) return;

    let ticking = false;

    function updateHeroScroll() {
        const scrollOn = getComputedStyle(hero).getPropertyValue('--hero-anim-scroll').trim();
        if (scrollOn === '0') {
            hero.style.setProperty('--hero-scroll-progress', '0');
            return;
        }

        const rect = hero.getBoundingClientRect();
        const height = Math.max(rect.height, 1);
        const progress = Math.min(1, Math.max(0, (height - rect.bottom) / height));

        hero.style.setProperty('--hero-scroll-progress', progress.toFixed(4));
    }

    function onScroll() {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(function() {
            updateHeroScroll();
            ticking = false;
        });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    updateHeroScroll();
})();

// Hero colagem – expandir imagem ao toque (mobile)
(function () {
    if (document.body.classList.contains('site-editor-body')) return;

    const stage = document.querySelector('.moodboard-stage');
    const modal = document.getElementById('heroImageModal');
    if (!stage || !modal) return;

    const modalImg = modal.querySelector('.hero-image-modal__img');
    const closeEls = modal.querySelectorAll('[data-hero-image-close]');

    const isMobile = () => window.matchMedia('(max-width: 767px)').matches;

    const openModal = (img) => {
        modalImg.src = img.currentSrc || img.src;
        modalImg.alt = img.alt || '';
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('hero-image-modal-open');
    };

    const closeModal = () => {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('hero-image-modal-open');
        modalImg.removeAttribute('src');
    };

    stage.querySelectorAll('img').forEach((img) => {
        img.addEventListener('click', (e) => {
            if (!isMobile()) return;
            e.preventDefault();
            e.stopPropagation();
            openModal(img);
        });
    });

    closeEls.forEach((el) => {
        el.addEventListener('click', closeModal);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('is-open')) {
            closeModal();
        }
    });
})();

// Telefone: máscara visual, valor limpo no envio/cópia (DDD 38, sem 55)
(function () {
    const AREA_CODE = '38';

    const normalizeDigits = (value) => {
        let digits = String(value || '').replace(/\D/g, '');

        if (digits.startsWith('55')) {
            digits = digits.slice(2);
        }

        if (digits && !digits.startsWith(AREA_CODE) && digits.length <= 9) {
            digits = AREA_CODE + digits;
        }

        return digits.slice(0, 11);
    };

    const formatPhone = (value) => {
        const digits = normalizeDigits(value);
        if (!digits) return '';

        if (digits.length <= 2) {
            return `(${digits}`;
        }

        if (digits.length <= 6) {
            return `(${digits.slice(0, 2)}) ${digits.slice(2)}`;
        }

        if (digits.length <= 10) {
            return `(${digits.slice(0, 2)}) ${digits.slice(2, 6)}-${digits.slice(6)}`;
        }

        return `(${digits.slice(0, 2)}) ${digits.slice(2, 7)}-${digits.slice(7, 11)}`;
    };

    const copyRawPhone = async (input, rawValue) => {
        if (!rawValue) return;

        try {
            await navigator.clipboard.writeText(rawValue);
        } catch (_) {
            const helper = document.createElement('textarea');
            helper.value = rawValue;
            helper.setAttribute('readonly', '');
            helper.style.position = 'fixed';
            helper.style.left = '-9999px';
            document.body.appendChild(helper);
            helper.select();
            document.execCommand('copy');
            document.body.removeChild(helper);
        }

        input.classList.add('is-copied');
        window.setTimeout(() => input.classList.remove('is-copied'), 1200);
    };

    const initPhoneField = (displayInput) => {
        const form = displayInput.closest('form');
        if (!form) return;

        let hiddenInput = form.querySelector('input[type="hidden"][name="phone"]');

        if (!hiddenInput) {
            hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'phone';
            displayInput.insertAdjacentElement('afterend', hiddenInput);
        }

        if (displayInput.name === 'phone') {
            displayInput.removeAttribute('name');
        }

        const sync = () => {
            const rawValue = normalizeDigits(displayInput.value);
            hiddenInput.value = rawValue;
            displayInput.value = formatPhone(rawValue);
            return rawValue;
        };

        displayInput.addEventListener('input', sync);
        displayInput.addEventListener('blur', sync);

        displayInput.addEventListener('copy', (event) => {
            const rawValue = sync();
            if (!rawValue) return;

            event.preventDefault();
            event.clipboardData.setData('text/plain', rawValue);
        });

        displayInput.addEventListener('click', () => {
            const rawValue = sync();
            if (rawValue) {
                copyRawPhone(displayInput, rawValue);
            }
        });

        form.addEventListener('submit', sync);

        if (displayInput.value) {
            sync();
        }
    };

    const bootPhoneFields = () => {
        document.querySelectorAll('.js-phone-field').forEach(initPhoneField);
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootPhoneFields);
    } else {
        bootPhoneFields();
    }
})();

