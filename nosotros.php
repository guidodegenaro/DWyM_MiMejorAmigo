<?php
// Definimos las variables para que las use "cabecera.php"
$titulo = "Nosotros — Mi Mejor Amigo";
$inicio = "index.php";

include 'cabecera.php';
?>

    <h1 class="titulo">Nosotros</h1>

    <section class="seccion">
      <h2 class="subtitulo">Quiénes somos</h2>
      <p class="texto">Mi Mejor Amigo nace como un lugar para que nuestras
      mascotas tengan el mejor trato posible. Cuidamos a cada paciente como
      si fuera de la familia.</p>
      <div class="foto" style="background-image:url('perro-con-vete_02.jpeg');background-size:cover;background-position:center"></div>
    </section>

    <section class="seccion">
      <h2 class="subtitulo">Nuestras instalaciones</h2>
      <p class="texto">Contamos con instrumentos y tecnología de última
      generación para diagnósticos precisos y tratamientos seguros.</p>
      <div class="foto" style="background-image:url('esvet-quirofano-vanguardia.jpeg');background-size:cover;background-position:center"></div>
      <div class="foto" style="background-image:url('veterinary-clinic-item-img-1.jpeg');background-size:cover;background-position:center"></div>
    </section>

    <section class="seccion">
      <h2 class="subtitulo">Nuestros valores</h2>
      <div class="chips">
        <span class="chip card--azul">Cariño</span>
        <span class="chip card--menta">Profesionalismo</span>
        <span class="chip card--amarillo">Compromiso</span>
      </div>
    </section>

<?php
// Traemos el pie de página que cierra las etiquetas e incluye el JavaScript de las 3 rayitas
include 'pie.php';
?>
