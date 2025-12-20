@extends('layouts.app')

@section('title', 'Contato - Com Classe Assessoria e Cerimonial')

@section('content')
    <section class="section-block contact-section">
        <div class="site-container">
            <p class="eyebrow center">Contato</p>
            <h1 class="center">Compartilhe seus planos com a Com Classe</h1>
            <p class="subtitle center">Responderemos com uma proposta alinhada ao seu momento.</p>

            @if(session('success'))
                <div class="alert success" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert error" role="alert">
                    <i class="bi bi-exclamation-triangle"></i>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="contact-grid">
                @csrf
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
                    <input type="tel" name="phone" required>
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
@endsection
