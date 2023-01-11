<?php if (!isset($_SESSION)) {
  session_start();
  }
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

<?php include 'header.php';
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET['nume_cat'];?></title>

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
    <h1 class="titlu_pag_cat"><?php echo $_GET['nume_cat'] ?></h1>
    <?php //print_r($_GET);?>
    <br><br>

    <div class="card">
        <!-- <div class="card-header citat_header">
            Citate celebre
        </div> -->
        <div class="card-body corp_card">
            <blockquote class="blockquote mb-0">
            <p class="citat_text"> <?php
                $randomNo = rand(1,13);
                $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
                $sql = 'SELECT * FROM proverbe_produse WHERE id_proverb="'.$randomNo.'" ';
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result);
                $citat = $row['proverb'];
                $autor = $row['autor'];
                $sursaCitat = $row['sursaCitat'];
                echo $citat;
                ?>   
            </p>
            <footer class="blockquote-footer citat_autor">
                <?php echo $autor; ?>
            <cite title="Source Title" class="sursa_citat"> 
                <b style="font-style: normal;">în</b>
                <?php echo $sursaCitat; ?>
            </cite>
            </footer>
            </blockquote>
        </div>
    </div>
    <br><br>

    
    <div class="card-deck"> 
        <div class="row">

    
        <?php 
            if($_GET['nume_cat']== "Toate Produsele"){
                $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
            $sql = 'SELECT * FROM produse ';
            }else{
            $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
            $sql = 'SELECT * FROM produse WHERE tip_prod="'.$_GET['nume_cat'].'" ';
            }
        if($result = mysqli_query($link, $sql)){  
            if(mysqli_num_rows($result) > 0){
                $i=0;
                while($row = mysqli_fetch_array($result)){
                    // print_r($row);
                    // $i=$i+1;  
                    // if($i<=3){
                        
                      
                    $prod_nume = $row['nume_prod'];
                    $prod_descriere = $row['descriere_prod'];
                    $prod_pret = $row['pret_prod'];
                    $id_produs= $row['id_prod'];
                    $tip_vanzare = $row['tip_vanzare'];
                    ?> 
           <div class=" card col-md-3 columnsAlign p-3">
           <div class=" " style="width: 22rem" style="display: inline-block;">
                <img class="card-img-top" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poza_prod']); ?>" alt="<?php $_GET['nume_cat'] ?>" alt="Card image cap" style="height: 20rem">
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
            
                // mysqli_free_result($result);
            } else{
                echo "Nu am gasit niciun produs.";
                die();
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
            

            function logat(){
                if($_SESSION['logat']==true){
                    echo "logat";
                }else{
                    echo "pl";
                }
            }

        ?>

    </div>
    </div>
    



    <script>
    function isLogat(){
        alert("surprize");
    }
        
    </script>
</body>
</html>