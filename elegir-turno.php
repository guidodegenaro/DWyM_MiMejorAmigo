<?php
// Recibimos el veterinario seleccionado desde la URL
$vet_elegido = isset($_GET['vet']) ? $_GET['vet'] : '';

// Configuramos los datos según el veterinario seleccionado
$nombre_vet = "Veterinario";
$color_tarjeta = "card--azul"; 

if ($vet_elegido == 'laura-gimenez') {
    $nombre_vet = "Dra. Laura Giménez";
    $color_tarjeta = "card--azul";
} elseif ($vet_elegido == 'martin-rossi') {
    $nombre_vet = "Dr. Martín Rossi";
    $color_tarjeta = "card--menta";
} elseif ($vet_elegido == 'carla-nunez') {
    $nombre_vet = "Dra. Carla Núñez";
    $color_tarjeta = "card--amarillo";
} elseif ($vet_elegido == 'diego-fernandez') {
    $nombre_vet = "Dr. Diego Fernández";
    $color_tarjeta = "card--lavanda";
}

$titulo = "Turnos — Mi Mejor Amigo";
$inicio = "index.php"; 
include 'cabecera.php'; 
?>

    <a href="especialidades.php" class="volver">← Volver al Staff</a>

    <h1 class="titulo">Turno</h1>

    <section class="seccion">
      <div class="card <?php echo $color_tarjeta; ?>" style="margin-bottom: 24px;">
        <h2 class="subtitulo" style="margin-bottom: 0;"><?php echo $nombre_vet; ?></h2>
      </div>
      
      <h2 class="subtitulo">Seleccionar Horario</h2>
      <p class="texto" style="margin-bottom: 16px;">Elegí uno de los turnos disponibles para hoy:</p>
      
      <form action="turno-agendado.php" method="POST">
        <input type="hidden" name="veterinario" value="<?php echo $nombre_vet; ?>">
        
        <select name="horario" class="campo" required>
            <option value="" disabled selected>Ver horarios disponibles...</option>
            <option value="09:30">09:30 h</option>
            <option value="11:00">11:00 h</option>
            <option value="14:30">14:30 h</option>
            <option value="16:00">16:00 h</option>
        </select>

        <button type="submit" class="boton" style="margin-top: 28px;">Reservar Turno</button>
      </form>
    </section>

<?php 
include 'pie.php'; 
?>