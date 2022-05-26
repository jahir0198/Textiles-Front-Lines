<?php
	include("../inc/header.php");
										    
	if($usertype != "Admin"){
        header("Location: ../dashboard");
    }

    if(isset($_GET['id'])){
    	$record_id = mysqli_real_escape_string($db_connect, $_GET['id']);

    	$getinfo = mysqli_query($db_connect, "SELECT * FROM sharp_emp WHERE id = '$record_id' ");
        $getinfocount = mysqli_num_rows($getinfo);

        if($getinfocount == 1){
            if($fetch = mysqli_fetch_assoc($getinfo)){
                $employee_id = $fetch['employee_id'];
                $firstname = $fetch['first_name'];
                $middlename = $fetch['middle_name'];
                $lastname = $fetch['last_name'];
                $phone = $fetch['phone'];
                $employee_image = $fetch['employee_image'];
                $id_type = $fetch['id_type'];
                $id_number = $fetch['id_number'];
                $residence_address = $fetch['residence_address'];
                $residence_location = $fetch['residence_location'];
                $residence_direction = $fetch['residence_direction'];
                $residence_gps = $fetch['residence_gps'];
                $next_of_kin = $fetch['next_of_kin'];
                $relationship = $fetch['relationship'];
                $phone_of_kin = $fetch['phone_of_kin'];
                $kin_residence = $fetch['kin_residence'];
                $kin_residence_direction = $fetch['kin_residence_direction'];
                $date_employed = $fetch['date_employed'];
                $job_type = $fetch['job_type'];
                $status = $fetch['status'];
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
				<div class="section_title">Actualizar datos del empleado</div>
				<form id="editemployee" class="clearfix" method="" action="">
					<div class="section_subtitle">Datos personales</div>
					<input type="hidden" name="record_id" value="<?php echo $record_id ?>">
					<div class="input-box input-small left">
						<label for="employee_id">ID de empleado</label><br>
						<input type="text" class="inputField emp_id" placeholder="Optional" name="employee_id" value="<?php echo $employee_id ?>">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">Primer nombre</label><br>
						<input type="text" class="inputField firstname" name="firstname" value="<?php echo $firstname ?>">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="middlename">segundo nombre</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename" value="<?php echo $middlename ?>">
						<div class="error middlenameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="lastname">Apellidos</label><br>
						<input type="text" class="inputField lastname" name="lastname" value="<?php echo $lastname ?>">
						<div class="error lastnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="phone">Numero Telefonico</label><br>
						<input type="text" class="inputField phone" name="phone" value="<?php echo $phone ?>">
						<div class="error phoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="jobtype">Tipo de empleado</label><br>
						<input type="text" class="inputField jobtype" name="jobtype" value="<?php echo $job_type ?>">
						<div class="error jobtypeerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="dateemployed">Estado de empleo</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed" value="<?php echo $date_employed ?>">
						<div class="error dateemployederror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="empstatus">--Seleccione estatus--</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="<?php echo $status ?>"><?php echo $status ?></option>
							<option value="Ex empleado">Ex empleado</option>
							<option value="Empleado">Empleado</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="resaddress">Lugar de nacimiento</label><br>
						<input type="text" class="inputField resaddress" name="resaddress" value="<?php echo $residence_address?>">
						<div class="error resaddresserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="reslocation">Ciudad donde reside</label><br>
						<input type="text" class="inputField reslocation" name="reslocation" value="<?php echo $residence_location ?>">
						<div class="error reslocationerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="gpsreslocation">Codigo postal</label><br>
						<input type="text" class="inputField gpsreslocation" name="gpsreslocation" value="<?php echo $residence_gps ?>">
						<div class="error gpsreslocationerror"></div>
					</div>
					<div class="input-box input-textarea right clearfix">
						<label for="resdirection">Dirección de residencia</label><br>
						<textarea class="inputField resdirection" name="resdirection"><?php echo $residence_direction ?></textarea>
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
					<div class="section_subtitle left">Documento de identicación</div>
					<div class="input-box input-small left">
						<label for="idnumber">Numero</label><br>
						<input type="text" class="inputField idnumber" name="idnumber" value="<?php echo $id_number ?>">
						<div class="error IDnumbererror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="idtype">Tipo de documento</label><br>
						<select class="inputField idtype" name="idtype">
							<option value="<?php echo $id_type ?>"><?php echo $id_type ?></option>
							<option value="Cedula">Cedula</option>
							<option value="Passporte">Passporte</option>
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
						<input type="text" class="inputField fullname" name="fullname" value="<?php echo $next_of_kin ?>">
						<div class="error fullnameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="relationship">Relación con el empleado</label><br>
						<input type="text" class="inputField relationship" name="relationship" value="<?php echo $relationship ?>">
						<div class="error relationshiperror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="kinphone">Numero telefonico</label><br>
						<input type="text" class="inputField kinphone" name="kinphone" value="<?php echo $phone_of_kin ?>">
						<div class="error kinphoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="kinresaddress">Ciudad donde reside</label><br>
						<input type="text" class="inputField kinresaddress" name="kinresaddress" value="<?php echo $kin_residence ?>">
						<div class="error kinresaddresserror"></div>
					</div>
					<div class="input-box input-textarea left clearfix">
						<label for="kinresdirection">Dirección de residencia</label><br>
						<textarea class="inputField kinresdirection" name="kinresdirection"><?php echo $kin_residence_direction ?></textarea>
						<div class="error kinresdirectionerror"></div>
					</div>
					<div class="input-box">
						<button type="submit" class="submitField">Actualizar información</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>