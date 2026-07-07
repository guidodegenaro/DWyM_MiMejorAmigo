<?php
// Definimos las variables para que las herede la cabecera
$titulo = "Contacto y Emergencias — Mi Mejor Amigo";
$inicio = "index.php"; 

include 'cabecera.php'; 
?>

    <h1 class="titulo">Contacto</h1>

    <section class="seccion">
      <h2 class="subtitulo">Dónde estamos</h2>
      <div class="dato"><span class="dato__valor">Av. Siempre Viva 1234, CABA</span></div>
      <div class="dato"><span class="dato__valor">CP 1414</span></div>
      
      <div class="foto card--menta" style="overflow: hidden;">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0434825119028!2d-58.39965942341781!3d-34.60306195746504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca9538082e3d%3A0x142eead7a17039f3!2sISEC!5e0!3m2!1ses-419!2sar!4v1783386523523!5m2!1ses-419!2sar" 
          style="border:0; width:100%; height:100%;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="strict-origin-when-cross-origin">
        </iframe>
      </div>
    </section>

    <section class="seccion">
      <h2 class="subtitulo">Horarios</h2>
      <p class="texto">Lunes a Viernes, 9 a 20 h<br>Sábados, 9 a 14 h</p>
    </section>

    <section class="seccion">
      <a href="tel:+541145678900" class="boton">Llamar ahora</a>
    </section>

    <section class="seccion">
      <div class="card card--azul">
        <h2 class="subtitulo">Emergencias 24 h</h2>
        <p class="texto" style="margin-bottom:18px">Atención de urgencias
        todos los días, a toda hora.</p>
        <a href="tel:+541199999999" class="boton boton--urgencia">Urgencias 24 h</a>
      </div>
    </section>

<?php 
// Traemos el pie de página que cierra las etiquetas y activa el menú
include 'pie.php'; 
?>