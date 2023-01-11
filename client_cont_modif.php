<?php if (!isset($_SESSION)) {
  session_start();
  }
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
  ?>
<?php 
            function schimbaParola(){
                ?>
                <!-- <script>alert("se apeleaza");</script>  -->
                <?php
                $parola_veche = $_POST["parola_veche"];
                $parola_noua = $_POST["parola_noua"];
                $parola_noua_verif = $_POST["parola_noua_verif"];

                if($parola_veche==NULL || $parola_noua==NULL || $parola_noua_verif == NULL){
                        ?> 
                        <p>  </p>
                        <div class="alert alert-danger" role="alert">
                           Campurile nu pot fi goale.
                        </div>
                        <?php
                }else{

                require_once 'conectarebd.php';
                
                $sql = 'SELECT * FROM utilizatori WHERE id="'.$_SESSION['id'].'"';
	            if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $username_db = $row['username'];
                            $parola_db = $row['parola'];
                            $id_sesiune = $row['id']; 
                        }
                        mysqli_free_result($result);
                    } else{
                        echo "N-am luat id u bine.";
                        die();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }

                
                if($parola_veche == $parola_db){
                     if($parola_noua == $parola_noua_verif){
                    
                        $sql= 'UPDATE `utilizatori` SET `parola` = "'.$parola_noua.'" WHERE `utilizatori`.`id` = '.$_SESSION['id'].';';
                        // $conn = new mysqli("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
                        // if ($conn->connect_error) {
                            // die("Connection failed: " . $conn->connect_error);
                        // }
                            
                        if (mysqli_query($link, $sql) === TRUE){
                        ?> <script>
                            alert("s-a schimbat parola cu success");
                            </script> <?php
                        }else{
                            ?> <script>
                            alert("problema cu sql");
                            </script> <?php
                        }
                    }else{
                        ?> 
                        <p>  </p>
                        <div class="alert alert-warning" role="alert">
                            Parola noua introdusa nu se potriveste cu cea de la verificare! Reincercati!
                        </div>
                        <?php
                    }
                }else{
                    ?> 
                    <p>  </p>
                    <div class="alert alert-warning" role="alert">
                        Parola veche introdusa nu este corecta! Reincercati!
                    </div>
                    <?php
                }

            }
        }

        function introduDateInBD($data , $den_data_bd){
            require_once 'conectarebd.php';
            $sql= 'UPDATE `utilizatori` SET '.$den_data_bd.' = "'.$data.'" WHERE `utilizatori`.`id` = '.$_SESSION['id'].';';
            $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
                
            if (mysqli_query($link, $sql) === TRUE){
            ?> <script>
                alert("s-au schimbat datele cu success");
                </script> <?php
            }else{
                ?> <script>
                alert("problema cu sql");
                </script> <?php
            }
        }
        ?>
        <?php 
            function schimbaDatePersonale(){
                $nume_client = $_POST['nume_client'];
                $prenume_client = $_POST['prenume_client'];
                $telefon= $_POST['numar_telefon_nou'];
                $adresa_facturare = $_POST['adresa_facturare'];
                $adresa_livrare = $_POST['adresa_livrare'];
                if($nume_client==NULL && $prenume_client==NULL && $telefon ==NULL && $adresa_facturare==NULL && $adresa_livrare==NULL){
                    ?> 
                    <p>  </p>
                    <div class="alert alert-warning" role="alert">
                        Toate datele nu pot sa fie goale! Reincercati!
                    </div>
                    <?php
                }else{
                    if($nume_client !=NULL ){
                        introduDateInBD($nume_client, "nume");
                    }
                    if($prenume_client!=NULL){
                        introduDateInBD($prenume_client, "prenume");
                    }
                    if($telefon !=NULL){
                        introduDateInBD($telefon, "telefon");
                    }
                    if($adresa_facturare!=NULL){
                        introduDateInBD($adresa_facturare, "adresa_facturare");
                    }
                    if($adresa_livrare!=NULL){
                        introduDateInBD($adresa_livrare, "adresa_livrare");
                    }
                }
            }

            
            function trimiteCodPeEmail(){
                $adresa_mail_veche = $_POST['adresa_mail_veche'];
                $adresa_mail_noua = $_POST['adresa_mail_noua'];
                require_once 'conectarebd.php';
                $sql = 'SELECT * FROM utilizatori WHERE id="'.$_SESSION['id'].'"';
	            if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $email_bd = $row['email'];
                            
                        }
                        mysqli_free_result($result);
                    } else{
                        echo "N-am luat id u bine.";
                        die();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                if($adresa_mail_veche != $email_bd){
                    ?> 
                    <p>  </p>
                    <div class="alert alert-danger" role="alert">
                    Adresa de mail introdusa nu corespunde cu adresa de mail din baza de date.
                    </div>
                    <?php
                }else{
                    $cod_verif = random_int(100000, 999999);
                    
                    introduDateInBD($cod_verif, "cod_verif_email");
                    introduDateInBD($adresa_mail_noua, "email");

                    require "vendor/autoload.php";

                   


                    $developmentMode = true;
                    $mailer = new PHPMailer($developmentMode);

                    try {
                        $mailer->SMTPDebug = 0; //PUNE 2 PT CONVERSATIE
                        $mailer->isSMTP();

                        if ($developmentMode) {
                        $mailer->SMTPOptions = [
                            'ssl'=> [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            ]
                        ];
                        }


                        $mailer->Host = 'smtp.gmail.com';
                        $mailer->SMTPAuth = true;
                        $mailer->Username = 'test@gmail.com';
                        $mailer->Password = 'parolatest';
                        $mailer->SMTPSecure = 'tls';
                        $mailer->Port = 587;

                        $mailer->setFrom('chocolateriapup@gmail.com', 'Choco Puff');
                        $mailer->addAddress($adresa_mail_noua, 'Client');

                        $mailer->isHTML(true);
                        $mailer->Subject = 'Cod schimbare email';
                        $mailer->Body = 'Buna ziua, <br>
                        Mai jos veti gasi codul dvs de verificare pentru schimbarea adresei de mail.<br><b>
                         '.$cod_verif. '</b> <br>
                         Va multumim,<br><br>
                        
                         Echipa Choco Puff.';

                        $mailer->send();
                        $mailer->ClearAllRecipients();
                        // echo "MAIL HAS BEEN SENT SUCCESSFULLY";

                    } catch (Exception $e) {
                        echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
                    }


                }

            }

            function verificareCodCuBD(){
                require_once 'conectarebd.php';
                
                $cod_verificare = $_POST['cod_verif'];

                $sql = 'SELECT * FROM utilizatori WHERE id="'.$_SESSION['id'].'"';
	            if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $cod_verif_bd = $row['cod_verif_email'];
                             
                        }
                        mysqli_free_result($result);
                    } else{
                        echo "N-am luat id u bine.";
                        die();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                
                if($cod_verificare != $cod_verif_bd){
                    ?> 
                    <p>  </p>
                    <div class="alert alert-danger" role="alert">
                       Codul de verificare nu se potriveste.
                    </div>
                    <?php
                }else{
                    introduDateInBD("DA","email_verificat");
                    
                }

                
            }

            function punePozaInBD(){
                // require_once 'conectarebd.php';
                $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
                
                $nume_pisica = $_POST['nume_pisica'];
                $motiv_client = $_POST['motiv_client'];
                $descriere_pisica = $_POST['descriere_pisica'];
                $comportament= $_POST['comportament'];
                $afectiuni = $_POST['afectiuni'];
                $varsta = $_POST['varsta'];
                $status = 'error'; 
                if(!empty($_FILES["image"]["name"])) { 
                    ?>
        <!-- <script>
            alert("ajunge aici");
            alert("dd");
           
        </script> -->
        <?php
                    // Get file info 
                    $fileName = basename($_FILES["image"]["name"]); 
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                     
                    // Allow certain file formats 
                    $allowTypes = array('jpg','png','jpeg','gif'); 
                    if(in_array($fileType, $allowTypes)){ 
                        ?>
        <!-- <script>
            alert("ajunge aici2 ");
        </script> -->
        <?php
                        $image = $_FILES['image']['tmp_name']; 
                        $imgContent = addslashes(file_get_contents($image)); 
                    //  ?>
                     <!-- <script>
                         console.log("<?php //echo $imgContent; ?>")
                     </script> -->
                      <?php
                        // Insert image content into database 
                        $sql ="INSERT INTO `pisici_clienti` (`id_pisica`, `nume`,
                         `motiv_introducere`, `descriere`, `comportament`, `afectiuni`, `varsta`, `poza_pisica`, `data_creare`, `id_client`) 
                         VALUES (NULL,'" .$nume_pisica. "', '" .$motiv_client. "', '" .$descriere_pisica. "', '" .$comportament. "', '" .$afectiuni. "', '".$varsta."','$imgContent', NOW(), " .$_SESSION['id'] . ")"; 
                        //  echo mysqli_query($link, $sql) === TRUE; 
                        if(mysqli_query($link, $sql) === TRUE){ 
                            ?>
                        <!-- <script>
                            alert("merge ba ");
                        </script> -->
                        <?php
                        }else{ 
                            ?>
                        <!-- <script>
                            alert("pl");
                        </script> -->
                        <?php
                        }  
                    }else{ 
                        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
                        ?>
                    <!-- <script>
                        alert("si mai pl ");
                    </script> -->
        <?php
                    } 
            }
        }
        ?>
