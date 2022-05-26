<?php
	include("../inc/header.php");
										    
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
				<div class="section_title">Agregar empleado</div>
				<form id="addemployee" class="clearfix" method="" action="">
					<div class="section_subtitle">Datos personales</div>
					<div class="input-box input-small left">
						<label for="employee_id">ID de empleado</label><br>
						<input type="text" class="inputField emp_id" placeholder="Opcional" name="employee_id">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">Primer nombre </label><br>
						<input type="text" class="inputField firstname" name="firstname">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="middlename">Segundo nombre</label><br>
						<input type="text" class="inputField middlename" placeholder="Opcional" name="middlename">
						<div class="error middlenameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="lastname">Apellidos</label><br>
						<input type="text" class="inputField lastname" name="lastname">
						<div class="error lastnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="phone">Numero telefonico</label><br>
						<input type="text" class="inputField phone" name="phone">
						<div class="error phoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="jobtype">Tipo de empleado</label><br>
						<input type="text" class="inputField jobtype" name="jobtype">
						<div class="error jobtypeerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="dateemployed">Fecha de empleo</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed">
						<div class="error dateemployederror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="empstatus">Estado de empleo</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="">-- Seleccione status --</option>
							<option value="Ex empleado">Ex empleado</option>
							<option value="Empleado">Empleado</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="resaddress">Lugar de nacimiento</label><br>
						<input type="text" class="inputField resaddress" name="resaddress">
						<div class="error resaddresserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="reslocation">Ciudad donde reside</label><br>
						<input type="text" class="inputField reslocation" name="reslocation">
						<div class="error reslocationerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="gpsreslocation">Codigo postal</label><br>
						<input type="text" class="inputField gpsreslocation" name="gpsreslocation">
						<div class="error gpsreslocationerror"></div>
					</div>
					<div class="input-box input-textarea right clearfix">
						<label for="resdirection">Dirección de residencia</label><br>
						<textarea class="inputField resdirection" name="resdirection"></textarea>
						<div class="error resdirectionerror"></div>
					</div>
					<div class="section_subtitle left">Cargar foto de empleado</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="passport_photo" class="uploadField passport_photo">
								<div class="uploadfile passportPhoto_file">Cargar foto de empleado</div>
								<div class="filebtn passport-btn">Cargar</div>
								<div class="filebtn passport-disbtn">Cargar</div>
							</div>
						</div>
						<div class="error photoerror"></div>
						<div class="passport_file"></div>
					</div>
					<div class="section_subtitle left">Numero de identicación</div>
					<div class="input-box input-small left">
						<label for="idnumber">Numero</label><br>
						<input type="text" class="inputField idnumber" name="idnumber">
						<div class="error IDnumbererror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="idtype">Tipo de documento</label><br>
						<select class="inputField idtype" name="idtype">
							<option value="">-- Seleccione tipo de documento --</option>
							<option value="Cedula">Cedula</option>
							<option value="Pasaporte">Pasaporte</option>
							<option value="Tarjeta de identidad">Tarjeta de identidad</option>
							<option value="Licencia de conducir">Licencia de conducir</option>
						</select>
						<div class="error idtypeerror"></div>
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
					<div class="section_subtitle left">Pariente cercano</div>
					<div class="input-box input-small left">
						<label for="fullname">Nombre completo</label><br>
						<input type="text" class="inputField fullname" name="fullname">
						<div class="error fullnameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="relationship">Relación con el empleado</label><br>
						<input type="text" class="inputField relationship" name="relationship">
						<div class="error relationshiperror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="kinphone">Numero telefonico</label><br>
						<input type="text" class="inputField kinphone" name="kinphone">
						<div class="error kinphoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="kinresaddress">Ciudad donde reside</label><br>
						<input type="text" class="inputField kinresaddress" name="kinresaddress">
						<div class="error kinresaddresserror"></div>
					</div>
					<div class="input-box input-textarea left clearfix">
						<label for="kinresdirection">Dirección de residencia</label><br>
						<textarea class="inputField kinresdirection" name="kinresdirection"></textarea>
						<div class="error kinresdirectionerror"></div>
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">Agregar empleado</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>