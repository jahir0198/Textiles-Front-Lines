<?php 

if(isset($_POST)){

	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   	$rand_dir_name = substr(str_shuffle($chars), 0, 15);

 	$hoja_vida = $_FILES['hoja_vida'];
 	$hoja_vida_name = $hoja_vida["name"];

	echo json_encode(array("upload_filename" => $rand_dir_name."_".str_replace(array(" ", "(", ")", "--", "-(", ")-", "-",), "-", $hoja_vida_name), "selected_filename" => $hoja_vida_name ));
		

	move_uploaded_file($hoja_vida["tmp_name"], "../uploads/HV/".$rand_dir_name."_".str_replace(array(" ", "(", ")", "--", "-(", ")-", "-",), "-", $hoja_vida_name));

}

?>