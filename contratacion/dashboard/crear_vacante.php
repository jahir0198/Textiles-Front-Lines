<?php
	include("../inc/header.php");
	//include("../dashboard/crearvacante.php");
										    
	if($usertype != "Admin"){
        header("Location: ../dashboard");
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
				<div class="section_title">Crear vacante</div>
				<form id="advacante" class="clearfix" method="" action="">
					<div class="section_subtitle left">Datos</div>
					<label for="titulo_puesto">Titulo del puesto</label><br>
						<input type="text" class="inputField titulo_puesto"  name="titulo_puesto">
						<div class="error titulo_puestoerror"></div>
					<div class="input-box input-small left">
						
						<label for="id_vacante">ID vacante</label><br>
						<input type="text" class="inputField id_vacante" name="id_vacante"href ="aplicar_vacante.php=<?php echo $id_vacante ?>">
						<div class="error id_vacanteerror"></div>
					</div>
					<div class="input-box input-small right">
						
						<label for="nombre_vacante">Nombre de la vacante</label><br>
						<input type="text" class="inputField nombre_vacante" name="nombre_vacante">
						<div class="error nombre_vacanteerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="num_vacante">Numero de vacantes</label><br>
						<input type="text" class="inputField num_vacante" name="num_vacante">
						<div class="error num_vacanteerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="gerente_con">Gerente de contrataciones</label><br>
						<input type="text" class="inputField gerente_con" name="gerente_con">
						<div class="error gerente_conerror"></div>
					</div>
					<div class="input-box input-textarea left clearfix">
						<label for="descripcion">Descripción</label><br>
						<textarea class="inputField descripcion" name="descripcion"></textarea>
						<div class="error descripcionerror"></div>
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">Agregar vacante</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>