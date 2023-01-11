<?php if (!isset($_SESSION)) {
  session_start();
  }
  include 'conectarebd.php';
  $sql="SELECT * FROM utilizatori WHERE id = '".$_GET['id_cont']."'";
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $username = $row['username'];
            $parola = $row['parola'];
            $nume = $row['nume'];
            $prenume = $row['prenume'];
            $email = $row['email'];
            $cod_val_email = $row['cod_verif_email'];
            $email_verif = $row['email_verificat'];
            $telefon = $row['telefon'];
            $adresa_facturare = $row['adresa_facturare'];
            $adresa_livrare = $row['adresa_livrare'];
            $adresa_ip = $row['adresa_ip'];
            $data_creare_cont = $row['data_creare'];
            $ultima_data_logat = $row['logat_ultima_data'];

             
        }
        mysqli_free_result($result);
    } else{
        echo "N-am luat id u bine1.";
        die();
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sql="SELECT * FROM pisici_clienti WHERE id_client = '".$_GET['id_cont']."'";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
         
          $id_pisica= $row['id_pisica'];
          $nume_pisica= $row['nume'];
          $motiv_introducere= $row['motiv_introducere'];
          $descriere_pisica= $row['descriere'];
          $comportament= $row['comportament'];
          $afectiuni= $row['afectiuni'];
          $varsta= $row['varsta'];
          $data_creare_pisica= $row['data_creare'] ;

      }
      mysqli_free_result($result);
  } else{

  }
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
  ?>

<?php
require_once 'meniu-admin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET['id_cont'] ?></title>

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
    <h1 class="titlu_admin">Contul cu id #<?php echo $_GET['id_cont'] ?></h1>
    <br><br>


    <div class="container-mare border">
      <!-- <h3>Detalii administrative cont</h3> -->
      <div class="container-inclus border"><br>
      <h4 style="text-align: center;">Detalii administrative cont</h4><br>
      <form action="#" method="POST">
      <div class="row border">
         <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Id:   </b> </p><input type="text" name="id" value="<?php echo $_GET['id_cont']; ?>" > </div>
         <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Username:   </b> </p><input type="text" name="username"value="<?php echo $username; ?>" > </div>
         
         

      </div>
      <div class="row border">
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Parola:   </b> </p><input type="text" name="parola"value="<?php echo $parola; ?>" > </div>
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Nume:   </b> </p><input type="text" name="nume"value="<?php echo $nume; ?>" > </div>
         
     
      </div>
      <div class="row border">

        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Email:   </b> </p><input type="text" name="email"value="<?php echo $email; ?>" > </div>
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Cod Validare Email:   </b> </p><input type="text" name="cod_verif_email"value="<?php echo $cod_val_email; ?>" > </div>
         
      </div>
      <div class="row border">

      <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Email verificat:   </b> </p><input type="text" name="email_verif"value="<?php echo $email_verif; ?>" > </div>
      <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Telefon:   </b> </p><input type="text" name="telefon"value="<?php echo $telefon; ?>" > </div>
         
      </div>
      <div class="row border">
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Adresa de facturare:   </b> </p><input type="text" name="adresa_facturare"value="<?php echo $adresa_facturare; ?>" > </div>
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Adresa de livrare:   </b> </p><input type="text" name="adresa_livrare"value="<?php echo $adresa_livrare; ?>" > </div>
         
      
      </div>
      <div class="row border"> 
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Adresa IP:   </b> </p><input type="text" name="adresa_IP"value="<?php echo $adresa_ip; ?>" > </div>
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Data creare cont:   </b> </p><input type="text" name="data_creare_cont"value="<?php echo $data_creare_cont; ?>" > </div>
         
     
      </div>
      <div class="row border">
      <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Data ultimei logari in cont:   </b> </p><input type="text" name="ultima_data_logat"value="<?php echo $ultima_data_logat; ?>" class=" "> </div>
         
      </div>
      <div class="row border">
        <p> </p>
        <button class="btn btn-warning butoane_modificare_admin_cont_centered" name="buton_modificare_date_administrative_cont" id="buton_modificare_date_administrative_cont">
        Modifica datele
        </button>
        <p> </p>
      </div>
      </form>

      <?php 
      if(isset($_POST['buton_modificare_date_administrative_cont'])){
        include 'conectarebd.php';
        $sql = "UPDATE ";
      }

      function updateBDClientDetalii($chestia_de_updatat, $valoarea){
        include 'conectarebd.php';
        $sql = "UPDATE `utilizatori` SET `".$chestia_de_updatat."` = '".$valoarea."' WHERE `utilizatori`.`id` = ".$_GET['id_cont'].";";

      }
      ?>



      </div>
</div>
<br><br><br>

    <div class="container-mare border">
      <div class="container-inclus border"><br>
      <h4 style="text-align: center;">Detalii pisici introduse in programul pentru adoptii ale contului</h4><br>

<?php 
      $sql="SELECT * FROM pisici_clienti WHERE id_client = '".$_GET['id_cont']."'";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        
         
          $id_pisica= $row['id_pisica'];
          $nume_pisica= $row['nume'];
          $motiv_introducere= $row['motiv_introducere'];
          $descriere_pisica= $row['descriere'];
          $comportament= $row['comportament'];
          $afectiuni= $row['afectiuni'];
          $varsta= $row['varsta'];
          $data_creare_pisica= $row['data_creare'] ;

