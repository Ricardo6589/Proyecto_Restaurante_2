<?php

if (isset($_POST)) {
    $personal_usuario = $_POST['personal'];
    $nombre_usuario = $_POST['nombre'];
    $apellido_usuario = $_POST['apellido'];
    $email_usuario = $_POST['email'];
    $password_usuario = $_POST['password'];
    $telefono_usuario = $_POST['telefono'];
    $dni_usuario = $_POST['dni'];    

    $letter = substr($dni_usuario, -1);
    $numbers = substr($dni_usuario, 0, -1);

    // require_once '../model/conexion.php';
    // $sql = $pdo->prepare("select * from tbl_usuarios where dni_usuario='$dni_reserva'");
    // $sql->execute();
    // # Ver cuántas filas devuelve
    // $numeroDeFilas = $sql->rowCount();  
    
    if (empty($personal_usuario)||empty($nombre_usuario)||empty($apellido_usuario)||empty($email_usuario)||empty($password_usuario)||empty($telefono_usuario)||empty($dni_usuario)) {
        echo"Campo_vacio";        
    } elseif(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email_usuario)){
        echo"DNI_in";    
    }else{     
    
        if (empty($_POST['id'])){
            require_once '../model/usuario.php';                           
            $resultado=Usuario::Crear_Usuario($personal_usuario, $nombre_usuario,$apellido_usuario, $email_usuario,$password_usuario,$telefono_usuario,$dni_usuario);
            echo "Creado";   
                
        }else{
            $id = $_POST['id'];
            require_once '../model/usuario.php';                      
            $resultado=Usuario::Actualizar_Usuario($id,$personal_usuario, $nombre_usuario,$apellido_usuario, $email_usuario,$password_usuario,$telefono_usuario,$dni_usuario);
            
        }
    }
   
}