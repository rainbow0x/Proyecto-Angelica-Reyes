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
            <h3 class="h3 fw-bold"><i class="bi bi-geo"></i> Descubre Lugares Increibles de Panamá</h3>
        </div>
        <div class="d-flex mt-3 flex-wrap">
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp2->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp2->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp2->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex mt-3 flex-wrap">
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp3->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp3->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp3->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp4->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp4->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp4->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex mt-3 flex-wrap">
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp5->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp5->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp5->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp6->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp6->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp6->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex mt-3 flex-wrap">
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp7->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp7->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp7->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp8->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp8->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp8->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex mt-3 flex-wrap">
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp9->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp9->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp9->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <a href="./?op=hotel&id=<?php echo $resp10->id ?>">
                    <div class="contenedor">
                        <img src="Public/Imagenes/<?php echo $resp10->imagen_paisaje ?>" alt="" height="300px"
                            width="500px">
                        <div class="texto-encima text-white fw-bold fs-3">
                            <?php echo $resp10->provincia ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php
    require('Templates/footer.php');
    ?>
</body>

</html>