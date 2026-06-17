<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Editor de Colagem — Com Classe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom-prod.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/hero-collage.generated.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/collage-editor.css')); ?>">
</head>
<body class="collage-editor-body">
    <header class="collage-editor-toolbar">
        <div class="collage-editor-toolbar__title">
            <strong>Editor da colagem</strong>
            <span>Arraste para posicionar · canto inferior direito para redimensionar</span>
        </div>
        <div class="collage-editor-toolbar__actions">
            <span id="collageEditorStatus" class="collage-editor-status" aria-live="polite"></span>
            <button type="button" id="collageEditorSave" class="collage-editor-btn collage-editor-btn--primary">
                <i class="bi bi-save"></i> Salvar alterações
            </button>
            <form method="POST" action="<?php echo e(route('admin.collage.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="collage-editor-btn">Sair</button>
            </form>
        </div>
    </header>

    <div class="collage-editor-layout">
        <aside class="collage-editor-panel">
            <h2>Peças</h2>
            <ul id="collageItemList" class="collage-editor-list"></ul>

            <div id="collageItemDetails" class="collage-editor-details is-hidden">
                <h3 id="collageSelectedLabel">Peça</h3>
                <label class="collage-editor-field">
                    <span>Texto alternativo</span>
                    <input type="text" id="collageAltInput">
                </label>
                <label class="collage-editor-field">
                    <span>Camada (z-index)</span>
                    <input type="number" id="collageZIndexInput" min="0" max="999">
                </label>
                <label class="collage-editor-field">
                    <span>Trocar imagem</span>
                    <input type="file" id="collageUploadInput" accept="image/jpeg,image/png,image/webp">
                </label>
                <p class="collage-editor-hint">A nova imagem é salva em <code>public/imagens_hero/Colagem/</code>.</p>
            </div>
        </aside>

        <main class="collage-editor-canvas-wrap">
            <div class="collage-editor-stage-shell">
                <div
                    id="collageEditorStage"
                    class="collage-editor-stage hero-moodboard"
                    data-stage-width="<?php echo e($collage['stage']['width'] ?? 1920); ?>"
                    data-stage-height="<?php echo e($collage['stage']['height'] ?? 1080); ?>"
                >
                    <div class="moodboard-stage collage-editor-moodboard-stage" id="collageEditorMoodboard">
                        <?php $__currentLoopData = $collage['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="collage-editor-item <?php echo e(implode(' ', $item['classes'] ?? [])); ?> <?php echo e($item['id']); ?>"
                                data-item-id="<?php echo e($item['id']); ?>"
                                data-top="<?php echo e($item['top']); ?>"
                                data-left="<?php echo e($item['left']); ?>"
                                data-width="<?php echo e($item['width']); ?>"
                                data-height="<?php echo e($item['height'] ?? ''); ?>"
                                data-z-index="<?php echo e($item['z_index']); ?>"
                                data-alt="<?php echo e($item['alt'] ?? ''); ?>"
                                data-src="<?php echo e($item['src']); ?>"
                                data-label="<?php echo e($item['label'] ?? $item['id']); ?>"
                                style="top: <?php echo e($item['top']); ?>%; left: <?php echo e($item['left']); ?>%; width: <?php echo e($item['width']); ?>%; <?php if(!empty($item['height'])): ?> height: <?php echo e($item['height']); ?>%; <?php endif; ?> z-index: <?php echo e($item['z_index']); ?>;"
                            >
                                <img src="<?php echo e($imageBase); ?>/<?php echo e($item['src']); ?>" alt="<?php echo e($item['alt'] ?? ''); ?>">
                                <span class="collage-editor-item__label"><?php echo e($item['label'] ?? $item['id']); ?></span>
                                <span class="collage-editor-resize-handle" data-resize-handle aria-hidden="true"></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        window.__COLLAGE_EDITOR__ = {
            collage: <?php echo json_encode($collage, 15, 512) ?>,
            routes: {
                save: <?php echo json_encode(route('admin.collage.save'), 15, 512) ?>,
                upload: <?php echo json_encode(route('admin.collage.upload'), 15, 512) ?>,
            },
            imageBase: <?php echo json_encode($imageBase, 15, 512) ?>,
        };
    </script>
    <script src="<?php echo e(asset('js/collage-editor.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/admin/collage-editor.blade.php ENDPATH**/ ?>