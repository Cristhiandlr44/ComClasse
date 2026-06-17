(function () {
    const config = window.__SITE_EDITOR__;
    if (!config) return;

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const statusEl = document.getElementById('siteEditorStatus');
    const saveBtn = document.getElementById('siteEditorSave');
    const sectionFilter = document.getElementById('siteEditorSectionFilter');
    const liveStyleEl = document.getElementById('site-editor-live-styles');

    let collageState = structuredClone(config.collage);
    let homeState = structuredClone(config.homeContent);

    const ensureStyles = (element) => {
        if (!element.styles || Array.isArray(element.styles)) {
            const previous = element.styles;
            element.styles = {};
            if (previous && typeof previous === 'object' && !Array.isArray(previous)) {
                Object.assign(element.styles, previous);
            } else if (Array.isArray(previous)) {
                if (previous.width) element.styles.width = previous.width;
                if (previous.height) element.styles.height = previous.height;
            }
        }
        return element.styles;
    };

    homeState.elements.forEach((element) => ensureStyles(element));

    let selected = null;
    let interaction = null;

    const fontClasses = ['font-abramo', 'font-antic-didone', 'font-belights', 'font-servico'];

    const elementsById = () => Object.fromEntries(homeState.elements.map((el) => [el.id, el]));

    const round = (value, digits = 3) => {
        const factor = 10 ** digits;
        return Math.round(value * factor) / factor;
    };

    const formatPercent = (value) => {
        const number = round(parseFloat(value), 3);
        return `${number}%`;
    };

    const imageParentSelector = (elementId) => {
        if (elementId === 'hero-logo') return '.hero-logo-band';
        if (elementId.startsWith('quem-img')) return '.who-media';
        if (elementId === 'quem-impact') return '.impact-full';
        if (elementId.startsWith('atuacao-img')) return '.atuacao-item';
        if (elementId.startsWith('insta-img')) return '.insta-item';
        return '';
    };

    const elementSelector = (element) => {
        const classes = (element.classes || []).filter(Boolean);
        const classPart = classes.length ? `.${classes.join('.')}` : '';
        const attr = `[data-he-id="${element.id}"]`;

        if (element.type === 'image') {
            const parent = imageParentSelector(element.id);
            if (parent) {
                return `${parent} img${classPart}${attr}`;
            }
            return `img${classPart}${attr}`;
        }

        if (!classes.length) {
            return attr;
        }

        return `.${classes.join('.')}${attr}`;
    };

    const rootFontSize = () => parseFloat(getComputedStyle(document.documentElement).fontSize) || 16;

    const formatFontSizeForPanel = (fontSize) => {
        if (!fontSize) return '';
        if (String(fontSize).includes('rem') || String(fontSize).includes('em') || String(fontSize).includes('%')) {
            return String(fontSize);
        }
        const px = parseFloat(fontSize);
        if (Number.isNaN(px)) return String(fontSize);
        return `${round(px / rootFontSize(), 2)}rem`;
    };

    const detectFontClass = (dom) => {
        if (!dom) return '';
        return fontClasses.find((cls) => dom.classList.contains(cls)) || '';
    };

    const readTextPanelValues = (dom, element) => {
        const computed = window.getComputedStyle(dom);
        return {
            fontFamily: element.font_family || detectFontClass(dom) || '',
            fontSize: element.font_size || formatFontSizeForPanel(computed.fontSize),
            textAlign: element.text_align || computed.textAlign || '',
        };
    };

    const persistImageStylesFromDom = () => {
        homeState.elements.forEach((element) => {
            if (element.type !== 'image') return;

            const img = document.querySelector(`[data-he-id="${element.id}"]`);
            if (!img || img.closest('.collage-editor-item')) return;

            const hasStoredSize = Boolean(
                element.styles?.width
                || element.styles?.height
                || (element.position?.enabled && (element.position.width || element.position.height))
            );

            if (!hasStoredSize && img.dataset.heResized !== '1') return;

            const parent = img.parentElement;
            if (!parent) return;

            const parentRect = parent.getBoundingClientRect();
            if (!parentRect.width || !parentRect.height) return;

            const widthPercent = round((img.offsetWidth / parentRect.width) * 100);
            const heightPercent = round((img.offsetHeight / parentRect.height) * 100);

            if (element.position?.enabled) {
                element.position.width = widthPercent;
                element.position.height = heightPercent;
                return;
            }

            if (element.id === 'hero-logo') {
                ensureStyles(element);
                element.styles.width = `${widthPercent}%`;
                element.styles['max-width'] = 'none';
                delete element.styles.height;
                return;
            }

            const styles = ensureStyles(element);
            styles.width = `${widthPercent}%`;
            styles.height = `${heightPercent}%`;
        });
    };

    const generateLiveCss = (state) => {
        const lines = [
            '/* Preview ao vivo — espelha home-content.generated.css */',
            '',
        ];

        if (state.hero_settings && typeof state.hero_settings === 'object') {
            lines.push('.section-block.header-hero {');
            Object.entries(state.hero_settings).forEach(([property, value]) => {
                if (value !== null && value !== '') {
                    lines.push(`    ${property}: ${value};`);
                }
            });
            lines.push('}', '');
        }

        state.elements.forEach((element) => {
            const selector = elementSelector(element);
            const rules = [];

            if (element.font_size) {
                rules.push(`font-size: ${element.font_size}`);
            }
            if (element.line_height) {
                rules.push(`line-height: ${element.line_height}`);
            }
            if (element.color) {
                rules.push(`color: ${element.color}`);
            }
            if (element.text_align) {
                rules.push(`text-align: ${element.text_align}`);
            }

            const position = element.position;
            const positionEnabled = position && position.enabled;

            if (positionEnabled) {
                rules.push('position: absolute');
                ['top', 'left', 'width', 'height'].forEach((key) => {
                    if (position[key] !== null && position[key] !== undefined && position[key] !== '') {
                        rules.push(`${key}: ${formatPercent(position[key])}`);
                    }
                });
                if (position.z_index) {
                    rules.push(`z-index: ${parseInt(position.z_index, 10)}`);
                }
            }

            Object.entries(ensureStyles(element)).forEach(([property, value]) => {
                if (value === null || value === '') {
                    return;
                }
                if (positionEnabled && ['top', 'left', 'width', 'height', 'position', 'z-index'].includes(property)) {
                    return;
                }
                rules.push(`${property}: ${value}`);
            });

            if (!rules.length) {
                return;
            }

            lines.push(`${selector} {`);
            rules.forEach((rule) => lines.push(`    ${rule};`));
            lines.push('}', '');
        });

        return lines.join('\n');
    };

    const positionHandle = (img) => {
        const handle = img.parentElement?.querySelector(`[data-home-resize-handle="${img.dataset.heId}"]`);
        if (!handle || !img.parentElement) {
            return;
        }

        const imgRect = img.getBoundingClientRect();
        const parentRect = img.parentElement.getBoundingClientRect();
        const size = 14;
        handle.style.left = `${imgRect.right - parentRect.left - size / 2}px`;
        handle.style.top = `${imgRect.bottom - parentRect.top - size / 2}px`;
    };

    const positionAllHandles = () => {
        document.querySelectorAll('.site-editor-page [data-he-id][data-he-type="image"]').forEach((img) => {
            if (!img.closest('.collage-editor-item')) {
                positionHandle(img);
            }
        });
    };

    const syncLiveCss = () => {
        if (liveStyleEl) {
            liveStyleEl.textContent = generateLiveCss(homeState);
        }
        requestAnimationFrame(positionAllHandles);
    };

    const updatePositionRootClass = (dom, element) => {
        const root = dom?.closest('.he-position-root') || dom?.parentElement;
        if (!root) {
            return;
        }
        if (element?.position?.enabled) {
            root.classList.add('he-position-root');
        } else if (!root.classList.contains('who-media') && !root.classList.contains('impact-full') && !root.classList.contains('atuacao-item')) {
            root.classList.remove('he-position-root');
        }
    };

    const setStatus = (message, isError = false) => {
        statusEl.textContent = message;
        statusEl.style.color = isError ? '#ffb4a6' : '#c8bfb0';
    };

    const getHomeElement = (id) => elementsById()[id];

    const applyFontClass = (element, fontFamily) => {
        element.classes = (element.classes || []).filter((cls) => !fontClasses.includes(cls));
        if (fontFamily) {
            element.classes.push(fontFamily);
        }
        element.font_family = fontFamily || null;
    };

    const syncDomClasses = (dom, element) => {
        if (!dom || !element.classes) return;
        fontClasses.forEach((cls) => dom.classList.remove(cls));
        element.classes.forEach((cls) => dom.classList.add(cls));
    };

    const attachImageEditor = (img) => {
        const element = getHomeElement(img.dataset.heId);
        if (!element || img.closest('.collage-editor-item')) {
            return;
        }

        const parent = img.parentElement;
        parent.classList.add('he-edit-host');
        updatePositionRootClass(img, element);

        let handle = parent.querySelector(`[data-home-resize-handle="${img.dataset.heId}"]`);
        if (!handle) {
            handle = document.createElement('span');
            handle.className = 'site-editor-resize-handle';
            handle.dataset.homeResizeHandle = img.dataset.heId;
            handle.setAttribute('aria-hidden', 'true');
            parent.appendChild(handle);

            handle.addEventListener('pointerdown', (event) => {
                event.preventDefault();
                event.stopPropagation();
                startHomeResize(img, event.pointerId, event.clientX, event.clientY);
            });
        }

        if (!img.dataset.heEditorBound) {
            img.dataset.heEditorBound = '1';
        }

        positionHandle(img);
    };

    const initImageEditors = () => {
        document.querySelectorAll('.site-editor-page [data-he-id][data-he-type="image"]').forEach(attachImageEditor);
    };

    const panel = {
        title: document.getElementById('siteEditorPanelTitle'),
        hint: document.getElementById('siteEditorPanelHint'),
        textFields: document.getElementById('siteEditorTextFields'),
        linkFields: document.getElementById('siteEditorLinkFields'),
        imageFields: document.getElementById('siteEditorImageFields'),
        textContent: document.getElementById('siteEditorTextContent'),
        fontFamily: document.getElementById('siteEditorFontFamily'),
        fontSize: document.getElementById('siteEditorFontSize'),
        textAlign: document.getElementById('siteEditorTextAlign'),
        positionEnabled: document.getElementById('siteEditorPositionEnabled'),
        linkContent: document.getElementById('siteEditorLinkContent'),
        linkHref: document.getElementById('siteEditorLinkHref'),
        imageUpload: document.getElementById('siteEditorImageUpload'),
        imageAlt: document.getElementById('siteEditorImageAlt'),
        imagePositionEnabled: document.getElementById('siteEditorImagePositionEnabled'),
    };

    const hidePanels = () => {
        panel.textFields.classList.add('is-hidden');
        panel.linkFields.classList.add('is-hidden');
        panel.imageFields.classList.add('is-hidden');
    };

    const selectDom = (dom) => {
        document.querySelectorAll('[data-he-id].is-selected, .collage-editor-item.is-selected').forEach((node) => {
            node.classList.remove('is-selected');
        });
        if (dom) dom.classList.add('is-selected');
    };

    const selectHome = (id) => {
        const element = getHomeElement(id);
        const dom = document.querySelector(`[data-he-id="${id}"]`);
        if (!element || !dom) return;

        selected = { kind: 'home', id, dom };
        selectDom(dom);
        hidePanels();
        panel.title.textContent = element.label || id;
        panel.hint.textContent = `Seção: ${element.section || '—'}`;

        if (element.type === 'text') {
            panel.textFields.classList.remove('is-hidden');
            panel.textContent.value = element.content || '';
            const textStyle = readTextPanelValues(dom, element);
            panel.fontFamily.value = textStyle.fontFamily;
            panel.fontSize.value = textStyle.fontSize;
            panel.textAlign.value = textStyle.textAlign;
            panel.positionEnabled.checked = !!element.position?.enabled;
        } else if (element.type === 'link') {
            panel.linkFields.classList.remove('is-hidden');
            panel.linkContent.value = element.content || '';
            panel.linkHref.value = element.href || '';
        } else if (element.type === 'image') {
            panel.imageFields.classList.remove('is-hidden');
            panel.imageAlt.value = element.alt || '';
            panel.imagePositionEnabled.checked = !!element.position?.enabled;
            panel.imageUpload.value = '';
            panel.hint.textContent = `${element.label || id} — arraste o canto dourado para redimensionar`;
        }
    };

    const selectCollage = (dom) => {
        const id = dom.dataset.itemId;
        selected = { kind: 'collage', id, dom };
        selectDom(dom);
        hidePanels();
        panel.title.textContent = dom.dataset.label || id;
        panel.hint.textContent = 'Colagem — arraste, redimensione pelo canto ou troque a imagem abaixo.';
        panel.imageFields.classList.remove('is-hidden');
        panel.imageAlt.value = dom.dataset.alt || '';
        panel.imageUpload.value = '';
    };

    const syncTextFieldsToState = () => {
        if (!selected || selected.kind !== 'home') return;
        const element = getHomeElement(selected.id);
        if (!element || element.type !== 'text') return;

        element.content = panel.textContent.value;
        applyFontClass(element, panel.fontFamily.value || null);
        element.font_size = panel.fontSize.value || null;
        element.text_align = panel.textAlign.value || null;
        element.position = element.position || { top: 5, left: 5, width: 90, height: null, z_index: 2 };
        element.position.enabled = panel.positionEnabled.checked;
        if (element.position.enabled && element.position.top == null) {
            element.position.top = 5;
            element.position.left = 5;
        }

        if (element.id === 'atuacao-title') {
            selected.dom.innerHTML = element.content;
        } else {
            selected.dom.textContent = element.content;
        }

        syncDomClasses(selected.dom, element);
        updatePositionRootClass(selected.dom, element);
        syncLiveCss();
        setStatus('Texto atualizado. Salve para gravar.');
    };

    const syncLinkFieldsToState = () => {
        if (!selected || selected.kind !== 'home') return;
        const element = getHomeElement(selected.id);
        if (!element || element.type !== 'link') return;

        element.content = panel.linkContent.value;
        element.href = panel.linkHref.value;
        selected.dom.textContent = element.content;
        if (selected.dom.tagName === 'A') {
            selected.dom.setAttribute('href', element.href);
        }
        setStatus('Link atualizado. Salve para gravar.');
    };

    const syncImageMetaToState = () => {
        if (!selected || selected.kind !== 'home') return;
        const element = getHomeElement(selected.id);
        if (!element || element.type !== 'image') return;

        element.alt = panel.imageAlt.value;
        element.position = element.position || { top: 0, left: 0, width: 100, height: 100, z_index: 2 };
        element.position.enabled = panel.imagePositionEnabled.checked;
        if (element.position.enabled && element.position.top == null) {
            element.position.top = 0;
            element.position.left = 0;
            element.position.width = element.position.width || 100;
            element.position.height = element.position.height || 100;
        }
        if (selected.dom.tagName === 'IMG') {
            selected.dom.alt = element.alt;
        }
        updatePositionRootClass(selected.dom, element);
        syncLiveCss();
        setStatus('Imagem atualizada. Salve para gravar.');
    };

    const startHomeResize = (img, pointerId, clientX, clientY) => {
        const element = getHomeElement(img.dataset.heId);
        const parent = img.parentElement;
        if (!element || !parent) return;

        const rect = parent.getBoundingClientRect();

        interaction = {
            kind: 'home-resize',
            type: 'resize',
            element: img,
            parent,
            item: element,
            pointerId,
            rect,
            startX: clientX,
            startY: clientY,
            startWidth: img.offsetWidth,
            startHeight: img.offsetHeight,
        };

        img.classList.add('is-resizing');
        parent.setPointerCapture(pointerId);
        selectHome(element.id);
    };

    document.querySelectorAll('[data-he-id]').forEach((dom) => {
        dom.addEventListener('click', (event) => {
            if (event.target.closest('[data-home-resize-handle], [data-resize-handle]')) return;
            event.preventDefault();
            event.stopPropagation();
            selectHome(dom.dataset.heId);
        });
    });

    document.querySelectorAll('.collage-editor-item').forEach((dom) => {
        dom.addEventListener('click', (event) => {
            if (event.target.closest('[data-resize-handle]')) return;
            event.stopPropagation();
            selectCollage(dom);
        });
    });

    panel.textContent.addEventListener('input', syncTextFieldsToState);
    panel.fontFamily.addEventListener('change', syncTextFieldsToState);
    panel.fontSize.addEventListener('input', syncTextFieldsToState);
    panel.textAlign.addEventListener('change', syncTextFieldsToState);
    panel.positionEnabled.addEventListener('change', syncTextFieldsToState);
    panel.linkContent.addEventListener('input', syncLinkFieldsToState);
    panel.linkHref.addEventListener('input', syncLinkFieldsToState);
    panel.imageAlt.addEventListener('input', syncImageMetaToState);
    panel.imagePositionEnabled.addEventListener('change', syncImageMetaToState);

    panel.imageUpload.addEventListener('change', async () => {
        const file = panel.imageUpload.files?.[0];
        if (!file || !selected) return;

        const formData = new FormData();
        formData.append('item_id', selected.id);
        formData.append('image', file);

        const route = selected.kind === 'collage'
            ? config.routes.uploadCollage
            : config.routes.uploadHome;

        setStatus('Enviando imagem...');

        try {
            const response = await fetch(route, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrf, Accept: 'application/json' },
                body: formData,
            });
            const payload = await response.json().catch(() => ({}));
            if (!response.ok) throw new Error(payload.message || 'Falha no upload.');

            if (selected.kind === 'collage') {
                const item = collageState.items.find((entry) => entry.id === selected.id);
                if (item) item.src = payload.filename;
                selected.dom.querySelector('img').src = `${payload.url}?t=${Date.now()}`;
            } else {
                const element = getHomeElement(selected.id);
                if (element) element.src = payload.filename;
                if (selected.dom.tagName === 'IMG') {
                    selected.dom.src = `${payload.url}?t=${Date.now()}`;
                }
            }

            setStatus('Imagem salva no servidor.');
            requestAnimationFrame(positionAllHandles);
        } catch (error) {
            setStatus(error.message || 'Erro no upload.', true);
        }
    });

    const startCollageInteraction = (type, element, pointerId, clientX, clientY) => {
        const stage = document.getElementById('collageEditorStage');
        const rect = stage.getBoundingClientRect();
        const item = collageState.items.find((entry) => entry.id === element.dataset.itemId);
        if (!item) return;

        interaction = {
            kind: 'collage',
            type,
            element,
            item,
            pointerId,
            rect,
            startX: clientX,
            startY: clientY,
            startLeft: item.left,
            startTop: item.top,
            startWidth: item.width,
            startHeight: item.height || ((element.offsetHeight / rect.height) * 100),
        };

        element.classList.add(type === 'drag' ? 'is-dragging' : 'is-resizing');
        element.setPointerCapture(pointerId);
        selectCollage(element);
    };

    const startHomeInteraction = (element, pointerId, clientX, clientY) => {
        const item = getHomeElement(element.dataset.heId);
        if (!item?.position?.enabled) return;

        const parent = element.closest('.he-position-root') || element.parentElement;
        const rect = parent.getBoundingClientRect();
        const pos = item.position;

        interaction = {
            kind: 'home',
            type: 'drag',
            element,
            item,
            pointerId,
            rect,
            startX: clientX,
            startY: clientY,
            startLeft: pos.left || 0,
            startTop: pos.top || 0,
            startWidth: pos.width || ((element.offsetWidth / rect.width) * 100),
            startHeight: pos.height || ((element.offsetHeight / rect.height) * 100),
        };

        element.classList.add('is-dragging');
        element.setPointerCapture(pointerId);
        selectHome(item.id);
    };

    const pxToPercent = (px, total) => (px / total) * 100;

    const applyCollageDom = (dom, item) => {
        dom.style.top = `${item.top}%`;
        dom.style.left = `${item.left}%`;
        dom.style.width = `${item.width}%`;
        dom.style.height = item.height ? `${item.height}%` : 'auto';
        dom.style.zIndex = String(item.z_index);
    };

    document.querySelectorAll('.collage-editor-item').forEach((element) => {
        element.addEventListener('pointerdown', (event) => {
            if (event.target.closest('[data-resize-handle]')) return;
            event.preventDefault();
            startCollageInteraction('drag', element, event.pointerId, event.clientX, event.clientY);
        });

        const handle = element.querySelector('[data-resize-handle]');
        if (handle) {
            handle.addEventListener('pointerdown', (event) => {
                event.preventDefault();
                event.stopPropagation();
                startCollageInteraction('resize', element, event.pointerId, event.clientX, event.clientY);
            });
        }
    });

    document.querySelectorAll('[data-he-id]').forEach((element) => {
        element.addEventListener('pointerdown', (event) => {
            if (event.target.closest('[data-home-resize-handle], [data-resize-handle]')) return;
            const item = getHomeElement(element.dataset.heId);
            if (!item?.position?.enabled || item.type === 'link') return;
            event.preventDefault();
            startHomeInteraction(element, event.pointerId, event.clientX, event.clientY);
        });
    });

    const onPointerMove = (event) => {
        if (!interaction || event.pointerId !== interaction.pointerId) return;

        const { rect, startX, startY, startLeft, startTop, startWidth, startHeight, element } = interaction;
        const deltaX = pxToPercent(event.clientX - startX, rect.width);
        const deltaY = pxToPercent(event.clientY - startY, rect.height);

        if (interaction.kind === 'collage') {
            const item = interaction.item;
            if (interaction.type === 'drag') {
                item.left = round(Math.min(100 - item.width, Math.max(0, startLeft + deltaX)));
                item.top = round(Math.min(100 - (item.height || 10), Math.max(0, startTop + deltaY)));
            } else {
                item.width = round(Math.min(100 - item.left, Math.max(2, startWidth + deltaX)));
                item.height = round(Math.min(100 - item.top, Math.max(2, startHeight + deltaY)));
            }
            applyCollageDom(element, item);
            return;
        }

        if (interaction.kind === 'home-resize') {
            const item = interaction.item;
            const img = interaction.element;
            const newWidth = Math.max(24, interaction.startWidth + (event.clientX - interaction.startX));
            const newHeight = Math.max(24, interaction.startHeight + (event.clientY - interaction.startY));
            const widthPercent = round((newWidth / interaction.rect.width) * 100);
            const heightPercent = round((newHeight / interaction.rect.height) * 100);

            if (item.position?.enabled) {
                item.position.width = widthPercent;
                item.position.height = heightPercent;
            } else if (item.id === 'hero-logo') {
                const scale = Math.max(newWidth / interaction.startWidth, newHeight / interaction.startHeight);
                const scaledWidth = interaction.startWidth * scale;
                const logoWidthPercent = round((scaledWidth / interaction.rect.width) * 100);
                const styles = ensureStyles(item);
                styles.width = `${logoWidthPercent}%`;
                styles['max-width'] = 'none';
                delete styles.height;
            } else {
                const styles = ensureStyles(item);
                styles.width = `${widthPercent}%`;
                styles.height = `${heightPercent}%`;
            }

            img.dataset.heResized = '1';
            syncLiveCss();
            return;
        }

        const pos = interaction.item.position;
        pos.left = round(Math.min(100 - (pos.width || 20), Math.max(0, startLeft + deltaX)));
        pos.top = round(Math.min(100 - (pos.height || 20), Math.max(0, startTop + deltaY)));
        syncLiveCss();
    };

    const endInteraction = (event) => {
        if (!interaction || event.pointerId !== interaction.pointerId) return;
        interaction.element.classList.remove('is-dragging', 'is-resizing');
        const captureTarget = interaction.parent || interaction.element;
        if (captureTarget.releasePointerCapture) {
            captureTarget.releasePointerCapture(event.pointerId);
        }
        interaction = null;
        positionAllHandles();
        setStatus('Alteração aplicada. Salve para gravar.');
    };

    window.addEventListener('pointermove', onPointerMove);
    window.addEventListener('pointerup', endInteraction);
    window.addEventListener('pointercancel', endInteraction);

    sectionFilter?.addEventListener('change', () => {
        const value = sectionFilter.value;
        document.querySelectorAll('[data-he-section]').forEach((section) => {
            if (!value) {
                section.style.display = '';
                return;
            }
            section.style.display = section.dataset.heSection === value ? '' : 'none';
        });
        requestAnimationFrame(positionAllHandles);
    });

    const buildHomePayload = () => {
        persistImageStylesFromDom();
        const payload = structuredClone(homeState);
        payload.elements.forEach((element) => {
            ensureStyles(element);
            if (element.upload_dir == null) {
                element.upload_dir = '';
            }
        });
        return payload;
    };

    saveBtn.addEventListener('click', async () => {
        saveBtn.disabled = true;
        setStatus('Salvando...');

        syncLiveCss();

        const homePayload = buildHomePayload();

        try {
            const [collageResponse, homeResponse] = await Promise.all([
                fetch(config.routes.saveCollage, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        Accept: 'application/json',
                    },
                    body: JSON.stringify(collageState),
                }),
                fetch(config.routes.saveHome, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        Accept: 'application/json',
                    },
                    body: JSON.stringify(homePayload),
                }),
            ]);

            const collagePayload = await collageResponse.json().catch(() => ({}));
            const homeResult = await homeResponse.json().catch(() => ({}));

            if (!collageResponse.ok) {
                throw new Error(collagePayload.message || 'Erro ao salvar colagem.');
            }
            if (!homeResponse.ok) {
                throw new Error(homeResult.message || 'Erro ao salvar conteúdo.');
            }

            const generatedLink = document.querySelector('link[href*="home-content.generated.css"]');
            if (generatedLink) {
                const base = generatedLink.href.split('?')[0];
                generatedLink.href = `${base}?t=${Date.now()}`;
            }

            setStatus('Tudo salvo! JSON e CSS atualizados no repositório.');
            homeState = structuredClone(homePayload);
            homeState.elements.forEach((element) => ensureStyles(element));
            syncLiveCss();
        } catch (error) {
            setStatus(error.message || 'Erro ao salvar.', true);
        } finally {
            saveBtn.disabled = false;
        }
    });

    document.querySelectorAll('.site-editor-page .section-block:not(.header-hero)').forEach((section) => {
        section.classList.add('scroll-visible');
    });

    const initEditBadges = () => {
        const attachBadge = (host, variant = '') => {
            if (host.querySelector(':scope > .site-editor-edit-badge')) {
                return;
            }

            const badge = document.createElement('span');
            badge.className = `site-editor-edit-badge${variant ? ` ${variant}` : ''}`;
            badge.innerHTML = '<i class="bi bi-pencil-square" aria-hidden="true"></i>';
            host.appendChild(badge);
        };

        document.querySelectorAll('.site-editor-page [data-he-id]').forEach((element) => {
            element.classList.add('site-editor-editable');
            attachBadge(element);
        });

        document.querySelectorAll('.site-editor-page .collage-editor-item').forEach((element) => {
            attachBadge(element, 'site-editor-edit-badge--collage');
        });
    };

    syncLiveCss();
    initImageEditors();
    initEditBadges();

    if (typeof ResizeObserver !== 'undefined') {
        const page = document.querySelector('.site-editor-page');
        if (page) {
            const observer = new ResizeObserver(() => positionAllHandles());
            observer.observe(page);
        }
    }

    window.addEventListener('resize', positionAllHandles);
})();
