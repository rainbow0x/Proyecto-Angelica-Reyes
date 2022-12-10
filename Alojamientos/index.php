<?php
session_start();

require('./Controller/controller.php');

$controller = new Controller;

if (isset($_GET['op'])) {
    $op = $_GET['op'];

    if ($op == "principal") {
        $controller->Principal();
    } else if ($op == "oferta") {
        $controller->Oferta();
    } else if ($op == "hotel") {
        $controller->Hotel();
    } else if ($op == "disponibilidad") {
        $controller->Disponibilidad();
    } else if ($op == "perfil") {
        $controller->Perfil();
    } else if ($op == "actualizarperfil") {
        $controller->ActualizarPerfil();
    } else if ($op == "verificarcontrasena") {
        $controller->Actualizarcontrasena();
    } else if ($op == "reservaciones") {
        $controller->Reservaciones();
    }else if ($op == "registrarusuario") {
        $controller->RegistrarUsuario();
    } else if ($op == "validarlogin") {
        $controller->ValidarLogin();
    }else if ($op == "guardarreserva") {
        $controller->GuardarReserva();
    }else if ($op == "eliminarreserva") {
        $controller->EliminarReserva();
    }else if ($op == "busqueda") {
        $controller->Busqueda();
    }  else if ($op == "cerrarsesion") {
        $controller->CerrarSesion();
    }
} else {
    $controller->Principal();
}
?>