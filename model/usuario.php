<?php

class Usuario {
    //ATRIBUTOS
    private $id; 
    private $personal_usuario;
    private $nombre_usuario;
    private $apellido_usuario;
    private $email_usuario;  
    private $password_usuario;
    private $telefono_usuario; 
    private $dni_usuario; 
    private $img_usuario;

    public function __construct($id, $personal_usuario, $nombre_usuario,$apellido_usuario, $email_usuario,$password_usuario,$telefono_usuario,$dni_usuario,$img_usuario) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->personal_usuario = $personal_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->apellido_usuario = $apellido_usuario;       
        $this->email_usuario = $email_usuario;
        $this->password_usuario = $password_usuario;       
        $this->telefono_usuario = $telefono_usuario;  
        $this->dni_usuario = $dni_usuario;  
        $this->img_usuario = $img_usuario;       
        
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
     * Get the value of personal_usuario
     */ 
    public function getPersonal_usuario()
    {
        return $this->personal_usuario;
    }

    /**
     * Set the value of personal_usuario
     *
     * @return  self
     */ 
    public function setPersonal_usuario($personal_usuario)
    {
        $this->personal_usuario = $personal_usuario;

        return $this;
    }

    /**
     * Get the value of nombre_usuario
     */ 
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Set the value of nombre_usuario
     *
     * @return  self
     */ 
    public function setNombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }

    /**
     * Get the value of apellido_usuario
     */ 
    public function getApellido_usuario()
    {
        return $this->apellido_usuario;
    }

    /**
     * Set the value of apellido_usuario
     *
     * @return  self
     */ 
    public function setApellido_usuario($apellido_usuario)
    {
        $this->apellido_usuario = $apellido_usuario;

        return $this;
    }

    /**
     * Get the value of email_usuario
     */ 
    public function getEmail_usuario()
    {
        return $this->email_usuario;
    }

    /**
     * Set the value of email_usuario
     *
     * @return  self
     */ 
    public function setEmail_usuario($email_usuario)
    {
        $this->email_usuario = $email_usuario;

        return $this;
    }

    /**
     * Get the value of password_usuario
     */ 
    public function getPassword_usuario()
    {
        return $this->password_usuario;
    }

    /**
     * Set the value of password_usuario
     *
     * @return  self
     */ 
    public function setPassword_usuario($password_usuario)
    {
        $this->password_usuario = $password_usuario;

        return $this;
    }

    /**
     * Get the value of telefono_usuario
     */ 
    public function getTelefono_usuario()
    {
        return $this->telefono_usuario;
    }

    /**
     * Set the value of telefono_usuario
     *
     * @return  self
     */ 
    public function setTelefono_usuario($telefono_usuario)
    {
        $this->telefono_usuario = $telefono_usuario;

        return $this;
    }

    /**
     * Get the value of dni_usuario
     */ 
    public function getDni_usuario()
    {
        return $this->dni_usuario;
    }

    /**
     * Set the value of dni_usuario
     *
     * @return  self
     */ 
    public function setDni_usuario($dni_usuario)
    {
        $this->dni_usuario = $dni_usuario;

        return $this;
    }

    /**
     * Get the value of img_usuario
     */ 
    public function getImg_usuario()
    {
        return $this->img_usuario;
    }

    /**
     * Set the value of img_usuario
     *
     * @return  self
     */ 
    public function setImg_usuario($img_usuario)
    {
        $this->img_usuario = $img_usuario;

        return $this;
    }


    public static function getTipoUsuario($correo){
        include "conexion.php";
        $sql=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE `email_usuario`='$correo'");
        $sql->execute();   
        $listaUsuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaUsuarios;     
          
    }

    public static function getUsuario(){

        include "conexion.php";
        if(empty($_POST['filtro'])){

            $sql = $pdo->prepare("SELECT * FROM tbl_usuarios");
            $sql->execute();

        }else{

            $filtro=$_POST['filtro'];
            $sql = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE id LIKE '%".$filtro."%' OR personal_usuario LIKE '%".$filtro."%' OR nombre_usuario LIKE '%".$filtro."%' OR apellido_usuario LIKE '%".$filtro."%' OR email_usuario LIKE '%".$filtro."%' OR password_usuario LIKE '%".$filtro."%' OR telefono_usuario LIKE '%".$filtro."%'OR dni_usuario LIKE '%".$filtro."'"); 
            $sql->execute();
        }
            //4. Transformar consulta SQL en Array assoc.
            $ListaUsuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $ListaUsuarios;        
          
    }


    public static function getUsuarioId($id){
        include "conexion.php";       
        $sql = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        $ListaUsuarios = $sql->fetch(PDO::FETCH_ASSOC);
        echo json_encode($ListaUsuarios);
    }


    public static function Crear_Usuario($personal_usuario, $nombre_usuario,$apellido_usuario, $email_usuario,$password_usuario,$telefono_usuario,$dni_usuario,$img_usuario){

        include 'conexion.php';
        $sql = $pdo->prepare("INSERT INTO tbl_usuarios (personal_usuario, nombre_usuario,apellido_usuario, email_usuario,password_usuario,telefono_usuario,dni_usuario,img_usuario) VALUES (:per, :nom, :ape, :ema, :pas, :tel, :dni, :img)");
        $sql->bindParam(":per", $personal_usuario);
        $sql->bindParam(":nom", $nombre_usuario);
        $sql->bindParam(":ape", $apellido_usuario);
        $sql->bindParam(":ema", $email_usuario);
        $sql->bindParam(":pas", $password_usuario);
        $sql->bindParam(":tel", $telefono_usuario);
        $sql->bindParam(":dni", $dni_usuario);
        $sql->bindParam(":img", $img_usuario);
        $sql->execute();
        $pdo = null;    
           
        
    }

    public static function Actualizar_Usuario($id, $personal_usuario, $nombre_usuario,$apellido_usuario, $email_usuario,$password_usuario,$telefono_usuario,$dni_usuario,$img_usuario){
        
        include 'conexion.php';
        $sql = $pdo->prepare("UPDATE tbl_usuarios SET personal_usuario = :per, nombre_usuario = :nom, apellido_usuario =:ape, email_usuario = :ema, password_usuario = :pas, telefono_usuario = :tel, dni_usuario =:dni, img_usuario = :img WHERE id = :id");
        $sql->bindParam(":per", $personal_usuario);
        $sql->bindParam(":nom", $nombre_usuario);
        $sql->bindParam(":ape", $apellido_usuario);
        $sql->bindParam(":ema", $email_usuario);
        $sql->bindParam(":pas", $password_usuario);
        $sql->bindParam(":tel", $telefono_usuario);
        $sql->bindParam(":dni", $dni_usuario);
        $sql->bindParam(":img", $img_usuario);
        $sql->bindParam("id", $id);
        $sql->execute();
        $pdo = null;      
         
        
    }
    
}