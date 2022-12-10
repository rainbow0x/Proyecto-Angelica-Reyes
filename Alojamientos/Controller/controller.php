<?php

include 'model/ValidarLogin.php';
include 'model/Perfil.php';
include 'model/Lugares.php';
include 'model/Hotel.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Vtiful\Kernel\Excel;

//require 'public/phpmailer/vendor/autoload.php';
require 'public/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'public/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
require 'public/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';

class Controller
{
    private $pdo;
    private $resp;
    private $ValidarLogin;
    private $Perfil;
    private $Lugares;
    private $Hotel;
    private $msg;

    public function __construct()
    {
        $this->ValidarLogin = new ValidarLogin();
        $this->Perfil = new Perfil();
        $this->Lugares = new Lugares();
        $this->Hotel = new Hotel();
    }

    public function Principal()
    {

        $resp = $this->Lugares->VerProvinciaPanama();
        $resp2 = $this->Lugares->VerProvinciaChiriqui();
        $resp3 = $this->Lugares->VerProvinciaBocas();
        $resp4 = $this->Lugares->VerProvinciaVeraguas();
        $resp5 = $this->Lugares->VerProvinciaHerrera();
        $resp6 = $this->Lugares->VerProvinciaChorrera();
        $resp7 = $this->Lugares->VerProvinciaDarien();
        $resp8 = $this->Lugares->VerProvinciaLS();
        $resp9 = $this->Lugares->VerProvinciaColon();
        $resp10 = $this->Lugares->VerProvinciaCocle();

        require('View/principal.php');
    }

    public function Oferta()
    {

        $resp = $this->Hotel->VerOfertas();
        require('View/ofertas.php');
    }

    public function Hotel()
    {
        $datos = new Hotel();
        $datos->idhotel = $_GET['id'];

        $resp = $this->Hotel->VerHoteles($datos);
        require('View/hoteles.php');
    }

    public function Disponibilidad()
    {
        $datos = new Hotel();
        $datos->idhabitacion = $_GET['id'];

        $resp = $this->Hotel->VerHabitaciones($datos);

        require('View/disponibilidad.php');
    }

    public function Perfil()
    {
        if (isset($_SESSION['acceso'])) {
            $PerfilData = new Perfil();
            $resp = new Perfil();

            $PerfilData->id = $_SESSION['id'];

            $resp = $this->Perfil->VerPerfil($PerfilData);

            require('View/perfil.php');
        } else {
            header('Location: ?op=principal');
        }
    }

    public function ActualizarPerfil()
    {
        $consulta = new Perfil();

        $id = $_SESSION['id'];
        $consulta->nombre = $_REQUEST['nombre'];
        $consulta->correo = $_REQUEST['correo'];
        $consulta->telefono = $_REQUEST['telefono'];
        $consulta->fecha_nac = $_REQUEST['fecha_nac'];
        $consulta->direccion = $_REQUEST['direccion'];
        $consulta->provincia = $_REQUEST['provincia'];
        $consulta->id = $id;

        if ($this->resp = $this->Perfil->ActualizarPerfil($consulta)) {
            header('Location: ?op=perfil' . '&msg=' . $this->resp);

            $_SESSION['nombre'] = $consulta->nombre;
        }
    }

    public function Actualizarcontrasena()
    {
        $consulta = new Perfil();

        $id = $_SESSION['id'];
        $consulta->contrasenavieja = $_REQUEST['password1'];
        $consulta->contrasenanueva = $_REQUEST['password2'];
        $consulta->id = $id;

        if ($this->Perfil->Verificarcontraseña($consulta)) {
            if ($this->resp = $this->Perfil->Actualizarcontrasena($consulta)) {
                header('Location: ?op=perfil' . '&msg=' . $this->resp);
            }
        } else {
            header('Location: ?op=perfil' . '&msg=La contraseña actual es incorrecta&t=alert-danger');
        }
    }

    public function RegistrarUsuario()
    {
        $consulta = new ValidarLogin();

        $consulta->nombre = $_REQUEST['nombre'];
        $consulta->correo = $_REQUEST['correo'];
        $consulta->provincia = $_REQUEST['provincia'];
        $consulta->telefono = $_REQUEST['telefono'];
        $consulta->direccion = $_REQUEST['direccion'];
        $consulta->fecha_nac = $_REQUEST['fecha_nac'];
        $consulta->contrasena = $_REQUEST['contrasena'];

        $this->msg = $this->ValidarLogin->RegistrarUsuario($consulta);
        header('Location: ?op=principal&msg=' . $this->msg);
    }

