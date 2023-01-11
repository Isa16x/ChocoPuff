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
      <div class="row border">
         <p class="col-sm text-detalii-cont border-end">  <b>Id:</b> <?php echo $_GET['id_cont']; ?></p>
         <p class="col-sm text-detalii-cont ">  <b>Username:</b> <?php echo $username;  ?></p>

      </div>
      <div class="row border">
      <p class="col-sm border-end">  <b>Parola:</b> <?php echo $parola;  ?></p>
         <p class="col-sm"> <b> Nume:</b> <?php echo $nume;  ?></p>
      </div>
      <div class="row border">
      <p class="col-sm border-end"> <b> Email:</b> <?php echo $email;  ?></p>
         <p class="col-sm">  <b>Cod Validare Email:</b> <?php echo $cod_val_email;  ?></p>
      </div>
      <div class="row border">
      <p class="col-sm border-end"> <b> Email verificat: </b><?php echo $email_verif;  ?></p>
         <p class="col-sm">  <b>Telefon:</b> <?php echo $telefon;  ?></p>
      </div>
      <div class="row border">
      <p class="col-sm border-end">  <b>Adresa de facturare: </b><?php echo $adresa_facturare;  ?></p>
         <p class="col-sm"> <b> Adresa de livrare: </b><?php echo $adresa_livrare;  ?></p>
      </div>
      <div class="row border"> 
      <p class="col-sm border-end"> <b> Adresa IP: </b><?php echo $adresa_ip;  ?></p>
         <p class="col-sm">  <b>Data creare cont: </b><?php echo $data_creare_cont;  ?></p>
      </div>
      <div class="row border">
        <p class="col-sm border-end">  <b>Logat ultima data pe: </b><?php echo $ultima_data_logat;  ?></p>
      </div>




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
<?php
      }
      mysqli_free_result($result);
  } else{
    ?>
      <div class="row border"> 
        <p > Nu are pisici introduse.</p>
      </div>
    <?php  
      die();
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
        <p class="col-sm border-end"> <b>ID comanda: </b><?php echo $id_comanda;  ?></p>
           <p class="col-sm">  <b>ID-uri produse comandate: </b><?php echo $id_produse;  ?></p>
        </div>
        <div class="row border">
        <p class="col-sm border-end"> <b>Denumire produse: </b><?php echo $denumire_produse;  ?></p>
           <p class="col-sm">  <b>Subtotalul comenzii: </b><?php echo $subtotal;  ?></p>
        </div>
        <div class="row border">
        <p class="col-sm border-end"> <b>TVA: </b><?php echo $tva;  ?></p>
           <p class="col-sm">  <b>Totalul comenzii: </b><?php echo $total;  ?></p>
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
      </div>
</div>

    
</body>