<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Placas — Mi Mejor Amigo</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
    * { margin:0; padding:0; box-sizing:border-box; }
    body {
      font-family:'Inter',sans-serif;
      background:#efe7d3;
      color:#252421;
      padding:48px 24px 80px;
      text-align:center;
    }
    h1 { font-weight:900; text-transform:uppercase; font-size:40px; letter-spacing:-1px; }
    .sub { font-weight:500; font-size:17px; margin:10px 0 48px; opacity:.75; }
    .galeria {
      display:flex; flex-wrap:wrap; gap:48px 40px;
      justify-content:center; align-items:flex-start;
    }
    .item { width:310px; }
    .marco {
      width:310px; height:648px;
      border-radius:36px; overflow:hidden;
      border:10px solid #252421;
      background:#fbf5e7;
      box-shadow:0 18px 40px rgba(37,36,33,.18);
    }
    .marco iframe {
      width:430px; height:900px; border:0;
      transform:scale(.674); transform-origin:top left;
    }
    .nombre { font-weight:700; font-size:18px; margin-top:18px; }
    .nombre a { color:#1e9cd3; text-decoration:none; font-size:14px; font-weight:500; }
  </style>
</head>
<body>
  <h1>Mi Mejor Amigo</h1>
  <p class="sub">Placas del sitio · vista mobile</p>

  <div class="galeria">
    <div class="item">
      <div class="marco"><iframe src="index.php" scrolling="no"></iframe></div>
      <div class="nombre">Inicio<br><a href="index.php" target="_blank">abrir pantalla ↗</a></div>
    </div>
    <div class="item">
      <div class="marco"><iframe src="consulta.php" scrolling="no"></iframe></div>
      <div class="nombre">Consulta<br><a href="consulta.php" target="_blank">abrir pantalla ↗</a></div>
    </div>
    <div class="item">
      <div class="marco"><iframe src="nosotros.php" scrolling="no"></iframe></div>
      <div class="nombre">Nosotros<br><a href="nosotros.php" target="_blank">abrir pantalla ↗</a></div>
    </div>
    <div class="item">
      <div class="marco"><iframe src="especialidades.php" scrolling="no"></iframe></div>
      <div class="nombre">Especialidades y Staff<br><a href="especialidades.php" target="_blank">abrir pantalla ↗</a></div>
    </div>
    <div class="item">
      <div class="marco"><iframe src="contacto.php" scrolling="no"></iframe></div>
      <div class="nombre">Contacto y Emergencias<br><a href="contacto.php" target="_blank">abrir pantalla ↗</a></div>
    </div>
  </div>
</body>
</html>
