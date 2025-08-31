<?php
session_start();
require 'db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin'] = $user['username'];
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background: linear-gradient(120deg,#6366f1,#06b6d4); font-family: 'Inter',sans-serif; display:flex;align-items:center;justify-content:center;height:100vh;}
        .login-box { background:rgba(255,255,255,0.25); border-radius:16px; padding:40px 32px; box-shadow:0 8px 32px rgba(31,38,135,0.37); backdrop-filter:blur(8px); width:320px;}
        h2 { text-align:center; color:#6366f1;}
        input { width:100%; padding:10px; margin:10px 0; border-radius:8px; border:1px solid #d1d5db;}
        button { width:100%; padding:10px; background:#6366f1; color:#fff; border:none; border-radius:8px; font-weight:700; cursor:pointer;}
        .error { color:#ef4444; text-align:center; margin-bottom:10px;}
        .logo { display:block; margin:auto; width:48px; margin-bottom:16px;}
    </style>
</head>
<body>
    <form class="login-box" method="post" autocomplete="off">
        <svg class="logo" viewBox="0 0 48 48"><circle cx="24" cy="24" r="20" fill="#6366f1"/><text x="24" y="30" text-anchor="middle" font-size="18" fill="#fff" font-family="Inter">A</text></svg>
        <h2>Admin Login</h2>
        <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
        <input type="text" name="username" placeholder="Usuario" required autofocus>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>