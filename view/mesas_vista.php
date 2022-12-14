<?PHP
session_start();
include '../model/usuario.php';
$listaUsuarios=Usuario::getTipoUsuario($_SESSION['user']);
if ($listaUsuarios[0]['personal_usuario']=='camarero' || $listaUsuarios[0]['personal_usuario']=='mantenimiento' || $listaUsuarios[0]['personal_usuario']=='cliente') {
    echo "<script>window.location.href='./restaurante.php'</script>";
}
include 'cabecera.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->
    
</head>

<body>
    <!-- <div class="loader-page"></div> -->
    <nav>
        <h3>Mesas</h3>
    </nav>
    <a class="log-out" aria-current="page" href="./restaurante.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
   
    <div class="row">       
        
        <div class="col-lg-8"> 
            <div class="row">
                <div class="col-lg-6 ml-auto">
                    <form action="" method="post" id="frmbusqueda">
                        <div class="form-group">                                
                            <input type="text" name="buscar" id="buscar" placeholder="Filtrar..." class="form-control">                                
                        </div>
                    </form>
                </div>
            </div>             
            <table class="table table-resposive">
                <thead class="thead-dark">
                    <tr>                     
                        <th>ID</th>
                        <th>IMG</th>
                        <th>Numero</th>
                        <th>Capacidad</th>
                        <th>Sala</th>                      
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="resultado">

                </tbody>
            </table>
        </div>  
        <div class="Formulario"> 
            <div class="card-header bg-primary">
                <h3 class="text-center">Registro de productos</h3>
            </div>
            
            <form action="" method="post" id="frm" type="hidden" >
                                
            
                <input type="hidden" name="id" id="id" value="">  
                
                <label for="">Numero</label>
                <input type="text" name="numero" id="numero" placeholder="Numero" class="form-control">
                <span id="numero_msg" style="color:red"></span>  

                <label for="">Capacidad</label>
                <select name="capacidad" id="capacidad" placeholder="Capacidad" class="form-control">
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="12">12</option>              
                </select>                               
                            
                <label for="">Img</label>            
                <select name="img" id="img" placeholder="img" class="form-control">
                    <option value="mesa_2.svg">mesa_2.svg</option>
                    <option value="mesa_4.svg">mesa_4.svg</option>
                    <option value="mesa_12.svg">mesa_12.svg</option>              
                </select>
                                    
                                
                <label for="">Sala</label>
                <select name="sala" id="sala" placeholder="Sala" class="form-control">
                    <option value="1">Comedor</option>
                    <option value="2">Terraza</option>
                    <option value="3">Privada</option>              
                </select>   
                                            
                <input type="button" value="Registrar" id="registrar" class="btn btn-outline-primary btn-block" class="close">
                            
            </form>
        </div>        
                       
        
    </div>       
    
  
    <script src="../js/mesas2.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>





