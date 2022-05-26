<?php
	include("../inc/header.php");

    include('../phpclasses/pagination.php');

    $limit = 10;
	    
	//get number of rows
	$queryNum = $db_connect->query("SELECT COUNT(*) as postNum FROM sharp_emp LIMIT $limit");
	$resultNum = $queryNum->fetch_assoc();
	$rowCount = $resultNum['postNum'];
										    
	//initialize pagination class
	$pagConfig = array(
		'totalRows' => $rowCount,
		'perPage' => $limit,
		'link_func' => 'searchFilter'
	);
	$pagination =  new Pagination($pagConfig);
										    
	//get rows


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
		<div class="container">
			<div class="wrapper employee_list clearfix">
				<div class="section_title">Todos los empleados</div>
				<div class="top-bar">
					<div class="top-item">
						<form id="empFilter" method="post" action="">
							<input class="filterField filterVal" type="text" placeholder="Ingrese el nombre" onkeyup="searchFilter()">
						</form>
					</div>
					<div class="top-item">
						<form id="empFilter" method="post" action="">
							<select class="sortField sortVal" onchange="searchFilter()">
								<option value="ASC">Mas reciente</option>
								<option value="DESC">Mas antiguo</option>
							</select>
						</form>
					</div>
				</div>
				<?php
					$getemp = mysqli_query($db_connect, "SELECT * FROM sharp_emp ORDER BY id ASC LIMIT $limit");
					$getempcount = mysqli_num_rows($getemp);
				?>
				<ul class="emp_list">
					<li class="emp_list_head">
						<div class="emp_item_head emp_id"style="width: 50px;">ID </div>
						<div class="emp_item_head emp_name">Nombre</div>
						<div class="emp_item_head">Fecha </div>
						<div class="emp_item_head">Cargo</div>
						<div class="emp_item_head emp_status">Estatus</div>
						<div class="emp_item_head">Acción</div>
					</li>
					<div id="displayempList">
						<?php
							if($getempcount >= 1 ){
								while($fetch = mysqli_fetch_assoc($getemp)){
									$id = $fetch['id'];
									$emp_id = $fetch['employee_id'];
									$first_name = $fetch['first_name'];
									$middle_name = $fetch['middle_name'];
									$last_name = $fetch['last_name'];
									$date_employed = $fetch['date_employed'];
									$job_type = $fetch['job_type'];
									$status = $fetch['status'];

									//$date_employed = date("jS F Y", strtotime($date_employed));

									if($middle_name == ""){
										if($usertype == "Admin"){
											echo '										
												<li class="emp_item">
													<div class="emp_column emp_id"style="width: 50px;">'.$emp_id.'</div>
													<div class="emp_column emp_name">'.$first_name." ".$last_name.'</div>
													<div class="emp_column">'.$date_employed.'</div>
													<div class="emp_column">'.$job_type.'</div>
													<div class="emp_column emp_status">'.$status.'</div>
													<div class="emp_column">
														<ul class="action_list">
															<li class="action_item action_view" data-id="'.$id.'" title="Ver"><i class="fa fa-eye"></i></li>
															<li class="action_item action_edit" data-id="'.$id.'" title="Editar"><i class="fa fa-pencil-square-o"></i></li>
															<li class="action_item action_delete" data-id="'.$id.'" title="Eliminar"><i class="fa fa-trash-o"></i></li>
														</ul>
													</div>
												</li>
											';
										} else {
											echo '										
												<li class="emp_item">
													<div class="emp_column emp_id"style="width: 50px;">'.$emp_id.'</div>
													<div class="emp_column emp_name">'.$first_name." ".$last_name.'</div>
													<div class="emp_column">'.$date_employed.'</div>
													<div class="emp_column">'.$job_type.'</div>
													<div class="emp_column emp_status">'.$status.'</div>
													<div class="emp_column">
														<ul class="action_list">
															<li class="action_item action_view" data-id="'.$id.'" title="Ver"><i class="fa fa-eye"></i></li>
														</ul>
													</div>
												</li>
											';											
										}
									} else {
										if($usertype == "Admin"){
											echo '										
												<li class="emp_item">
													<div class="emp_column emp_id"style="width: 50px;">'.$emp_id.'</div>
													<div class="emp_column emp_name">'.$first_name." ".$middle_name." ".$last_name.'</div>
													<div class="emp_column">'.$date_employed.'</div>
													<div class="emp_column">'.$job_type.'</div>
													<div class="emp_column emp_status">'.$status.'</div>
													<div class="emp_column">
														<ul class="action_list">
															<li class="action_item action_view" data-id="'.$id.'" title="Ver"><i class="fa fa-eye"></i></li>
															<li class="action_item action_edit" data-id="'.$id.'" title="Editar"><i class="fa fa-pencil-square-o"></i></li>
															<li class="action_item action_delete" data-id="'.$id.'" title="Borrar"><i class="fa fa-trash-o"></i></li>
														</ul>
													</div>
												</li>
											';
										} else {

											echo '										
												<li class="emp_item">
													<div class="emp_column emp_id"style="width: 50px;">'.$emp_id.'</div>
													<div class="emp_column emp_name">'.$first_name." ".$middle_name." ".$last_name.'</div>
													<div class="emp_column">'.$date_employed.'</div>
													<div class="emp_column">'.$job_type.'</div>
													<div class="emp_column emp_status">'.$status.'</div>
													<div class="emp_column">
														<ul class="action_list">
															<li class="action_item action_view" data-id="'.$id.'" title="Ver"><i class="fa fa-eye"></i></li>
														</ul>
													</div>
												</li>
											';
										}
									}
								}
								echo $pagination->createLinks();
							} else {
								echo '<li class="emp_item"> No se encontró ningún registro de ese empleado </li>';
							}
						?>
					</div>
				</ul>
			</div>
		</div>
		<div class="modal">
			<span class="close-modal">
				<img src="../images/times.png">
			</span>
			<div class="inner_section">
				<div id="record_container" class="record_container">
					<span class="print-modal" onclick="Clickheretoprint()">
						<img src="../images/print.png">
					</span>
					<div id="table">
					</div>
					<div class="printbtn_wrapper">
						<span class="printbtn"> Imprimir</span>
					</div>
				</div>
			</div>
		</div>
		<div class="del_modal">
			<div class"inner_section">
				<div class="delcontainer">
					<div class="del_title">Eliminar el registro</div>
					<div class="del_warning"></div>
					<div class="btnwrapper">
						<span class="delbtn yesbtn" data-id="">Si</span>
						<span class="delbtn nobtn">No</span>
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>