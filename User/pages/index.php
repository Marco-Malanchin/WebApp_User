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
  
        <div class="container mt-5">
            <div class="row">
                <?php
                include_once dirname(__FILE__) . '/../function/login.php';

                $response = getUser(); 
                
                if(!empty($response)){
                    echo ('
                    <h3>Ciao, <b>' . $response . '</b>.</h3>
                    <h3>Benvenuto! </h3>
                    '); 
                }else{
                    echo('<p class="text-danger"><b>Errore</b></p>'); 
                }
                ?>

            </div>
        </div>
        <div class="container mt-3">
            <div class="row text-center" >
                <h2>Ecco le nostre categorie di prodotti:</h2>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
          <?php
          include_once dirname(__FILE__) . '/../function/product.php';
            $tag_arr = getTag();
            
      if (!empty($tag_arr) && $tag_arr != -1) {
        foreach ($tag_arr as $row) {
                  echo ('
                <div class="card mx-auto" style="width: 18rem;">
                ');
                switch ($row['name']){
                    case "panini":
                        echo('<img src="../assets/img/panini.jpg" class="card-img-top" alt="..."> ');
                        echo ('
                        <div class="card-body">
                        <h5 class="card-title">' . $row['name'] . ' </h5>
                        <a href="prodotti.php?id=' .$row['id'].'" class="btn btn-primary">visualizza prodotti</a>
                        </div>
                        </div>
                        ');
                        break;
                        case "bibite":
                            echo('<img src="../assets/img/bibite.png" class="card-img-top" alt="..."> ');
                            echo ('
                            <div class="card-body">
                            <h5 class="card-title">' . $row['name'] . ' </h5>
                            <a href="prodotti.php?id='.$row['id'].'" class="btn btn-primary">visualizza prodotti</a>
                            </div>
                            </div>
                            ');
                            break;
                        case "piadine":
                             echo('<img src="../assets/img/piadine.jpeg" class="card-img-top" alt="..."> ');
                             echo ('
                             <div class="card-body">
                             <h5 class="card-title">' . $row['name'] . ' </h5>
                             <a href="prodotti.php?id=' .$row['id'].'" class="btn btn-primary">visualizza prodotti</a>
                             </div>
                             </div>
                             ');
                             break;
                        case "brioches":
                             echo('<img src="../assets/img/brioches.jpg" class="card-img-top" alt="..."> ');
                             echo ('
                             <div class="card-body">
                             <h5 class="card-title">' . $row['name'] . ' </h5>
                             <a href="prodotti.php?id=' .$row['id'].'" class="btn btn-primary">visualizza prodotti</a>
                             </div>
                             </div>
                             ');
                             break;
                        case "snack":
                             echo('<img src="../assets/img/snack.jpg" class="card-img-top" alt="..."> ');
                             echo ('
                             <div class="card-body">
                             <h5 class="card-title">' . $row['name'] . ' </h5>
                             <a href="prodotti.php?id=' .$row['id'].'" class="btn btn-primary">visualizza prodotti</a>
                             </div>
                             </div>
                             ');
                             break;
                };
        }


      } 
      else {
        echo ('<p class="text-danger fw-bold mt-3 ms-3">Errore, non ci sono tag nel db.</p>');
      }
      ?>
  </div>      
</div>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>