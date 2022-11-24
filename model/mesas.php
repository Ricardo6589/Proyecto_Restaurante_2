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
  
    

    public function __construct() {
   
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


    public static function getMesas($salas){  

        include 'conexion.php';
        $sql=$pdo->prepare("SELECT m.id,m.numero_mesa, m.img_mesa, m.estado_mesa FROM tbl_mesas m INNER JOIN tbl_salas s ON m.id_salas=s.id where id_salas=$salas");  
        $sql->execute();
        $listaMesas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaMesas;      
        
    }

    public static function getMesasEst(){  

        include 'conexion.php';
        $sql=$pdo->prepare("SELECT s.nombre_sala,r.id_mesas,count(m.id) as `Mid`,m.numero_mesa,m.id_salas FROM tbl_mesas m INNER JOIN tbl_reserva r ON m.id=r.id_mesas INNER JOIN tbl_salas s ON s.id=m.id_salas  Group by id_mesas,id_salas");  
        $sql->execute();
        $listaMesas2 = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaMesas2; 

    }   

   
}