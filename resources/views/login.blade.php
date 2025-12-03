@extends('layouts.app')

@section('title', 'Acesso ao Sistema - Com Classe')

@section('content')
<div class="login-page-container">
    <div class="row g-0 min-vh-100">
        <!-- Coluna da Imagem Lateral -->
        <div class="col-lg-6 login-image-column">
            <div class="login-image-wrapper">
                <div class="login-image-overlay"></div>
                <img src="{{ asset('imagens_hero/1.jpg') }}" alt="Com Classe" class="login-side-image">
                <div class="login-image-content">
                    <img src="{{ asset('logo.png') }}" alt="Com Classe" class="login-image-logo">
                    <h3 class="login-image-title">Comemore seus Sonhos,<br>Celebre Com Classe!</h3>
                    <p class="login-image-subtitle">Desde 2009 criando eventos inesquecíveis</p>
                </div>
            </div>
        </div>

        <!-- Coluna do Formulário -->
        <div class="col-lg-6 login-form-column">
            <div class="login-form-container">
                <div class="login-card">
                    <div class="login-header text-center mb-5">
                        <img src="{{ asset('logo.png') }}" alt="Com Classe" class="login-logo mb-4">
                        <h2 class="h3 fw-light mb-2" style="color: #2c2c2c;">Acesso ao Sistema</h2>
                        <p style="color: #666; font-size: 0.95rem;">Plataforma de gestão Com Classe</p>
                    </div>

                    <div class="login-form-wrapper">
                        <form id="loginForm">
                            <div class="mb-4">
                                <label for="email" class="form-label" style="color: #2c2c2c; font-weight: 500; margin-bottom: 0.5rem;">
                                    <i class="bi bi-envelope me-2" style="color: #d4af37;"></i>Email
                                </label>
                                <input type="email" class="form-control login-input" id="email" name="email" 
                                       placeholder="seu@email.com" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label" style="color: #2c2c2c; font-weight: 500; margin-bottom: 0.5rem;">
                                    <i class="bi bi-lock me-2" style="color: #d4af37;"></i>Senha
                                </label>
                                <div class="password-input-wrapper">
                                    <input type="password" class="form-control login-input" id="password" name="password" 
                                           placeholder="••••••••" required>
                                    <button type="button" class="password-toggle" id="togglePassword">
                                        <i class="bi bi-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember" style="color: #666; font-size: 0.9rem;">
                                        Lembrar-me
                                    </label>
                                </div>
                                <a href="#" class="forgot-password-link" style="color: #d4af37; text-decoration: none; font-size: 0.9rem;">
                                    Esqueceu a senha?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-login w-100 mb-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Entrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Desenvolvimento -->
<div class="modal fade" id="developmentModal" tabindex="-1" aria-labelledby="developmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content development-modal-content">
            <div class="modal-body text-center p-5">
                <div class="development-icon mb-4">
                    <i class="bi bi-tools"></i>
                </div>
                <h4 class="mb-3" style="color: #2c2c2c; font-weight: 300;">Plataforma em Desenvolvimento</h4>
                <p style="color: #666; line-height: 1.8; margin-bottom: 0;">
                    Estamos trabalhando para trazer uma experiência completa de gestão.<br>
                    Em breve você terá acesso a todas as funcionalidades.
                </p>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                    Entendi
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.login-page-container {
    min-height: 100vh;
    padding-top: 76px;
}

.min-vh-100 {
    min-height: 100vh;
}

/* Coluna da Imagem Lateral */
.login-image-column {
    position: relative;
    overflow: hidden;
    display: none;
}

@media (min-width: 992px) {
    .login-image-column {
        display: block;
    }
}

.login-image-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 100vh;
}

.login-side-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
}

.login-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(44, 44, 44, 0.7) 0%, rgba(26, 26, 26, 0.8) 100%);
    z-index: 1;
}

.login-image-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    text-align: center;
}

.login-image-logo {
    max-width: 250px;
    height: auto;
    margin-bottom: 2rem;
    filter: brightness(1.1);
}

.login-image-title {
    color: #ffffff;
    font-size: 2.5rem;
    font-weight: 300;
    line-height: 1.4;
    margin-bottom: 1rem;
    letter-spacing: 1px;
}

.login-image-subtitle {
    color: #d4af37;
    font-size: 1.1rem;
    font-weight: 300;
    letter-spacing: 2px;
    margin: 0;
}

/* Coluna do Formulário */
.login-form-column {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
    padding: 2rem;
}

.login-form-container {
    width: 100%;
    max-width: 500px;
}

.login-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
    padding: 3rem;
}

.login-logo {
    max-width: 200px;
    height: auto;
}

.login-input {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.login-input:focus {
    border-color: #d4af37;
    box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
    outline: none;
}

.password-input-wrapper {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #666;
    cursor: pointer;
    padding: 0;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.password-toggle:hover {
    color: #d4af37;
}

.btn-login {
    background: linear-gradient(135deg, #d4af37 0%, #c19d2e 100%);
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 0.875rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
}

.btn-login:hover {
    background: linear-gradient(135deg, #c19d2e 0%, #b08d26 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
    color: #ffffff;
}

.btn-login:active {
    transform: translateY(0);
}

.forgot-password-link:hover {
    color: #c19d2e !important;
    text-decoration: underline !important;
}

.development-modal-content {
    border-radius: 12px;
    border: none;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
}

.development-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    background: linear-gradient(135deg, #d4af37 0%, #c19d2e 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.development-icon i {
    font-size: 2.5rem;
    color: #ffffff;
}

.btn-close-modal {
    background: #d4af37;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-close-modal:hover {
    background: #c19d2e;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
}

@media (max-width: 991px) {
    .login-form-column {
        min-height: calc(100vh - 76px);
        padding: 1.5rem;
    }
    
    .login-card {
        padding: 2.5rem 2rem;
    }
    
    .login-logo {
        max-width: 180px;
    }
}

@media (max-width: 768px) {
    .login-card {
        padding: 2rem 1.5rem;
    }
    
    .login-logo {
        max-width: 150px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'password') {
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            } else {
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            }
        });
    }
    
    // Handle form submission
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show development modal
            const modal = new bootstrap.Modal(document.getElementById('developmentModal'));
            modal.show();
        });
    }
});
</script>
@endpush
@endsection

