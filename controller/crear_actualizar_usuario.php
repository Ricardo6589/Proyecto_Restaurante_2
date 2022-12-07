<?php

if (isset($_POST)) {
    $personal_usuario = $_POST['personal'];
    $nombre_usuario = $_POST['nombre'];
    $apellido_usuario = $_POST['apellido'];
    $email_usuario = $_POST['email'];
    $password_usuario = $_POST['password'];
    $telefono_usuario = $_POST['telefono'];
    $dni_usuario = $_POST['dni'];
    $img_usuario = $_POST['foto'];     
    if (empty($_POST['id'])){
        include '../model/usuario.php';                           
        $resultado=Usuario::Crear_Usuario($personal_usuario, $nombre_usuario,$apellido_usuario, $email_usuario,$password_usuario,$telefono_usuario,$dni_usuario,$img_usuario);
        echo "Creado";   
                
    }else{
        $id = $_POST['id'];

        include '../model/usuario.php';                      
        $resultado=Usuario::Actualizar_Usuario($id,$personal_usuario, $nombre_usuario,$apellido_usuario, $email_usuario,$password_usuario,$telefono_usuario,$dni_usuario,$img_usuario);
    }
            
}