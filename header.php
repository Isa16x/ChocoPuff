<?php //session_start(); 

// function cautareInBD(){
//     require_once 'conectarebd.php';
//     $keyword = $_GET['keyword'];

//     $sql = 'SELECT * FROM `pisici_clienti` WHERE nume like "%'.$keyword.'%";';
//     if($result = mysqli_query($link, $sql)){
// 		if(mysqli_num_rows($result) > 0){
//             ?> 
<!-- //             <script>
//                 window.location.replace("rezultate_cautare.php");
//             </script> -->
             <?php
// 		    while($row = mysqli_fetch_array($result)){
// 		        // $username_db = $row['username'];
// 				// $parola_db = $row['parola'];
// 				// $id_sesiune = $row['id']; 
// 				// $is_admin = $row['admin'];
// 		    }
// 		    mysqli_free_result($result);
// 		} else{
// 		    // echo "User sau parola incorecte.";
// 		    die();
// 		}
// 	} else{
// 		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// 	}
// }



if(isset($_GET['submit_cautare'])){
    ?>
    <script>
        window.location.replace("./rezultate_cautare.php?keyword=<?php echo $_GET['keyword'];?>")
    </script>
    <?php
}
?>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Tangerine&display=swap" rel="stylesheet">
  </head>
    <body> -->
    <nav class="navbar navbar-expand-lg navbar-light row" style="background-color: #d2b48c;">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img src="./imagini/logo3.jpg" alt="logo" width="160px" height="90px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarNavDropdown">
        <ul class="navbar-nav">
           
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./pagina_categorii.php?nume_cat=Toate%20Produsele" class="d-none d-lg-flex align-items-center ml-auto ml-lg-0 text-dark" >
                <img src="./imagini/cookie_new.png" alt="logo_cats" height="60px">
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif;">COMANDĂ <br>ONLINE</b>
            </a>
            </li>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                
                <div class="navbar-nav mx-auto d-flex align-items-center d-sm-none d-lg-block col-md-4">
               
                <form action="" method="GET" class="d-flex">
              
                         <input type="text" name="keyword" value="" autocomplete="off" placeholder="Ce poftă ai azi?" class="form-control " style="min-width: 280px;">
                         <!-- <a href="./rezultate_cautare.php?keyword=<?php if(isset($_GET['submit_cautare'])){echo $_GET['keyword'];}?>"> -->
                         <button class="btn btn-secondary btn-light" style="display: inline-block;" type="submit" name="submit_cautare">Căutare</button>
                         <!-- </a>  -->
                        </form>
                        
                    </div>
            
            </div>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="adopt.php" class="d-none d-lg-flex align-items-center ml-auto ml-lg-0 text-dark col-md-1" >
                <img src="./imagini/cat_silhouette.png" alt="logo_cats" height="60px">
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif;">ADOPTĂ <br>ONLINE <br> </b>
            </a>
            </li>
            <?php if (!isset($_SESSION["id"])){ ?>
            <li class="nav-item">
            <a class="nav-link col-md-1 p-3" href="inregistrare.php"><b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif;">REGISTER </b></a>
            </li>
            <li class="nav-item">
            <a class="nav-link col-md-1 p-3" href="login.php"><b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif;">LOGIN</b></a>
            </li>
            <?php } else if(isset($_SESSION["id"])) { ?>

                <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cos_cumparaturi.php" class="d-none d-lg-flex align-items-center ml-auto ml-lg-0 text-dark col-md-1" >
                <img src="./imagini/cos_cump.png" alt="logo_cats" height="60px">
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif;">Cos <br>Cumparaturi <br> </b>
            </a>
            </li>

            <li class= "nav-tem">
                <a class= "nav-link col-md-1 p-3" href="client_cont_modif.php" ><b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif; color:black"> Contul meu </b> </a>

            </li>

            <li class="nav-item">
            <a class="nav-link col-md-1 p-3" href="logout.php"><b  style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif; color:black;">LOGOUT</b></a>
            </li>
            
            <?php } ?>
        </ul>
        </div>
    </div>
    </nav>
      
       <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script> 
  <!-- </body>
</html> -->