<?php
require 'sesion.php';
require 'conexion.php';

$dni = $_SESSION['dni'];
$id  = (int)($_GET['id'] ?? 0);

/* Verificar que la mascota pertenece al dueño logueado */
$stmt = $conexion->prepare(
  'SELECT Nombre_Mascota, Especie, Raza, Fecha_Nacimiento
     FROM Mascota WHERE id_Mascota = ? AND DNI_Dueno = ?'
);
$stmt->bind_param('is', $id, $dni);
$stmt->execute();
$mascota = $stmt->get_result()->fetch_assoc();

if (!$mascota) {
    $titulo = 'Historial — Mi Mejor Amigo';
    include 'cabecera.php';
    echo '<a href="mis-mascotas.php" class="volver">&#8592; Volver</a>';
    echo '<h1 class="titulo">Historial</h1>';
    echo '<p class="texto">No encontramos esa mascota.</p>';
    include 'pie.php';
    exit;
}

/* Alergias y condiciones previas */
$stmt = $conexion->prepare(
  'SELECT c.Descripcion
     FROM Historial h
     JOIN Condicion_Previa c ON c.id_Condicion = h.id_Condicion
    WHERE h.id_Mascota = ?'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$condiciones = $stmt->get_result();

/* Consultas del historial clínico */
$stmt = $conexion->prepare(
  'SELECT co.id_Consulta, co.Fecha, co.Diagnostico, co.Tratamiento, v.Nombre_Vet, v.Especialidad
     FROM Consulta co
     JOIN Veterinario v ON v.Matricula_Vet = co.Matricula_Vet
    WHERE co.id_Mascota = ?
    ORDER BY co.Fecha DESC'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$consultas = $stmt->get_result();

/* Recetas por consulta */
$recetas = $conexion->prepare(
  'SELECT m.Nombre_Medicamento, r.Frecuencia, r.Cantidades, r.Observaciones
     FROM Recetar r
     JOIN Medicamento m ON m.id_Medicamento = r.id_Medicamento
    WHERE r.id_Consulta = ?'
);

$titulo = 'Historial de ' . $mascota['Nombre_Mascota'];
include 'cabecera.php';
?>

    <a href="mis-mascotas.php" class="volver">&#8592; Volver</a>
    <h1 class="titulo"><?= htmlspecialchars($mascota['Nombre_Mascota']) ?></h1>
    <p class="texto" style="margin-top:-14px;margin-bottom:26px">
      <?= htmlspecialchars($mascota['Especie'] . ' · ' . $mascota['Raza']) ?> ·
      <?= edad_anios($mascota['Fecha_Nacimiento']) ?> años
    </p>

    <?php if ($condiciones->num_rows > 0): ?>
      <section class="seccion">
        <h2 class="subtitulo">&#9888; Alergias y condiciones</h2>
        <div class="card card--lavanda">
          <?php while ($c = $condiciones->fetch_assoc()): ?>
            <p class="texto"><?= htmlspecialchars($c['Descripcion']) ?></p>
          <?php endwhile; ?>
        </div>
      </section>
    <?php endif; ?>

    <section class="seccion">
      <h2 class="subtitulo">Historial clínico</h2>

      <?php if ($consultas->num_rows === 0): ?>
        <p class="texto">Sin consultas registradas.</p>
      <?php endif; ?>

      <?php while ($co = $consultas->fetch_assoc()): ?>
        <article class="card card--azul" style="margin-bottom:16px">
          <div class="etiqueta" style="margin-bottom:4px">
            <?= date('d/m/Y', strtotime($co['Fecha'])) ?> · <?= htmlspecialchars($co['Nombre_Vet']) ?>
          </div>
          <div class="dato"><span class="dato__label">Diagnóstico:</span>
            <span class="dato__valor"><?= htmlspecialchars($co['Diagnostico'] ?? '—') ?></span></div>
          <div class="dato"><span class="dato__label">Tratamiento:</span>
            <span class="dato__valor"><?= htmlspecialchars($co['Tratamiento'] ?? '—') ?></span></div>

          <?php
            $idc = $co['id_Consulta'];
            $recetas->bind_param('i', $idc);
            $recetas->execute();
            $recres = $recetas->get_result();
          ?>
          <?php if ($recres->num_rows > 0): ?>
            <div style="margin-top:12px">
              <div class="etiqueta">Medicamentos recetados</div>
              <?php while ($r = $recres->fetch_assoc()): ?>
                <p class="texto" style="font-size:16px">
                  &#8226; <?= htmlspecialchars($r['Nombre_Medicamento']) ?>
                  — <?= htmlspecialchars($r['Observaciones']) ?>
                </p>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </article>
      <?php endwhile; ?>
    </section>

<?php include 'pie.php'; ?>
