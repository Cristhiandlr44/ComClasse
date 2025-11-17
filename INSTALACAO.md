# Guia de Instalação - Com Classe

## Passo a Passo Rápido

### 1. Instalar Dependências PHP
```bash
composer install
```

### 2. Instalar Dependências Node.js
```bash
npm install
```

### 3. Configurar Ambiente
```bash
# Copiar arquivo de exemplo
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

### 4. Configurar Banco de Dados

Edite o arquivo `.env` e configure:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=comclasse
DB_USERNAME=root
DB_PASSWORD=
```

Crie o banco de dados no MySQL:
```sql
CREATE DATABASE comclasse CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5. Executar Migrations
```bash
php artisan migrate
```

### 6. Compilar Assets

Para desenvolvimento (com hot-reload):
```bash
npm run dev
```

Para produção:
```bash
npm run build
```

### 7. Iniciar Servidor
```bash
php artisan serve
```

Acesse: http://localhost:8000

## Comandos Úteis

### Limpar Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Recriar Banco de Dados
```bash
php artisan migrate:fresh
```

### Ver Rotas
```bash
php artisan route:list
```

## Estrutura de Diretórios Importantes

```
app/
├── Http/
│   └── Controllers/     # Controllers da aplicação
├── Models/              # Models Eloquent
└── Providers/           # Service Providers

resources/
├── views/               # Templates Blade
│   └── layouts/        # Layouts base
├── css/                # Estilos CSS
└── js/                 # JavaScript

routes/
└── web.php             # Rotas web

database/
├── migrations/         # Migrations do banco
└── seeders/           # Seeders para dados iniciais
```

## Próximos Passos

1. Configure o envio de emails no `.env`
2. Adicione imagens na pasta `public/images/`
3. Personalize as cores e estilos em `resources/css/app.css`
4. Configure o domínio no `.env` (APP_URL)

