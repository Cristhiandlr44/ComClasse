# Instalação do Node.js para Compilar Assets

## Problema
O projeto requer Node.js/npm para compilar os assets do frontend (CSS e JavaScript). Se você não tem o Node.js instalado, a aplicação agora funciona com uma solução temporária usando CDN.

## Solução Temporária (Já Implementada)
A aplicação está configurada para funcionar **sem** o Node.js instalado, usando:
- Bootstrap via CDN
- CSS e JavaScript customizados diretamente

## Para Produção (Recomendado)

### 1. Instalar Node.js

**Windows:**
1. Baixe o instalador em: https://nodejs.org/
2. Escolha a versão LTS (Long Term Support)
3. Execute o instalador e siga as instruções
4. Reinicie o terminal após a instalação

**Verificar instalação:**
```bash
node --version
npm --version
```

### 2. Instalar Dependências

Após instalar o Node.js, execute no terminal na raiz do projeto:

```bash
npm install
```

### 3. Compilar Assets

Para desenvolvimento (com hot-reload):
```bash
npm run dev
```

Para produção:
```bash
npm run build
```

### 4. Limpar Cache do Laravel

```bash
php artisan config:clear
php artisan view:clear
```

## Status Atual

✅ **A aplicação funciona AGORA sem Node.js** (usando CDN)
⚠️ **Para melhor performance**, instale o Node.js e compile os assets

## Notas

- A solução temporária funciona perfeitamente para desenvolvimento e testes
- Os assets compilados são melhores para produção (menor tamanho, melhor performance)
- Você pode instalar o Node.js quando quiser, a aplicação continuará funcionando

