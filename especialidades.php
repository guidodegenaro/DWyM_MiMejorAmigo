<?php
// Definimos las variables para que las herede la cabecera
$titulo = "Especialidades y Staff — Mi Mejor Amigo";
$inicio = "index.php"; 

include 'cabecera.php'; 
?>

    <h1 class="titulo">Staff</h1>

    <section class="seccion">
      <h2 class="subtitulo">Especialidades</h2>
      <div class="chips">
        <a href="cronograma-especialidad.php?esp=clinica" class="chip card--azul" style="text-decoration: none; color: var(--tinta);">Clínica general</a>
        <a href="cronograma-especialidad.php?esp=cirugia" class="chip card--menta" style="text-decoration: none; color: var(--tinta);">Cirugía</a>
        <a href="cronograma-especialidad.php?esp=dermatologia" class="chip card--amarillo" style="text-decoration: none; color: var(--tinta);">Dermatología</a>
        <a href="cronograma-especialidad.php?esp=traumatologia" class="chip card--lavanda" style="text-decoration: none; color: var(--tinta);">Traumatología</a>
        <a href="cronograma-especialidad.php?esp=odontologia" class="chip card--azul" style="text-decoration: none; color: var(--tinta);">Odontología</a>
      </div>
    </section>

    <section class="seccion">
      <h2 class="subtitulo">Cartilla médica</h2>

      <a href="elegir-turno.php?vet=laura-gimenez" class="vet card--azul">
        <div class="vet__avatar">LG</div>
        <div>
          <div class="vet__nombre">Dra. Laura Giménez</div>
          <div class="vet__esp">Clínica general</div>
          <div class="vet__dato">Matrícula 12456 · Lun a Vie, 9–17 h</div>
        </div>
      </a>

      <a href="elegir-turno.php?vet=martin-rossi" class="vet card--menta">
        <div class="vet__avatar">MR</div>
        <div>
          <div class="vet__nombre">Dr. Martín Rossi</div>
          <div class="vet__esp">Cirugía</div>
          <div class="vet__dato">Matrícula 13890 · Mar y Jue, 10–18 h</div>
        </div>
      </a>

      <a href="elegir-turno.php?vet=carla-nunez" class="vet card--amarillo">
        <div class="vet__avatar">CN</div>
        <div>
          <div class="vet__nombre">Dra. Carla Núñez</div>
          <div class="vet__esp">Dermatología</div>
          <div class="vet__dato">Matrícula 14567 · Lun, Mié y Vie, 8–14 h</div>
        </div>
      </a>

      <a href="elegir-turno.php?vet=diego-fernandez" class="vet card--lavanda">
        <div class="vet__avatar">DF</div>
        <div>
          <div class="vet__nombre">Dr. Diego Fernández</div>
          <div class="vet__esp">Traumatología</div>
          <div class="vet__dato">Matrícula 15234 · Lun a Vie, 14–20 h</div>
        </div>
      </a>

    </section>

<?php 
// Traemos el pie de página que cierra las etiquetas y activa el menú
include 'pie.php'; 
?>