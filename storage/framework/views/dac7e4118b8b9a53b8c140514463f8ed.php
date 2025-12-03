

<?php $__env->startSection('title', 'Contato - Com Classe Assessoria e Cerimonial'); ?>

<?php $__env->startSection('content'); ?>
    <section class="py-5" style="padding-top: 120px; background: #ffffff; min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h1 class="h2 fw-light mb-3" style="color: #2c2c2c;">Entre em Contato</h1>
                        <p style="color: #666;">Estamos prontos para tornar seu evento inesquecível</p>
                    </div>
                    
                    <div class="row g-5">
                        <!-- Formulário de Contato -->
                        <div class="col-md-6">
                            <h3 class="h4 mb-4 fw-light" style="color: #2c2c2c;">Envie uma Mensagem</h3>
                            
                            <?php if(session('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('success')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="contact-form">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome completo</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="event_type" class="form-label">Tipo de Evento</label>
                                    <input type="text" class="form-control" id="event_type" name="event_type">
                                </div>
                                <div class="mb-3">
                                    <label for="guests" class="form-label">Convidados</label>
                                    <input type="number" class="form-control" id="guests" name="guests">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">Cidade do evento</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Data</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <div class="mb-3">
                                    <label for="observations" class="form-label">Observações</label>
                                    <textarea class="form-control" id="observations" name="observations" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 py-2">Enviar</button>
                            </form>
                        </div>

                        <!-- Formulário de Orçamento -->
                        <div class="col-md-6">
                            <h3 class="h4 mb-4 fw-light" style="color: #2c2c2c;">Solicitar Orçamento</h3>
                            
                            <form action="<?php echo e(route('contact.budget')); ?>" method="POST" class="budget-form">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="budget_name" class="form-label">Nome completo</label>
                                    <input type="text" class="form-control" id="budget_name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="budget_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="budget_email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="budget_phone" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" id="budget_phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="budget_event_type" class="form-label">Tipo de Evento</label>
                                    <input type="text" class="form-control" id="budget_event_type" name="event_type">
                                </div>
                                <div class="mb-3">
                                    <label for="budget_guests" class="form-label">Convidados</label>
                                    <input type="number" class="form-control" id="budget_guests" name="guests">
                                </div>
                                <div class="mb-3">
                                    <label for="budget_location" class="form-label">Local / Cidade do evento</label>
                                    <input type="text" class="form-control" id="budget_location" name="location">
                                </div>
                                <div class="mb-3">
                                    <label for="budget_date" class="form-label">Data</label>
                                    <input type="date" class="form-control" id="budget_date" name="date">
                                </div>
                                <div class="mb-3">
                                    <label for="budget_observations" class="form-label">Observações</label>
                                    <textarea class="form-control" id="budget_observations" name="observations" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 py-2">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/contact.blade.php ENDPATH**/ ?>