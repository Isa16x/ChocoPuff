<?php if (!isset($_SESSION)) {
  session_start();
  }
  ?>

<?php
require_once 'meniu-admin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Conturi</title>

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
    <br><br>
    <h1 class="titlu_admin">Conturi Utilizatori Choco Puff</h1>
    <br><br>
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm text_conturi" style="font-weight: bold; font-size:20px;">
                            <p>ID</p>
                        </div>
                        <div class="col-sm text_conturi" style="font-weight: bold; font-size:20px;">
                            <p>Username</p>
                        </div>
                        <div class="col-sm-3 text_conturi" style="font-weight: bold; font-size:20px;">
                            <p>Email</p>
                        </div>
                        <div class="col-sm text_conturi" style="font-weight: bold; font-size:20px;">
                            <p>Nume</p>
                        </div>

                        <div class="col-sm text_conturi" style="font-weight: bold; font-size:20px;">
                            <p>Prenume</p>
                        </div>
                        <div class="col-md-4 text_conturi" style="font-weight: bold; font-size:20px;">
                            <p>Modificari</p>
                        </div>
                    </div>
                </li>
                <?php
                    include 'conectarebd.php';

                    $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
            $sql = 'SELECT * FROM utilizatori ';
           $i=0;
        if($result = mysqli_query($link, $sql)){  
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $id= $row['id'];
                    $username = $row['username'];
                    $nume = $row['nume'];
                    $prenume = $row['prenume'];
                    $email=$row['email'];
                    $telefon=$row['telefon'];
                    $i = $i+1;
                    ?> 
                    
                    <li class="list-group-item" id= <?php echo $id; ?>> 
                        <div class="row">
                            <div class="col-sm text_conturi " style="width:30%">
                                <p> <?php echo $id; ?> </p>
                            </div>
                            <div class="col-sm text_conturi">
                            <p><?php echo $username;?></p>
                        </div>
                        <div class="col-sm-3 text_conturi">
                            <p><?php echo $email;?></p>
                        </div>
                            <div class="col-sm text_conturi">
                                <p>
                                    <?php
                                    if($nume == NULL){
                                        ?> --- <?php
                                    }else{ 
                                        echo $nume;
                                    }
                                    ?>
                                    
                                </p>
                            </div>
                            <div class=" col-sm text_conturi">
                                <p>
                                    <?php if($prenume == NULL){
                                        ?> --- <?php
                                    }else{ 
                                        echo $prenume;
                                    } ?>
                                </p>
                            </div>
                            <div class="col-md-4 text_conturi">
                            <a href="./admin-pag_viz_detalii_cont.php?id_cont=<?php echo $id; ?>">  <button class="btn btn-info"> Detalii </button> </a>
                            <a href="./admin_pag_modif_cont.php?id_cont=<?php echo $id; ?>"><button class="btn btn-primary" >Modifica </button></a>
                            <button class="btn btn-danger" >Sterge</button>
                            </div>
                        </div>
                    </li>
                    <?php
                    // if($i>5){

                    // }
                }
            }
        }
                ?>
            
    </div>

</body>
</html>