<?php 
$servidor = "localhost"; 
$usuario = "root"; 
$clave = ""; 
$baseDeDatos = "registro"; 

$enlace = mysqli_connect ($servidor,$usuario,$clave,$baseDeDatos,3307);
if (!$enlace) {
    die("Error en la conexión: " . mysqli_connect_error());
} else {
    echo "<script>console.log('Conexión exitosa a la base de datos');</script>";
}
?>