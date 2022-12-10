<?php

include 'model/database.php';

class ValidarLogin{
    public $pdo;
    public $correo;
    public $contrasena;
    public $telefono;
    public $direccion;
    public $provincia;
    public $fecha_nac;
    public $nombre;
    public $msg;
    
    public function __construct()
    {
        try {
            $this->pdo = DB::DBStart();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ValidarLogin(ValidarLogin $data)
    {
        try {
            $sql = "CALL sp_validarlogin(?,?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->correo,
                $data->contrasena
            ));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarUsuario(ValidarLogin $data){
        try {
            $sql = "CALL sp_registrarusuario(?,?,?,?,?,?,?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->nombre,
                $data->correo,
                $data->provincia,
                $data->telefono,
                $data->direccion,
                $data->fecha_nac,
                $data->contrasena,
            ));

            return $this->msg = "Cuenta creada con exito&t=alert-success";
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) { // error 1062 es de duplicación de datos 
				return $this->msg= "Correo electrónico ya está registrado en el sistema&t=alert-danger";
			 } else {
				return $this->msg= "Error al guardar los datos&t=alert-danger";
			 }
        }
    }
}