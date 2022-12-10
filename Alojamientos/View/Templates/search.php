<?php if (!isset($_SESSION['acceso'])) { ?>
<div class="container-md mt-4">
    <form action="./?op=busqueda" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
            <select name="provincia" id="" class="form-select">
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
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="number" name="adulto" min="0" max="999" class="form-control" placeholder="¿Cuantos adultos?"
                aria-label="Server" required>
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="number" name="nino" min="0" max="999" class="form-control" placeholder="¿Cuantos niños?"
                aria-label="Server2" required>
            <button type="submit" class="btn text-white px-4" style="background-color: #003580;">Buscar</button>
        </div>
    </form>
</div>
<?php } else { ?>
<div style="background-color: #003580; height: 230px;" class="px-5">
    <h1 class="h1 fw-bold text-white pt-3">Hola <?php echo $_SESSION['nombre'] ?></h1>
    <h1 class="h1 fw-bold text-white text-center">¿A donde deseas ir?</h1>
    <form action="./?op=busqueda" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
            <select name="provincia" id="" class="form-select">
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
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="number" name="adulto" min="0" max="999" class="form-control" placeholder="¿Cuantos adultos?" aria-label="Server" required>
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="nino" min="0" max="999" class="form-control" placeholder="¿Cuantos niños?" aria-label="Server2" required>
            <button type="submit" class="btn btn-light px-5">Buscar</button>
        </div>
    </form>
</div>
<?php } ?>