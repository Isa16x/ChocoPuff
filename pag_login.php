<?php if (!isset($_SESSION)) {
  session_start();
  }
  // echo session_id();
  // echo ini_get('session.cookie_domain');
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
        <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script> 
        <link rel="stylesheet" href="./styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@200&family=Montserrat:wght@200&family=Sacramento&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Tangerine&display=swap" rel="stylesheet">
    <title>Login</title>
  </head>
    <body>
    <?php include 'header.php'; ?>

        <br><br>
        <h1 class="titlu_pag_cat">Login </h1>
        <br><br>

        <div class="inregistrare_form">
        
        <form method="POST" action="login.php">
        <fieldset>
        <div class="row mb-3">
          <legend style="font-size:20px" class="titlu_info_cont_inregistrare">Intră în cont</legend>
          <br>
          <br>
        <br>
          
          <label for="username" class="col-sm-2 col-form-label">
          Username: 
          </label>
          <br>
          <input type="text" name="username" id="username" required placeholder="Username" class="col-sm-10" ><br>
          <p> </p> 

          <label for="parola" class="col-sm-2 col-form-label">
          Parola:
          </label>
          <br>
          <input type="password" name="parola" id= "parola" required placeholder="Parola" class="col-sm-10"><br>
          <p> </p>

          <!-- <label for="email"  class="col-sm-2 col-form-label">
          Adresa email:
          </label>
          <br>
          <input type="text" name="email" id="email" required placeholder="Introdu adresa de mail" class="col-sm-10"> <br>
          <p> </p> -->
         
          
        </div>
        <input class="send send-buton" type="submit" value="Trimite">
        </fieldset>
        </form>

        <br>
        <div class="inregistrare_deja_un_cont">
            <p class="titlu_ai_deja_cont">Nu ai cont? </p>
            <a href="inregistrare.php" class=" buton_inregistreaza-te">Inregistreaza-te</a>
        </div>
        <br><br>

    </body>
</html>