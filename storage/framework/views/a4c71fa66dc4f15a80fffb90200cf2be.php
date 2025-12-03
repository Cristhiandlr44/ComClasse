

<?php $__env->startSection('title', 'Solicite um Orçamento - Com Classe Assessoria e Cerimonial'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5" style="padding-top: 120px; background: linear-gradient(180deg, #ffffff 0%, #f8f8f8 100%); min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="text-center mb-5">
                    <h1 class="h2 fw-light mb-3" style="color: #2c2c2c; letter-spacing: 1px;">Solicite seu Orçamento</h1>
                    <p style="color: #666; font-size: 1.1rem;">
                        Preencha o formulário abaixo e entraremos em contato o mais breve possível
                    </p>
                </div>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Por favor, corrija os seguintes erros:</strong>
                        <ul class="mb-0 mt-2">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow-sm border-0" style="border-radius: 0;">
                    <div class="card-body p-5">
                        <form action="<?php echo e(route('contact.questionnaire.store')); ?>" method="POST" id="questionnaireForm">
                            <?php echo csrf_field(); ?>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Telefone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="(11) 99999-9999" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="event_type" class="form-label">Tipo do Evento</label>
                                    <select class="form-select" id="event_type" name="event_type">
                                        <option value="">Selecione...</option>
                                        <option value="Casamento" <?php echo e(old('event_type') == 'Casamento' ? 'selected' : ''); ?>>Casamento</option>
                                        <option value="Aniversário" <?php echo e(old('event_type') == 'Aniversário' ? 'selected' : ''); ?>>Aniversário</option>
                                        <option value="Formatura" <?php echo e(old('event_type') == 'Formatura' ? 'selected' : ''); ?>>Formatura</option>
                                        <option value="Corporativo" <?php echo e(old('event_type') == 'Corporativo' ? 'selected' : ''); ?>>Evento Corporativo</option>
                                        <option value="Outro" <?php echo e(old('event_type') == 'Outro' ? 'selected' : ''); ?>>Outro</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="event_date" class="form-label">Data do Evento</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" value="<?php echo e(old('event_date')); ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="guests" class="form-label">Número de Convidados</label>
                                    <input type="number" class="form-control" id="guests" name="guests" value="<?php echo e(old('guests')); ?>" min="1" placeholder="Ex: 100">
                                </div>

                                <div class="col-md-12">
                                    <label for="location" class="form-label">Local / Cidade do Evento</label>
                                    <input type="text" class="form-control" id="location" name="location" value="<?php echo e(old('location')); ?>" placeholder="Ex: São Paulo - SP">
                                </div>

                                <div class="col-md-12">
                                    <label for="observations" class="form-label">Observações</label>
                                    <textarea class="form-control" id="observations" name="observations" rows="5" placeholder="Conte-nos mais sobre seu evento, suas expectativas e qualquer informação adicional que considere importante..."><?php echo e(old('observations')); ?></textarea>
                                </div>
                            </div>

                            <div class="row g-3 mt-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-dark w-100 py-3" style="font-weight: 300; letter-spacing: 1px;">
                                        <i class="bi bi-send me-2"></i>Enviar Solicitação
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="https://wa.me/551143270919?text=Olá! Gostaria de solicitar um orçamento para meu evento." 
                                       target="_blank" 
                                       class="btn btn-success w-100 py-3 d-flex align-items-center justify-content-center"
                                       style="font-weight: 300; letter-spacing: 1px; background-color: #25D366; border: none;">
                                        <i class="bi bi-whatsapp me-2" style="font-size: 1.2rem;"></i>Falar no WhatsApp
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <p style="color: #666;">
                        <i class="bi bi-clock me-2"></i>
                        Responderemos em até 24 horas úteis
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Máscara para telefone
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 11) {
            value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
            if (value.length < 14) {
                value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
            }
        }
        e.target.value = value;
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/questionnaire.blade.php ENDPATH**/ ?>