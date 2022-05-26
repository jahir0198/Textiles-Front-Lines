<?php 
	ob_start();
	include("../inc/db_connect.php");

	

        $nombre_asp = mysqli_real_escape_string($db_connect, $_POST['nombre_asp']);
		$id_vacante = mysqli_real_escape_string($db_connect, $_POST['id_vacante']);
		$email = mysqli_real_escape_string($db_connect, $_POST['email']);
		$num_con = mysqli_real_escape_string($db_connect, $_POST['num_con']);
		$por_que = mysqli_real_escape_string($db_connect, $_POST['por_que']);
		$nationalID_name = mysqli_real_escape_string($db_connect, $_POST['nationalID_name']);
										
		//Check if user already exists
							
		//Count the amount of rows where username = $username
	

			$query = mysqli_query($db_connect, "INSERT INTO aplicar_vacante (`nombre_asp`,`id_vacante`,`email`,`num_con`,`por_que`,`hoja_vida`) VALUES ('$nombre_asp', '$id_vacante', '$email', '$num_con', '$por_que','$nationalID_name')");
			$querycount = mysqli_num_rows($query);
			
			ob_end_clean();			
			if($query){

				echo json_encode(array("status" => "Success"));
				exit();			
			} else {
				echo json_encode(array("status" => "failed"));
				exit();
			}

		
	

?>