?>
          <div class="container-inclus border"><br>
          <div class="row ">

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id_pisica; ?>" style="width:30%; margin-left:35%">
  Vizualizeaza poza pisicii cu id <?php echo $id_pisica; ?> (introdusa de client!)
</button> 

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $id_pisica; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $id_pisica; ?>" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $id_pisica; ?>">Poza pisica cu id # <?php echo $id_pisica; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['poza_pisica']); ?>" alt="poza pisica" style="width:1110px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="row">
<p></p>   <p></p>
</div>



          <!-- <img src="data:image/jpg;charset=utf8;base64, <?php //echo base64_encode($row['poza_pisica']); ?>" alt="poza pisica" style="height:"> -->
        </div>
  
        <div class="row border">
        <p class="col-sm border-end"> <b>ID pisica: </b><?php echo $id_pisica;  ?></p>
           <p class="col-sm">  <b>Nume pisica: </b><?php echo $nume_pisica;  ?></p>
        </div>
        <div class="row border">
        <p class="col-sm border-end"> <b>Motivul introducerii pisicii in program: </b><?php echo $motiv_introducere;  ?></p>
           <p class="col-sm">  <b>Descrierea pisicii: </b><?php echo $descriere_pisica;  ?></p>
        </div>
        <div class="row border">
        <p class="col-sm border-end"> <b>Comportamentul pisicii: </b><?php echo $comportament;  ?></p>
           <p class="col-sm">  <b>Afectiunile pisicii: </b><?php echo $afectiuni;  ?></p>
        </div>
        <div class="row border">
        <p class="col-sm border-end"> <b>Varsta pisicii: </b><?php echo $varsta;  ?></p>
           <p class="col-sm">  <b>Data introducerii pisicii in program: </b><?php echo $data_creare_pisica;  ?></p>
        </div>
          </div>


          <div class="row border">
        <p> </p>
        <p></p>
        <button class=" btn btn-success butoane_modificare_admin_cont" name="buton_aprobare_pisica_id_<?php echo $id_pisica; ?>" id="buton_aprobare_pisica_id_<?php echo $id_pisica; ?>">
        Aproba pisica
        </button>
        <button class=" btn btn-danger butoane_modificare_admin_cont_right" name="buton_refuzare_pisica_id_<?php echo $id_pisica; ?>" id="buton_refuzare_pisica_id_<?php echo $id_pisica; ?>">
        Refuza pisica
        </button>

        <p> </p>
        <p> </p>
      </div>

      <div>
        <p>
          <p></p>
        </p>
      </div>

<?php
      }
      mysqli_free_result($result);
  } else{
    ?>
      <div class="row border"> 
        <p > Nu are pisici introduse.</p>
      </div>
    <?php  
      
  }
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

</div>
     
      


      </div>
      <br><br><br>

    <div class="container-mare border">
      <div class="container-inclus border"><br>
      <h4 style="text-align: center;">Detalii comenzi introduse de catre cont</h4><br>

      <?php 
      $sql="SELECT * FROM comenzi_finalizate_clienti WHERE id_client = '".$_GET['id_cont']."'";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $id_comanda = $row['id_comanda'];
        $id_produse = $row['id_produse'];
        $denumire_produse = $row['denumire_produse'];
        $subtotal = $row['subtotal'];
        $tva = $row['tva'];
        $total = $row['total'];
        
        
        ?>
        <div class="row border">
            <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>ID comanda:   </b> </p><input type="text" name="id_comanda"value="<?php echo $id_comanda; ?>" > </div>
            <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>ID produse:   </b> </p><input type="text" name="id_produse"value="<?php echo $id_produse; ?>" > </div>
 
        </div>
        <div class="row border">

          <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Denumire produse:   </b> </p><input type="text" name="denumire_produse"value="<?php echo $denumire_produse; ?>" style="width: 76.4%;" > </div>
          <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Subtotalul comenzii:   </b> </p><input type="text" name="subtotal_comanda"value="<?php echo $subtotal; ?>" > </div>
 
        </div>
        <div class="row border">
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>TVA:   </b> </p><input type="text" name="tva"value="<?php echo $tva; ?>" > </div>
 
        <div class="col-sm text-detalii-cont border-end"><p style="margin-right:2%;display: inline-block;">  <b>Total comanda:   </b> </p><input type="text" name="total"value="<?php echo $total; ?>" > </div>
 

        </div>
        
        <?php
      }
      mysqli_free_result($result);
  } else{
    ?>
      <div class="row border"> 
        <p > Nu are comenzi.</p>
      </div>
    <?php  
      die();
  }
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
} ?>

<div class="row border">
        <p> </p>
        <button class="btn btn-warning butoane_modificare_admin_cont_centered" name="buton_modificare_date_administrative_cont" id="buton_modificare_date_administrative_cont">
        Modifica datele
        </button>
        <p> </p>
      </div>
      </div>
</div>

    
</body>