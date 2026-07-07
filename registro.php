<?php
// Placa de registro (maqueta). Hereda la cabecera + menú.
$titulo = 'Crear usuario — Mi Mejor Amigo';
$inicio = 'index.php';

include 'cabecera.php';
?>

    <h1 class="titulo">Crear usuario</h1>

    <form method="post" action="login.php">
      <div class="seccion">
        <label class="etiqueta" for="nombre">Tu nombre y apellido</label>
        <input class="campo" type="text" id="nombre" name="nombre" placeholder="Manuel Sánchez">
      </div>

      <div class="seccion">
        <label class="etiqueta" for="telefono">Tu teléfono</label>
        <input class="campo" type="tel" id="telefono" name="telefono" placeholder="1135246876">
      </div>

      <div class="seccion">
        <label class="etiqueta" for="dni">Tu DNI</label>
        <input class="campo" type="text" id="dni" name="dni" placeholder="30111222" inputmode="numeric">
      </div>

      <button class="boton" type="submit">Crear usuario</button>
    </form>

<?php include 'pie.php'; ?>
