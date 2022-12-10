<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lodging.com | Sitio de Alojamientos</title>

    <link rel="stylesheet" href="Public/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="Public/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Public/Estilos/principal.css">
</head>

<body>
    <header>
        <?php
        require_once('Templates/header.php');
        ?>
    </header>
    <?php
    require_once('Templates/search.php');
    ?>
    <div class="container-md">
        <div class="alert <?php if (isset($_GET['t'])) {echo $_GET['t'];} ?> mt-2" role="alert">
            <?php if (isset($_GET['msg'])) {echo $_GET['msg'];} ?>
        </div>
        <div class="mt-2 p-2 text-white" style="background-color: #003580;">
            <h3 class="h3 fw-bold"><i class="bi bi-person"></i> Perfil de usuario</h3>
        </div>
        <div class="mt-5">
            <form action="./?op=actualizarperfil" method="post">
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" name="nombre" value="<?php echo $resp->nombre ?>" aria-label="nombre" class="form-control" required>
                </div>
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Correo</span>
                    <input type="email" name="correo" value="<?php echo $resp->correo ?>" aria-label="Correo" class="form-control" required>
                </div>
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Telefono</span>
                    <input type="text" name="telefono" value="<?php echo $resp->telefono ?>" aria-label="telefono" class="form-control" required>
                </div>
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Fecha de nacimiento</span>
                    <input type="date" name="fecha_nac" value="<?php echo $resp->fecha_nac ?>" aria-label="fechanac" class="form-control" required>
                </div>
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Direccion</span>
                    <input type="text" name="direccion" value="<?php echo $resp->direccion ?>" aria-label="direccion" class="form-control" required>
                </div>
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Provincia</span>
                    <select name="provincia" id="" class="form-select mb-2">
                        <option value="Panama" <?php if($resp->provincia=="Panama"){echo "selected";} ?>>Panama</option>
                        <option value="Chorrera" <?php if($resp->provincia=="Chorrera"){echo "selected";} ?>>Chorrera</option>
                        <option value="Bocas del Toro" <?php if($resp->provincia=="Bocas del Toro"){echo "selected";} ?>>Bocas del Toro</option>
                        <option value="Chiriqui" <?php if($resp->provincia=="Chiriqui"){echo "selected";} ?>>Chiriqui</option>
                        <option value="Veraguas" <?php if($resp->provincia=="Veraguas"){echo "selected";} ?>>Veraguas</option>
                        <option value="Herrera" <?php if($resp->provincia=="Herrera"){echo "selected";} ?>>Herrera</option>
                        <option value="Los Santos" <?php if($resp->provincia=="Los Santos"){echo "selected";} ?>>Los Santos</option>
                        <option value="Darien" <?php if($resp->provincia=="Darien"){echo "selected";} ?>>Darien</option>
                        <option value="Colon" <?php if($resp->provincia=="Colon"){echo "selected";} ?>>Colon</option>
                        <option value="Coclé" <?php if ($resp->provincia == "Coclé") {
                            echo "selected";} ?>>Coclé</option>
                    </select>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn text-white fw-bold" style="background-color: #003580;">Guardar Cambios</button>
                </div>
            </form>
            <form action="./?op=verificarcontrasena" method="post">
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Contraseña actual</span>
                    <input type="text" name="password1" aria-label="cactual" class="form-control" required>
                </div>
                <div class="input-group mx-2 mb-3">
                    <span class="input-group-text">Contraseña nueva</span>
                    <input type="text" name="password2" aria-label="cnueva" class="form-control" required>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn text-white fw-bold" style="background-color: #003580;">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>