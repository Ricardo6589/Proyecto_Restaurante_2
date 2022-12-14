<?php

// include '../model/mesas.php';

include "../model/conexion.php";
if(empty($_POST['filtro'])){

    $sql = $pdo->prepare("SELECT * FROM tbl_mesas");
    $sql->execute();

}else{

    $filtro=$_POST['filtro'];
    $sql = $pdo->prepare("SELECT * FROM tbl_mesas WHERE id LIKE '%".$filtro."%' OR numero_mesa LIKE '%".$filtro."%' OR capacidad_mesa LIKE '%".$filtro."%' OR img_mesa LIKE '%".$filtro."%' OR id_salas LIKE '%".$filtro."'");     
    $sql->execute();
}
    //4. Transformar consulta SQL en Array assoc.
    $Listamesas = $sql->fetchAll(PDO::FETCH_ASSOC); 


foreach ($Listamesas as $mesas) {
    echo "<tr>  
    
    <td>" . $mesas['id'] . "</td>    
    <td>" . $mesas['img_mesa'] . "</td>                   
    <td>" . $mesas['numero_mesa'] . "</td>    
    <td>" . $mesas['capacidad_mesa'] . "</td>    
    <td>" . $mesas['id_salas'] . "</td>                      
    <td>    
        <button type='button' class='btn btn-success' class='cta' onclick=Editar('" . $mesas['id'] . "')>Editar</button>
        <button type='button' class='btn btn-danger' onclick=Eliminar('" . $mesas['id'] . "')>Eliminar</button>
    </td>        
    </tr>";
};