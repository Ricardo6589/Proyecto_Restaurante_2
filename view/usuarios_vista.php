<?PHP
session_start();
include '../model/usuario.php';
$listaUsuarios=Usuario::getTipoUsuario($_SESSION['user']);
if ($listaUsuarios[0]['personal_usuario']=='camarero' || $listaUsuarios[0]['personal_usuario']=='mantenimiento' || $listaUsuarios[0]['personal_usuario']=='cliente') {
    echo "<script>window.location.href='./restaurante.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
</head>

<body>
    <div class="container">
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
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>Foto</th>
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
        </div>
    </div>
    <script src="../js/usuarios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>