    public function Reservaciones()
    {
        if (isset($_SESSION['acceso'])) {
            $datos = new Hotel();
            $datos->idu = $_SESSION['id'];

            $resp = $this->Hotel->VerReserva($datos);

            require('View/reservaciones.php');
        } else {
            header('Location: ?op=principal');
        }
    }

    public function EliminarReserva()
    {
        $datos = new Hotel();
        $datos->idh = $_GET['idh'];

        $h = $this->Hotel->InfoReserva2($datos);

        $mensaje = '
    <div style="padding: 20px;">
        <div style="background-color: #003580;color: white;font-weight: 600;padding-top: 20px;padding-bottom: 20px;">
                <p align="center" style="font-size:20px;">La cancelacion para el ' . $h->nombre_hotel . ' fue realizada con exito</p>
                <p align="center" style="font-size:20px;">con la : ' . $h->nombre_habitacion . ' </p>
            </div>
    </div>';

        $email = new PHPMailer(true);
        try {
            //$email->SMTPDebug = SMTP::DEBUG_SERVER;
            $email->isSMTP();
            $email->Host = 'smtp.gmail.com';
            $email->SMTPAuth = true;
            $email->Username = "angelicareyes1029@gmail.com";
            $email->Password = "ezjtyxhfcwbizwdh";
            $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $email->Port = 587;

            $email->setFrom('angelicareyes1029@gmail.com', 'Lodging.com | Sitio de reservaciones');
            $email->addAddress($_SESSION['correo']);

            $email->isHTML(true);
            $email->Subject = 'Cancelacion de reserva';
            $email->Body = $mensaje;
            $email->send();

            if ($this->resp = $this->Hotel->EliminarReserva($datos)) {
                header('Location: ?op=reservaciones&msg='.$this->resp);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Busqueda()
    {
        $datos = new Hotel();
        $datos->provincia = $_REQUEST['provincia'];
        $datos->adulto = $_REQUEST['adulto'];
        $datos->nino = $_REQUEST['nino'];

        $resp = $this->Hotel->VerBusqueda($datos);

        require('View/busqueda.php');
    }

    public function ValidarLogin()
    {
        $LoginData = new ValidarLogin();

        $LoginData->correo = $_REQUEST['correo'];
        $LoginData->contrasena = $_REQUEST['contrasena'];

        if ($resp = $this->ValidarLogin->ValidarLogin($LoginData)) {
            $_SESSION['id'] = $resp->id;

            $_SESSION['acceso'] = true;
            $_SESSION['nombre'] = $resp->nombre;
            $_SESSION['correo'] = $resp->correo;
            header('Location: ?op=principal' . $this->resp);
        } else {
            header('Location: ?op=principal' . '&msg=Verifique el correo y contraseña introducidos&t=alert-danger' . $this->resp);
        }
    }

    public function GuardarReserva()
    {
        $data = new Hotel();

        $data->idh = $_GET['idh'];
        $data->idu = $_SESSION['id'];

        $h = $this->Hotel->InfoReserva($data);

        $mensaje = '
    <div style="padding: 20px;">
        <div style="background-color: #003580;color: white;font-weight: 600;padding-top: 20px;padding-bottom: 20px;">
                <p align="center" style="font-size:20px;">Hemos recibido su reserva con exito para el ' . $h->nombre_hotel . '</i></p>
                <p align="center" style="font-size:20px;">la habitacion elegida fue la: ' . $h->nombre_habitacion . '</i></p>
                <p align="center" style="font-size:20px;">Esperemos disfrute su estancia <br><br> Su saldo a pagar sera de <i style="color: red;">' . $h->precio . ' con ' . $h->impuestos . '</i></p>
            </div>
    </div>';

        $email = new PHPMailer(true);
        try {
            //$email->SMTPDebug = SMTP::DEBUG_SERVER;
            $email->isSMTP();
            $email->Host = 'smtp.gmail.com';
            $email->SMTPAuth = true;
            $email->Username = "angelicareyes1029@gmail.com";
            $email->Password = "ezjtyxhfcwbizwdh";
            $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $email->Port = 587;

            $email->setFrom('angelicareyes1029@gmail.com', 'Lodging.com | Sitio de reservaciones');
            $email->addAddress($_SESSION['correo']);

            $email->isHTML(true);
            $email->Subject = 'Reservacion de habitacion';
            $email->Body = $mensaje;
            $email->send();

            if ($this->resp = $this->Hotel->Reserva($data)) {
                header('Location: ?op=principal' . $this->resp);
            }
        } catch (Exception $e) {
            header('Location: ?op=principal&msg=Ocurrio un error al enviar el correo electronico&t=alert-danger');
        }
    }

    public function CerrarSesion()
    {
        session_destroy();
        header("Refresh:0; url=?op=principal");
    }
}