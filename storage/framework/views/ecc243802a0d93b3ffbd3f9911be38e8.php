<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Editor de Colagem — Com Classe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Segoe UI", system-ui, sans-serif;
            background: #1f1b16;
            color: #f7f3eb;
        }
        .login-card {
            width: min(92vw, 420px);
            background: #2b241c;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            padding: 32px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.35);
        }
        h1 {
            margin: 0 0 8px;
            font-size: 1.35rem;
            font-weight: 500;
        }
        p { margin: 0 0 24px; color: #c8bfb0; line-height: 1.5; }
        label { display: block; margin-bottom: 8px; font-size: 0.9rem; }
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.12);
            background: #1a1612;
            color: #fff;
        }
        button {
            margin-top: 18px;
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 999px;
            background: #9a7c43;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }
        .error {
            margin-bottom: 16px;
            padding: 12px 14px;
            border-radius: 8px;
            background: rgba(198, 83, 61, 0.15);
            color: #ffb4a6;
            font-size: 0.92rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Editor da colagem</h1>
        <p>Acesso restrito. Use a URL secreta e a senha definida no servidor.</p>

        <?php if($errors->any()): ?>
            <div class="error"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.collage.login')); ?>">
            <?php echo csrf_field(); ?>
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required autofocus>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ComClasse\resources\views/admin/collage-login.blade.php ENDPATH**/ ?>