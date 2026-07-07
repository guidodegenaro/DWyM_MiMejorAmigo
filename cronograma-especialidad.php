<?php
// Recibimos la especialidad elegida
$esp_elegida = isset($_GET['esp']) ? $_GET['esp'] : '';

// Configuramos nombre visible y color estético según el diseño
$nombre_esp = "Especialidad";
$color_tarjeta = "card--azul"; 

if ($esp_elegida == 'clinica') {
    $nombre_esp = "Clínica general";
    $color_tarjeta = "card--azul";
} elseif ($esp_elegida == 'cirugia') {
    $nombre_esp = "Cirugía";
    $color_tarjeta = "card--menta";
} elseif ($esp_elegida == 'dermatologia') {
    $nombre_esp = "Dermatología";
    $color_tarjeta = "card--amarillo";
} elseif ($esp_elegida == 'traumatologia') {
    $nombre_esp = "Traumatología";
    $color_tarjeta = "card--lavanda";
} elseif ($esp_elegida == 'odontologia') {
    $nombre_esp = "Odontología";
    $color_tarjeta = "card--azul";
}

$titulo = "Cronograma — Mi Mejor Amigo";
$inicio = "index.php"; 
include 'cabecera.php'; 
?>

    <a href="especialidades.php" class="volver">← Volver al Staff</a>

    <h1 class="titulo">Horarios</h1>

    <section class="seccion">
      <div class="card <?php echo $color_tarjeta; ?>" style="margin-bottom: 24px;">
        <h2 class="subtitulo" style="margin-bottom: 0;"><?php echo $nombre_esp; ?></h2>
      </div>
      
      <h2 class="subtitulo">Cronograma disponible</h2>
      <p class="texto" style="margin-bottom: 16px;">Seleccioná el horario que mejor te convenga:</p>
      
      <form action="turno-agendado.php" method="POST">
        <select name="horario" class="campo" required>
            <option value="" disabled selected>Elegir un horario...</option>
            <option value="08:00">08:00 h</option>
            <option value="10:30">10:30 h</option>
            <option value="15:00">15:00 h</option>
            <option value="17:30">17:30 h</option>
        </select>

        <button type="submit" class="boton" style="margin-top: 28px;">Agendar</button>
      </form>
    </section>

<?php 
include 'pie.php'; 
?>