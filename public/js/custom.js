// Smooth scroll em âncoras internas
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Validação simples de campos obrigatórios
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', event => {
        const requiredFields = form.querySelectorAll('input[required], textarea[required]');
        let invalid = false;

        requiredFields.forEach(field => {
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

// Carrossel de depoimentos - nova abordagem baseada no container
(function () {
    const carousel = document.getElementById('testimonialsCarousel');
    if (!carousel) {
        return;
    }

    const inner = carousel.querySelector('.testimonials-track');
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

// Carrossel pequeno do Instagram no rodapé
(function () {
    const wrapper = document.getElementById('instaCarousel');
    if (!wrapper) return;
    const track = wrapper.querySelector('.insta-track');
    const items = Array.from(track.querySelectorAll('.insta-item'));
    const prev = wrapper.querySelector('.insta-prev');
    const next = wrapper.querySelector('.insta-next');
    if (!items.length || !prev || !next) return;

    let idx = 0;
    let perView = 4;
    let itemSpan = 0;

    const calcPerView = () => {
        const w = window.innerWidth;
        if (w < 768) return 2;
        if (w < 992) return 3;
        return 4;
    };

    const measure = () => {
        const gap = parseFloat(getComputedStyle(track).gap || 0);
        itemSpan = items[0].offsetWidth + gap;
    };

    const update = (animate = true) => {
        perView = calcPerView();
        measure();
        const maxIndex = Math.max(0, items.length - perView);
        if (idx > maxIndex) idx = 0;
        if (idx < 0) idx = maxIndex;
        track.style.transition = animate ? 'transform 0.35s ease' : 'none';
        const shift = itemSpan * idx;
        track.style.transform = `translateX(-${shift}px)`;
    };

    const goNext = () => {
        idx += 1;
        update();
    };

    const goPrev = () => {
        idx -= 1;
        update();
    };

    next.addEventListener('click', goNext);
    prev.addEventListener('click', goPrev);
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

