<?php 
// session_destroy();

//include 'meniu.php';
include 'conectarebd.php';
include 'register.php';


        
            
            if (isset($_POST["username"])){
                // $conn = new mysqli("localhost", $userdb, $parola, $bazadedate);
                    // $ip=getenv("REMOTE_ADDR");
                    // //echo "<script> alert(" . $ip ."); </script>";
                    // echo "ADRESA IP ESTE: $ip";
                    $username=$_POST["username"]; 
                    // $username_get=$_GET["username"];
                    $email=$_POST["email"];
                    // echo $username;
            
                    $parola=$_POST["parola"];	
                    //echo $parola;
                    // $parola = password_hash($parola, PASSWORD_DEFAULT);
                    
            
                    //echo $parola;
                    $conn = new mysqli("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
                    $sql = "INSERT INTO utilizatori(username,parola, email, admin) VALUES( '".$username."', '".$parola."' , '".$email."', 'false')";
                    //mysqli_query($link, $sql);
                    //$conn->query($sql);
                    // $link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "dreamlab_b");
                    //  $conn->query($sql);
                    if ($conn->query($sql) === TRUE) {
                        ?> 
                        <script>
                            //window.location.replace("./index.php");
                            alert("s-a creat cu succes");
                        </script>
                        <?php
                        
                        
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }


               
                // session_destroy();
            //}
            
        
        ?>