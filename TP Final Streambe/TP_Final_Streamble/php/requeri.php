<?php 
session_start();
include('Conexion.php'); // Asegúrate de que la conexión esté correctamente configurada

if(isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['contrasena'])){
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validación de campos
    $nombre = validate($_POST['nombre']);
    $apellido = validate($_POST['apellido']);
    $email = validate($_POST['email']);
    $contrasena = validate($_POST['contrasena']);

    // Verificar si algún campo está vacío
    if(empty($nombre)){
        header("Location: Registro.php?error=El nombre es requerido");
        exit();
    }
    elseif(empty($apellido)){
        header("Location: Registro.php?error=El apellido es requerido");
        exit();
    }
    elseif(empty($email)){
        header("Location: Registro.php?error=El email es requerido");
        exit();
    }
    elseif(empty($contrasena)){
        header("Location: Registro.php?error=La contraseña es requerida");
        exit();
    } else {
        // Inserción de datos en la base de datos
        $sql = "INSERT INTO datos (nombre,apellido,correo,contraseña) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($enlace, $sql);
        
        // Encriptar la contraseña antes de guardar
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss", $nombre, $apellido, $email, $hashed_password);
        
        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a Requerimientos.php si la inserción es exitosa
            header("Location: Requerimientos.php");
            exit();
        } else {
            // Mostrar error si no se pudo insertar
            header("Location: Registro.php?error=Error al guardar los datos");
            exit();
        }
    }
} else {
    header("Location: Registro.php?error=Todos los campos son requeridos");
    exit();
}
?>
