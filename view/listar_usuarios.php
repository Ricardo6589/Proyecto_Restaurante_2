<?php

// include '../model/usuario.php';

include "../model/conexion.php";
if(empty($_POST['filtro'])){

    $sql = $pdo->prepare("SELECT * FROM tbl_usuarios");
    $sql->execute();

}else{

    $filtro=$_POST['filtro'];
    $sql = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE id LIKE '%".$filtro."%' OR personal_usuario LIKE '%".$filtro."%' OR nombre_usuario LIKE '%".$filtro."%' OR apellido_usuario LIKE '%".$filtro."%' OR email_usuario LIKE '%".$filtro."%' OR telefono_usuario LIKE '%".$filtro."%'OR dni_usuario LIKE '%".$filtro."'");
    // $sql = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE id LIKE '%".$filtro."%' OR personal_usuario LIKE '%".$filtro."%' OR nombre_usuario LIKE '%".$filtro."%' OR apellido_usuario LIKE '%".$filtro."'"); 
    $sql->execute();
}
    //4. Transformar consulta SQL en Array assoc.
    $ListaUsuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
       
  


foreach ($ListaUsuarios as $usuario) {
    echo "<tr>                        
 
    <td>" . $usuario['id'] . "</td>
    <td>" . $usuario['personal_usuario'] . "</td>
    <td>" . $usuario['nombre_usuario'] . "</td>
    <td>" . $usuario['apellido_usuario'] . "</td>
    <td>" . $usuario['email_usuario'] . "</td>    
    <td>" . $usuario['telefono_usuario'] . "</td>
    <td>" . $usuario['dni_usuario'] . "</td>                  
    <td>
    
        <button type='button' class='btn btn-success' class='cta' onclick=Editar('" . $usuario['id'] . "')>Editar</button>
        <button type='button' class='btn btn-danger' onclick=Eliminar('" . $usuario['id'] . "')>Eliminar</button>
    </td>        
    </tr>";
};