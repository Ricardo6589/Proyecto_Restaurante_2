<?php
session_start();
if(empty($_SESSION['user'])){
    echo "<script>location.href='../index.php'</script>";
}
if (isset($_POST['sala'])) {
    $_SESSION['id_sala'] = $_POST['sala'];
    $_SESSION['nsala'] = $_POST['nsala'];
}
include 'cabecera.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="../js/carga.js"></script>
    <script src="../js/mesas.js">  </script>
    <script src="../js/estilos.js">  </script>
   

    <title>Sala</title>
</head>
<body class="img-back">
    <div class="loader-page"></div>
    <nav>
        <h3><?php echo $_SESSION['nsala'] ?></h3>
    </nav>
    <a href="restaurante.php" class="volver-btn"><i class="fa-solid fa-circle-left"></i></a>
   
    <div class="fondo-mesas"> 
        <div class="fecha_boton">
            <form action="./sala.php" action="post">
                <input type="hidden" name="id_sala" id="id_sala" value="<?php echo $_SESSION['id_sala']?>">
                <label for="">Fecha</label>
                <input type="date" name="fecha" id="fecha">
                <label for="">Hora</label>
                <select name="hora" id="hora">
                <option value="12">12:00</option>
                <option value="13">13:00</option>
                <option value="14">14:00</option>
                <option value="15">15:00</option>
                <option value="16">16:00</option>
                <option value="17">17:00</option>
                <option value="20">20:00</option>
                <option value="21">21:00</option>
                <option value="22">22:00</option>
                <option value="23">23:00</option>
                <option value="00">00:00</option>
                </select>                
            </form>
       
        </div>

        <div class="limites" id="limites">
                  
        </div>

    </div>
    <?php
    include '../model/usuario.php';                      
    $listaUsuarios=Usuario::getTipoUsuario($_SESSION['user']);
    if (isset($_POST['submit'])){
        if ($_POST['estado'] == 'ocupado') { 
        
        if ($listaUsuarios[0]['personal_usuario']=='camarero'){?>        
            <div id="libre" class="modalmask">
                <div class="contenido modalbox">
                <a href="" title="Close" class="close">X</a>
                    <h2 class="login-text"><span>Finalizar Reserva</span></h2>                    
                        
                    <form action="../controller/eliminarreserva.php" method="post" class="form-res" onsubmit="return valid()">
                        <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                        <div class="reservar">                     
                        
                            <select name="motivo" id="final-reserva">
                                <option value="finalizar" default>Finalizar</option>                                
                            </select>                        
                       
                            <!-- <p id="mensaje2"></p> -->
                        </div>

                        <input type="submit"  id="submit" class="btn-login" value="Enviar" >
                    </form>
                </div>
            </div>
            <?php  
        }
    } else if ($_POST['estado'] == 'mantenimiento') { 

        if ($listaUsuarios[0]['personal_usuario']=='mantenimiento'){?>
        <div id="libre" class="modalmask">
        <div class="contenido modalbox">
        <a href="" title="Close" class="close">X</a>
            <h2 class="login-text"><span>Finalizar Incidencia</span></h2>                    
                
            <form action="../controller/eliminarincidencia.php" method="post" class="form-res" onsubmit="return valid()">
                <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                <div class="reservar">

                    <select name="motivo" id="final-reserva">
                        <option value="finalizar" default>Finalizar</option>                       
                    </select>           
                   
                </div>

                <input type="submit"  id="submit" class="btn-login" value="Enviar" >
            </form>
        </div>
    </div>
    <?php
    }}else{ 
    
    if ($listaUsuarios[0]['personal_usuario']=='camarero' || $listaUsuarios[0]['personal_usuario']=='cliente' ){?>
        <div id="libre" class="modalmask">
            <div class="contenido modalbox">
            <a href="" title="Close" class="close">X</a>
                <h2 class="login-text"><span>Crear</span></h2>           
                
                    <form action="../controller/crearreserva.php" method="post" id="frm_reservar" class="form-res" onsubmit="return valid()" >
                        <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                        <div class="reservar">                           
                                <select name="motivo">
                                    <option value="reserva" default>Reserva</option>
                                    <?php
                                    if ($listaUsuarios[0]['personal_usuario']=='camarero') {?>
                                    <option value="incidencia">Incidencia</option>
                                    <?php
                                    }
                                    ?> 
                                </select> 
                                <div id="reserva-campo">
                                    <label for="">DNI Reserva</label><br>
                                    <input type="type" name="reserva">                                                             
                                    <br>
                                    <label for="">Fecha</label>
                                    <input type="date" name="fecha1" id="fecha1">
                                    <label for="">Hora</label>
                                    <select name="hora1" id="hora1">
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="20">20:00</option>
                                        <option value="21">21:00</option>
                                        <option value="22">22:00</option>
                                        <option value="23">23:00</option>
                                        <option value="00">00:00</option>
                                    </select>  
                                </div>
                                <?php
                                if ($listaUsuarios[0]['personal_usuario']=='camarero') {?>
                                 <div id="incidencia-campo">
                                    <label for="">Motivo Incidencia</label>
                                    <input type="text-area" name="incidencia">
                                    <br>
                                </div>
                                <?php
                                }
                                ?>                              
                                        
                        </div>
                        <input type="submit"  id="submit" class="btn-login" value="Crear" >
                    </form>         
                
            </div>
        </div>
        <?php
    }
     }};?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     
</body>
</html>