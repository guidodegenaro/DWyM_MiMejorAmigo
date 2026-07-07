<?php
$titulo = "Éxito — Mi Mejor Amigo";
$inicio = "index.php"; 
include 'cabecera.php'; 
?>

    <div style="min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
      
      <div class="vet__avatar" style="width: 80px; height: 80px; font-size: 32px; background: var(--menta); margin-bottom: 24px;">✓</div>
      
      <h1 class="titulo" style="font-size: 42px; margin-bottom: 16px;">Turno Agendado</h1>
      
      <p class="texto" style="margin-bottom: 40px; opacity: 0.8;">¡Tu cita fue registrada con éxito!<br>Te esperamos en la veterinaria.</p>

      <a href="index.php" class="boton">Volver al inicio</a>
      
    </div>

<?php 
include 'pie.php'; 
?>