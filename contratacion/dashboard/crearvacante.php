<?php 
	ob_start();
	include("../inc/db_connect.php");

	

        $id_vacante = mysqli_real_escape_string($db_connect, $_POST['id_vacante']);
		$titulo_puesto = mysqli_real_escape_string($db_connect, $_POST['titulo_puesto']);
		$nombre_vacante = mysqli_real_escape_string($db_connect, $_POST['nombre_vacante']);
		$num_vacante = mysqli_real_escape_string($db_connect, $_POST['num_vacante']);
		$gerente_con = mysqli_real_escape_string($db_connect, $_POST['gerente_con']);
		$descripcion = mysqli_real_escape_string($db_connect, $_POST['descripcion']);
	
										
		//Check if user already exists
							
		//Count the amount of rows where username = $username
	

			$query = mysqli_query($db_connect, "INSERT INTO nueva_vacante (`id_vacante`,`titulo_puesto`,`nombre_vacante`,`num_vacante`,`gerente_con`,`descripcion`) VALUES ($id_vacante, '$titulo_puesto', '$nombre_vacante', '$num_vacante', '$gerente_con', '$descripcion')");
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