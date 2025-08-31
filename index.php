<?php

function traducirDia($dia) {
    $dias = [
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miércoles',
        'Thursday' => 'Jueves',
        'Friday' => 'Viernes',
        'Saturday' => 'Sábado',
        'Sunday' => 'Domingo'
    ];
    return $dias[$dia] ?? $dia;
}

function traducirMes($mes) {
    $meses = [
        'January' => 'Enero',
        'February' => 'Febrero',
        'March' => 'Marzo',
        'April' => 'Abril',
        'May' => 'Mayo',
        'June' => 'Junio',
        'July' => 'Julio',
        'August' => 'Agosto',
        'September' => 'Septiembre',
        'October' => 'Octubre',
        'November' => 'Noviembre',
        'December' => 'Diciembre'
    ];
    return $meses[$mes] ?? $mes;
}

$hora24 = date("H");
$hora12 = date("h:i A"); 

if ($hora24 < 12) {
    $saludo = "¡Buenos días";
} elseif ($hora24 < 18) {
    $saludo = "¡Buenas tardes";
} else {
    $saludo = "¡Buenas noches";
}

$dia = traducirDia(date("l"));
$mes = traducirMes(date("F"));
$fecha = "$dia, " . date("d") . " $mes " . date("Y");
$nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : "";

