<?php
/* Cabecera reutilizable.
   Definí $titulo y $inicio antes de incluir este archivo. */
$titulo = $titulo ?? 'Mi Mejor Amigo';
$inicio = $inicio ?? 'portal.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($titulo) ?></title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <main class="pantalla">
    <header class="top">
      <a href="<?= $inicio ?>" class="logo">Mi Mejor Amigo</a>
      
      <button class="menu" id="btn-menu" aria-label="Abrir menú">
        <span></span><span></span><span></span>
      </button>

      <nav class="nav-menu" id="nav-enlaces">
        <ul>
          <li><a href="nosotros.php">Nosotros</a></li>
          <li><a href="especialidades.php">Especialidades y Staff</a></li>
          <li><a href="contacto.php">Contacto y Emergencias</a></li>
        </ul>
      </nav>
    </header>