(function () {
    const config = window.__COLLAGE_EDITOR__;
    if (!config) return;

    const stage = document.getElementById('collageEditorStage');
    const moodboard = document.getElementById('collageEditorMoodboard');
    const itemList = document.getElementById('collageItemList');
    const details = document.getElementById('collageItemDetails');
    const selectedLabel = document.getElementById('collageSelectedLabel');
    const altInput = document.getElementById('collageAltInput');
    const zIndexInput = document.getElementById('collageZIndexInput');
    const uploadInput = document.getElementById('collageUploadInput');
    const saveButton = document.getElementById('collageEditorSave');
    const statusEl = document.getElementById('collageEditorStatus');

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    let state = structuredClone(config.collage);
    let selectedId = null;
    let interaction = null;

    const round = (value, digits = 3) => {
        const factor = 10 ** digits;
        return Math.round(value * factor) / factor;
    };

    const getStageRect = () => stage.getBoundingClientRect();

    const pxToPercent = (px, total) => (px / total) * 100;

    const setStatus = (message, isError = false) => {
        statusEl.textContent = message;
        statusEl.style.color = isError ? '#ffb4a6' : '#c8bfb0';
    };

    const getItemById = (id) => state.items.find((item) => item.id === id);

    const applyItemStyles = (element, item) => {
        element.style.top = `${item.top}%`;
        element.style.left = `${item.left}%`;
        element.style.width = `${item.width}%`;
        element.style.height = item.height ? `${item.height}%` : 'auto';
        element.style.zIndex = String(item.z_index);
        element.dataset.top = String(item.top);
        element.dataset.left = String(item.left);
        element.dataset.width = String(item.width);
        element.dataset.height = item.height ? String(item.height) : '';
        element.dataset.zIndex = String(item.z_index);
        element.dataset.alt = item.alt || '';
        element.dataset.src = item.src;
    };

    const renderList = () => {
        itemList.innerHTML = '';

        state.items.forEach((item) => {
            const li = document.createElement('li');
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = item.label || item.id;
            button.classList.toggle('is-active', item.id === selectedId);
            button.addEventListener('click', () => selectItem(item.id));
            li.appendChild(button);
            itemList.appendChild(li);
        });
    };

    const selectItem = (id) => {
        selectedId = id;
        const item = getItemById(id);
        if (!item) return;

        document.querySelectorAll('.collage-editor-item').forEach((element) => {
            element.classList.toggle('is-selected', element.dataset.itemId === id);
        });

        details.classList.remove('is-hidden');
        selectedLabel.textContent = item.label || item.id;
        altInput.value = item.alt || '';
        zIndexInput.value = String(item.z_index);
        uploadInput.value = '';
        renderList();
    };

    const syncSelectedFields = () => {
        const item = getItemById(selectedId);
        if (!item) return;

        item.alt = altInput.value;
        item.z_index = parseInt(zIndexInput.value, 10) || 0;

        const element = document.querySelector(`.collage-editor-item[data-item-id="${selectedId}"]`);
        if (element) {
            element.style.zIndex = String(item.z_index);
            element.dataset.zIndex = String(item.z_index);
            element.dataset.alt = item.alt;
            element.querySelector('img').alt = item.alt;
        }
    };

    const startInteraction = (type, element, pointerId, clientX, clientY) => {
        const rect = getStageRect();
        const item = getItemById(element.dataset.itemId);
        if (!item) return;

        interaction = {
            type,
            element,
            item,
            pointerId,
            stageRect: rect,
            startX: clientX,
            startY: clientY,
            startLeft: item.left,
            startTop: item.top,
            startWidth: item.width,
            startHeight: item.height || ((element.offsetHeight / rect.height) * 100),
        };

        element.classList.add(type === 'drag' ? 'is-dragging' : 'is-resizing');
        element.setPointerCapture(pointerId);
        selectItem(item.id);
    };

    const onPointerMove = (event) => {
        if (!interaction || event.pointerId !== interaction.pointerId) return;

        const { stageRect, startX, startY, startLeft, startTop, startWidth, startHeight, item, element } = interaction;
        const deltaX = pxToPercent(event.clientX - startX, stageRect.width);
        const deltaY = pxToPercent(event.clientY - startY, stageRect.height);

        if (interaction.type === 'drag') {
            item.left = round(Math.min(100 - item.width, Math.max(0, startLeft + deltaX)));
            item.top = round(Math.min(100 - (item.height || 10), Math.max(0, startTop + deltaY)));
        } else {
            item.width = round(Math.min(100 - item.left, Math.max(2, startWidth + deltaX)));
            item.height = round(Math.min(100 - item.top, Math.max(2, startHeight + deltaY)));
        }

        applyItemStyles(element, item);
    };

    const endInteraction = (event) => {
        if (!interaction || event.pointerId !== interaction.pointerId) return;

        interaction.element.classList.remove('is-dragging', 'is-resizing');
        interaction.element.releasePointerCapture(event.pointerId);
        interaction = null;
        setStatus('Posição atualizada. Clique em Salvar para gravar no site.');
    };

    document.querySelectorAll('.collage-editor-item').forEach((element) => {
        element.addEventListener('pointerdown', (event) => {
            if (event.target.closest('[data-resize-handle]')) return;
            event.preventDefault();
            startInteraction('drag', element, event.pointerId, event.clientX, event.clientY);
        });

        const handle = element.querySelector('[data-resize-handle]');
        if (handle) {
            handle.addEventListener('pointerdown', (event) => {
                event.preventDefault();
                event.stopPropagation();
                startInteraction('resize', element, event.pointerId, event.clientX, event.clientY);
            });
        }
    });

    window.addEventListener('pointermove', onPointerMove);
    window.addEventListener('pointerup', endInteraction);
    window.addEventListener('pointercancel', endInteraction);

    altInput.addEventListener('input', syncSelectedFields);
    zIndexInput.addEventListener('input', syncSelectedFields);

    uploadInput.addEventListener('change', async () => {
        const file = uploadInput.files?.[0];
        const item = getItemById(selectedId);
        if (!file || !item) return;

        const formData = new FormData();
        formData.append('item_id', item.id);
        formData.append('image', file);

        setStatus('Enviando imagem...');

        try {
            const response = await fetch(config.routes.upload, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrf, Accept: 'application/json' },
                body: formData,
            });

            const payload = await response.json().catch(() => ({}));
            if (!response.ok) throw new Error(payload.message || 'Falha no upload.');

            item.src = payload.filename;
            const element = document.querySelector(`.collage-editor-item[data-item-id="${item.id}"] img`);
            if (element) {
                element.src = `${payload.url}?t=${Date.now()}`;
            }

            setStatus('Imagem trocada e salva no servidor.');
        } catch (error) {
            setStatus(error.message || 'Erro ao enviar imagem.', true);
        }
    });

    saveButton.addEventListener('click', async () => {
        saveButton.disabled = true;
        setStatus('Salvando...');

        try {
            const response = await fetch(config.routes.save, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    Accept: 'application/json',
                },
                body: JSON.stringify(state),
            });

            const payload = await response.json().catch(() => ({}));
            if (!response.ok) {
                const validationMessage = payload.errors
                    ? Object.values(payload.errors).flat().join(' ')
                    : '';
                throw new Error(validationMessage || payload.message || 'Não foi possível salvar.');
            }

            setStatus('Salvo! JSON e CSS atualizados no repositório.');
        } catch (error) {
            setStatus(error.message || 'Erro ao salvar.', true);
        } finally {
            saveButton.disabled = false;
        }
    });

    renderList();
    if (state.items.length) {
        selectItem(state.items[0].id);
    }
})();
