<?php if (!isset($_SESSION)) {
  session_start();
  }
  ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET['nume_pisica'];?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script> 
    <link rel="stylesheet" href="./styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@200&family=Montserrat:wght@200&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Tangerine&display=swap" rel="stylesheet">


</head>
<body>
    <?php
    include 'header.php';
    ?>
    <br><br>
    <h1 class="titlu_pag_cat"><?php echo $_GET['nume_pisica'] ?></h1>
    
    <br><br>
    
    
        <?php 

            $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
            $sql = 'SELECT * FROM pisici_adoptie where denumire= "'.$_GET['nume_pisica'].'" ';
           
        if($result = mysqli_query($link, $sql)){  
            if(mysqli_num_rows($result) > 0){
                $i=0;
                while($row = mysqli_fetch_array($result)){
                    // print_r($row);
                    // $i=$i+1;  
                    // if($i<=3){
                        
                      
                    $denumire_pisica = $row['denumire'];
                    $status_pisica = $row['status'];
                    $data_primire = $row['data_primire'];
                    $data_adoptie = $row['data_adoptie'];
                    $centru_adoptie = $row['centru_adoptie'];
                    $rasa = $row['rasa'];
                    $temperament_pisica = $row['temperament_pisica'];
                    $descriere_pisica = $row['descriere_pisica'];

                    ?> 
           
                <img class="card-img-top" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poza_pisica']); ?>" alt="pisica" alt="Card image cap" style="height: 100%; width:100%">
                <br><br>
                <div class="row">
                <div class="col-sm">

                <h1 class="titluPrez"><?php echo $denumire_pisica; ?></h1>
                <br>
                <p class="descriere ">
                            
                            Temperament: 
                                <?php  
                            echo $temperament_pisica;
                            ?> 
                            <br><br>
                            <?php echo $descriere_pisica; ?>
                        </p>
                </div>
                        
                <div id="carouselExampleControls" class="carousel slide carousel_pisici" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poza_pisica']); ?>" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poze_aditionale']); ?>" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poze_aditionale2']); ?>" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
        </div>
                </div>

                <?php
                
            }
            
                // mysqli_free_result($result);
            } else{
                echo "Nu am gasit niciun produs.";
                die();
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
            
        // if ($parola == $parola_db) {
        // 	$_SESSION["id"] = $id_sesiune;
        // 	echo "Logarea s-a facut cu succes<br>" ;	
        // 	echo "<a href='index.php'>ACASA</a>" ;
        // }

        ?>

  

    
           
        
      
                


</body>
</html>