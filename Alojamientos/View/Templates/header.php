<?php if (!isset($_SESSION['acceso'])) { ?>
<nav class="navbar navbar-expand-lg navbar-dark px-5 pt-3 pb-3" style="background-color: #003580;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4 mb-2" href="./?op=principal">Lodging.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active mb-3 mt-3" aria-current="page" href="./?op=principal">Alojamientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 mt-3" href="./?op=oferta">Ofertas</a>
                </li>
            </ul>
            <div class="d-flex">
                <button class="texto-color fw-bold nav-link btn btn-light mx-3 mb-3 mt-3 p-2" type="submit"
                    data-bs-toggle="modal" data-bs-target="#Register">Crea una
                    cuenta</button>
                <button class="texto-color fw-bold nav-link btn btn-light mb-3 mt-3 p-2" type="submit"
                    data-bs-toggle="modal" data-bs-target="#Login">Inicia
                    Sesión</button>
            </div>
        </div>
    </div>
</nav>

<!-- MODAL LOGIN-->
<div class="modal fade" id="Login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #003580;">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Lodging.com</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2">
                    <div class="text-center mb-2">
                        <h4 class="h4">Ingrese sus datos</h4>
                        <img src="Public/Imagenes/login.png" alt="" height="190px">
                    </div>
                    <form action="./?op=validarlogin" method="post">
                        <label for=""><i class="bi bi-envelope mx-2"></i>Ingrese su correo</label>
                        <input type="email" name="correo" id="" class="form-control mb-2" required>
                        <label for=""><i class="bi bi-lock mx-2"></i>Ingrese su contraseña</label>
                        <input type="password" name="contrasena" id="" class="form-control mb-3" required>
                        <div class="d-grid gap-2 mb-2">
                            <button type="submit" class="btn text-white" style="background-color: #003580;">Iniciar
                                Sesion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL REGISTRO-->
<div class="modal fade" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #003580;">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Ingrese sus datos correspondientes</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2">
                    <form action="./?op=registrarusuario" method="post">
                    <label for=""><i class="bi bi-envelope mx-2"></i>Ingrese un nombre completo</label>
                        <input type="text" name="nombre" id="" class="form-control mb-2" placeholder="Ejm. Juan torres" required>
                        <label for=""><i class="bi bi-envelope mx-2"></i>Ingrese un correo</label>
                        <input type="email" name="correo" id="" class="form-control mb-2" placeholder="example@correo.com" required>
                        <label for=""><i class="bi bi-geo mx-2"></i>Ingrese su provincia</label>
                        <select name="provincia" id="" class="form-select mb-2">
                            <option value="Panama">Panama</option>
                            <option value="Chorrera">Chorrera</option>
                            <option value="Bocas del Toro">Bocas del Toro</option>
                            <option value="Chiriqui">Chiriqui</option>
                            <option value="Veraguas">Veraguas</option>
                            <option value="Herrera">Herrera</option>
                            <option value="Los Santos">Los Santos</option>
                            <option value="Darien">Darien</option>
                            <option value="Colon">Colon</option>
                            <option value="Coclé">Coclé</option>
                        </select>
                        <label for=""><i class="bi bi-telephone mx-2"></i>Ingrese su numero telefonico</label>
                        <input type="text" name="telefono" id="" class="form-control mb-2" placeholder="2222-2222" required>
                        <label for=""><i class="bi bi-geo mx-2"></i>Ingrese su direccion de residencia</label>
                        <input type="text" name="direccion" id="" class="form-control mb-2" placeholder="Calle #1 Casa#21" required>
                        <label for=""><i class="bi bi-calendar mx-2"></i>Ingrese su fecha de nacimiento</label>
                        <input type="date" name="fecha_nac" id="" class="form-control mb-2" required>
                        <label for=""><i class="bi bi-lock mx-2"></i>Ingrese una contraseña</label>
                        <input type="password" name="contrasena" id="" class="form-control mb-3" placeholder="*****" required>
                        <div class="d-grid gap-2 mb-2">
                            <button type="submit" class="btn text-white" style="background-color: #003580;">Crear Cuenta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<nav class="navbar navbar-expand-lg navbar-dark px-5 pt-3 pb-3" style="background-color: #003580;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4 mb-2" href="./?op=principal">Lodging.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active mb-3 mt-3" aria-current="page" href="./?op=principal">Alojamientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 mt-3" href="./?op=oferta">Ofertas</a>
                </li>
            </ul>
            <div class="d-flex">
                <img src="Public/Imagenes/perfil.jpg" alt="" width="50px" height="50px" class="rounded-circle mx-2">
                <div class="dropdown mt-2">
                    <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $_SESSION['nombre'] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./?op=perfil">Gestionar Perfil</a></li>
                        <li><a class="dropdown-item" href="./?op=reservaciones">Ver Reservaciones</a></li>
                        <li><a class="dropdown-item" href="./?op=cerrarsesion">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php } ?>