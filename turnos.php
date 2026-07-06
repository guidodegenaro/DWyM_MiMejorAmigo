<?php
require 'sesion.php';
require 'conexion.php';

$dni = $_SESSION['dni'];

/* Veterinarios (para elegir especialidad / profesional) */
$vets = $conexion->query('SELECT Matricula_Vet, Nombre_Vet, Especialidad FROM Veterinario ORDER BY Especialidad');

/* Mascotas del dueño */
$stmt = $conexion->prepare('SELECT id_Mascota, Nombre_Mascota FROM Mascota WHERE DNI_Dueno = ?');
$stmt->bind_param('s', $dni);
$stmt->execute();
$mascotas = $stmt->get_result();

/* Resumen del turno (solo lectura, no se guarda: el diagrama no tiene tabla de turnos) */
$resumen = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resumen = [
        'vet'     => $_POST['vet'] ?? '',
        'mascota' => $_POST['mascota'] ?? '',
        'fecha'   => $_POST['fecha'] ?? '',
    ];
}

$titulo = 'Pedir turno — Mi Mejor Amigo';
include 'cabecera.php';
?>

    <a href="portal.php" class="volver">&#8592; Volver</a>
    <h1 class="titulo">Turno</h1>

    <?php if ($resumen): ?>
      <div class="card card--menta seccion">
        <h2 class="subtitulo">Turno solicitado</h2>
        <div class="dato"><span class="dato__label">Profesional:</span>
          <span class="dato__valor"><?= htmlspecialchars($resumen['vet']) ?></span></div>
        <div class="dato"><span class="dato__label">Mascota:</span>
          <span class="dato__valor"><?= htmlspecialchars($resumen['mascota']) ?></span></div>
        <div class="dato"><span class="dato__label">Fecha:</span>
          <span class="dato__valor"><?= htmlspecialchars($resumen['fecha']) ?></span></div>
      </div>
      <a href="turnos.php" class="volver">Pedir otro turno</a>
    <?php else: ?>

    <form method="post">
      <div class="seccion">
        <label class="etiqueta" for="vet">Especialidad / veterinario</label>
        <select class="campo" name="vet" id="vet" required>
          <option value="" disabled selected>Elegí un profesional</option>
          <?php while ($v = $vets->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($v['Nombre_Vet'] . ' — ' . $v['Especialidad']) ?>">
              <?= htmlspecialchars($v['Nombre_Vet'] . ' — ' . $v['Especialidad']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="seccion">
        <label class="etiqueta" for="mascota">Mascota</label>
        <select class="campo" name="mascota" id="mascota" required>
          <option value="" disabled selected>Elegí tu mascota</option>
          <?php while ($m = $mascotas->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($m['Nombre_Mascota']) ?>">
              <?= htmlspecialchars($m['Nombre_Mascota']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="seccion">
        <label class="etiqueta" for="fecha">Fecha y hora</label>
        <input class="campo" type="datetime-local" name="fecha" id="fecha" required>
      </div>

      <button class="boton" type="submit">Confirmar turno</button>
    </form>

    <?php endif; ?>

<?php include 'pie.php'; ?>
