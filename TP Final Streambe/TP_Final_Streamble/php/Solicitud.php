<?php 
$servidor = "localhost"; 
$usuario = "root"; 
$clave = ""; 
$baseDeDatos = "registro"; 

$enlace = mysqli_connect ($servidor,$usuario,$clave,$baseDeDatos,3307);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleSo.css">
    <title>Document</title>
</head>
<body>
<form action="Pagina.php" method="post">
    <label for="fechaInicial">Fecha Inicial:
        <input type="date" id="fechaInicial">
    </label>
    <label for="dias">Días a Sumar:
        <select type="number" name="dias">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
    </select>
    </label>
    <button onclick="sumarDias()" id="sumar">Sumar Días</button>
    <p id="fechaResultado"></p>
</form>

    <script>
        function sumarDias() {
            var fechaInicial = new Date(document.getElementById("fechaInicial").value);
            var dias = parseInt(document.getElementById("dias").value);
            fechaInicial.setDate(fechaInicial.getDate() + dias);
            document.getElementById("fechaResultado").innerText = "Nueva Fecha: " + fechaInicial.toLocaleDateString;
        }
    </script>
</body>
</html>
<?php
if(isset($_POST['sumar'])){
    $DiasDeVac = $_POST['dias'];
    $FechaFinalizacion = $_POST['fechaResultado'];
    $FechaInicio = $_POST['fechaInicial'];

    $insertarDatos = "INSERT INTO dias_vacaciones VALUES('$DiasDeVac', '$FechaFinalizacion', '$FechaInicio', '')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
}
?>