<?php

session_start(); 
if(empty($_SESSION['user_id'])){
    header('location: ../login.php'); 
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sandwech | Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    </head>

    <body>
    <?php require_once(__DIR__.'\navbar.php'); ?>
  <h2>prodotti</h2>
    <div class = "container mt-5">
    <div class = "row  row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php
     include_once dirname(__FILE__) . '/../function/product.php';
    $id = $_GET['id'];
     $prod_arr = getProductsTag($id);
    if (!empty($prod_arr) && $prod_arr != -1) {
        foreach ($prod_arr as $row) {
            echo ('
                <div class="card mx-auto" style="width: 18rem;">
                ');
            switch ($id) {
                case "1":
                    echo ('<img src="../assets/img/panini.jpg" class="card-img-top" alt="..."> ');
                    echo ('
                        <div class="card-body">
                        <h5 class="card-title">' . $row['name'] . ' </h5>
                        <h6 class="card-title">€' . $row['Price'] . ' </h6>
                        </div>
                        </div>
                        ');
                    break;
                    case "2":
                        echo('<img src="../assets/img/bibite.png" class="card-img-top" alt="..."> ');
                        echo ('
                            <div class="card-body">
                            <h5 class="card-title">' . $row['name'] . ' </h5>
                            <h6 class="card-title">€' . $row['Price'] . ' </h6>
                            </div>
                            </div>
                            ');
                        break;
                        case "3":
                            echo('<img src="../assets/img/piadine.jpeg" class="card-img-top" alt="..."> ');
                            echo ('
                                <div class="card-body">
                                <h5 class="card-title">' . $row['name'] . ' </h5>
                                <h6 class="card-title">€' . $row['Price'] . ' </h6>
                                </div>
                                </div>
                                ');
                            break;
                            case "4":
                                echo('<img src="../assets/img/brioches.jpg" class="card-img-top" alt="..."> ');
                                echo ('
                                    <div class="card-body">
                                    <h5 class="card-title">' . $row['name'] . ' </h5>
                                    <h6 class="card-title">€' . $row['Price'] . ' </h6>
                                    </div>
                                    </div>
                                    ');
                                break;
                                case "5":
                                    echo('<img src="../assets/img/snack.jpg" class="card-img-top" alt="..."> ');
                                    echo ('
                                        <div class="card-body">
                                        <h5 class="card-title">' . $row['name'] . ' </h5>
                                        <h6 class="card-title">€' . $row['Price'] . ' </h6>
                                        </div>
                                        </div>
                                        ');
                                    break;
            }
        }
    }
?>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>