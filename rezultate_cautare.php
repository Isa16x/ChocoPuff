<?php 
if (!isset($_SESSION)) {
    session_start();
    }
require_once 'header.php'; 

if(isset($_POST['introducere_submit_button'])){
    ?> 
    <!-- <script>
        alert("Produs: <?php //echo  $_POST['nume_produs']; ?>");
    </script> -->
    <?php
   require_once 'conectarebd.php';

    $sql = "INSERT INTO `cart_items` (`id_cos`, `id_client`, `id_produs`, `produse`, `pret_produse`) VALUES (NULL, '".$_SESSION['id']."', '".$_POST['nume_produs']."', '', '');";
    if(mysqli_query($link, $sql) === TRUE){ 
        ?>
        <!-- <script>
            alert("merge ba ");
        </script> -->
        <?php
        }else{ 
            ?>
        <script>
            alert("pl");
        </script>
        <?php
        }  
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cautare</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
        <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./styles.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis&family=Montserrat&family=Nunito&family=Sevillana&display=swap" rel="stylesheet">



    </head>
    <body>
        <br><br>
        <h1 class="titlu_pag_detalii">Cautare: <?php echo $_GET['keyword']; ?> </h1>
        <br>
<?php
    require_once 'conectarebd.php';
    $keyword = $_GET['keyword'];
    ?> 
    <div class="card-deck"> 
        <div class="row">

    <?php
    $sql = 'SELECT * FROM `produse` WHERE nume_prod like "%'.$keyword.'%";';
    if($result = mysqli_query($link, $sql)){
        $numar_prod = mysqli_num_rows($result);
        if($numar_prod <=0){
            ?><div class="numar_produse"> 
            <p >Nu am gasit niciun produs. Reincercati.</p>
            </div>
            <p> </p>
            <?php
        }
		if(mysqli_num_rows($result) > 0){
            ?><div class="numar_produse"> 
            <p >Am gasit <?php echo mysqli_num_rows($result); ?> produse</p>
            </div>
            <p> </p>
            <?php
            while($row = mysqli_fetch_array($result)){
                $prod_nume = $row['nume_prod'];
                $prod_descriere = $row['descriere_prod'];
                $prod_pret = $row['pret_prod'];
                $tip_vanzare = $row['tip_vanzare'];
                $id_produs= $row['id_prod'];
                ?> 

<div class=" card col-md-3 columnsAlign p-3">
           <div class=" " style="width: 22rem" style="display: inline-block;">
                <img class="card-img-top" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poza_prod']); ?>" alt="<?php //$_GET['nume_cat'] ?>" alt="Card image cap" style="height: 20rem">
                <div class="card-block ">
                    <form action="#" method="POST">
                    <div class="card-body body-for-card">
                        <h5 class="card-title titlu-card" name="<?php echo $prod_nume?>"><?php echo $prod_nume; ?></h5>
                        <input type="hidden" name="nume_produs" value="<?php echo $id_produs;?>">
                        <p class="card-text text-card">
                            <?php  echo $prod_descriere; ?>
                            <br>
                        </p>
                    </div>
                    <div class="card-footer pret-prod">
                        <p class="text-card">
                        Pret: 
                            <?php  echo $prod_pret; ?>
                            lei/<?php echo $tip_vanzare; ?> </p>
                            <input type="submit" class="btn btn-primary buton-adaugare-cos" name="introducere_submit_button" value="Adauga in cos" />
                    </div>
                    </form>
                </div>
                
            </div>
            </div>
            
                <?php
		    }
		    mysqli_free_result($result);
		} else{
// 		    // echo "User sau parola incorecte.";
		    die();
		}
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
?>

    </body>
</html>