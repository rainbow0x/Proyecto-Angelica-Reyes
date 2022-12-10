<?php

class Lugares{
    public $pdo;
    public function __construct()
    {
        try {
            $this->pdo = DB::DBStart();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaPanama()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Panama'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaChiriqui()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Chiriqui'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaBocas()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Bocas del toro'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaVeraguas()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Veraguas'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaHerrera()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Herrera'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaDarien()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Darien'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaChorrera()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Chorrera'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaLS()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Los Santos'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaColon()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Colon'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerProvinciaCocle()
    {
        try {
            $sql = "SELECT * FROM provincia_alojamiento WHERE provincia='Coclé'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

