<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background: linear-gradient(120deg,#6366f1,#06b6d4); font-family: 'Inter',sans-serif; min-height:100vh; margin:0;}
        .dashboard { background:rgba(255,255,255,0.25); border-radius:24px; box-shadow:0 8px 32px rgba(31,38,135,0.37); backdrop-filter:blur(12px); padding:48px 32px; max-width:500px; margin:40px auto;}
        h1 { color:#6366f1; }
        .logout { margin-top:24px; padding:10px 18px; background:#ef4444; color:#fff; border:none; border-radius:8px; font-weight:700; cursor:pointer;}
        .welcome { font-size:1.2em; margin-bottom:18px; color:#222;}
        body { transition: background 0.5s;}
        @media (max-width:600px) { .dashboard {padding:24px 8px;} }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Panel de Administración</h1>
        <div class="welcome">Bienvenido, <strong><?= htmlspecialchars($_SESSION['admin']) ?></strong></div>
        <p>Este es tu panel seguro. Aquí puedes agregar más funcionalidades.</p>
        <form method="post" action="logout.php">
            <button class="logout" type="submit">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>