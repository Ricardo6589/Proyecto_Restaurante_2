<?php

class Reserva {
    //ATRIBUTOS
    private $id; 
    private $fecha_reserva;
    private $fecha_inicio_reserva;
    private $hora_inicio_reserva;
    private $fecha_final_reserva;
    private $hora_final_reserva;
    private $nombre_reserva;
    private $id_usuarios;
    private $id_mesas;   

    public function __construct($id, $fecha_reserva,$fecha_inicio_reserva,$hora_inicio_reserva,$fecha_final_reserva,$hora_final_reserva,$nombre_reserva,$id_usuarios, $id_mesas) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->fecha_reserva = $fecha_reserva;
        $this->fecha_inicio_reserva = $fecha_inicio_reserva;
        $this->hora_inicio_reserva = $hora_inicio_reserva;        
        $this->fecha_final_reserva = $fecha_final_reserva;
        $this->hora_final_reserva = $hora_final_reserva;
        $this->id_usuarios = $id_usuarios;       
        $this->id_mesas = $id_mesas;      
        
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
     * Get the value of fecha_reserva
     */ 
    public function getFecha_reserva()
    {
        return $this->fecha_reserva;
    }

    /**
     * Set the value of fecha_reserva
     *
     * @return  self
     */ 
    public function setFecha_reserva($fecha_reserva)
    {
        $this->fecha_reserva = $fecha_reserva;

        return $this;
    }

    /**
     * Get the value of fecha_inicio_reserva
     */ 
    public function getFecha_inicio_reserva()
    {
        return $this->fecha_inicio_reserva;
    }

    /**
     * Set the value of fecha_inicio_reserva
     *
     * @return  self
     */ 
    public function setFecha_inicio_reserva($fecha_inicio_reserva)
    {
        $this->fecha_inicio_reserva = $fecha_inicio_reserva;

        return $this;
    }

    /**
     * Get the value of hora_inicio_reserva
     */ 
    public function getHora_inicio_reserva()
    {
        return $this->hora_inicio_reserva;
    }

    /**
     * Set the value of hora_inicio_reserva
     *
     * @return  self
     */ 
    public function setHora_inicio_reserva($hora_inicio_reserva)
    {
        $this->hora_inicio_reserva = $hora_inicio_reserva;

        return $this;
    }

    /**
     * Get the value of fecha_final_reserva
     */ 
    public function getFecha_final_reserva()
    {
        return $this->fecha_final_reserva;
    }

    /**
     * Set the value of fecha_final_reserva
     *
     * @return  self
     */ 
    public function setFecha_final_reserva($fecha_final_reserva)
    {
        $this->fecha_final_reserva = $fecha_final_reserva;

        return $this;
    }

    /**
     * Get the value of hora_final_reserva
     */ 
    public function getHora_final_reserva()
    {
        return $this->hora_final_reserva;
    }

    /**
     * Set the value of hora_final_reserva
     *
     * @return  self
     */ 
    public function setHora_final_reserva($hora_final_reserva)
    {
        $this->hora_final_reserva = $hora_final_reserva;

        return $this;
    }

    /**
     * Get the value of nombre_reserva
     */ 
    public function getNombre_reserva()
    {
        return $this->nombre_reserva;
    }

    /**
     * Set the value of nombre_reserva
     *
     * @return  self
     */ 
    public function setNombre_reserva($nombre_reserva)
    {
        $this->nombre_reserva = $nombre_reserva;

        return $this;
    }

    /**
     * Get the value of id_usuarios
     */ 
    public function getId_usuarios()
    {
        return $this->id_usuarios;
    }

    /**
     * Set the value of id_usuarios
     *
     * @return  self
     */ 
    public function setId_usuarios($id_usuarios)
    {
        $this->id_usuarios = $id_usuarios;

        return $this;
    }

    /**
     * Get the value of id_mesas
     */ 
    public function getId_mesas()
    {
        return $this->id_mesas;
    }

    /**
     * Set the value of id_mesas
     *
     * @return  self
     */ 
    public function setId_mesas($id_mesas)
    {
        $this->id_mesas = $id_mesas;

        return $this;
    }
   

    /**
    * Esta funcion te devuelve la lista de reserva y no le pasa ningun parametro
    */

