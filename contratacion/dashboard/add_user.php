<?php
	include("../inc/header.php");

    include('../phpclasses/pagination.php');

	if($usertype != "Admin"){
        header("Location: ../dashboard");
    }

?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sharpnet Employee Record</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    	<link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/jquery.mask.js"></script>
    </head>
<body>
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
				<div class="section_title">Agregar usuario</div>
				<form id="adduser" class="clearfix" method="" action="">
					<div class="input-box input-small left">
						<label for="idtype">Tipo de usuario</label><br>
						<select class="inputField usertype" name="idtype">
							<option value="">-- Seleccione rol --</option>
							<option value="Admin">Admin</option>
							<option value="Empleado">Empleado</option>
						</select>
						<div class="error usertypeerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">Primer nombre</label><br>
						<input type="text" class="inputField firstname" name="firstname">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="lastname">Apellidos</label><br>
						<input type="text" class="inputField lastname" name="lastname">
						<div class="error lastnameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="email">Correo electronico</label><br>
						<input type="email" class="inputField email" name="email">
						<div class="error emailerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="username">Nombre de usuario</label><br>
						<input type="text" class="inputField username" name="username">
						<div class="error usernameerror"></div>
					</div>
					
					<div class="input-box input-small left">
						<label for="password">Contraseña</label><br>
						<input type="password" class="inputField password" name="password">
						<div class="error passworderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="confirmpassword">Confirmar contraseña</label><br>
						<input type="password" class="inputField confirmpassword" name="confirmpassword">
						<div class="error confirmpassworderror"></div>
					</div>
					
					<div class="input-box">
						<button type="submit" class="submitField">Agregar usuario</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>