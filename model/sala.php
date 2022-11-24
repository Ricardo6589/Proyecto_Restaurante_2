<?php

class Sala {
    //ATRIBUTOS
    private $id; 
    private $nombre_sala;
    

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
     * Get the value of nombre_sala
     */ 
    public function getNombre_sala()
    {
        return $this->nombre_sala;
    }

    /**
     * Set the value of nombre_sala
     *
     * @return  self
     */ 
    public function setNombre_sala($nombre_sala)
    {
        $this->nombre_sala = $nombre_sala;

        return $this;
    }

    public static function getSala(){

        include 'conexion.php';
        $sql=$pdo->prepare("SELECT s.id, s.nombre_sala, count(m.id) as `Mid` FROM tbl_salas s INNER JOIN tbl_mesas m ON s.id=m.id_salas GROUP BY s.id");  
        $sql->execute();
        $listaSalas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaSalas;        
    }

    public static function getMesaLibre() {
        include 'conexion.php';        
        $sql=$pdo->prepare("SELECT s.nombre_sala, COUNT(m.id) as `Mid`, m.estado_mesa FROM tbl_salas s INNER JOIN tbl_mesas m ON s.id=m.id_salas GROUP BY s.id, m.estado_mesa HAVING m.estado_mesa = 'libre';");
        $sql->execute();
        $listaSalas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaSalas; 
    }

    public static function getMesaMantenimiento() {
        include 'conexion.php';
        // $sql="SELECT s.id, s.nombre_sala, count(m.id) as `Mid` FROM tbl_salas s INNER JOIN tbl_mesas m ON s.id=m.id_sala WHERE m.estado_mobiliario = 'libre' GROUP BY s.id";
        $sql=$pdo->prepare("SELECT s.nombre_sala, COUNT(m.id) as `Mid`, m.estado_mesa FROM tbl_salas s INNER JOIN tbl_mesas m ON s.id=m.id_salas GROUP BY s.id, m.estado_mesa HAVING m.estado_mesa = 'mantenimiento'");
        $sql->execute();
        $listaSalas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaSalas;        
    }


    public static function getSalaEst(){

        include 'conexion.php';
        $sql=$pdo->prepare("SELECT id_sala,count(s.id) as `Mid`,s.nombre_sala,m.id_salas FROM tbl_salas s INNER JOIN tbl_mesas m ON s.id = m.id_salas INNER JOIN tbl_reservas r ON m.id = r.id_mesas Group by id_sala");  
        $sql->execute();
        $listaSalas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaSalas; 
    }
}