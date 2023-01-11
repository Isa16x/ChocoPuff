<?php if (!isset($_SESSION)) {
  session_start();
  }
//   echo session_id();
  ?>
<?php
// session_start();
// echo $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <script>
            // function add_dnone_class(){
            //     // const addElm=document.querySelectorAll("ism-pause-button").forEach(addElm => addElm.classList.add("d-none"));
            //     const elements = document.getElementsByClassName("ism-pause-button");
            //     while(elements.length > 0){
            //         elements[0].parentNode.removeChild(elements[0]);
            //     }
            // }
        </script>
        <title>Acasa</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
        <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@200&family=Montserrat:wght@200&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Tangerine&display=swap" rel="stylesheet">
            </head>
    <body>
    <?php 
        include 'header.php';
        include 'carousel.php'; ?>
    <br>
<!-- 
    <script>
    var categorie;
        function getCategorieInfo(var tipCategorie){
             categorie= tipCategorie;
            return categorie;
        }
    </script> -->
   <div class="mb-5" style="background-color: #d2b48c;">
    <div class="container py-2" style="max-width:1000px; ">   
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link btn btn-light rounded-pill px-2" style="background-color:aliceblue;" href="./pagina_categorii.php?nume_cat=Sarbatori%20Dulci" onclick= "$(this).addClass('clicked')">
            <input type="hidden" value ="Sarbatori Dulci">
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif; color:black;">Sărbatori dulci</b></a>
            
                
            <a class="flex-sm-fill text-sm-center nav-link btn btn-light rounded-pill" style="background-color:aliceblue;" href="./pagina_categorii.php?nume_cat=Prăjituri" >
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif; color:black;">Prăjituri</b></a>
            <a class="flex-sm-fill text-sm-center nav-link btn btn-light rounded-pill" style="background-color:aliceblue;" href="./pagina_categorii.php?nume_cat=Torturi">
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif; color:black;">Torturi</b></a>
            <a class="flex-sm-fill text-sm-center nav-link btn btn-light rounded-pill" style="background-color:aliceblue;" href="./pagina_categorii.php?nume_cat=Chocolaterie">
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif; color:black;">Chocolaterie</b></a>
            <a class="flex-sm-fill text-sm-center nav-link btn btn-light rounded-pill" style="background-color:aliceblue;" href="./pagina_categorii.php?nume_cat=Băuturi">
                <b style="line-height: 1.1; display: inline-block; top:70px; font-family: 'Montserrat', sans-serif; color:black;">Băuturi</b></a>
        </nav>
    </div>
    </div>
    
    <div class="row">
        <div class="col-sm">
            <h1 class="titluPrez">Ciocolata artizanala premium</h1>
            <br>
            <p class="descriere ">Choco Puff este locul în care iubitorii de ciocolată sunt invitați să ia parte la o specială călătorie gastronomică.
            Choco Puff este un producător de ciocolată premium, care oferă clienților săi o variată gamă de produse din ciocolată, și nu numai.
            Iubitorii de ciocolată pot să se relaxeze alături de pisicuțele noastre, în timp ce pot degusta un număr impresionant de arome, gusturi și texturi ce acompaniază gustul ciocolatei.
            <br><br>Daca vă îndrăgostiți de vreuna dintre prietenele noastre, pisicuțele, sunteți liber să o adoptați!</p>
        </div>
        
        <div id="carouselExampleControls" class="carousel slide carousel_pisici" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="./imagini/can-cats-eat-tapioca.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/cat_christmas_1.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/cat_date.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/cat_looking_with_hope_at_sweets.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/cat_with_coffee_sweets.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/shutterstock_347420495.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/Can-Cats-Eat-Sweets-720x405.jpeg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/cat-pic.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/cat_with_wine.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/pufu_sapca.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                    <div class="carousel-item">
                    <img src="./imagini/cat_between_shelves.jpg" class="d-block w-100" alt="..." width=593px height=396px>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
        </div>
    </div>
    <script src="jquery-3.6.1.js"></script>
    </body>
</html>