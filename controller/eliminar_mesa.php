<?php

include '../model/conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    echo "NOT ID";
    die();
}
$sql =$pdo->prepare("DELETE FROM tbl_mesas WHERE id = $id");

if($sql->execute()) {
    echo "OK";
    die();
} else {
    echo "NOT OK";
    die();
}

