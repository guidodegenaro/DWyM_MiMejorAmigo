<?php
require 'sesion.php';
require 'conexion.php';

$dni  = $_SESSION['dni'];
$stmt = $conexion->prepare(
  'SELECT d.Nombre_Dueno, d.Telefono, di.Calle, di.Altura, di.CP, di.Depto
     FROM Dueno d
     JOIN Direccion di ON di.id_Direccion = d.id_Direccion
    WHERE d.DNI_Dueno = ?'
);
$stmt->bind_param('s', $dni);
$stmt->execute();
$yo = $stmt->get_result()->fetch_assoc();

$titulo = 'Mis datos — Mi Mejor Amigo';
include 'cabecera.php';
?>

    <a href="portal.php" class="volver">&#8592; Volver</a>
    <h1 class="titulo">Mis datos</h1>

    <div class="card card--azul seccion">
      <div class="dato"><span class="dato__label">Nombre:</span>
        <span class="dato__valor"><?= htmlspecialchars($yo['Nombre_Dueno']) ?></span></div>
      <div class="dato"><span class="dato__label">DNI:</span>
        <span class="dato__valor"><?= htmlspecialchars($dni) ?></span></div>
      <div class="dato"><span class="dato__label">Teléfono:</span>
        <span class="dato__valor"><?= htmlspecialchars($yo['Telefono']) ?></span></div>
      <div class="dato"><span class="dato__label">Dirección:</span>
        <span class="dato__valor">
          <?= htmlspecialchars($yo['Calle'] . ' ' . $yo['Altura']) ?><?= $yo['Depto'] ? ', ' . htmlspecialchars($yo['Depto']) : '' ?>
        </span></div>
      <div class="dato"><span class="dato__label">CP:</span>
        <span class="dato__valor"><?= htmlspecialchars($yo['CP']) ?></span></div>
    </div>

<?php include 'pie.php'; ?>
