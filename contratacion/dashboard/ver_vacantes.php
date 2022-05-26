<?php
	include("../inc/header.php");

    include('../phpclasses/pagination.php');

    $limit = 10;
	    
	//get number of rows
	$queryNum = $db_connect->query("SELECT COUNT(*) as postNum FROM nueva_vacante ");
	$resultNum = $queryNum->fetch_assoc();
	$rowCount = $resultNum['postNum'];
										    
	//initialize pagination class
	$pagConfig = array(
		'totalRows' => $rowCount,
		'perPage' => $limit,
		'link_func' => 'currsearchFilter'
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
				<div class="section_title">Ver vacantes</div>
				<div class="top-bar">
					<div class="top-item">
						<form id="empFilter" method="post" action="">
							<input class="filterField filterVal" type="text" placeholder="Buscar" onkeyup="currsearchFilter()">
						</form>
					</div>
					<div class="top-item">
						<form id="empFilter" method="post" action="">
							<select class="sortField sortVal" onchange="currsearchFilter()">
								<option value="ASC">Más reciente</option>
								<option value="DESC">Más antiguos</option>
							</select>
						</form>
					</div>
				</div>
				<?php
					$getemp = mysqli_query($db_connect, "SELECT * FROM nueva_vacante  ORDER BY id_vacante ASC");
					$getempcount = mysqli_num_rows($getemp);
				?>
				<ul class="emp_list">
					<li class="emp_list_head" style="text-align: left;">
						<div class="emp_item_head emp_id" style="width: 5%;">ID </div>
						<div class="emp_item_head emp_name"style="width: 20%;">Titulo del puesto</div>
						<div class="emp_item_head"style="width: 10%;">Nombre </div>
                        <div class="emp_item_head"style="width: 10%;">Disponibles</div>
						<div class="emp_item_head"style="width: 15%;">Gerente </div>
						<div class="emp_item_head emp_status"style="width: 25%;">Descripción</div>
						<div class="emp_item_head"style="width: 10%;">Acción </div>
					</li>
					<div id="displayempList">
						<?php
							if($getempcount >= 1 ){
								while($fetch = mysqli_fetch_assoc($getemp)){
								
									$id_vacante = $fetch['id_vacante'];
									$titulo_puesto = $fetch['titulo_puesto'];
									$nombre_vacante = $fetch['nombre_vacante'];
									$num_vacante = $fetch['num_vacante'];
									$gerente_con = $fetch['gerente_con'];
									$descripcion = $fetch['descripcion'];

									//$date_employed = date("jS F Y", strtotime($date_employed));

									
										if($usertype == "Admin"){
											echo '										
												<li class="emp_item">
													<div class="emp_column emp_id" style="width: 5%;">'.$id_vacante.'</div>
													<div class="emp_column emp_name"style="width: 20%;">'.$titulo_puesto.'</div>
													<div class="emp_column"style="width: 10%;">'.$nombre_vacante.'</div>
													<div class="emp_column"style="width: 10%;">'.$num_vacante.'</div>
                                                    <div class="emp_column"style="width: 15%;">'.$gerente_con.'</div>
													<div class="emp_column emp_status"style="width: 25%;">'.$descripcion.'</div>
													<div class="emp_column"style="width: 10%;">
														<ul class="action_list">
														<li class="action_item action_delete" data-id="'.$id_vacante.'" title="Eliminar"><i class="fa fa-trash-o"></i></li>
														</ul>
													</div>
												</li>
												
											';
										} else {
											echo '										
											<li class="emp_item">
											<div class="emp_column emp_id" style="width: 5%;">'.$id_vacante.'</div>
											<div class="emp_column emp_name"style="width: 20%;">'.$titulo_puesto.'</div>
											<div class="emp_column"style="width: 10%;">'.$nombre_vacante.'</div>
											<div class="emp_column"style="width: 10%;">'.$num_vacante.'</div>
											<div class="emp_column"style="width: 15%;">'.$gerente_con.'</div>
											<div class="emp_column emp_status"style="width: 25%;">'.$descripcion.'</div>
											<div class="emp_column"style="width: 10%;">
											<div class="emp_column"style="width: 10%;">
														<ul class="action_list">
														<li class="nav-item"><a href="../dashboard/aplicar_vacante.php?id_vacante='.$id_vacante.'" title="Aplicar"><span class="action_item action_view"><i class="fa fa-check"></i></span></a></li>
															
														</ul>
													</div>
													
												</li>
											';											
										}
									
								}
								echo $pagination->createLinks();
							} else {
								echo '<li class="emp_item"> No se encontró ningún registro de vacantes </li>';
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
						<span class="printbtn"> Print</span>
					</div>
				</div>
			</div>
		</div>
		<div class="del_modal">
			<div class"inner_section">
				<div class="delcontainer">
					<div class="del_title">Eliminar registro</div>
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