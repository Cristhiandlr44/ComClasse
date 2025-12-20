@extends('layouts.app')

@section('title', 'Acesso ao Sistema - Com Classe')

@section('content')
<div class="login-page-container">
    <div class="row g-0 min-vh-100">
        <!-- Coluna da Imagem Lateral (ESQUERDA) -->
        <div class="col-lg-7 login-image-column">
            <div class="login-image-wrapper">
                <div class="login-image-overlay"></div>
                <img src="{{ asset('imagens_hero/1.jpg') }}" alt="Com Classe" class="login-side-image">
                <div class="login-image-content">
                    <img src="{{ asset('logo.png') }}" alt="Com Classe" class="login-image-logo">
                    <h3 class="login-image-title font-abramo">Comemore seus Sonhos,<br>Celebre Com Classe!</h3>
                    <p class="login-image-subtitle font-antic-didone">Desde 2009 criando eventos inesquecíveis</p>
                </div>
            </div>
        </div>

        <!-- Coluna do Formulário (DIREITA - MAIOR PARTE) -->
        <div class="col-lg-5 login-form-column">
            <div class="login-form-wrapper-inner">
                <div class="login-form-container">
                <div class="login-card">
                    <div class="login-header">
                        <img src="{{ asset('logo.png') }}" alt="Com Classe" class="login-logo">
                        <h2>Acesso ao Sistema</h2>
                        <p>Plataforma de gestão Com Classe</p>
                    </div>

                    <div class="login-form-wrapper">
                        <form id="loginForm">
                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope"></i>Email
                                </label>
                                <input type="email" class="form-control login-input" id="email" name="email" 
                                       placeholder="seu@email.com" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <i class="bi bi-lock"></i>Senha
                                </label>
                                <div class="password-input-wrapper">
                                    <input type="password" class="form-control login-input" id="password" name="password" 
                                           placeholder="••••••••" required>
                                    <button type="button" class="password-toggle" id="togglePassword" aria-label="Mostrar senha">
                                        <i class="bi bi-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-4 login-options">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Lembrar-me
                                    </label>
                                </div>
                                <a href="#" class="forgot-password-link">
                                    Esqueceu a senha?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-login w-100">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Entrar
                            </button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Popup de Desenvolvimento (oculto por padrão, aparece apenas ao tentar logar) -->
<div class="modal fade" id="developmentModal" tabindex="-1" aria-labelledby="developmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content development-modal-content">
            <div class="modal-body text-center p-5">
                <div class="development-icon mb-4">
                    <i class="bi bi-tools"></i>
                </div>
                <h4 class="mb-3">Plataforma em Desenvolvimento</h4>
                <p>
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
/* Remove espaçamentos do layout principal na página de login */
body .page-shell {
    padding: 0;
    margin: 0;
}

.login-page-container {
    min-height: 100vh;
    padding: 0;
    margin: 0;
    background: var(--bg);
    width: 100%;
    overflow-x: hidden;
    position: relative;
}

@media (max-width: 768px) {
    .login-page-container {
        min-height: auto;
        display: flex;
        flex-direction: column;
    }
}

.min-vh-100 {
    min-height: 100vh;
}

@media (max-width: 768px) {
    .min-vh-100 {
        min-height: auto;
    }
}

/* Layout: Imagem à esquerda (maior), Formulário à direita (menor) - APENAS 2 COLUNAS */
.login-page-container .row.g-0 {
    display: flex;
    flex-wrap: nowrap;
    margin: 0 !important;
    padding: 0 !important;
    width: 100%;
    max-width: 100%;
    gap: 0;
}

.login-page-container .row.g-0 > * {
    padding-left: 0 !important;
    padding-right: 0 !important;
}

/* Coluna da Imagem Lateral (ESQUERDA - 60% da tela) */
.login-image-column {
    position: relative;
    overflow: hidden;
    display: none;
    padding: 0 !important;
    margin: 0 !important;
    flex: 0 0 60%;
    max-width: 60%;
    width: 60%;
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
    transition: transform 0.6s ease;
}

