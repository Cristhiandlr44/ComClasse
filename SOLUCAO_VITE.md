# Solução para o Erro do Vite

## Problema
O erro `ViteManifestNotFoundException` ocorre porque os assets ainda não foram compilados.

## Solução

### Opção 1: Compilação para Produção (Recomendado)

Execute os seguintes comandos no terminal na raiz do projeto:

```bash
# 1. Instalar dependências do npm
npm install

# 2. Compilar assets
npm run build

# 3. Limpar cache do Laravel
php artisan config:clear
php artisan view:clear
```

### Opção 2: Usar o Script Automatizado

Execute o arquivo `COMPILAR_ASSETS.bat` que foi criado:

```bash
COMPILAR_ASSETS.bat
```

### Opção 3: Servidor de Desenvolvimento (Hot Reload)

Se você está desenvolvendo e quer hot-reload automático:

```bash
# Terminal 1: Servidor Laravel
php artisan serve

# Terminal 2: Servidor Vite (em outro terminal)
npm run dev
```

Depois acesse: http://localhost:8000

## Verificação

Após compilar, você deve ver os arquivos em:
- `public/build/manifest.json`
- `public/build/assets/app.css`
- `public/build/assets/app.js`

## Notas

- O comando `npm run build` compila os assets para produção
- O comando `npm run dev` inicia o servidor de desenvolvimento do Vite
- Durante o desenvolvimento, use `npm run dev` para hot-reload
- Para produção, use `npm run build` uma vez antes de publicar

