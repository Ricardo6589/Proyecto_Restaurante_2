<?PHP
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>window.location.href='../index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'cabecera.html'; ?>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="../js/carga.js"></script>
    
    <title>Restaurante</title>
</head>
<body class="img-back">
    <div class="loader-page"></div>

    <nav>
        <h3>Salas</h3>
    </nav>
    <a class="log-out" aria-current="page" href="../controller/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>   


    <div class="background">
        <div class="contenido restaurante">
            <!-- Mostrar todos los sitios/salas -->
            <?php
            include '../model/sala.php';
            $vuelta = 0;
            include '../model/usuario.php';                      
            $listaUsuarios=Usuario::getTipoUsuario($_SESSION['user']);
            
            
            foreach (Sala::getSala() as $element) {
                echo '<div class="content">';
                echo '<div class="salas '.explode("_", $element["nombre_sala"])[0].'">
                            <div class="blur">
                                <h3>'.str_replace("_", " ", $element["nombre_sala"]).'</h3>
                                <div class="info-salas">
                                    <h4>'.str_replace("_", " ", $element["nombre_sala"]).'</h4>
                                    <p>Mesas totales: '.$element["Mid"].'</p>';                                  
                            
                                    echo ' <form action="sala.php" method="post" class="ver">
                                        <input type="hidden" name="nsala" value="'.str_replace("_", " ", $element["nombre_sala"]).'">
                                        <input type="hidden" name="sala" value="'.$element['id'].'">
                                        <button type="submit" class="btn-salas">Ver</button>
                                    </form>
                                </div>
                            </div>
                        </div>';
                echo '</div>';
                // $vuelta++;

            } ?>
            
            <div class="btn-reservas">
                <button id="all-salas"><i class="fa-solid fa-border-all"></i></button>
                
                <?php 
                if ($listaUsuarios[0]['personal_usuario']=='admin') { ?>
                <a href="usuarios_vista.php"><button>Usuarios</button></a>
                <a href="mesas_vista.php"><button>Mesas</button></a>  
                <?php }
                ?>  
                
                          
                
            </div>
        </div>
        <div class="color-back ">
            <div class="modal">
                
            </div>
        </div>
    </div>
</body>
</html>