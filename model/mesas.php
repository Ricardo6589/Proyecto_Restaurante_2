<?php
// $sala=$_POST['sala'];
// echo $sala;
class Mesas {
    //ATRIBUTOS
    private $id; 
    private $numero_mesa;
    private $estado_mesa;
    private $capacidad_mesa;
    private $img_mesa;
    private $id_sala;
  
    

    public function __construct($id,$numero_mesa,$estado_mesa,$capacidad_mesa,$img_mesa,$id_sala) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->personal_usuario = $numero_mesa;
        $this->nombre_usuario = $estado_mesa;
        $this->apellido_usuario = $capacidad_mesa;       
        $this->email_usuario = $img_mesa;
        $this->$id_sala = $id_sala;
   
    }

     /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of numero_mesa
     */ 
    public function getNumero_mesa()
    {
        return $this->numero_mesa;
    }

    /**
     * Set the value of numero_mesa
     *
     * @return  self
     */ 
    public function setNumero_mesa($numero_mesa)
    {
        $this->numero_mesa = $numero_mesa;

        return $this;
    }

    /**
     * Get the value of estado_mesa
     */ 
    public function getEstado_mesa()
    {
        return $this->estado_mesa;
    }

    /**
     * Set the value of estado_mesa
     *
     * @return  self
     */ 
    public function setEstado_mesa($estado_mesa)
    {
        $this->estado_mesa = $estado_mesa;

        return $this;
    }

    /**
     * Get the value of capacidad_mesa
     */ 
    public function getCapacidad_mesa()
    {
        return $this->capacidad_mesa;
    }

    /**
     * Set the value of capacidad_mesa
     *
     * @return  self
     */ 
    public function setCapacidad_mesa($capacidad_mesa)
    {
        $this->capacidad_mesa = $capacidad_mesa;

        return $this;
    }

    /**
     * Get the value of img_mesa
     */ 
    public function getImg_mesa()
    {
        return $this->img_mesa;
    }

    /**
     * Set the value of img_mesa
     *
     * @return  self
     */ 
    public function setImg_mesa($img_mesa)
    {
        $this->img_mesa = $img_mesa;

        return $this;
    }

    /**
     * Get the value of id_sala
     */ 
    public function getId_sala()
    {
        return $this->id_sala;
    }

    /**
     * Set the value of id_sala
     *
     * @return  self
     */ 
    public function setId_sala($id_sala)
    {
        $this->id_sala = $id_sala;

        return $this;
    }


    public static function getMesasReservas($sala,$fecha,$hora){  

        include 'conexion.php';        
        $sql=$pdo->prepare("SELECT m.id,m.numero_mesa, m.img_mesa FROM tbl_mesas m INNER JOIN tbl_reservas r ON r.id_mesas= m.id INNER JOIN tbl_salas s ON m.id_salas=s.id where id_salas=$sala and fecha_inicio_reserva='$fecha' and hora_inicio_reserva=$hora and fecha_final_reserva=' '");                
        $sql->execute();
        $listaMesas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaMesas;      
        
    }

    public static function getMesas($sala){

        include 'conexion.php';        
        $sql=$pdo->prepare("SELECT m.id,m.numero_mesa, m.img_mesa FROM tbl_mesas m INNER JOIN tbl_salas s ON m.id_salas=s.id where id_salas=$sala ");                
        $sql->execute();
        $listaMesas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaMesas;   
    }

    public static function getMesasEst(){  

        include 'conexion.php';
        $sql=$pdo->prepare("SELECT s.nombre_sala,r.id_mesas,count(m.id) as `Mid`,m.numero_mesa,m.id_salas FROM tbl_mesas m INNER JOIN tbl_reservas r ON m.id=r.id_mesas INNER JOIN tbl_salas s ON s.id=m.id_salas  Group by id_mesas,id_salas");  
        $sql->execute();
        $listaMesas2 = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaMesas2; 

    }   


    public static function getMesaId($id){
        include "conexion.php";       
        $sql = $pdo->prepare("SELECT * FROM tbl_mesas WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        $ListaMesas = $sql->fetch(PDO::FETCH_ASSOC);
        echo json_encode($ListaMesas);
    }


    public static function Crear_Mesa($numero_mesa,$capacidad_mesa,$img_mesa,$id_sala){
        include 'conexion.php';
        $sql = $pdo->prepare("INSERT INTO tbl_mesas (numero_mesa,capacidad_mesa, img_mesa,id_salas) VALUES (:num, :cap, :img, :ids)");
        $sql->bindParam(":num", $numero_mesa);        
        $sql->bindParam(":cap", $capacidad_mesa);
        $sql->bindParam(":img", $img_mesa);
        $sql->bindParam(":ids", $id_sala);        
        $sql->execute();
        $pdo = null;  

    }

    public static function Actualizar_Mesa($id,$numero_mesa,$capacidad_mesa,$img_mesa,$id_sala){
        include 'conexion.php';
        $sql = $pdo->prepare("UPDATE tbl_mesas SET numero_mesa = :num, capacidad_mesa =:cap, img_mesa = :img, id_salas = :ids WHERE id = :id");
        $sql->bindParam(":num", $numero_mesa);        
        $sql->bindParam(":cap", $capacidad_mesa);
        $sql->bindParam(":img", $img_mesa);
        $sql->bindParam(":ids", $id_sala); 
        $sql->bindParam(":id", $id);       
        $sql->execute();
        $pdo = null;  
    }

   
}