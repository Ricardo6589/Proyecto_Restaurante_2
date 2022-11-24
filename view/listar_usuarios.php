<?php

include '../model/usuario.php';

$ListaUsuarios=Usuario::getUsuario();

foreach ($ListaUsuarios as $usuario) {
    echo "<tr>                         
    <td>" . $usuario['img_usuario'] . "</td> 
    <td>" . $usuario['id'] . "</td>
    <td>" . $usuario['personal_usuario'] . "</td>
    <td>" . $usuario['nombre_usuario'] . "</td>
    <td>" . $usuario['apellido_usuario'] . "</td>
    <td>" . $usuario['email_usuario'] . "</td>    
    <td>" . $usuario['telefono_usuario'] . "</td>
    <td>" . $usuario['dni_usuario'] . "</td>                  
    <td>
        <button type='button' class='btn btn-success' onclick=Editar('" . $usuario['id'] . "')>Editar</button>
        <button type='button' class='btn btn-danger' onclick=Eliminar('" . $usuario['id'] . "')>Eliminar</button>
    </td>        
    </tr>";
};