# Por que as Imagens Não Carregam?

## Problema Identificado

Todas as imagens do site estão usando URLs externas do **Unsplash** (`https://images.unsplash.com/...`). Isso pode causar problemas:

1. **Requer conexão com internet** - sem internet, as imagens não carregam
2. **Firewall/Proxy** - podem bloquear acesso ao Unsplash
3. **CORS** - problemas de segurança entre domínios
4. **Lentidão** - dependência de servidor externo

## Solução Imediata

Vou adicionar tratamento de erro nas imagens para que mostrem um placeholder quando não carregarem.

## Solução Definitiva (Recomendado)

### Opção 1: Usar Imagens Locais

1. Crie a pasta de imagens:
   ```
   public/images/
   public/images/eventos/
   public/images/equipe/
   ```

2. Adicione suas próprias imagens (JPG, PNG, etc.)

3. Atualize o código para usar `{{ asset('images/...') }}`

### Opção 2: Usar Placeholder Services

Substituir por serviços como:
- Placeholder.com
- Lorem Picsum
- Imagens locais

## Próximos Passos

Vou modificar o código para adicionar fallback quando as imagens não carregarem.