    public static function getReservaFin($id = '', $fecha_res = '', $fecha_des = '', $nombre_reserva = '', $sala = '', $mesa = '', $usuario = ''){     
        require_once "conexion.php";    
        if(empty($id) and empty($fecha_res) and empty($fecha_des) and empty($nombre_reserva) and empty($sala) and empty($mesa) and empty($usuario)){
            $where=''; 
         }else{
            $where="and r.id like '%".$id."%' and r.fecha_inicio_reserva like '%".$fecha_res."%' and r.fecha_final_reserva like '%".$fecha_des."%' and r.nombre_reserva like '%".$nombre_reserva."%' and s.nombre_sala like '%".$sala."%' and m.numero_mesa like '%".$mesa."%' and u.nombre_usuario like '%".$usuario."%' "; 
         }
        $sql="SELECT r.id,r.fecha_inicio_reserva,r.fecha_final_reserva,r.nombre_reserva,s.nombre_sala,u.nombre_usuario,m.numero_mesa FROM tbl_reservas r INNER JOIN tbl_usuarios u ON r.id_usuarios=u.id INNER JOIN tbl_mesas m ON m.id=r.id_mesas INNER JOIN tbl_salas s ON m.id_salas=s.id where r.fecha_final_reserva != ''  $where ORDER BY r.fecha_final_reserva DESC";  
        $listaReserva = mysqli_query($conexion, $sql);
        $listaReserva=$listaReserva->fetch_all(MYSQLI_ASSOC); 
        return $listaReserva;      
    }
    public static function getReservaActual($id = '', $fecha_res = '', $fecha_des = '', $nombre_reserva = '', $sala = '', $mesa = '', $usuario = ''){
        require_once "conexion.php";    
        if(empty($id) and empty($fecha_res) and empty($fecha_des) and empty($nombre_reserva) and empty($sala) and empty($mesa) and empty($usuario)){
            $where=''; 
        }else{
            $where="and r.id like '%".$id."%' and r.fecha_inicio_reserva like '%".$fecha_res."%' and r.fecha_final_reserva like '%".$fecha_des."%' and r.nombre_reserva like '%".$nombre_reserva."%' and s.nombre_sala like '%".$sala."%' and m.numero_mesa like '%".$mesa."%' and u.nombre_usuario like '%".$usuario."%' "; 
        } 
        
        $sql="SELECT r.id,r.fecha_inicio_reserva,r.fecha_final_reserva,r.nombre_reserva,s.nombre_sala,u.nombre_usuario,m.numero_mesa FROM tbl_reservas r INNER JOIN tbl_usuarios u ON r.id_usuarios=u.id INNER JOIN tbl_mesas m ON m.id=r.id_mesas INNER JOIN tbl_salas s ON m.id_salas=s.id where r.fecha_final_reserva = ''  $where ORDER BY r.fecha_inicio_reserva DESC";  
        $listaReserva = mysqli_query($conexion, $sql);
        $listaReserva=$listaReserva->fetch_all(MYSQLI_ASSOC);  
        return $listaReserva;      
    }          
    
    public static function crearReserva($pdo,$correo,$dni_reserva,$fecha_inicio_reserva,$hora_inicio_reserva,$id_mesas){

        if ($dni_reserva != ''){
        require_once "conexion.php";
            $sql1=$pdo->prepare("SELECT id FROM tbl_usuarios WHERE email_usuario = '$correo'");
            $sql1->execute();            
            $id_usuarios=$sql1->fetch(PDO::FETCH_ASSOC)['id'];           
            

            $sql=$pdo->prepare("INSERT INTO tbl_reservas (dni_reserva,fecha_inicio_reserva,hora_inicio_reserva,id_usuarios,id_mesas) VALUES (:dni, :fec, :hora, :idu, :idm)");
            $sql->bindParam(":dni", $dni_reserva);
            $sql->bindParam(":fec", $fecha_inicio_reserva);
            $sql->bindParam(":hora", $hora_inicio_reserva);
            $sql->bindParam(":idu", $id_usuarios);
            $sql->bindParam(":idm", $id_mesas);            
            $sql->execute();  
            // $sql -> debugDumpParams();     
                               
            
        }
        
        
    }

    public static function eliminarReserva($id_mesas){     
      
        require_once 'conexion.php';
        $sql =$pdo->prepare("UPDATE `tbl_reservas` SET `fecha_final_reserva` = now() WHERE `id_mesas`=:idm and `fecha_final_reserva` = ''");  
        $sql->bindParam(":idm", $id_mesas);    
        $sql->execute();        

        $sql =$pdo->prepare("UPDATE `tbl_mesas` SET `estado_mesa` = 'libre' WHERE `id`=:idm");
        $sql->bindParam(":idm", $id_mesas); 
        $sql->execute();
    }     


    
}