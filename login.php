<?php
 if (!isset($_SESSION)) {
	session_start();
	}
	// echo session_id();
	// echo ini_get('session.cookie_domain');


include 'conectarebd.php';

if (!isset($_POST["username"]))
{
    include 'pag_login.php';
}else{

    $username=$_POST["username"];
	$parola=$_POST["parola"];	
	$link = mysqli_connect("localhost", "dreamlab_b", "ChXxbuXL6kEKj7m", "proiect");
	$sql = 'SELECT * FROM utilizatori WHERE username="'.$username.'"';
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
		    while($row = mysqli_fetch_array($result)){
		        $username_db = $row['username'];
				$parola_db = $row['parola'];
				$id_sesiune = $row['id']; 
				$is_admin = $row['admin'];
		    }
		    mysqli_free_result($result);
		} else{
		    // echo "User sau parola incorecte.";
		    // die();
		}
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
		
	if ($parola == $parola_db) {
		
		$_SESSION["id"] = $id_sesiune;
		// echo $id_sesiune;
		// echo $_SESSION["id"];
		$_SESSION['logat']=true;
		echo session_id();
//   echo ini_get('session.cookie_domain');
		
		// header("http://localhost/proiect_nou/index.php");
		?>
		<!-- <script>
			alert(<?php //echo $is_admin; ?>);
		</script> -->
		<?php
		if($is_admin != "true"){
			header('Location: http://localhost/proiect_nou/index.php', true);
		?> 
		<script>
		// window.location.replace("./index.php");
		 </script>
		 
		<?php
		echo $_SESSION['id'];	
	}
		else if($is_admin == "true"){
			?> 
		<script>
			// alert("logat");
		window.location.replace("./admin-index.php");
		 </script>
		 
		<?php
		
		}
		// echo "s-a loggat";
	}else{
		// header('Location: http://localhost/proiect_nou/index.php', true);
		include 'pag_login.php';
		?> 
		<script>
			alert("Parola sau username-ul introdus nu sunt corecte. Reincercati.");
		</script>
		<?php
	}


}
?>
