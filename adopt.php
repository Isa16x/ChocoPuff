<?php if (!isset($_SESSION)) {
  session_start();
  }
  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
        <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./styles.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@200&family=Montserrat:wght@200&family=Sacramento&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Tangerine&display=swap" rel="stylesheet">
        <title>Adoptii</title>
    </head>
    <body>
        <?php include 'header.php';
        include 'conectarebd.php';
        ?>
        
        <br><br>
    <h1 class="titlu_pag_cat">Găseste un viitor prieten pe viată!</h1>
    <br><br>

    
    
    <div class="card-deck"> 
        <div class="row">

    
        <?php 

            $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
            $sql = 'SELECT * FROM pisici_adoptie  ';
           
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

                    ?> 
           <div class=" card col-md-3 columnsAlign p-3">
           <div class=" " style="width: 22rem" style="display: inline-block;">
                <img class="card-img-top" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poza_pisica']); ?>" alt="pisica" alt="Card image cap" style="height: 24rem">
                <div class="card-block ">
                    <div class="card-body body-for-card">
                        <h5 class="card-title titlu-card"><?php echo $denumire_pisica; ?></h5>
                        <p class="card-text text-card">
                        <div class= "status_pisica">
                                <?php  
                            echo $status_pisica;
                            ?> </div>
                            <br>
                        </p>
                    </div>
                    <div class="card-footer pret-prod">
                        <p class="text-card">
                        Statusul pisicutei: 
                             <?php 
                            if($status_pisica == "adoptata"){
                                echo "<br>Adoptata la data de ".$data_adoptie."<br>";
                            }else{
                                echo "<br>Primita de la centrul ".$centru_adoptie." in data de ".$data_primire."<br>"; 
                                ?>
                                <a href="./pagina_pisici.php?nume_pisica=<?php echo $denumire_pisica; ?>"> <button class="btn btn-primary buton-adaugare-cos" type="submit">Afla mai mult!</button> </a>
                            <?php 
                            }
                            
                            ?> </p>
                           
                            
                    </div>
                </div>
                
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

    </div>
    </div>


    </body>
</html>