if ($nombre) {
    $saludo .= ", $nombre!";
} else {
    $saludo .= "!";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Mi Sitio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">    CREATE TABLE usuarios (
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --glass-bg: rgba(255,255,255,0.25);
            --glass-dark-bg: rgba(34,34,34,0.55);
            --border-glass: rgba(255,255,255,0.18);
            --primary: #6366f1;
            --primary-dark: #818cf8;
            --accent: #06b6d4;
            --error: #ef4444;
        }
        html, body {
            height: 100%;
        }
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #6366f1 0%, #06b6d4 100%);
            font-family: 'Inter', Arial, sans-serif;
            color: #222;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.5s, color 0.5s;
        }
        body.dark {
            background: linear-gradient(120deg, #18181b 0%, #1e293b 100%);
            color: #f3f4f6;
        }
        .glass {
            background: var(--glass-bg);
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-glass);
            padding: 48px 32px 32px 32px;
            max-width: 400px;
            width: 100%;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s cubic-bezier(.4,0,.2,1);
        }
        body.dark .glass {
            background: var(--glass-dark-bg);
            border: 1px solid #222;
        }
        .toggle-dark {
            position: absolute;
            top: 24px;
            right: 24px;
            background: none;
            border: none;
            cursor: pointer;
            outline: none;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: filter 0.3s;
            z-index: 2;
        }
        .toggle-dark svg {
            width: 28px;
            height: 28px;
            transition: fill 0.3s;
        }
        h1 {
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -1px;
            color: var(--primary);
        }
        body.dark h1 {
            color: var(--primary-dark);
        }
        .subtitle {
            font-size: 1.1em;
            margin-bottom: 18px;
            color: #555;
        }
        body.dark .subtitle {
            color: #cbd5e1;
        }
        .info {
            font-size: 1em;
            margin-bottom: 8px;
            color: #222;
        }
        body.dark .info {
            color: #f3f4f6;
        }
        form {
            margin-top: 24px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        input[type="text"] {
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 1em;
            background: rgba(255,255,255,0.7);
            color: #222;
            transition: border 0.2s;
        }
        body.dark input[type="text"] {
            background: rgba(34,34,34,0.7);
            color: #f3f4f6;
            border: 1px solid #334155;
        }
        input[type="text"]:focus {
            border: 1.5px solid var(--primary);
            outline: none;
        }
        input[type="submit"], .refresh-btn {
            padding: 10px 18px;
            border-radius: 8px;
            border: none;
            background: var(--primary);
            color: #fff;
            font-weight: 700;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(99,102,241,0.12);
        }
        input[type="submit"]:hover, .refresh-btn:hover {
            background: var(--accent);
        }
        .refresh-btn {
            margin-top: 18px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .refresh-btn svg {
            width: 18px;
            height: 18px;
            vertical-align: middle;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(24px);}
            to { opacity: 1; transform: translateY(0);}
        }
        @media (max-width: 600px) {
            .glass {
                padding: 32px 12px 24px 12px;
                max-width: 98vw;
            }
            h1 { font-size: 1.3em; }
        }
        /* Animación de fondo moderna */
        .animated-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <canvas class="animated-bg"></canvas>
    <div class="glass">
        <button class="toggle-dark" aria-label="Cambiar modo oscuro/claro" title="Modo oscuro/claro">
            <svg id="icon-dark" viewBox="0 0 24 24" fill="none">
                <circle cx="12" cy="12" r="8" stroke="#6366f1" stroke-width="2" fill="#fff"/>
                <path id="moon" d="M17 12a5 5 0 1 1-5-5" stroke="#6366f1" stroke-width="2" fill="none"/>
            </svg>
        </button>
        <h1><?php echo $saludo; ?></h1>
        <div class="subtitle">Bienvenido a mi página web moderna.</div>
        <div class="info">Hoy es <strong><?php echo $fecha; ?></strong></div>
        <div class="info">Hora actual: <strong><?php echo $hora12; ?></strong></div>
        <form method="post" autocomplete="off">
            <input type="text" name="nombre" placeholder="Tu nombre" value="<?php echo $nombre; ?>" maxlength="32" aria-label="Nombre">
            <input type="submit" value="Personalizar saludo">
        </form>
        <button class="refresh-btn" onclick="location.reload()" aria-label="Actualizar saludo">
            <svg viewBox="0 0 24 24" fill="none">
                <path d="M4 4v6h6M20 20v-6h-6" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                <path d="M20 4a8.001 8.001 0 0 0-15.874 2.001M4 20a8.001 8.001 0 0 0 15.874-2.001" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Actualizar
        </button>
    </div>
    <script>
        // Modo oscuro
        const toggle = document.querySelector('.toggle-dark');
        const body = document.body;
        const iconDark = document.getElementById('icon-dark');
        function setDarkMode(on) {
            if (on) {
                body.classList.add('dark');
                localStorage.setItem('dark', '1');
                iconDark.innerHTML = `
                    <circle cx="12" cy="12" r="8" stroke="#818cf8" stroke-width="2" fill="#18181b"/>
                    <path id="moon" d="M17 12a5 5 0 1 1-5-5" stroke="#818cf8" stroke-width="2" fill="none"/>
                `;
            } else {
                body.classList.remove('dark');
                localStorage.setItem('dark', '0');
                iconDark.innerHTML = `
                    <circle cx="12" cy="12" r="8" stroke="#6366f1" stroke-width="2" fill="#fff"/>
                    <path id="moon" d="M17 12a5 5 0 1 1-5-5" stroke="#6366f1" stroke-width="2" fill="none"/>
                `;
            }
        }
        toggle.onclick = () => setDarkMode(!body.classList.contains('dark'));
        if (localStorage.getItem('dark') === '1') setDarkMode(true);

        // Fondo animado moderno
        const canvas = document.querySelector('.animated-bg');
        const ctx = canvas.getContext('2d');
        let circles = [];
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            circles = [];
            for (let i=0; i<18; i++) {
                circles.push({
                    x: Math.random()*canvas.width,
                    y: Math.random()*canvas.height,
                    r: 32+Math.random()*48,
                    dx: (Math.random()-0.5)*0.7,
                    dy: (Math.random()-0.5)*0.7,
                    color: `rgba(${100+Math.random()*155},${100+Math.random()*155},${200+Math.random()*55},0.13)`
                });
            }
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();
        function drawModernBg() {
            ctx.clearRect(0,0,canvas.width,canvas.height);
            for (const c of circles) {
                ctx.beginPath();
                ctx.arc(c.x, c.y, c.r, 0, 2*Math.PI);
                ctx.fillStyle = c.color;
                ctx.fill();
                c.x += c.dx;
                c.y += c.dy;
                if (c.x < -c.r) c.x = canvas.width + c.r;
                if (c.x > canvas.width + c.r) c.x = -c.r;
                if (c.y < -c.r) c.y = canvas.height + c.r;
                if (c.y > canvas.height + c.r) c.y = -c.r;
            }
            requestAnimationFrame(drawModernBg);
        }
        drawModernBg();
    </script>
</body>
</html>