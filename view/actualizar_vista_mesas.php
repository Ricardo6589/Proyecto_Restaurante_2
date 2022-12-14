<?php

include '../model/mesas.php';
$id=$_POST['id'];

$ListaMesas=Mesas::getMesaId($id);


