<?php
// Home (placa Inicio). Fondo con imagen y contenido pegado abajo.
$titulo = 'Mi Mejor Amigo';
$inicio = 'index.php';
$clase_main = 'pantalla--home';

include 'cabecera.php';
?>

    <div class="home__contenido">
      <h1 class="titulo" style="margin:24px 0 44px">Lo mejor<br>para ellos.</h1>

      <div class="grilla">
        <a class="card card--azul" href="consulta.php">
          Agendar una consulta<span class="flecha">&#8600;</span>
        </a>
        <a class="card card--amarillo" href="contacto.php">
          Contacto<span class="flecha">&#8600;</span>
        </a>
        <a class="card card--lavanda" href="nosotros.php">
          Sobre nosotros<span class="flecha">&#8600;</span>
        </a>
        <a class="card card--menta" href="especialidades.php">
          Especialidades<span class="flecha">&#8600;</span>
        </a>
      </div>
    </div>

<?php include 'pie.php'; ?>
