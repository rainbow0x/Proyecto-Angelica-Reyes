<?php

class Perfil
{
    public $pdo;
    public $msg;
    public $id;
    public $nombre;
    public $correo;
    public $contrasena;
    public $telefono;
    public $fecha_nac;
    public $direccion;
    public $provincia;
    public $contrasenanueva;
    public $contrasenavieja;
    public function __construct()
    {
        try {
            $this->pdo = DB::DBStart();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerPerfil(perfil $data)
    {
        try {
            $sql = "CALL sp_verperfil(?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->id
                )
            );

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarPerfil(Perfil $data)
    {
        try {
            $sql = "call sp_actualizarperfil(?,?,?,?,?,?,?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->nombre,
                    $data->correo,
                    $data->telefono,
                    $data->fecha_nac,
                    $data->direccion,
                    $data->provincia,
                    $data->id
                )
            );

            return $this->msg = "Informacion de perfil actualizada con exito&t=alert-success";
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) { // error 1062 es de duplicación de datos 
				return $this->msg= "Correo electrónico ya está registrado en el sistema&t=alert-danger";
			 } else {
				return $this->msg= "Error al guardar los datos&t=alert-danger";
			 }
        }
    }

    public function Verificarcontraseña(Perfil $data)
    {
        try {

            $sql = "SELECT * FROM usuario WHERE contrasena=? AND id=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->contrasenavieja,
                    $data->id
                )
            );
            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());

        }
    }

    public function Actualizarcontrasena(Perfil $data)
    {
        try {
            $sql = "UPDATE usuario SET contrasena=? WHERE id=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->contrasenanueva,
                    $data->id
                )
            );

            return $this->msg = "Contraseña actualizada con exito&t=alert-success";
        } catch (Exception $e) {
            return $this->msg = "Ocurrio un error al actualizar la contraseña, Intente nuevamente&t=alert-danger";
        }
    }
}