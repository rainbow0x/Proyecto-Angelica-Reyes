<?php

class Hotel
{
    public $pdo;
    public $idhotel;
    public $idhabitacion;
    public $idh;
    public $idu;
    public $msg;
    public $provincia;
    public $adulto;
    public $nino;
    public function __construct()
    {
        try {
            $this->pdo = DB::DBStart();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerHoteles(hotel $data){
        try {
            $sql = "CALL sp_hoteles(?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array($data->idhotel)
            );
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerHabitaciones(hotel $data){
        try {
            $sql = "CALL sp_habitacion(?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array($data->idhabitacion)
            );
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerOfertas(){
        try {
            $sql = "SELECT * from alojamiento where precio_oferta!=''";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Reserva(Hotel $data){
        try{
            $sql = "CALL sp_reserva(?,?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->idh,
                    $data->idu
                )
            );

            return $this->msg = "&msg=Reservacion creada con exito&t=alert-success";
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function VerReserva(hotel $data){
        try {
            $sql = "CALL sp_ver_reservas(?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array($data->idu)
            );
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EliminarReserva(hotel $data){
        try {
            $sql = "DELETE FROM reservas WHERE id=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array($data->idh)
            );
            return $this->msg = "Reservacion cancelada con exito&t=alert-success";
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerBusqueda(hotel $data){
        try {
            $sql = "CALL sp_busqueda(?,?,?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->provincia,
                    $data->adulto,
                    $data->nino
                )
            );
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function InfoReserva(hotel $data){
        try {
            $sql = "CALL sp_inforeserva(?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->idh
                )
            );
            return $stm->FETCH(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function InfoReserva2(hotel $data){
        try {
            $sql = "CALL sp_infousuarioreserva(?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->idh
                )
            );
            return $stm->FETCH(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}