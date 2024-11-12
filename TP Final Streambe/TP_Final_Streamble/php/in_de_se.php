<?php 
session_start();
include('Conexion.php');

if(isset($_POST['contrasena']) && isset($_POST['nombre'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validate($_POST['nombre']);
    $contrasena = validate($_POST['contrasena']);

    if(empty($usuario)){
        header("Location: Inicio_de_sesion.php?error=El usuario es requerido");
        exit();
    }
    elseif(empty($contrasena)){
        header("Location: Inicio_de_sesion.php?error=La contraseña es requerida");
        exit();
    } else {
        // Utilizamos una consulta preparada
        $stmt = mysqli_prepare($enlace, "SELECT * FROM datos WHERE nombre = ? AND contraseña = ?");
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            echo "<script>console.log('Error en la consulta SQL: " . mysqli_error($enlace) . "');</script>";
            exit();
        }

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['nombre_completo'] = $row['nombre_completo'];
            $_SESSION['id'] = $row['id'];
            header("Location: Requerimientos.php");
            exit();
        } else {
            header("Location: Inicio_de_sesion.php?error=El usuario o contraseña es incorrecta");
            exit();
        }
    }
} else {
    header("Location: Inicio_de_sesion.php?error=El usuario es requerido");
    exit();
}
?>
