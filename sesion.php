<?php
/* Control de acceso: incluir al inicio de las páginas privadas */
session_start();
if (!isset($_SESSION['dni'])) {
    header('Location: login.php');
    exit;
}
