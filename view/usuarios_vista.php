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
        <h3>Usuarios</h3>
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
                        <th>Personal</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>                            
                        <th>Telefono</th>
                        <th>DNI</th>
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
          
                <form action="" method="post" id="frm" type="hidden"  onchange="return validaFormulario()">
                                    
                    <label for="">Personal</label>
                    <input type="hidden" name="id" id="id" value="">
                    <select name="personal" id="personal" placeholder="Personal" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="camarero">Camarero</option>
                        <option value="mantenimiento">Mantenimiento</option>
                        <option value="cliente">Cliente</option>
                    </select>  
                                
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control">
                    <span id="nombre_msg" style="color:red"></span>  
                                
                                
                    <label for="">Apellido</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control">
                    <span id="apellido_msg" style="color:red"></span>  
                                    
                                    
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                    <span id="email_msg" style="color:red"></span>  
                                    
                    <label for="">Contraseña</label>                                
                    <input type="text" name="password" id="password" placeholder="Conraseña" class="form-control">
                    <span id="password_msg" style="color:red"></span>  
                                    
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control">
                    <span id="telefono_msg" style="color:red"></span>  
                                
                    <label for="">DNI</label>
                    <input type="text" name="dni" id="dni" placeholder="DNI" class="form-control">
                    <span id="dni_msg" style="color:red"></span>                         
                                            
                                    
                    <input type="button" value="Registrar" id="registrar" class="btn btn-outline-primary btn-block" class="close">
                                
                </form>          
            
        </div> 
        
        
                       
        
    </div>       
    
    <script src="../js/validacion.js"></script>
    <script src="../js/usuarios.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>





