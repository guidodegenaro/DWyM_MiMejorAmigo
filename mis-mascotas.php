<?php
require 'sesion.php';
require 'conexion.php';

$dni  = $_SESSION['dni'];
$stmt = $conexion->prepare(
  'SELECT id_Mascota, Nombre_Mascota, Especie, Raza, Fecha_Nacimiento
     FROM Mascota WHERE DNI_Dueno = ? ORDER BY Nombre_Mascota'
);
$stmt->bind_param('s', $dni);
$stmt->execute();
$mascotas = $stmt->get_result();

$colores = ['card--azul', 'card--amarillo', 'card--menta', 'card--lavanda'];

$titulo = 'Mis mascotas — Mi Mejor Amigo';
include 'cabecera.php';
?>

    <a href="portal.php" class="volver">&#8592; Volver</a>
    <h1 class="titulo">Mis mascotas</h1>

    <?php $i = 0; while ($m = $mascotas->fetch_assoc()): ?>
      <a class="vet <?= $colores[$i % 4] ?>" href="historial.php?id=<?= (int)$m['id_Mascota'] ?>">
        <div class="vet__avatar"><?= mb_strtoupper(mb_substr($m['Nombre_Mascota'], 0, 1)) ?></div>
        <div>
          <div class="vet__nombre"><?= htmlspecialchars($m['Nombre_Mascota']) ?></div>
          <div class="vet__esp"><?= htmlspecialchars($m['Especie'] . ' · ' . $m['Raza']) ?></div>
          <div class="vet__dato"><?= edad_anios($m['Fecha_Nacimiento']) ?> años · Ver historial &#8594;</div>
        </div>
      </a>
    <?php $i++; endwhile; ?>

    <?php if ($i === 0): ?>
      <p class="texto">Todavía no tenés mascotas registradas.</p>
    <?php endif; ?>

<?php include 'pie.php'; ?>
