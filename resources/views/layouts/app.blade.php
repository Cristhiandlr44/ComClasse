<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Com Classe Assessoria e Cerimonial')</title>
    <meta name="description" content="@yield('description', 'Comemore seus Sonhos, Celebre Com Classe! Assessoria e Cerimonial de casamentos elegantes e inesquecíveis.')">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="{{ route('home') }}">
                Com Classe
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicos">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#equipe">Equipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="mb-3">Com Classe Assessoria e Cerimonial</h5>
                    <p class="mb-2">Comemore seus Sonhos, Celebre Com Classe!</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-2">
                        <strong>Contato:</strong><br>
                        contato@comclasse.com.br<br>
                        (11) 4327-0919
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Com Classe. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

