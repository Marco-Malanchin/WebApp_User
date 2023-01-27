<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sandwech | Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    </head>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="homePage.php">
            <img src="../assets/img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-2">
            Sandwech 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Caratteristiche
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="addAllergen.php">Aggiungi Allergeni</a></li>
                        <li><a class="dropdown-item" href="addClass.php">Aggiungi Classi</a></li>
                        <li><a class="dropdown-item" href="addIngredient.php">Aggiungi Ingredienti</a></li>
                        <li><a class="dropdown-item" href="addOffer.php">Aggiungi Offerte</a></li>
                        <li><a class="dropdown-item" href="addPickup.php">Aggiungi Ritiro</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Prodotti
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="setProduct.php">Aggiungi Prodotti</a></li>
                        <li><a class="dropdown-item" href="addTag.php">Aggiungi Tags</a></li>
                        <!-- <li><a class="dropdown-item" href="">Cancella Tags</a></li> -->
                        <li><a class="dropdown-item" href="disactiveProduct.php">Disattiva Prodotti</a></li>
                        <li><a class="dropdown-item" href="reactiveProduct.php">Attiva Prodotti</a></li>
                        <li><a class="dropdown-item" href="putProductQuantity.php">Cambia Quantità</a></li>
                        <li><a class="dropdown-item" href="setOfferProduct.php">Cambia Offerte</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Utenti
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="disactiveUser.php">Disattiva Utenti</a></li>
                        <li><a class="dropdown-item" href="getFavouriteProduct.php">Visualizza Preferiti</a></li>
                        <li><a class="dropdown-item" href="viewOrder.php">Visualizza Ordini</a></li>
                        <li><a class="dropdown-item" href="getOrderByUser.php">Visualizza Ordini Singoli</a></li>
                        <li><a class="dropdown-item" href="setPassword.php">Cambia Password</a></li>
                        <li><a class="dropdown-item" href="viewCart.php">Visualizza Carrelli</a></li>
                    </ul>
                </li>
            </ul>
            <a href="../function/logout.php">
            <button class="btn btn-outline-danger">Esci</button>
            </a>
        </div>
    </div>
</nav>