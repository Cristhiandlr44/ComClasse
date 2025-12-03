

<?php $__env->startSection('title', 'Contato - Com Classe Assessoria e Cerimonial'); ?>

<?php $__env->startSection('content'); ?>
    <section class="py-5 contact-section section-bg-light" style="padding-top: 100px; min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h1 class="h2 fw-light mb-3" style="color: #2c2c2c;">Entre em Contato</h1>
                        <p style="color: #666; font-size: 1.05rem;">Estamos prontos para tornar seu evento inesquecível</p>
                    </div>
                    
                    <div class="contact-card">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
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
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label contact-label">
                                        <i class="bi bi-person me-2" style="color: #d4af37;"></i>Nome completo
                                    </label>
                                    <input type="text" class="form-control contact-input" id="name" name="name" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label contact-label">
                                        <i class="bi bi-envelope me-2" style="color: #d4af37;"></i>Email
                                    </label>
                                    <input type="email" class="form-control contact-input" id="email" name="email" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="phone" class="form-label contact-label">
                                        <i class="bi bi-telephone me-2" style="color: #d4af37;"></i>Telefone
                                    </label>
                                    <input type="tel" class="form-control contact-input" id="phone" name="phone" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="event_type" class="form-label contact-label">
                                        <i class="bi bi-calendar-event me-2" style="color: #d4af37;"></i>Tipo de Evento
                                    </label>
                                    <input type="text" class="form-control contact-input" id="event_type" name="event_type" placeholder="Ex: Casamento, Aniversário, etc.">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="location" class="form-label contact-label">
                                        <i class="bi bi-geo-alt me-2" style="color: #d4af37;"></i>Local / Cidade do evento
                                    </label>
                                    <input type="text" class="form-control contact-input" id="location" name="location">
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="guests" class="form-label contact-label">
                                        <i class="bi bi-people me-2" style="color: #d4af37;"></i>Convidados
                                    </label>
                                    <input type="number" class="form-control contact-input" id="guests" name="guests" min="1">
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="date" class="form-label contact-label">
                                        <i class="bi bi-calendar me-2" style="color: #d4af37;"></i>Data
                                    </label>
                                    <input type="date" class="form-control contact-input" id="date" name="date">
                                </div>
                                
                                <div class="col-12">
                                    <label for="observations" class="form-label contact-label">
                                        <i class="bi bi-chat-left-text me-2" style="color: #d4af37;"></i>Observações
                                    </label>
                                    <textarea class="form-control contact-input" id="observations" name="observations" rows="5" placeholder="Conte-nos mais sobre seu evento..."></textarea>
                                </div>
                            </div>
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-contact-submit">
                                    <i class="bi bi-send me-2"></i>Enviar Mensagem
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Informações de Contato -->
                    <div class="contact-info-cards mt-5">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="contact-info-card">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <h5 class="mb-2" style="color: #2c2c2c; font-weight: 300;">Email</h5>
                                    <a href="mailto:contato@comclasse.com.br" style="color: #666; text-decoration: none;">
                                        contato@comclasse.com.br
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-info-card">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <h5 class="mb-2" style="color: #2c2c2c; font-weight: 300;">Telefone</h5>
                                    <a href="tel:+551143270919" style="color: #666; text-decoration: none;">
                                        (11) 4327-0919
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-info-card">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-whatsapp"></i>
                                    </div>
                                    <h5 class="mb-2" style="color: #2c2c2c; font-weight: 300;">WhatsApp</h5>
                                    <a href="https://wa.me/551143270919" target="_blank" style="color: #666; text-decoration: none;">
                                        Conversar no WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.contact-section {
    padding-top: 100px !important;
}

.contact-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    padding: 3rem;
    margin-bottom: 2rem;
}

.contact-label {
    color: #2c2c2c;
    font-weight: 500;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
}

.contact-input {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #ffffff;
}

.contact-input:focus {
    border-color: #d4af37;
    box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
    outline: none;
    background: #ffffff;
}

.contact-input::placeholder {
    color: #999;
}

.btn-contact-submit {
    background: linear-gradient(135deg, #d4af37 0%, #c19d2e 100%);
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 0.875rem 2.5rem;
    font-size: 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
}

.btn-contact-submit:hover {
    background: linear-gradient(135deg, #c19d2e 0%, #b08d26 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
    color: #ffffff;
}

.contact-info-cards {
    margin-top: 3rem;
}

.contact-info-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.contact-info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.contact-info-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto 1rem;
    background: linear-gradient(135deg, #d4af37 0%, #c19d2e 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-info-icon i {
    font-size: 1.5rem;
    color: #ffffff;
}

.contact-info-card a:hover {
    color: #d4af37 !important;
    text-decoration: underline !important;
}

.alert {
    border-radius: 8px;
    border: none;
}

@media (max-width: 768px) {
    .contact-section {
        padding-top: 90px !important;
    }
    
    .contact-card {
        padding: 2rem 1.5rem;
    }
    
    .contact-info-card {
        margin-bottom: 1.5rem;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/contact.blade.php ENDPATH**/ ?>