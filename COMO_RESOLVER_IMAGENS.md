# Como Resolver o Problema das Imagens

## Problema
As imagens não carregam porque estão usando URLs externas do Unsplash que podem:
- Requerer conexão com internet
- Ser bloqueadas por firewall
- Ter problemas de CORS

## Soluções

### Opção 1: Usar Imagens Locais (RECOMENDADO)

1. **Criar pasta de imagens:**
```
public/images/
public/images/eventos/
public/images/equipe/
```

2. **Adicionar suas próprias imagens** nessas pastas

3. **Atualizar o código** em `resources/views/home.blade.php`:
```html
<!-- Ao invés de: -->
<img src="https://images.unsplash.com/..." alt="Evento 1">

<!-- Use: -->
<img src="{{ asset('images/eventos/evento1.jpg') }}" alt="Evento 1">
```

### Opção 2: Usar Placeholder Temporário

Já modifiquei o código para usar Picsum Photos (mais confiável) com fallback para placeholders.

### Opção 3: Verificar Conexão

Se as imagens ainda não carregam:
1. Verifique sua conexão com internet
2. Teste abrindo uma URL diretamente no navegador:
   `https://picsum.photos/400/500?random=1`
3. Verifique se há firewall bloqueando

## Status

✅ Código atualizado para usar serviço mais confiável
⚠️ Para produção, recomendo usar imagens locais

