<?php
session_start();
require 'conexion.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = trim($_POST['dni'] ?? '');
    $stmt = $conexion->prepare('SELECT DNI_Dueno, Nombre_Dueno FROM Dueno WHERE DNI_Dueno = ?');
    $stmt->bind_param('s', $dni);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($fila = $res->fetch_assoc()) {
        $_SESSION['dni']    = $fila['DNI_Dueno'];
        $_SESSION['nombre'] = $fila['Nombre_Dueno'];
        header('Location: portal.php');
        exit;
    } else {
        $error = 'No encontramos ese DNI. Probá con 30111222.';
    }
}

$titulo = 'Ingresar — Mi Mejor Amigo';
$inicio = 'index.php';
include 'cabecera.php';
?>

    <h1 class="titulo">Ingresar</h1>
    <p class="texto">Ingresá con tu DNI para ver tus mascotas y tu historial clínico.</p>

    <form method="post" class="seccion" style="margin-top:26px">
      <label class="etiqueta" for="dni">Tu DNI</label>
      <input class="campo" type="text" id="dni" name="dni"
             placeholder="30111222" inputmode="numeric" autofocus>
      <?php if ($error): ?>
        <p class="texto" style="color:var(--rojo-urgencia);margin-top:12px"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
      <button class="boton" type="submit" style="margin-top:22px">Ingresar</button>
    </form>

    <p class="texto" style="font-size:14px;opacity:.6;margin-top:8px">
      Datos de prueba: DNI 30111222 (Manuel Sánchez).
    </p>

    <p style="font-size:14px;margin-top:10px">
      <a href="registro.php" style="color:var(--azul-fuerte);text-decoration:none">Crear nuevo usuario</a>
    </p>

<?php include 'pie.php'; ?>
