@extends('layouts.app')

@section('title', 'Nossos Serviços - Com Classe Assessoria e Cerimonial')

@section('content')
<section id="servicos" class="section-block servicos-section">
    <div class="site-container">
        <div class="servicos-header">
            <p class="eyebrow font-abramo">Nossos Serviços</p>
            <h1 class="font-antic-didone">Serviços Completos para o Seu Casamento</h1>
        </div>

        <div class="servicos-intro">
            <p class="font-antic-didone">Oferecemos uma assessoria completa e personalizada para tornar seu evento único e inesquecível.</p>
        </div>

        <div class="servicos-grid">
            <div class="servico-card">
                <div class="servico-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h3 class="font-antic-didone">Planejamento Detalhado</h3>
                <p>Desenvolvemos um planejamento completo e personalizado, considerando cada detalhe do seu sonho. Desde a escolha do local até a seleção de fornecedores, cuidamos de tudo para que você possa aproveitar cada momento.</p>
                <ul class="servico-lista">
                    <li>Definição de tema e estilo</li>
                    <li>Seleção e negociação com fornecedores</li>
                    <li>Cronograma detalhado do evento</li>
                    <li>Acompanhamento de prazos e entregas</li>
                    <li>Reuniões de alinhamento</li>
                </ul>
            </div>

            <div class="servico-card">
                <div class="servico-icon">
                    <i class="bi bi-palette"></i>
                </div>
                <h3 class="font-antic-didone">Design e Decoração</h3>
                <p>Criamos projetos exclusivos que traduzem a essência do casal. Nossa arquiteta integra o processo criativo desde o início, elevando o olhar técnico e o refinamento de cada detalhe.</p>
                <ul class="servico-lista">
                    <li>Projeto de decoração personalizado</li>
                    <li>Seleção de cores e materiais</li>
                    <li>Design de convites e papelaria</li>
                    <li>Montagem e desmontagem</li>
                    <li>Coordenação de equipes</li>
                </ul>
            </div>

            <div class="servico-card">
                <div class="servico-icon">
                    <i class="bi bi-star"></i>
                </div>
                <h3 class="font-antic-didone">Execução Perfeita</h3>
                <p>No grande dia, nossa equipe está presente para garantir que tudo aconteça conforme planejado. Executamos cada detalhe com precisão, permitindo que vocês desfrutem plenamente do momento.</p>
                <ul class="servico-lista">
                    <li>Coordenação no dia do evento</li>
                    <li>Supervisão de montagem</li>
                    <li>Gestão de timeline</li>
                    <li>Resolução de imprevistos</li>
                    <li>Suporte completo à família</li>
                </ul>
            </div>

            <div class="servico-card">
                <div class="servico-icon">
                    <i class="bi bi-heart"></i>
                </div>
                <h3 class="font-antic-didone">Assessoria Personalizada</h3>
                <p>Oferecemos um atendimento exclusivo e dedicado, cuidando de pessoas, não apenas de eventos. Nosso trabalho começa pela escuta, entendendo seus desejos e transformando-os em realidade.</p>
                <ul class="servico-lista">
                    <li>Atendimento personalizado</li>
                    <li>Acompanhamento durante todo o processo</li>
                    <li>Consultoria em todas as etapas</li>
                    <li>Suporte emocional e logístico</li>
                    <li>Experiência de 16+ anos no mercado</li>
                </ul>
            </div>

            <div class="servico-card">
                <div class="servico-icon">
                    <i class="bi bi-people"></i>
                </div>
                <h3 class="font-antic-didone">Gestão de Fornecedores</h3>
                <p>Selecionamos e coordenamos uma rede exclusiva de fornecedores alinhados com nossos valores de excelência, sensibilidade e elegância. Garantimos qualidade e compromisso em cada escolha.</p>
                <ul class="servico-lista">
                    <li>Curadoria de fornecedores</li>
                    <li>Negociação de contratos</li>
                    <li>Alinhamento de expectativas</li>
                    <li>Coordenação de entregas</li>
                    <li>Garantia de qualidade</li>
                </ul>
            </div>

            <div class="servico-card">
                <div class="servico-icon">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h3 class="font-antic-didone">Resultados Excepcionais</h3>
                <p>Transformamos sonhos em experiências verdadeiramente memoráveis. Cada evento é único e reflete a personalidade do casal, criando momentos que serão lembrados para sempre.</p>
                <ul class="servico-lista">
                    <li>Eventos únicos e personalizados</li>
                    <li>Experiências memoráveis</li>
                    <li>Excelência em cada detalhe</li>
                    <li>Compromisso com a perfeição</li>
                    <li>Satisfação garantida</li>
                </ul>
            </div>
        </div>

        <div class="servicos-valores">
            <h2 class="font-antic-didone">Nossos Diferenciais</h2>
            <div class="valores-grid">
                <div class="valor-item">
                    <h4 class="font-antic-didone">Excelência</h4>
                    <p>Buscamos ser excelentes em cada entrega, com técnica, dedicação e compromisso.</p>
                </div>
                <div class="valor-item">
                    <h4 class="font-antic-didone">Sensibilidade</h4>
                    <p>Cuidamos de pessoas, não apenas de eventos. Nosso trabalho começa pela escuta.</p>
                </div>
                <div class="valor-item">
                    <h4 class="font-antic-didone">Elegância</h4>
                    <p>A elegância está nos detalhes. Harmonia, leveza e bom gosto em tudo o que criamos.</p>
                </div>
                <div class="valor-item">
                    <h4 class="font-antic-didone">Ética</h4>
                    <p>Agir com respeito, verdade e responsabilidade em todas as relações.</p>
                </div>
            </div>
        </div>

        <div class="servicos-cta">
            <p class="subtitle lead-highlight font-antic-didone">Pronto para começar a planejar o casamento dos seus sonhos?</p>
            <h2 class="contact-title font-abramo">Entre em Contato!</h2>
            <div class="contact-cta">
                <a class="btn-primary btn-wide" href="https://assessoriavip.com.br/funnelFormLead/63dada70-1556-11eb-ac90-0d7b933d6c56?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAGngeorDPpsaeKED35hDBrdhCgZt9kz2uzwGDUZHQmP-1zqiKRGbWVFpXrZIac_aem_ZiRNOjiv2hIKL16D8VFcfQ" target="_blank" rel="noopener">Quero falar com a Com Classe</a>
            </div>
        </div>
    </div>
</section>
@endsection
