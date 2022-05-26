<?php
	include("../inc/header.php");

    include('../phpclasses/pagination.php');
   
    if(isset($_GET['id_vacante'])){
    	$record_id = mysqli_real_escape_string($db_connect, $_GET['id_vacante']);

    	$getinfo = mysqli_query($db_connect, "SELECT * FROM nueva_vacante WHERE id_vacante = '$record_id' ");
        $getinfocount = mysqli_num_rows($getinfo);

        if($getinfocount == 1){
            if($fetch = mysqli_fetch_assoc($getinfo)){
                $id_vacante = $fetch['id_vacante'];
               
            }
        }
    } else {
    	echo "Invalid Approach";
    	exit();
    }

?>
	<section class="side-menu fixed left">
		<div class="top-sec">
		<div class="dash_logo">
			</div>
			<p>Front Line Textiles</p>
			
			<h3>Usuario: <?php echo $_SESSION['username']?></h3>
			</div>
            <ul class="nav">
			<li class="nav-item current"><a href="../dashboard"><span class="nav-icon"><i class="fa fa-users"></i></span>Todos los empleados</a></li>
			<li class="nav-item"><a href="../dashboard/current_employees.php"><span class="nav-icon"><i class="fa fa-check"></i></span>Empleados actuales</a></li>
			<li class="nav-item"><a href="../dashboard/past_employees.php"><span class="nav-icon"><i class="fa fa-times"></i></span>Empleados anteriores</a></li>
			<li class="nav-item"><a href="../dashboard/ver_vacantes.php"><span class="nav-icon"><i class="fa fa-eye"></i></span>Ver vacantes</a></li>
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Agregar empleado</a></li>
				<li class="nav-item"><a href="../dashboard/crear_vacante.php"><span class="nav-icon"><i class="fa fa-edit"></i></span>Crear vacante</a></li>
				<li class="nav-item"><a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user"></i></span>Agregar usuario</a></li>
				<li class="nav-item"><a href="../dashboard/aspirante_vacante.php"><span class="nav-icon"><i class="fa fa-trophy"></i></span>Aspirantes a vacante</a></li>
				<li class="nav-item"><a href="../dashboard/registro_acceso.php"><span class="nav-icon"><i class="fa fa-vcard"></i></span>Registro de acceso </a></li>
			<?php		} ?>
			<li class="nav-item"><a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span>configuración</a></li>
			<li class="nav-item"><a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span>Salir</a></li>
		</ul>
        </section>
       
	<section class="contentSection right clearfix">
		<div class="displaySuccess"></div>
		<div class="container">
			<div class="wrapper add_employee clearfix">
				<div class="section_title">Aplicar vacante</div>
				<form id="aplicar_vacante" class="clearfix" method="" action="">
					<div class="section_subtitle left">Datos</div>
					<label for="nombre_asp">Nombre del aspirante</label><br>
						<input type="text" class="inputField nombre_asp"  name="nombre_asp">
						<div class="error titulo_puestoerror"></div>
					<div class="input-box input-small left">
						
						<label for="id_vacante">ID vacante</label><br>
						<input type="text" class="inputField id_vacante"readonly name="id_vacante"value="<?php echo $id_vacante ?>">  
						<div class="error id_vacanteerror"></div>
					</div>
					<div class="input-box input-small right">
						
						<label for="email">Correo electronico</label><br>
						<input type="text" class="inputField email" name="email">
						<div class="error emailerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="num_con">Numero de contacto</label><br>
						<input type="text" class="inputField num_con" name="num_con">
						<div class="error num_conerror"></div>
					</div>
					
					<div class="input-box input-textarea left clearfix">
						<label for="por_que">¿Por que cree que merece la vacante?</label><br>
						<textarea class="inputField por_que" name="por_que"></textarea>
						<div class="error por_queerror"></div>
					</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="nationalID" class="uploadField nationalID">
								<div class="uploadfile nationalID_file">Cargar el documento de identificación</div>
								<div class="filebtn nationID-btn">Cargar</div>
								<div class="filebtn nationID-disbtn">Cargar</div>
							</div>
						</div>
						<div class="error nationalIDerror"></div>
						<div class="selected_nationalID_file"></div>
					</div>
                   
					<div class="input-box">
						<button type="submit" class="submitField">Aplicar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>