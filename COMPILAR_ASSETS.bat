@echo off
echo ========================================
echo Compilando Assets do Projeto
echo ========================================
echo.

echo [1/3] Instalando dependencias do npm...
call npm install
if errorlevel 1 (
    echo ERRO: Falha ao instalar dependencias do npm
    pause
    exit /b 1
)

echo.
echo [2/3] Compilando assets para producao...
call npm run build
if errorlevel 1 (
    echo ERRO: Falha ao compilar assets
    pause
    exit /b 1
)

echo.
echo [3/3] Limpando cache do Laravel...
call php artisan config:clear
call php artisan view:clear

echo.
echo ========================================
echo CONCLUIDO!
echo Os assets foram compilados com sucesso.
echo ========================================
pause

