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
    <link rel="stylesheet" href="Public/Estilos/oferta.css">
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
            <h3 class="h3 fw-bold">Ofertas Especiales para ti</h3>
        </div>
        <?php foreach($resp as $r){ ?>
        <div class="p-2 text-center">
            <a href="./?op=disponibilidad&id=<?php echo $r->id ?>">
                <div class="contenedor">
                    <img src="Public/Imagenes/<?php echo $r->imagen ?>" alt="" height="450px" width="900px">
                    <div class="texto-encima oferta text-white">
                        <p class="fw-bold"><span class="bg-danger text-decoration-line-through fs-6">Antes:
                                <?php echo $r->precio_original ?></span><span class="bg-success fs-4">Ahora:<?php echo $r->precio_oferta ?> </span></p>
                    </div>
                    <div class="texto-debajo text-white fw-bold fs-4 text-break"><?php echo $r->descripcion ?></div>
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
    <?php
    require('Templates/footer.php');
    ?>
</body>

</html>