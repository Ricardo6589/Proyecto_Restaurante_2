<?php

if (isset($_POST)) {
    $numero_mesa = $_POST['numero'];
    $capacidad_mesa = $_POST['capacidad'];
    $img_mesa = $_POST['img'];
    $id_sala = $_POST['sala'];
    
    
    
    if (empty($numero_mesa)||empty($capacidad_mesa)||empty($img_mesa)||empty($id_sala)) {
        echo"Campo_vacio";        
    } else{   

        if (empty($_POST['id'])){
            include '../model/mesas.php';                           
            $resultado=Mesas::Crear_Mesa($numero_mesa, $capacidad_mesa,$img_mesa, $id_sala);
            echo "Creado";   
                
        }else{
            $id = $_POST['id'];
            include '../model/mesas.php';                      
            $resultado=Mesas::Actualizar_Mesa($id,$numero_mesa, $capacidad_mesa,$img_mesa, $id_sala);
           
        }
    }
   
}