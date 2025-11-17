# Com Classe Assessoria e Cerimonial

Sistema completo para gestão de assessoria e cerimonial de casamentos.

## Sobre o Projeto

Este é um sistema desenvolvido em Laravel 10 com Bootstrap 5 para a empresa **Com Classe Assessoria e Cerimonial**.

**Slogan:** Comemore seus Sonhos, Celebre Com Classe!

O sistema foi projetado para ser simples, moderno e muito elegante, inspirado em referências de design minimalista e sofisticado.

## Tecnologias Utilizadas

- **Laravel 10** - Framework PHP
- **Bootstrap 5** - Framework CSS
- **Vite** - Build tool para assets
- **MySQL** - Banco de dados

## Requisitos

- PHP >= 8.1
- Composer
- Node.js >= 16
- MySQL >= 5.7

## Instalação

1. Clone o repositório:
```bash
git clone [url-do-repositorio]
cd ComClasse
```

2. Instale as dependências do PHP:
```bash
composer install
```

3. Instale as dependências do Node.js:
```bash
npm install
```

4. Configure o arquivo `.env`:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure as variáveis de ambiente no `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=comclasse
DB_USERNAME=root
DB_PASSWORD=
```

6. Execute as migrations:
```bash
php artisan migrate
```

7. Compile os assets:
```bash
npm run build
```

Ou para desenvolvimento com hot-reload:
```bash
npm run dev
```

8. Inicie o servidor de desenvolvimento:
```bash
php artisan serve
```

O site estará disponível em: `http://localhost:8000`

## Estrutura do Projeto

### Site Institucional (Atual)

- **Homepage** - Página principal com informações sobre a empresa
- **Seção Sobre** - O que fazemos, como fazemos e por quê fazemos
- **Seção Serviços** - Apresentação dos serviços oferecidos
- **Seção Contato** - Formulários de contato e solicitação de orçamento

### Estrutura Preparada para Futuras Funcionalidades

O projeto está preparado para expansão com:

- **Sistema de Contatos** - Model e migration para armazenar contatos e orçamentos
- **Sistema de Sessões** - Configurado para uso futuro
- **Sistema de Cache** - Configurado para performance
- **Estrutura de Controllers** - Organizada para fácil expansão

## Funcionalidades Atuais

- ✅ Site institucional elegante e responsivo
- ✅ Formulário de contato
- ✅ Formulário de solicitação de orçamento
- ✅ Validação de formulários
- ✅ Design moderno e elegante
- ✅ Navegação suave (smooth scroll)
- ✅ Layout responsivo

## Próximas Funcionalidades (Planejadas)

- [ ] Painel administrativo
- [ ] Gestão de eventos
- [ ] Galeria de fotos
- [ ] Blog/Notícias
- [ ] Sistema de depoimentos
- [ ] Integração com email
- [ ] Dashboard de estatísticas

## Desenvolvimento

### Compilar Assets

Para desenvolvimento:
```bash
npm run dev
```

Para produção:
```bash
npm run build
```

### Executar Migrations

```bash
php artisan migrate
```

### Limpar Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Contribuição

Este é um projeto privado da Com Classe Assessoria e Cerimonial.

## Licença

Proprietário - Com Classe Assessoria e Cerimonial

---

**Desenvolvido com ❤️ para Com Classe Assessoria e Cerimonial**

