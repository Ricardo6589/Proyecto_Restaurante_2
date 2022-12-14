<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
</head>
<body>
<?php
    session_start();
   
    require_once '../model/reserva.php';
    if($_POST['motivo']=='incidencia'){
        echo"<script>location.href = 'crearincidencia.php?id_mesa={$_POST['mesa']}&motivo_incidencia={$_POST['incidencia']}' </script>";

    }else{
        $correo=$_SESSION['user'];
        $id_mesa = $_POST['mesa']; 
        $dni_reserva = $_POST['reserva'];
        $fecha_inicio_reserva = $_POST['fecha1'];    
        $hora_inicio_reserva = $_POST['hora1'];    

        require_once '../model/conexion.php';

        $sql = $pdo->prepare("select * from tbl_usuarios where personal_usuario='cliente' and dni_usuario='$dni_reserva'");
        $sql->execute();
        # Ver cuántas filas devuelve
        $numeroDeFilas = $sql->rowCount();
    

        if (empty($dni_reserva)){           
        
            
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El campo del DNI no puede estar vacio',
        })</script>";       

        echo"<script>window.location.href = '../view/sala.php' </script>";  
        
        
        }elseif($fecha_inicio_reserva<date("Y-m-d") || $hora_inicio_reserva<date("H:i:s")){
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La fecha o la hora no son posibles',
            })</script>";    

        echo"<script>window.location.href = '../view/sala.php' </script>"; 
           

        }elseif($numeroDeFilas!==1){
            echo"<script>window.location.href = '../view/sala.php' </script>";  
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El DNI no esta registrado',
            })</script>";
        
     

        echo"<script>window.location.href = '../view/sala.php' </script>"; 
            
        }else{
        
        Reserva::crearReserva($pdo,$correo,$dni_reserva,$fecha_inicio_reserva,$hora_inicio_reserva,$id_mesa);
            echo"<script>window.location.href = '../view/sala.php' </script>";
            
        } 
    }       
    
?>
</body>
</html>
<?php