.login-image-wrapper:hover .login-side-image {
    transform: scale(1.05);
}

.login-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(45, 42, 40, 0.85) 0%, rgba(26, 24, 22, 0.9) 100%);
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
    max-width: clamp(180px, 20vw, 280px);
    height: auto;
    margin-bottom: 3rem;
    filter: brightness(0) invert(1);
    animation: fadeInUp 0.8s ease;
}

.login-image-title {
    color: #ffffff;
    font-family: 'AnticDidone', 'Playfair Display', 'Times New Roman', serif;
    font-size: clamp(2rem, 3vw, 3rem);
    font-weight: 300;
    line-height: 1.4;
    margin-bottom: 1.5rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    animation: fadeInUp 1s ease 0.2s both;
}

.login-image-subtitle {
    color: var(--accent);
    font-family: 'Playfair Display', 'Times New Roman', serif;
    font-size: clamp(0.95rem, 1.2vw, 1.15rem);
    font-weight: 300;
    letter-spacing: 3px;
    margin: 0;
    text-transform: uppercase;
    animation: fadeInUp 1s ease 0.4s both;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Coluna do Formulário (DIREITA - MAIOR PARTE - 40% da tela) */
.login-form-column {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bg);
    position: relative;
    padding: 0 !important;
    margin: 0 !important;
    flex: 0 0 40%;
    max-width: 40%;
    width: 40%;
}

.login-form-wrapper-inner {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 2rem 1.5rem;
    box-sizing: border-box;
}

@media (max-width: 768px) {
    .login-form-wrapper-inner {
        min-height: auto;
        padding-bottom: 1rem;
    }
}

.login-form-column::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(197, 161, 106, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(197, 161, 106, 0.06) 0%, transparent 50%);
    pointer-events: none;
}

.login-form-container {
    width: 100%;
    max-width: 100%;
    position: relative;
    z-index: 1;
    animation: fadeIn 0.8s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.login-card {
    background: var(--surface);
    border-radius: 20px;
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.08),
        0 0 0 1px rgba(0, 0, 0, 0.02);
    padding: 2rem 1.75rem;
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%;
    text-align: center;
    box-sizing: border-box;
    max-width: 100%;
}

.login-card:hover {
    transform: translateY(-2px);
    box-shadow: 
        0 25px 70px rgba(0, 0, 0, 0.12),
        0 0 0 1px rgba(0, 0, 0, 0.02);
}

.login-header {
    margin-bottom: 2rem;
    text-align: center;
}

.login-logo {
    max-width: clamp(120px, 15vw, 180px);
    height: auto;
    margin-bottom: 1.25rem;
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
}

.login-header h2 {
    font-family: 'AnticDidone', 'Playfair Display', 'Times New Roman', serif;
    color: var(--ink);
    font-size: clamp(1.3rem, 2vw, 1.6rem);
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
}

.login-header p {
    color: var(--muted);
    font-family: 'Playfair Display', 'Times New Roman', serif;
    font-size: 0.95rem;
    letter-spacing: 0.5px;
}

.login-form-wrapper {
    margin-top: 1.5rem;
}

.login-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.form-label {
    font-family: 'Playfair Display', 'Times New Roman', serif;
    color: var(--ink);
    font-weight: 500;
    font-size: 0.95rem;
    letter-spacing: 0.3px;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.form-label i {
    color: var(--accent-dark);
    font-size: 1.1rem;
    margin-right: 0.5rem;
}

.login-input {
    border: 2px solid rgba(107, 99, 90, 0.2);
    border-radius: 12px;
    padding: 0.875rem 1rem;
    font-size: 0.95rem;
    font-family: 'Playfair Display', 'Times New Roman', serif;
    color: var(--ink);
    background: var(--surface);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    width: 100%;
}

.login-input::placeholder {
    color: var(--muted);
    opacity: 0.6;
}

.login-input:focus {
    border-color: var(--accent);
    box-shadow: 
        0 0 0 4px rgba(197, 161, 106, 0.1),
        0 4px 12px rgba(0, 0, 0, 0.05);
    outline: none;
    transform: translateY(-1px);
}

.password-input-wrapper {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 18px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--muted);
    cursor: pointer;
    padding: 0.5rem;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
}

