(function () {
    const config = window.shortLinksAdmin;
    if (!config) return;

    const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';
    const list = document.getElementById('shortLinksList');
    const modal = document.getElementById('shortLinkModal');
    const form = document.getElementById('shortLinkForm');
    const statusEl = document.getElementById('shortLinksStatus');
    const createBtn = document.getElementById('shortLinkCreateBtn');
    const modalTitle = document.getElementById('shortLinkModalTitle');
    const slugInput = document.getElementById('shortLinkSlug');
    const titleInput = document.getElementById('shortLinkTitle');
    const destinationInput = document.getElementById('shortLinkDestination');
    const activeInput = document.getElementById('shortLinkActive');

    let links = Array.isArray(config.links) ? [...config.links] : [];
    let editingId = null;

    const setStatus = (message, type = '') => {
        if (!statusEl) return;
        statusEl.textContent = message;
        statusEl.classList.remove('is-success', 'is-error');
        if (type) statusEl.classList.add(type);
    };

    const normalizeSlug = (value) => value
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/[^a-z0-9-]+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');

    const escapeHtml = (value) => String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');

    const renderCard = (link) => `
        <article class="short-link-card ${link.is_active ? '' : 'is-inactive'}" data-link-id="${link.id}">
            <div class="short-link-card__icon">
                <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
            </div>
            <div class="short-link-card__body">
                <h3>${escapeHtml(link.title || link.slug)}</h3>
                <a href="${escapeHtml(link.public_url)}" target="_blank" rel="noopener" class="short-link-card__path">
                    <i class="bi bi-link-45deg" aria-hidden="true"></i>
                    ${escapeHtml(config.siteHost)}/${escapeHtml(link.slug)}
                </a>
                <p class="short-link-card__dest" title="${escapeHtml(link.destination_url)}">
                    <i class="bi bi-arrow-return-right" aria-hidden="true"></i>
                    ${escapeHtml(link.destination_url)}
                </p>
                <div class="short-link-card__meta">
                    <span><i class="bi bi-eye" aria-hidden="true"></i> ${link.hits} acessos</span>
                    ${link.updated_at ? `<span><i class="bi bi-clock" aria-hidden="true"></i> ${escapeHtml(link.updated_at)}</span>` : ''}
                    ${link.is_active ? '' : '<span class="short-link-card__badge">Inativo</span>'}
                </div>
            </div>
            <div class="short-link-card__actions">
                <button type="button" class="short-link-action" data-action="edit" aria-label="Editar">
                    <i class="bi bi-pencil-square" aria-hidden="true"></i>
                </button>
                <button type="button" class="short-link-action short-link-action--danger" data-action="delete" aria-label="Excluir">
                    <i class="bi bi-trash3" aria-hidden="true"></i>
                </button>
            </div>
        </article>
    `;

    const renderList = () => {
        if (!list) return;

        if (!links.length) {
            list.innerHTML = `
                <div id="shortLinksEmpty" class="short-links-empty">
                    <i class="bi bi-inboxes" aria-hidden="true"></i>
                    <p>Nenhum encaminhamento criado ainda.</p>
                    <button type="button" class="admin-tools-btn admin-tools-btn--primary" data-open-create>
                        <i class="bi bi-plus-circle" aria-hidden="true"></i> Criar o primeiro link
                    </button>
                </div>
            `;
            return;
        }

        list.innerHTML = links.map(renderCard).join('');
    };

    const openModal = (link = null) => {
        editingId = link?.id || null;
        modalTitle.textContent = editingId ? 'Editar encaminhamento' : 'Novo encaminhamento';
        slugInput.value = link?.slug || '';
        titleInput.value = link?.title || '';
        destinationInput.value = link?.destination_url || '';
        activeInput.checked = link ? !!link.is_active : true;
        modal.showModal();
        slugInput.focus();
    };

    const closeModal = () => {
        editingId = null;
        form.reset();
        activeInput.checked = true;
        modal.close();
    };

    const request = async (url, method, payload) => {
        const response = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-CSRF-TOKEN': csrf,
            },
            body: JSON.stringify(payload),
        });

        const data = await response.json().catch(() => ({}));

        if (!response.ok) {
            const message = data.message
                || Object.values(data.errors || {})?.flat()?.[0]
                || 'Não foi possível salvar.';
            throw new Error(message);
        }

        return data;
    };

    form?.addEventListener('submit', async (event) => {
        event.preventDefault();

        const payload = {
            slug: normalizeSlug(slugInput.value.trim()),
            title: titleInput.value.trim() || null,
            destination_url: destinationInput.value.trim(),
            is_active: activeInput.checked,
        };

        try {
            setStatus('Salvando...');
            const data = editingId
                ? await request(`${config.routes.update}/${editingId}`, 'PUT', payload)
                : await request(config.routes.store, 'POST', payload);

            if (editingId) {
                links = links.map((item) => (item.id === editingId ? data.link : item));
            } else {
                links = [data.link, ...links];
            }

            renderList();
            closeModal();
            setStatus(data.message || 'Salvo.', 'is-success');
        } catch (error) {
            setStatus(error.message, 'is-error');
        }
    });

    slugInput?.addEventListener('blur', () => {
        slugInput.value = normalizeSlug(slugInput.value);
    });

    createBtn?.addEventListener('click', () => openModal());
    document.addEventListener('click', (event) => {
        const target = event.target.closest('[data-open-create]');
        if (target) openModal();
    });

    document.querySelectorAll('[data-close-modal]').forEach((button) => {
        button.addEventListener('click', closeModal);
    });

    list?.addEventListener('click', async (event) => {
        const button = event.target.closest('[data-action]');
        if (!button) return;

        const card = button.closest('[data-link-id]');
        const id = Number(card?.dataset.linkId);
        const link = links.find((item) => item.id === id);
        if (!link) return;

        if (button.dataset.action === 'edit') {
            openModal(link);
            return;
        }

        if (button.dataset.action === 'delete') {
            const label = link.title || link.slug;
            if (!window.confirm(`Excluir o encaminhamento "${label}"?`)) return;

            try {
                setStatus('Excluindo...');
                const data = await request(`${config.routes.update}/${id}`, 'DELETE', {});
                links = links.filter((item) => item.id !== id);
                renderList();
                setStatus(data.message || 'Removido.', 'is-success');
            } catch (error) {
                setStatus(error.message, 'is-error');
            }
        }
    });

    renderList();
})();
