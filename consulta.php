<?php
// Placa Consulta. Hereda la cabecera + menú.
$titulo = 'Consulta — Mi Mejor Amigo';
$inicio = 'index.php';

include 'cabecera.php';
?>

    <h1 class="titulo">Consulta</h1>

    <form method="post" action="especialidades.php">
      <div class="seccion">
        <label class="etiqueta" for="nombre">Tu nombre y apellido</label>
        <input class="campo" type="text" id="nombre" name="nombre" placeholder="Manuel Sánchez">
      </div>

      <div class="seccion">
        <label class="etiqueta" for="telefono">Tu teléfono</label>
        <input class="campo" type="tel" id="telefono" name="telefono" placeholder="1135246876">
      </div>

      <div class="seccion">
        <label class="etiqueta" for="mascota">El nombre de tu mascota</label>
        <input class="campo" type="text" id="mascota" name="mascota" placeholder="Pequitas">
      </div>

      <button class="boton" type="submit">Seleccionar especialidad</button>
    </form>

<?php include 'pie.php'; ?>
