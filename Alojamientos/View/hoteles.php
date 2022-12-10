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
    <link rel="stylesheet" href="Public/Estilos/hoteles.css">
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
            <h3 class="h3 fw-bold">alojamientos encontrados</h3>
        </div>
        <?php foreach ($resp as $r) { ?>
        <div class="border border-dark mt-4 border-opacity-25 grid">
            <div class="imagen">
                <img src="Public/Imagenes/<?php echo $r->imagen ?>" alt="" srcset="" height="200px" width="400px">
            </div>
            <div class="infogeneral p-2" style="width: 350px;">
                <p class="fs-4 text-primary fw-bold"><?php echo $r->nombre_hotel ?></p> <span class="fw-light"
                    style="font-size: 13px;"><?php echo $r->kilometros ?></span>
                <p><span><?php echo $r->ubicacion ?></span> </p>
                <p class="text-break"><span><?php echo $r->descripcion ?></span></p>
            </div>
            <div class="disponibilidad">
            <?php if($r->precio_oferta != null){ ?>
                <p class=""><span style="font-size: 13px;" class="text-danger text-decoration-line-through"><?php echo $r->precio_original ?></span> <span class="fs-3"><?php echo $r->precio_oferta ?></span></p>
            <?php }else{ ?>
                <p class=""><span style="font-size: 13px;" class="text-danger text-decoration-line-through"></span> <span class="fs-3"><?php echo $r->precio_original ?></span></p>
            <?php } ?>
                <a href="./?op=disponibilidad&id=<?php echo $r->id ?>" style="background-color: #003580;" class="btn text-white">Ver disponibilidad<i>></i></a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php
    require('Templates/footer.php');
    ?>
</body>

</html>