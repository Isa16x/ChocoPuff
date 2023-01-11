
<?php
if(isset($_POST['admin-conturi'])){
    header('Location: http://localhost/proiect_nou/admin-conturi.php', true);
}
if(isset($_POST['admin-angajati'])){
    header('Location: http://localhost/proiect_nou/admin-angajati.php', true);
}
if(isset($_POST['admin-produse'])){
    header('Location: http://localhost/proiect_nou/admin-produse.php', true);
}
if(isset($_POST['admin-categorii'])){
    header('Location: http://localhost/proiect_nou/admin-categorii.php', true);
}
if(isset($_POST['admin-adoptii-pisici'])){
    header('Location: http://localhost/proiect_nou/admin-adoptii.php', true);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        
        <title>Acasa Admin</title>
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
require_once 'meniu-admin.php';
?>
<br><br>
        <h1 class="titlu_pag_detalii">Bine ati venit la pagina pentru administratori Choco Puff.</h1>

        <br><br>
<br><br>
    <form action="#" method="POST">
        <div class="container_produse_cos border border_primary">
            <div class="row">
                <input type="submit" name="admin-conturi" class="col-sm btn btn-info butoane-admin-index" value="Administreaza conturile utilizatorilor">
                <input type="submit" name="admin-angajati" class=" col-sm btn btn-info butoane-admin-index" value="Administreaza conturile angajatilor">
            </div>
            <div class="row">
                <input type="submit" name="admin-produse" class="col-sm btn btn-info butoane-admin-index" value="Administreaza produse">
                <input type="submit" name="admin-categorii" class=" col-sm btn btn-info butoane-admin-index" value="Administreaza categorii">
            </div>
            <div class="row">
                <input type="submit" name="admin-adoptii-pisici" class="col-sm btn btn-info butoane-admin-last" value="Administreaza cereri introduceri pisici">
                
            </div>

        </div>
    </form>

    </body>
</html>