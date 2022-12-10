<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lodging.com | Ofertas</title>

    <link rel="stylesheet" href="Public/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="Public/Bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <div class="mt-4 p-2 text-white" style="background-color: #003580;">
            <h3 class="h3 fw-bold">Resultados encontrados de la busqueda</h3>
        </div>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Hotel</th>
                    <th>Tipo de habitacion</th>
                    <th>Precio</th>
                    <th>capacidad</th>
                    <th>Reserva</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resp as $r) { ?>
                <tr>
                    <td><p style="background-color: #003580;" class="fw-bold text-white"><?php echo $r->nombre_hotel ?></p><img src="Public/Imagenes/<?php echo $r->imagen ?>" alt="" srcset="" height="200px" width="300px"></td>
                    <td width="400px"><p class="fw-bold text-primary"><?php echo $r->nombre_habitacion ?></p> <?php echo $r->cama ?></td>
                    <td><?php echo $r->precio ?></td>
                    <td>Adultos: <?php echo $r->adultos ?> Niños: <?php echo $r->ninos ?></td>
                    <td><?php if (isset($_SESSION['acceso'])) { ?><a href="./?op=guardarreserva&idh=<?php echo $r->id ?>" class="btn text-white fw-bold" style="background-color: #003580;">Reservar</a><?php } else { ?>Inicie sesion para reservar<?php } ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    require('Templates/footer.php');
    ?>
</body>

</html>