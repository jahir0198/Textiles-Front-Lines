<?php 
	ob_start();
	include("../inc/db_connect.php");
    if(isset($_POST['iniciar_sesion'])){
        if(strlen($_POST['username'])>=1 && strlen($_POST['password'])>=1 ){
        
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $consulta="INSERT INTO `registro_acceso` (`id`, `username`, `password`,`acceso`,`hora_acceso` ) VALUES (NULL, '$username', '$password')";
        $query = mysqli_query($db_connect, $consulta);

           echo"entrooooo";

        }
        

        }
         
			
        
    ?>