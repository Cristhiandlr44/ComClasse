

<?php $__env->startSection('title', 'Contato - Com Classe Assessoria e Cerimonial'); ?>

<?php $__env->startSection('content'); ?>
    <section class="section-block contact-section">
        <div class="site-container">
            <p class="eyebrow center">Contato</p>
            <h1 class="center">Compartilhe seus planos com a Com Classe</h1>
            <p class="subtitle center">Responderemos com uma proposta alinhada ao seu momento.</p>

            <?php if(session('success')): ?>
                <div class="alert success" role="alert">
                    <i class="bi bi-check-circle"></i> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert error" role="alert">
                    <i class="bi bi-exclamation-triangle"></i>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="contact-grid">
                <?php echo csrf_field(); ?>
                <label class="field">
                    <span>Nome completo</span>
                    <input type="text" name="name" required>
                </label>
                <label class="field">
                    <span>Email</span>
                    <input type="email" name="email" required>
                </label>
                <label class="field">
                    <span>Telefone</span>
                    <input
                        type="tel"
                        class="js-phone-field"
                        id="phone"
                        value="<?php echo e(old('phone')); ?>"
                        placeholder="(38) 99999-9999"
                        inputmode="numeric"
                        autocomplete="tel"
                        title="Clique para copiar o número"
                        required
                    >
                </label>
                <label class="field">
                    <span>Tipo de evento</span>
                    <input type="text" name="event_type" placeholder="Casamento, aniversário...">
                </label>
                <label class="field">
                    <span>Data</span>
                    <input type="date" name="date">
                </label>
                <label class="field">
                    <span>Cidade / Local</span>
                    <input type="text" name="location">
                </label>
                <label class="field">
                    <span>Número de convidados</span>
                    <input type="number" name="guests" min="1">
                </label>
                <label class="field full">
                    <span>Mensagem</span>
                    <textarea name="observations" rows="4" placeholder="Conte-nos sobre o estilo, expectativas e prioridades."></textarea>
                </label>
                <div class="full center">
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-send"></i> Enviar mensagem
                    </button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ComClasse\resources\views\contact.blade.php ENDPATH**/ ?>