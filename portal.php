<?php
require 'sesion.php';
$titulo = 'Portal — Mi Mejor Amigo';
$inicio = 'portal.php';
include 'cabecera.php';
$nombre = $_SESSION['nombre'] ?? 'Dueño';
$primer = explode(' ', trim($nombre))[0];
?>

    <h1 class="titulo">Hola,<br><?= htmlspecialchars($primer) ?></h1>

    <div class="grilla" style="margin-top:8px">
      <a class="card card--azul" href="mis-datos.php">
        Mis datos<span class="flecha">&#8600;</span>
      </a>
      <a class="card card--amarillo" href="mis-mascotas.php">
        Mis mascotas<span class="flecha">&#8600;</span>
      </a>
      <a class="card card--menta" href="turnos.php">
        Pedir turno<span class="flecha">&#8600;</span>
      </a>
      <a class="card card--lavanda" href="logout.php">
        Cerrar sesión<span class="flecha">&#8600;</span>
      </a>
    </div>

<?php include 'pie.php'; ?>
