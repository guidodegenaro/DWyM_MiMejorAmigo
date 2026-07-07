<?php
// Definimos las variables para que las use "cabecera.php"
$titulo = "Nosotros — Mi Mejor Amigo";
$inicio = "nosotros.php"; // Si renombraste este archivo a index.php, cambiá esto por "index.php"

include 'cabecera.php'; 
?>

    <h1 class="titulo">Nosotros</h1>

    <section class="seccion">
      <h2 class="subtitulo">Quiénes somos</h2>
      <p class="texto">Mi Mejor Amigo nace como un lugar para que nuestras
      mascotas tengan el mejor trato posible. Cuidamos a cada paciente como
      si fuera de la familia.</p>
    </section>

    <section class="seccion">
      <h2 class="subtitulo">Nuestras instalaciones</h2>
      <p class="texto">Contamos con instrumentos y tecnología de última
      generación para diagnósticos precisos y tratamientos seguros.</p>
      <div class="foto card--amarillo">Foto 1</div>
      <div class="foto card--lavanda">Foto 2</div>
    </section>

    <section class="seccion">
      <h2 class="subtitulo">Nuestros valores</h2>
      <div class="chips">
        <span class="chip card--azul">Cariño</span>
        <span class="chip card--menta">Profesionalismo</span>
        <span class="chip card--amarillo">Compromiso</span>
        <span class="chip card--lavanda">Atención 24 h</span>
      </div>
    </section>

<?php 
// Traemos el pie de página que cierra las etiquetas e incluye el JavaScript de las 3 rayitas
include 'pie.php'; 
?>