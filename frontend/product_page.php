<?php
include_once "../backend/functions.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bor webshop</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!--<img id="logo" src="images/altinger_logo.png" alt="" width="30" height="24">-->
            <a class="navbar-brand" href="#">Altinger</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0"> <!-- KÖZÉPRE IGAZÍTÁS -->
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Főoldal</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="feherDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Fehérborok
                </a>
                <ul class="dropdown-menu" aria-labelledby="feherDropdown">
                    <li><a class="dropdown-item" href="#">Fehérbor</a></li>
                    <li><a class="dropdown-item" href="#">Fehérbor</a></li>
                    <li><a class="dropdown-item" href="#">Fehérbor</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="vorosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Vörösborok
                </a>
                <ul class="dropdown-menu" aria-labelledby="vorosDropdown">
                    <li><a class="dropdown-item" href="#">Vörösbor</a></li>
                    <li><a class="dropdown-item" href="#">Vörösbor</a></li>
                    <li><a class="dropdown-item" href="#">Vörösbor</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Must</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- product info -->
    <?php
        if (isset($_GET['termekazon'])) {
        $product_id = intval($_GET['termekazon']);
        } else {
            echo "Hiányzó termékazonosító.";
            exit;
        }
        ?>
    <div class="d-flex flex-wrap">
        <div class="p-2 col-12 col-md-6"><img src="images/product_images/<?php echo htmlspecialchars(get_product_data($product_id, 'image'));?>"></div>
        <div class="p-2 col-12 col-md-6"><?php echo htmlspecialchars(get_product_data($product_id, 'product_name'));?></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>