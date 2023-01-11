<?php if (!isset($_SESSION)) {
  session_start();
  }
  if(isset($_POST['submit_comanda_button'])){
    ?> 
                
    <script>
        //alert("ajunge aici");
        
    </script>
    <?php
    
    $total_comanda=$_POST['total_comanda'];
    $subtotal = $_POST['subtotal_comanda'];
    $tva = $_POST['tva_comanda'];

    include 'conectarebd.php';
    $numar_produse=0;
    $sql="SELECT * FROM produse as prod join cart_items as cart on cart.id_produs= prod.id_prod where cart.id_client = ".$_SESSION['id'].";";
    if($result = mysqli_query($link, $sql)){
        ?> 
                
                <script>
                    // alert("ok 45");
                  
                </script>
                <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $numar_produse++;
                $id_produs = $row['id_produs'];
                $produse = $row['nume_prod'];
                if($numar_produse==1){
                    $id_produse_pentru_introdus_comenzi = " ".strval($id_produs)."";
                    $denumire_produse= $produse;
                }
                if($numar_produse!=1)
                {
                    $id_produse_pentru_introdus_comenzi = $id_produse_pentru_introdus_comenzi.", ".strval($id_produs).", ";
                    $denumire_produse= $denumire_produse.", ".$produse;
                }
                // if($numar_produse!=1 &&)
                ?> 
                
                <!-- <script>
                    alert("<?php //echo $id_produse_pentru_introdus_comenzi; ?>");
                </script> -->
                <?php
                
                
            }
            mysqli_free_result($result);
        } else{
            ?> 
                
                <script>
                    alert("pl");
                </script>
                <?php
            die();
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }


    $sql="INSERT INTO comenzi_finalizate_clienti(id_produse, denumire_produse, subtotal, tva, total, id_client) 
    VALUES('".$id_produse_pentru_introdus_comenzi."','".$denumire_produse."', ".$subtotal.", ".$tva.", ".$total_comanda.", '".$_SESSION['id']."');";
    if(mysqli_query($link, $sql) === TRUE){ 
        $sql2 = "DELETE FROM cart_items where `cart_items`.`id_client` = ".$_SESSION['id']." ;";
        if(mysqli_query($link,$sql2)=== TRUE){
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

  
  if(isset($_POST['stergere_buton'])){
      $id_de_sters= $_POST['id_pt_stergere'];
      stergeDinCos($id_de_sters);
      header("Refresh:0");
  }

function stergeDinCos($id_produs){
    require_once 'conectarebd.php';
    $sql = "DELETE FROM cart_items WHERE `cart_items`.`id_cos` = $id_produs";
    if(mysqli_query($link, $sql) === TRUE){ 
        ?> 




        <!-- <script>
            alert("a mers stergerea.")
        </script> -->
        <?php 
    }else{
        ?> 
        <script>
            alert("pl.")
        </script>
        <?php 
    }

}

  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        
        <title>Cos</title>
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

<?php 
include "header.php";

?>
<br><br>
        <h1 class="titlu_pag_detalii">Cosul dvs. de cumparaturi</h1>

        <br><br>
        <div class="container_produse_cos">
        <p class="den_prod_dvs">Produsele dvs. din cos: </p>
        </div>
        <div class="container_produse_cos border border_primary">
            
            <?php
                include 'conectarebd.php';
                $sql = "SELECT * FROM produse as prod join cart_items as cart on cart.id_produs= prod.id_prod where cart.id_client = ".$_SESSION['id'].";";
                $pret_total=0;
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        ?> 
                        <div class="row">
                        <p class="col-sm denumire-cos border-end border-bottom" style="font-weight: bold; font-size:21px"> Denumire </p>
                        <p class="col-sm pret-cos border-end border-bottom" style="font-weight: bold; font-size:21px"> Pret</p>
                        <p class="col-sm denumire-cos border-bottom" style="font-weight: bold; font-size:21px"> Sterge </p>
                        
                        </div>
                    <br> <?php
                        while($row = mysqli_fetch_array($result)){
                            // $username_db = $row['username'];
                            // $parola_db = $row['parola'];
                            // $id_sesiune = $row['id']; 
                            // $is_admin = $row['admin'];
                            $nume_prod = $row['nume_prod'];
                            $pret_prod = $row['pret_prod'];
                            $pret_total = $pret_total + $pret_prod;
                            $id_cos = $row['id_cos'];
                            ?> 
                                <form action="#" method="POST">
                                <div class="row">
                                    <p class="col-sm denumire-cos border-end "> <?php echo $nume_prod; ?> </p>
                                    <p class="col-sm border-end pret-cos"> <?php echo $pret_prod; ?></p>
                                    <input type="hidden" value="<?php echo $id_cos; ?>" name="id_pt_stergere">
                                    <div class="col-sm">
                                    <input type="submit" id="stergere_buton" name="stergere_buton" class="denumire-cos border-bottom btn btn-danger buton_stergere" value="Sterge"> 
                                    </div>
                                    
                                </div>
                                </form>
                                <?php 
                        }
                        
                        mysqli_free_result($result);
                    } else{
                        ?> 
                        <div class="row">
                            <p class="denumire-cos ">Nu aveti produse in cos. <a href="./pagina_categorii.php?nume_cat=Toate%20Produsele">Apasati aici</a> sa incepeti cumparaturile</p>
                        </div>
                        <?php
                        
                        die();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
            ?>
            

        </div>
        <br>
        <form action="#" method="POST">
        <div class="container-pret-cos">
                <div class="row" style="font-weight: bold; font-size:22px">
                <p> Subtotal: <?php echo $pret_total;?> lei </p>
                </div>
                <div class="row" style="font-weight: bold; font-size:22px">
                <p>TVA: <?php $tva = $pret_total*0.09; echo $tva; ?> lei</p>
                </div>
                <div class="row" style="font-weight: bold; font-size:22px">
                <p name="total_comanda">Total: <?php $total = $pret_total+$tva; echo $total; ?> lei</p>
                <input type="hidden" name="total_comanda" value="<?php echo $total;?>">
                <input type="hidden" name="subtotal_comanda" value="<?php echo $pret_total;?>">
                <input type="hidden" name="tva_comanda" value="<?php echo $tva;?>">
                </div>
            </div>

            <input type="submit" name="submit_comanda_button" id="submit_comanda_button" class="submit_comanda_button" value= "Comanda">
        </form>
    </body>
</html>