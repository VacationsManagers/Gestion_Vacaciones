<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/styleR.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<form action="requeri.php" method="post">
        <h1 class="title">Registro</h1>
        <hr> 
        <?php
        if(isset($_GET['error'])){
            ?>
            <p class="error">
                <?php
                echo $_GET['error']
                ?>
            </p>
        <?php
            }
        ?>
        <hr>
        <label>
            <i class="fa-solid fa-user"></i>
            <input placeholder ="Nombre de usuario" type ="text" name="nombre" >
        </label>
        <label>
            <i class="fa-solid fa-a"></i>
            <input placeholder="Apellido" type="text" name="apellido">
        </label>
        <label>
            <i class="fa-solid fa-at"></i>
            <input placeholder="Correo" type="email" name="email" >
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input placeholder="Contraseña" type="password" name="contrasena">
        </label>       
        <input type="submit" name="registro">
        
        
        
</form>
    
</body>


