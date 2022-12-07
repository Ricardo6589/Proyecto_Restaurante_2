<?php

include '../model/usuario.php';
$id=$_POST['id'];

$ListaUsuarios=Usuario::getUsuarioId($id);




