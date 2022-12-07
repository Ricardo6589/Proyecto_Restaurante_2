<?php
session_start();
   
require_once '../model/reserva.php';
if($_POST['final-reserva']=='incidencia'){
    echo"<script>location.href = 'crearincidencia.php?id_mesa={$_POST['mesa']}&motivo_incidencia={$_POST['incidencia']}' </script>";

}else{
$correo=$_SESSION['user'];
$id_mesa = $_POST['id_mesa']; 
$nombre_reserva = $_POST['nombre_reserva'];
$fecha_inicio_reserva = $_POST['fecha'];
var_dump($fecha_inicio_reserva);
$hora_inicio_reserva = $_POST['hora'];

Reserva::crearReserva($correo,$nombre_reserva,$fecha_inicio_reserva,$hora_inicio_reserva,$id_mesa);
    echo"<script>window.location.href = '../view/sala.php' </script>";
    
}

