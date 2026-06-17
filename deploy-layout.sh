#!/bin/bash
set -e
cd "$(dirname "$0")"

echo "==> Restaurando JSON e removendo CSS estático antigo"
git checkout -- config/hero-collage.json config/home-content.json
rm -f public/css/hero-collage.generated.css public/css/home-content.generated.css

echo "==> Atualizando código"
git pull origin main

echo "==> Limpando caches"
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan optimize:clear

echo "==> Backup do CSS em storage"
php artisan site:sync-layout

echo "==> MD5 do JSON da colagem (deve bater com o local):"
md5sum config/hero-collage.json

echo ""
echo "Teste no navegador: https://comclasse.com.br/css/hero-collage.generated.css"
echo "A 2ª linha deve conter: config-hash:"
echo "No DevTools > Network, o header X-Site-Layout deve ser: hero-collage-dynamic"
