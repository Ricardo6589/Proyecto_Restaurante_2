<?php

//Recogemos la contraseña de login.php y la encriptamos en sha256 para que en nuestra base de datos reconozca
try{
    $pass = $_POST['pass'];
    $pass = hash('sha256', $pass);
    

    //Llamamos la conexión de la base de datos
    include '../model/conexion.php';
    //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
    $user=$pdo->quote($_POST['mail']);
    //utilizamos el str_replace para quitar las comillas que crea el "quote" automaticamente
    $user=str_replace('\'','',$user);
    


    // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
    $sql = $pdo->prepare("select * from tbl_usuarios where email_usuario='$user' and password_usuario='$pass'");
    $sql->execute();
    # Ver cuántas filas devuelve
    $numeroDeFilas = $sql->rowCount();

    //Si existen creamos la session, si no enviamos a login.php 
    if ($numeroDeFilas==1){
        session_start();
        $_SESSION['user'] = $user;
        echo "<script>location.href='../view/restaurante.php'</script>";
    }else{
        echo "<script>location.href='../index.php?error=1'</script>";
    }

}catch(Exception $e){
    echo "<script>location.href='../index.php?error=2'</script>";
}