#!/bin/bash
# Rode no servidor SSH após git pull:
#   bash deploy-layout.sh

set -e
cd "$(dirname "$0")"

echo "==> Descartando CSS estático antigo (se houver conflito no git)"
git checkout -- public/css/hero-collage.generated.css public/css/home-content.generated.css 2>/dev/null || true

echo "==> Atualizando código"
git pull origin main

echo "==> Limpando caches"
php artisan optimize:clear || true
php artisan route:clear
php artisan view:clear
php artisan config:clear

echo "==> Sincronizando JSON -> CSS (backup em disco)"
php artisan site:sync-layout

echo "==> Hash do hero-collage.json:"
md5sum config/hero-collage.json

echo ""
echo "Pronto. Abra o site com Ctrl+F5."
echo "O CSS agora é gerado pelo Laravel a partir de config/hero-collage.json"