.password-toggle:hover {
    color: var(--accent-dark);
    background: rgba(197, 161, 106, 0.1);
    transform: translateY(-50%) scale(1.1);
}

.form-check-label {
    font-family: 'Playfair Display', 'Times New Roman', serif;
    color: var(--muted);
    font-size: 0.9rem;
    cursor: pointer;
}

.form-check-input {
    width: 1.25rem;
    height: 1.25rem;
    margin-top: 0.125rem;
    cursor: pointer;
    border: 2px solid rgba(107, 99, 90, 0.3);
    border-radius: 4px;
    transition: all 0.3s ease;
}

.form-check-input:checked {
    background-color: var(--accent-dark);
    border-color: var(--accent-dark);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
}

.form-check-input:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 4px rgba(197, 161, 106, 0.1);
    outline: none;
}

.forgot-password-link {
    color: var(--accent-dark) !important;
    text-decoration: none !important;
    font-size: 0.9rem;
    font-family: 'Playfair Display', 'Times New Roman', serif;
    transition: all 0.3s ease;
    position: relative;
}

.forgot-password-link::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 1px;
    background: var(--accent-dark);
    transition: width 0.3s ease;
}

.forgot-password-link:hover {
    color: var(--accent) !important;
}

.forgot-password-link:hover::after {
    width: 100%;
}

.btn-login {
    background: var(--ink);
    color: #ffffff;
    border: none;
    border-radius: 12px;
    padding: 0.875rem 1.75rem;
    font-size: 0.95rem;
    font-family: 'Playfair Display', 'Times New Roman', serif;
    font-weight: 500;
    letter-spacing: 0.5px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
        0 8px 24px rgba(45, 42, 40, 0.2),
        0 0 0 0 rgba(45, 42, 40, 0);
    position: relative;
    overflow: hidden;
}

.btn-login::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s ease;
}

.btn-login:hover::before {
    left: 100%;
}

.btn-login:hover {
    background: var(--ink);
    transform: translateY(-3px);
    box-shadow: 
        0 12px 32px rgba(45, 42, 40, 0.3),
        0 0 0 4px rgba(45, 42, 40, 0.1);
    color: #ffffff;
}

.btn-login:active {
    transform: translateY(-1px);
    box-shadow: 
        0 6px 20px rgba(45, 42, 40, 0.25),
        0 0 0 2px rgba(45, 42, 40, 0.1);
}

.btn-login i {
    margin-right: 0.5rem;
    transition: transform 0.3s ease;
}

.btn-login:hover i {
    transform: translateX(3px);
}

/* Modal Popup de Desenvolvimento - Bootstrap gerencia a exibição */
#developmentModal {
    /* Bootstrap modal gerencia display via classes .show e .fade */
    z-index: 1055; /* Garante que fica acima de outros elementos */
}

#developmentModal .modal-dialog {
    max-width: 500px;
    margin: 1.75rem auto;
}

/* Garante que o modal só aparece quando a classe .show for adicionada pelo Bootstrap */
#developmentModal:not(.show) {
    display: none !important;
}

.development-modal-content {
    border-radius: 20px;
    border: none;
    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
    background: var(--surface);
    overflow: hidden;
}

