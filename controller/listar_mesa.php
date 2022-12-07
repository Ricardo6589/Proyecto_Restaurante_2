<?php 
$sala=$_POST['id_sala'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];


include '../model/mesas.php';
$listaMesas=Mesas::getMesasReservas($sala,$fecha,$hora);
$id_mesas=array();

foreach ( $listaMesas as $mesa) {
    echo "<div class='tarjeta' id='tarjeta'>";
    // echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="'#myModal">Crear empleado</button>
    echo "<form action='./sala.php' id='frm_mesas' onclik='modal()'>";
    array_push($id_mesas,$mesa["id"]);   
    echo '<input type="hidden" name="estado" value="ocupado">';
    echo '<input type="hidden" name="id_mobi" value="'.$mesa["id"].'">';                                
    echo '<button type="submit" name="submit" class="img-svg"><img class="ocupado" src="../img/mesas/'.$mesa["img_mesa"].'"></button>';               
    echo "<br>";
    echo '</form>';
    echo '</div>';    
    
}

$listaMesas2=Mesas::getMesas($sala);
// var_dump($listaMesas2);
foreach ($listaMesas2 as $mesa) {
    
    if (!in_array($mesa["id"],$id_mesas)) {
        echo "<div class='tarjeta' id='tarjeta'>";
        echo '<form action="./sala.php" id="frm_mesas" method="post">';
        echo '<input type="hidden" name="estado" value="libre">';
        echo '<input type="hidden" name="id_mobi" value="'.$mesa["id"].'">';                                
        echo '<button type="submit" name="submit" class="img-svg"><img class="libre" src="../img/mesas/'.$mesa["img_mesa"].'"></button>';
        echo "<br>";
        echo '</form>';
        echo '</div>';             
                
    }

}