<?php
    if(isset($_POST['submitButton'])){
        // echo "imi bag picioarele in el de cod";  
        schimbaParola();
    }
    
    if(isset($_POST['submitButton_modif_date_personale'])){
        schimbaDatePersonale();
    }
     
    if(isset($_POST['submitButton_adresa'])){
        ?> 
        <p>  </p>
        <div class="alert alert-danger" role="alert">
           Reveniti la aceeasi parte pentru a va schimba adresa de mail prin introducerea codului.
        </div>
        <?php
        trimiteCodPeEmail();
    }
    if(isset($_POST['submitButton_adresa_cu_cod'])){
        verificareCodCuBD();
    }
    if(isset($_POST['submitButton_pisicute'])){
        ?>
        <!-- <script>
            alert("ajunge aici");
        </script> -->
        <?php
        punePozaInBD();
    }
    if(isset($_POST['sterge_cont_buton'])){
        include 'conectarebd.php';
        $sql= "DELETE FROM utilizatori WHERE `utilizatori`.`id` = ".$_SESSION['id']."";
        if(mysqli_query($link, $sql) === TRUE){ 
            ?> 
        <script>
            alert("a mers stergerea.")
        </script>
        <?php 
        session_unset();
        session_destroy();
        
        header('Location: http://localhost/proiect_nou/index.php', true);
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
        
        <title>Acasa</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
        <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./styles.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis&family=Montserrat&family=Sevillana&display=swap" rel="stylesheet">
    </head>
    <body>

<?php 
include "header.php";

?>
<br><br>
        <h1 class="titlu_pag_detalii">Detalii cont</h1>
        <br><br>
        <?php
        $id_client = $_SESSION['id']; 

        
        ?>

        <div class="meniu_client_accordion">
        <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Schimba parola
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body" >
                <div class=" ">

                <form method="POST" action="#">
                    <div class= "p-3 schimbare_parola_cont">
                    <p> Parola veche: </p>
                    <input type="text" name="parola_veche" id= "parola_veche"></input>
                    </div>

                    <div class="p-3 schimbare_parola_cont">
                    <p> Parola noua: </p>
                    <input type="text" name="parola_noua" id= "parola_noua"> </input>
                    </div>      
                    <div class=" p-3 schimbare_parola_cont">
                    <p> Verifica parola noua: </p>
                    <input type="text" name="parola_noua_verif" id= "parola_noua_verif"> </input>
                    </div>  
                    <div class="row">
                    <input class="send buton_parola_send col-md " type="submit" value="Trimite" name="submitButton">
                    </div>
                </form>
                
                </div>
            
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" id="headingTwo_addingClass" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Modifica date ale contului
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">


                                <div class="accordion border" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Modifica date personale
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        
                            <form action="#" method="POST">
                                    <p class="border" style="font-weight: bold;">Aici puteti modifica oricare dintre datele dvs personale, precum numele, prenumele sau numarul de telefon. 
                                    De asemenea, puteti modifica si adresa dvs de livrare sau de facturare. <br>
                                    Puteti alege sa schimbati un singur camp sau mai multe. 
                                    <br>Introduceti datele dvs in campurile corespunzatoare si apasati <b>Trimite</b>.
                                    </p>
                                    <div class= "p-3 schimbare_parola_cont">
                                    <p> Nume: </p>
                                    <input type="text" name="nume_client" id= "nume_client"></input>
                                    </div>

                                    <div class="p-3 schimbare_parola_cont">
                                    <p> Prenume: </p>
                                    <input type="text" name="prenume_client" id= "prenume_client"> </input>
                                    </div>      
                                    <div class=" p-3 schimbare_parola_cont">
                                    <p> Numar de telefon: </p>
                                    <input type="text" name="numar_telefon_nou" id= "numar_telefon_nou"> </input>
                                    </div>  
                                    <div class=" p-3 schimbare_parola_cont">
                                    <p> Adresa de facturare: </p>
                                    <input type="text" name="adresa_facturare" id= "adresa_facturare"> </input>
                                    </div>
                                    <div class=" p-3 schimbare_parola_cont">
                                    <p> Adresa de livrare: </p>
                                    <input type="text" name="adresa_livrare" id= "adresa_livrare"> </input>
                                    </div>

                                    <div class="row">
                                    <input class="send buton_parola_send col-md " type="submit" value="Trimite" name="submitButton_modif_date_personale">
                                    </div>
                            </form>

                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Modifica adresa de mail
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="#" method="POST">
                                <!-- <div class=" p-3 schimbare_parola_cont">
                                <p> Adresa de email veche: </p>
                                <input type="text" name="adresa_mail_veche" id= "adresa_mail_veche"> </input>
                                </div>

                                <div class=" p-3 schimbare_parola_cont">
                                <p> Adresa de email noua: </p>
                                <input type="text" name="adresa_mail_noua" id= "adresa_mail_noua"> </input>
                                </div> -->
                                <?php 
                                    if(isset($_POST['submitButton_adresa'])){

                                        ?> 
                                        <script>
                                            const clasa_de_schimbat = document.getElementById("collapseTwo");
                                            clasa_de_schimbat.classList.add("show");
                                            const clasa_de_schimbat2 = document.getElementById("flush-collapseTwo");
                                            clasa_de_schimbat2.classList.add("show");
                                            
                                        </script>
                                        <php

                                        ?> 
                                        <div class=" p-3 schimbare_parola_cont">
                                        <p> Cod verificare email: </p>
                                        <input type="text" name="cod_verif" id= "cod_verif"> </input>
                                        </div>
                                        <div class="row">
                                        <input class="send buton_parola_send col-md " type="submit" value="Trimite" name="submitButton_adresa_cu_cod">
                                        </div>
                                        <?php
                                    }else{
                                        
                                        ?>
                                        <p> Adresa de email veche: </p>
                                        <input type="text" name="adresa_mail_veche" id= "adresa_mail_veche"> </input>
                                        </div>

                                        <div class=" p-3 schimbare_parola_cont">
                                        <p> Adresa de email noua: </p>
                                        <input type="text" name="adresa_mail_noua" id= "adresa_mail_noua"> </input>
                                        </div>
                                        <div class="row">
                                        <input class="send buton_parola_send col-md " type="submit" value="Trimite" name="submitButton_adresa">
                                        </div>
                                    <?php } ?>

                            </form>
                        </div>
                        </div>
                    </div>
                    
                    </div>


            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Introdu o pisica pentru adoptie
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

                <form action="#" method="POST" enctype="multipart/form-data">
                <p>Poza pisicutei: </p>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="image" name="image">
                   
                    <!-- <input type="file" name="image"> -->
                    <!-- <input type="submit" name="submit" value="Upload"> -->
                    
                </div><br>

                <p>Numele pisicutei: <input type="text" name="nume_pisica" id="nume_pisica"></p><br>
                <p>Motivul pentru care doriti sa puneti pisicuta in program: </p>
                <div class="input-group input-group-lg">
                <input type="text" class="form-control" name="motiv_client" id="motiv_client" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
                <br>
                <p>Descrierea pisicutei: </p>
                <div class="input-group input-group-lg">
                <input type="text" name="descriere_pisica" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
                <br>
                <p>Comportament/Temperament: <input type="text" name="comportament" id="nume_pisica"></p> <br>
                <p>Afectiunile pisicutei: <input type="text" name="afectiuni" id="afectiuni"></p><br>
                <p>Varsta pisicutei: <input type="text" name="varsta" id="varsta"></p><br>

                <div class="row">
                    <input class="send buton_parola_send col-md " type="submit" value="Trimite" name="submitButton_pisicute">
                </div>
                </form>

            </div>
            </div>
        </div>
        
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Sterge contul
            </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body" >
                <div class=" ">

                <form method="POST" action="#">
                   
                    <div class="row">
                    <input class="send buton_stergere_cont col-md btn btn-danger" type="submit" value="Sterge contul" name="sterge_cont_buton">
                    </div>
                </form>
                
                </div>
            
            </div>
            </div>
        </div>


        </div>
        



        



    </body>
</html>