.development-icon {
    width: 90px;
    height: 90px;
    margin: 0 auto;
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 24px rgba(197, 161, 106, 0.3);
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

.development-icon i {
    font-size: 2.5rem;
    color: #ffffff;
}

.development-modal-content h4 {
    font-family: 'AnticDidone', 'Playfair Display', 'Times New Roman', serif;
    color: var(--ink);
    font-weight: 300;
    font-size: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.development-modal-content p {
    font-family: 'Playfair Display', 'Times New Roman', serif;
    color: var(--muted);
    line-height: 1.8;
    font-size: 1rem;
}

.btn-close-modal {
    background: var(--ink);
    color: #ffffff;
    border: none;
    border-radius: 12px;
    padding: 0.875rem 2.5rem;
    font-family: 'Playfair Display', 'Times New Roman', serif;
    font-weight: 500;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(45, 42, 40, 0.2);
}

.btn-close-modal:hover {
    background: var(--ink);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(45, 42, 40, 0.3);
}

/* Responsive - Tablet */
@media (max-width: 991px) {
    .login-image-column {
        display: none;
    }
    
    .login-form-column {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
        min-height: 100vh;
        padding: 2rem 1.5rem;
    }
    
    .login-form-wrapper-inner {
        padding: 2rem 1.5rem;
    }
    
    .login-card {
        padding: 2.5rem 2rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .login-logo {
        max-width: 160px;
    }
    
    .login-form-container {
        max-width: 100%;
    }
}

/* Responsive - Mobile */
@media (max-width: 768px) {
    .login-page-container {
        padding-top: 0;
    }
    
    .login-form-column {
        padding: 0 !important;
        min-height: auto;
    }
    
    .login-form-wrapper-inner {
        padding: 1.5rem 1rem;
        min-height: auto;
        align-items: flex-start;
        padding-top: 2rem;
        padding-bottom: 1rem;
    }
    
    .login-card {
        padding: 2rem 1.5rem;
        border-radius: 16px;
        box-shadow: 
            0 10px 40px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(0, 0, 0, 0.02);
        margin: 0;
    }
    
    .login-header {
        margin-bottom: 1.5rem;
    }
    
    .login-logo {
        max-width: 140px;
        margin-bottom: 1rem;
    }
    
    .login-header h2 {
        font-size: 1.25rem;
        margin-bottom: 0.4rem;
    }
    
    .login-header p {
        font-size: 0.875rem;
    }
    
    .login-form-wrapper {
        margin-top: 1rem;
    }
    
    .form-label {
        font-size: 0.9rem;
        margin-bottom: 0.6rem;
    }
    
    .login-input {
        padding: 0.75rem 0.875rem;
        font-size: 0.9rem;
        border-radius: 10px;
    }
    
    .password-toggle {
        right: 14px;
        font-size: 1.1rem;
        padding: 0.4rem;
    }
    
    .form-check {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-check-input {
        width: 1.5rem;
        height: 1.5rem;
        margin-top: 0;
        flex-shrink: 0;
    }
    
    .form-check-label {
        font-size: 0.9rem;
        cursor: pointer;
        user-select: none;
        line-height: 1.4;
    }
    
    .forgot-password-link {
        font-size: 0.85rem;
    }
    
    .btn-login {
        padding: 0.875rem 1.5rem;
        font-size: 0.9rem;
        border-radius: 10px;
        margin-bottom: 0 !important;
    }
    
    .mb-4 {
        margin-bottom: 1.25rem !important;
    }
    
    .login-form-wrapper {
        margin-bottom: 0;
    }
    
    .login-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }
    
    .login-options .form-check {
        width: 100%;
    }
    
    .forgot-password-link {
        align-self: flex-end;
    }
}

/* Responsive - Mobile Pequeno */
@media (max-width: 480px) {
    .login-form-wrapper-inner {
        padding: 1rem 0.75rem;
        padding-top: 1.5rem;
        padding-bottom: 0.75rem;
    }
    
    .login-card {
        padding: 1.5rem 1.25rem;
        border-radius: 14px;
    }
    
    .login-logo {
        max-width: 120px;
        margin-bottom: 0.875rem;
    }
    
    .login-header h2 {
        font-size: 1.1rem;
    }
    
    .login-header p {
        font-size: 0.8rem;
    }
    
    .form-label {
        font-size: 0.85rem;
    }
    
    .login-input {
        padding: 0.7rem 0.8rem;
        font-size: 0.875rem;
    }
    
    .btn-login {
        padding: 0.8rem 1.25rem;
        font-size: 0.875rem;
    }
    
    .mb-4 {
        margin-bottom: 1rem !important;
    }
    
    .login-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .login-options .form-check {
        width: 100%;
    }
    
    .forgot-password-link {
        align-self: flex-end;
        font-size: 0.8rem;
    }
    
    /* Modal responsivo */
    #developmentModal .modal-dialog {
        margin: 0.5rem;
        max-width: calc(100% - 1rem);
    }
    
    .development-modal-content {
        border-radius: 16px;
    }
    
    .development-modal-content .modal-body {
        padding: 2rem 1.5rem !important;
    }
    
    .development-icon {
        width: 70px;
        height: 70px;
    }
    
    .development-icon i {
        font-size: 2rem;
    }
    
    .development-modal-content h4 {
        font-size: 1.2rem;
    }
    
    .development-modal-content p {
        font-size: 0.9rem;
        line-height: 1.6;
    }
    
    .btn-close-modal {
        padding: 0.75rem 2rem;
        font-size: 0.9rem;
    }
    
    .btn-login {
        margin-bottom: 0 !important;
    }
    
    .login-form-wrapper {
        margin-bottom: 0;
        padding-bottom: 0;
    }
}

/* Ajustes adicionais para melhor experiência mobile */
@media (max-width: 768px) {
    /* Previne zoom ao focar em inputs no iOS */
    input[type="email"],
    input[type="password"],
    input[type="text"] {
        font-size: 16px !important;
    }
    
    /* Melhora o toque em elementos interativos */
    .password-toggle,
    .form-check-input,
    .btn-login {
        min-height: 44px;
        min-width: 44px;
    }
    
    /* Ajusta espaçamento do container */
    .login-page-container {
        overflow-x: hidden;
    }
    
    /* Garante que o card não ultrapasse a largura da tela */
    .login-card {
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
    }
}

/* Landscape mobile */
@media (max-width: 768px) and (orientation: landscape) {
    .login-form-wrapper-inner {
        padding-top: 1rem;
        padding-bottom: 1rem;
        min-height: auto;
    }
    
    .login-card {
        padding: 1.5rem 1.25rem;
    }
    
    .login-header {
        margin-bottom: 1rem;
    }
    
    .login-logo {
        max-width: 100px;
        margin-bottom: 0.5rem;
    }
    
    .login-header h2 {
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }
    
    .login-header p {
        font-size: 0.75rem;
    }
    
    .mb-4 {
        margin-bottom: 0.75rem !important;
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
    
    // Handle form submission - Modal aparece quando tentar fazer login
    const loginForm = document.getElementById('loginForm');
    const developmentModal = document.getElementById('developmentModal');
    
    if (loginForm && developmentModal) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validação básica dos campos
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            
            if (!email || !password) {
                return;
            }
            
            // Mostra o modal popup quando o formulário é submetido
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                // Remove qualquer instância anterior do modal
                const existingModal = bootstrap.Modal.getInstance(developmentModal);
                if (existingModal) {
                    existingModal.dispose();
                }
                
                // Cria e mostra o modal
                const modal = new bootstrap.Modal(developmentModal, {
                    backdrop: true,
                    keyboard: true,
                    focus: true
                });
                modal.show();
            } else {
                // Fallback caso Bootstrap não esteja carregado
                console.error('Bootstrap não está carregado. Por favor, recarregue a página.');
            }
        });
    }
});
</script>
@endpush
@endsection

