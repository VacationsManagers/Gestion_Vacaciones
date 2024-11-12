<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleI.css">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form action="in_de_se.php" method="post">
        <h1 class="title">Inicio de sesion</h1>
        <hr> 
        <?php
        if(isset($_GET['error'])){
            ?>
            <p class="error">
                <?php
                echo $_GET['error'];
                ?>
            </p>
        <?php
        }
        ?>
<hr>
       
        <label>
            <i class="fa-solid fa-user"></i>
            <input placeholder ="Nombre de usuario" type ="text" name="nombre">
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input placeholder="Contraseña" type="password" name = "contrasena">
        </label>
        <button type="submit">Iniciar Sesion</button>
    </form>
</body>

