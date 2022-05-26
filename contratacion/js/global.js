$(document).ready(function(){
	
    $( "#datepicker" ).datepicker({
    	changeMonth: true,
    	changeYear: true,    	
        dateFormat: 'yy-mm-dd' 
    });

    /*
    	Upload Empolyee Photo
    */
    $(".passport_photo").change(function(){
    	if($(this).val() != ""){
    		var newfile = $(this).val();
    		if (newfile.substring(3,11) == 'fakepath') {

	            newfile = newfile.substring(12);

    			$(".passportPhoto_file").html(newfile);

	        } // Remove c:\fake at beginning from localhost chrome

    	} else {
    		$(".passportPhoto_file").html("Cargar foto de empleado");
    	}
    })

	var aa = 0;
	var max_filess = 1;

	$(".passport-btn").click(function(e){ //on add input button click

	    e.preventDefault();
	    e.stopImmediatePropagation();

	                
	    var myFormData = new FormData();
	    myFormData.append('employee_photo', $(".passport_photo").prop('files')[0]);

	    var  sel_files = $('.passport_photo').val();

	   if(sel_files != ""){


	        var file_size = $('.passport_photo')[0].files[0].size;

	        var ext = $('.passport_photo').val().split('.').pop().toLowerCase();

	        if ($.inArray(ext, ['png','jpg','jpeg']) != -1){

	            if(file_size < 2242880) {                  

	                if (sel_files.substring(3,11) == 'fakepath') {

	                    sel_files = sel_files.substring(12);
	                } // Remove c:\fake at beginning from localhost chrome
	             
	                    var selected_filename;
	                    var upload_filename;

	                    $(".photoerror").html("");

	                    if(aa < max_filess){

	                    	$(".passport-btn").html("uploading...");

		                    $.ajax({
		                        url: 'uploadimage.php',
		                        type: 'POST',
		                        processData: false, // important
		                        contentType: false, // important
		                        dataType: 'JSON',
		                        data: myFormData,
		                        success: function(data){
		                            upload_filename = (data.upload_filename);
		                            selected_filename = (data.selected_filename);

		                            $(".passport_file").append('<div class="imagefile"><span class="imageicon"><i class="fa fa-file-image-o"></i></span><p>'+selected_filename+'</p><input type="hidden" name="passport_photo_name" value="'+upload_filename+'"><span class="del_imagefile del-passport_file"><i class="fa fa-times"></i></span></div>');

		                            $(".passport_photo").val("");
		                            $(".passportPhoto_file").html("");
			                    	$(".passport-btn").html("upload");

			                    	aa++;

		                            if(aa == max_filess){
			                            $('.passport-btn').css("display","none");
			                            $('.passport-disbtn').css("display","block");
			                        }

		                                
		                            $(".del-passport_file").click(function(e){ //user click on remove text
		                                e.preventDefault(); $(this).parent('div').remove();aa--;
		                                if(aa < max_filess){
				                            $('.passport-btn').css("display","block");
				                            $('.passport-disbtn').css("display","none");
				                            $(".passportPhoto_file").html("Upload Employee Photo");
				                        }
		                            })
		                        }
		                    });
		                }    
	            } else {
					$(".photoerror").html("El tamaño del archivo no debe exceder los 2 MB");
				}
	        } else {
				$(".photoerror").html("Tipo de archivo no soportado. Los archivos deben ser .jpeg, .jpg, .png ");
	        }
	    } else {
			$(".photoerror").html("Seleccione un archivo y haga clic en cargar");
	    }            
	});

	/*
    	Upload Empolyee Photo
    */
    $(".nationalID").change(function(){
    	if($(this).val() != ""){
    		var newfile = $(this).val();
    		if (newfile.substring(3,11) == 'fakepath') {

	            newfile = newfile.substring(12);

    			$(".nationalID_file").html(newfile);

	        } // Remove c:\fake at beginning from localhost chrome

    	} else {
    		$(".nationalID_file").html("Cargar foto de empleado");
    	}
    })

	var a = 0;
	var max_files = 1;

	$(".nationID-btn").click(function(e){ //on add input button click

	    e.preventDefault();
	    e.stopImmediatePropagation();

	                
	    var myFormData = new FormData();
	    myFormData.append('employee_ID', $(".nationalID").prop('files')[0]);

	    var  sel_files = $('.nationalID').val();

	   if(sel_files != ""){


	        var file_size = $('.nationalID')[0].files[0].size;

	        var ext = $('.nationalID').val().split('.').pop().toLowerCase();

	        if ($.inArray(ext, ['png','jpg','jpeg']) != -1){

	            if(file_size < 2242880) {                  

	                if (sel_files.substring(3,11) == 'fakepath') {

	                    sel_files = sel_files.substring(12);
	                } // Remove c:\fake at beginning from localhost chrome
	             
	                    var selected_filename;
	                    var upload_filename;

	                    $(".nationalIDerror").html("");

	                    if(a < max_files){

	                    	$(".nationID-btn").html("subiendo ...");

		                    $.ajax({
		                        url: 'uploadID.php',
		                        type: 'POST',
		                        processData: false, // important
		                        contentType: false, // important
		                        dataType: 'JSON',
		                        data: myFormData,
		                        success: function(data){
		                            upload_filename = (data.upload_filename);
		                            selected_filename = (data.selected_filename);

		                            $(".selected_nationalID_file").append('<div class="imagefile"><span class="imageicon"><i class="fa fa-file-image-o"></i></span><p>'+selected_filename+'</p><input type="hidden" name="nationalID_name" value="'+upload_filename+'"><span class="del_imagefile del-nationalID_file"><i class="fa fa-times"></i></span></div>');

		                            $(".nationalID").val("");
		                            $(".nationalID_file").html("");
			                    	$(".nationID-btn").html("upload");

			                    	a++;

		                            if(a == max_files){
			                            $('.nationID-btn').css("display","none");
			                            $('.nationID-disbtn').css("display","block");
			                        }
		                                
		                            $(".del-nationalID_file").click(function(e){ //user click on remove text
		                                e.preventDefault(); $(this).parent('div').remove();a--;
		                                if(a < max_files){
				                            $('.nationID-btn').css("display","block");
				                            $('.nationID-disbtn').css("display","none");
				                            $(".nationalID_file").html("Upload selected ID type");
				                        }
		                            })
		                        }
		                    });
		                }    
	            } else {
					$(".nationalIDerror").html("El tamaño del archivo no debe exceder los 2 MB");
				}
	        } else {
				$(".nationalIDerror").html("Tipo de archivo no soportado. Los archivos deben ser .jpeg, .jpg, .png");
	        }
	    } else {
			$(".nationalIDerror").html("Seleccione un archivo y haga clic en cargar");
	    }            
	});
	//-------Hoja de vida-----------------------------
	$(".hoja_vida").change(function(){
    	if($(this).val() != ""){
    		var newfile = $(this).val();
    		if (newfile.substring(3,11) == 'fakepath') {

	            newfile = newfile.substring(12);

    			$(".hoja_vida_file").html(newfile);

	        } // Remove c:\fake at beginning from localhost chrome

    	} else {
    		$(".hoja_vida_file").html("Cargar hoja de vida");
    	}
    })

	var a = 0;
	var max_files = 1;

	$(".hoja_vida-btn").click(function(e){ //on add input button click

	    e.preventDefault();
	    e.stopImmediatePropagation();

	                
	    var myFormData = new FormData();
	    myFormData.append('id_vacante', $(".hoja_vida").prop('files')[0]);

	    var  sel_files = $('.hoja_vida').val();

	   if(sel_files != ""){


	        var file_size = $('.hoja_vida')[0].files[0].size;

	        var ext = $('.hoja_vida').val().split('.').pop().toLowerCase();

	        if ($.inArray(ext, ['png','jpg','jpeg']) != -1){

	            if(file_size < 2242880) {                  

	                if (sel_files.substring(3,11) == 'fakepath') {

	                    sel_files = sel_files.substring(12);
	                } // Remove c:\fake at beginning from localhost chrome
	             
	                    var selected_filename;
	                    var upload_filename;

	                    $(".hoja_vidaerror").html("");

	                    if(a < max_files){

	                    	$(".hoja_vida-btn").html("subiendo ...");

		                    $.ajax({
		                        url: 'hoja_vida.php',
		                        type: 'POST',
		                        processData: false, // important
		                        contentType: false, // important
		                        dataType: 'JSON',
		                        data: myFormData,
		                        success: function(data){
		                            upload_filename = (data.upload_filename);
		                            selected_filename = (data.selected_filename);

		                            $(".selected_hoja_vida_file").append('<div class="imagefile"><span class="imageicon"><i class="fa fa-file-image-o"></i></span><p>'+selected_filename+'</p><input type="hidden" name="nationalID_name" value="'+upload_filename+'"><span class="del_imagefile del-hoja_vida_file"><i class="fa fa-times"></i></span></div>');

		                            $(".hoja_vida").val("");
		                            $(".hoja_vida_file").html("");
			                    	$(".hoja_vida-btn").html("upload");

			                    	a++;

		                            if(a == max_files){
			                            $('.hoja_vida-btn').css("display","none");
			                            $('.hoja_vida-disbtn').css("display","block");
			                        }
		                                
		                            $(".del-hoja_vida_file").click(function(e){ //user click on remove text
		                                e.preventDefault(); $(this).parent('div').remove();a--;
		                                if(a < max_files){
				                            $('.hoja_vida-btn').css("display","block");
				                            $('.hoja_vida-disbtn').css("display","none");
				                            $(".hoja_vida_file").html("Upload selected ID type");
				                        }
		                            })
		                        }
		                    });
		                }    
	            } else {
					$(".hoja_vidaerror").html("El tamaño del archivo no debe exceder los 2 MB");
				}
	        } else {
				$(".hoja_vidaerror").html("Tipo de archivo no soportado. Los archivos deben ser .jpeg, .jpg, .png");
	        }
	    } else {
			$(".hoja_vidaerror").html("Seleccione un archivo y haga clic en cargar");
	    }            
	});

    /*
    	Add Empolyee Form
    */
    $("#addemployee").submit(function(e){
    	e.preventDefault();

    	var empiderror,
    		firstnameerror,
    		middlenameerror,
    		lastnameerror,
    		phoneerror,
    		jobtypeerror,
    		dateemployederror,
    		resaddresserror,
    		reslocationerror,
    		gpsreslocationerror,
    		resdirectionerror,
    		photoerror,
    		IDnumbererror,
    		idtypeerror,
    		nationalIDerror,
    		fullnameerror,
    		relationshiperror,
    		kinphoneerror,
    		kinresaddresserror,
    		empstatuserror,
    		kinresdirectionerror;

    	if($(".firstname").val() == ""){
    		firstnameerror = "Por favor ingrese el primero nombre";
    	} else if($.isNumeric($(".firstname").val()) && $(".firstname").val() != ""){
    		firstnameerror = "este campo no puede contener números";
    	} else {
    		firstnameerror = "";
    	}

    	if($.isNumeric($(".middlename").val()) && $(".middlename").val() != ""){
    		middlenameerror = "este campo no puede contener números";
    	} else {
    		middlenameerror = "";
    	}

    	if($(".lastname").val() == ""){
    		lastnameerror = "Por favor ingrese apellidos";
    	} else if($.isNumeric($(".lastname").val()) && $(".lastname").val() != ""){
    		lastnameerror = "este campo no puede contener números";
    	} else {
    		lastnameerror = "";
    	}

    	if($(".phone").val() == ""){
    		phoneerror = "Por favor ingrese numero telefonico";
    	} else if(!($.isNumeric($(".phone").val())) && $(".phone").val() != ""){
    		phoneerror = "Este campo no puede contener letras";
    	} else {
    		phoneerror = "";
    	}

    	if($(".jobtype").val() == ""){
    		jobtypeerror = "Por favor ingrese tipo de empleado";
    	} else {
    		jobtypeerror = "";
    	}

    	if($(".dateemployed").val() == ""){
    		dateemployederror = "Por favor ingrese fecha de empleo";
    	} else {
    		dateemployederror = "";
    	}

    	if($(".empstatus").val() == ""){
    		empstatuserror = "Por favor ingrese el estatus del empleado";
    	} else {
    		empstatuserror = "";
    	}

    	if($(".resaddress").val() == ""){
    		resaddresserror = "Por favor ingrese el lugar de nacimiento ";
    	} else {
    		resaddresserror = "";
    	}

    	if($(".reslocation").val() == ""){
    		reslocationerror = "Por favor ingrese la ciudad donde reside";
    	} else {
    		reslocationerror = "";
    	}

    	if($(".gpsreslocation").val() == ""){
    		gpsreslocationerror = "Por favor ingrese el codigo postal";
    	} else {
    		gpsreslocationerror = "";
    	}

    	if($(".resdirection").val() == ""){
    		resdirectionerror = "Por favor ingrese dirección de residencia";
    	} else {
    		resdirectionerror = "";
    	}

    	if($(".passport_file").html() == ""){
    		photoerror = "seleccione un archivo y haga clic en cargar";
    	} else {
    		photoerror = "";
    	}

    	if($(".idnumber").val() == ""){
    		IDnumbererror = "Por favor ingrese el numero de identificación";
    	} else {
    		IDnumbererror = "";
    	}

    	if($(".idtype").val() == ""){
    		idtypeerror = "Por favor seleccione el tipo de identifación";
    	} else {
    		idtypeerror = "";
    	}

    	if($(".selected_nationalID_file").html() == ""){
    		nationalIDerror = "seleccione un archivo y haga clic en cargar";
    	} else {
    		nationalIDerror = "";
    	}

    	if($(".fullname").val() == ""){
    		fullnameerror = "Por favor ingrese el nombre completo ";
    	} else {
    		fullnameerror = "";
    	}

    	if($(".relationship").val() == ""){
    		relationshiperror = "Por favor ingrese la relación ";
    	} else {
    		relationshiperror = "";
    	}

    	if($(".kinphone").val() == ""){
    		kinphoneerror = "Por favor ingrese el numero telefonico";
    	} else if(!($.isNumeric($(".kinphone").val())) && $(".kinphone").val() != ""){
    		kinphoneerror = "Este campo no puede contener letras";
    	} else {
    		kinphoneerror = "";
    	}

    	if($(".kinresaddress").val() == ""){
    		kinresaddresserror = "Por favor ingrese la ciudad donde reside";
    	} else {
    		kinresaddresserror = "";
    	}

    	if($(".kinresdirection").val() == ""){
    		kinresdirectionerror = "Por favor ingrese la dirección de residencia";
    	} else {
    		kinresdirectionerror = "";
    	}

    	$(".firstnameerror").html(firstnameerror);
    	$(".middlenameerror").html(middlenameerror);
    	$(".lastnameerror").html(lastnameerror);
    	$(".phoneerror").html(phoneerror);
    	$(".jobtypeerror").html(jobtypeerror);
    	$(".dateemployederror").html(dateemployederror);
    	$(".empstatuserror").html(empstatuserror);
    	$(".resaddresserror").html(resaddresserror);
    	$(".reslocationerror").html(reslocationerror);
    	$(".gpsreslocationerror").html(gpsreslocationerror);
    	$(".resdirectionerror").html(resdirectionerror);
    	$(".photoerror").html(photoerror);
    	$(".IDnumbererror").html(IDnumbererror);
    	$(".fullnameerror").html(fullnameerror);
    	$(".idtypeerror").html(idtypeerror);
    	$(".nationalIDerror").html(nationalIDerror);
    	$(".relationshiperror").html(relationshiperror);
    	$(".kinphoneerror").html(kinphoneerror);
    	$(".kinresaddresserror").html(kinresaddresserror);
    	$(".kinresdirectionerror").html(kinresdirectionerror);


    	if(firstnameerror == "" && middlenameerror == "" && lastnameerror == "" && phoneerror == "" && jobtypeerror == "" && dateemployederror == "" && resaddresserror == "" && reslocationerror == "" && gpsreslocationerror == "" && resdirectionerror == "" && photoerror == "" && IDnumbererror == "" && fullnameerror == "" && idtypeerror == "" && nationalIDerror == "" && relationshiperror == "" && kinphoneerror == "" && kinresaddresserror == "" && kinresdirectionerror == "" && empstatuserror == "") {

    		$(".displaySuccess").css({
    			"margin-top":"0px",
    			"opacity":"1"
    		})
			$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Agregar nuevo registro de empleado');

    		$.ajax({
		     	url: 'addemployee.php',
		     	type: 'POST',
		    	dataType: 'JSON',
		        data: $("#addemployee").serialize(),
		    	success: function(data){
					var status = (data.status);

					if(status == "Success"){
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> Registro agregado exitosamente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "failed"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Error al agrgar nuevo registro')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "exists"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> ID de empleado existente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					}
		    	}
    		})
    	}

    })
	//---------------------------------------------------------------------
	$("#advacante").submit(function(e){
    	e.preventDefault();

    	var 
			titulo_puestoerror,
    		id_vacanteerror,
    		nombre_vacanteerror,
    		num_vacanteerror,
    		gerente_conerror,
			descripcionerror
			 ;

    	if($(".titulo_puesto").val() == ""){
    		titulo_puestoerror = "Por favor llene el titulo del puesto";
    	} else if($.isNumeric($(".titulo_puesto").val()) && $(".titulo_puesto").val() != ""){
    		titulo_puestoerror = "Este campo no puede contener números";
    	} else {
    		titulo_puestoerror = "";
    	}

    	if( $(".id_vacante").val() == ""){
    		id_vacanteerror = "Por favor llene ID vacante";
    	} else {
    		id_vacanteerror = "";
    	}

    	if($(".nombre_vacante").val() == ""){
    		nombre_vacanteerror = "Por favor llene el nombre de la vacante";
    	} else if($.isNumeric($(".nombre_vacante").val()) && $(".nombre_vacante").val() != ""){
    		nombre_vacanteerror = "Este campo no puede contener números";
    	} else {
    		nombre_vacanteerror = "";
    	}

    	if($(".num_vacante").val() == ""){
    		num_vacanteerror = "Por favor llene el numero de vacantes";
    	} else {
    		num_vacanteerror = "";
    	}

    	if($(".gerente_con").val() == ""){
    		gerente_conerror = "Por favor diga quien es el gerente de contrataciones";
		} else if($.isNumeric($(".gerente_con").val()) && $(".gerente_con").val() != ""){
    		gerente_conerror = "Este campo no puede contener números";
    	} else {
    		gerente_conerror = "";
    	}

    	if($(".descripcion").val() == ""){
    		descripcionerror = "Por favor llene la decripción de la vacante";
    	} else {
    		descripcionerror = "";
    	}

    	

    	$(".titulo_puestoerror").html(titulo_puestoerror);
    	$(".id_vacanteerror").html(id_vacanteerror);
    	$(".nombre_vacanteerror").html(nombre_vacanteerror);
    	$(".num_vacanteerror").html(num_vacanteerror);
    	$(".gerente_conerror").html(gerente_conerror);
    	$(".descripcionerror").html(descripcionerror);
    	

    	if(titulo_puestoerror == "" && id_vacanteerror == "" && nombre_vacanteerror == "" && num_vacanteerror == "" && gerente_conerror == "" && descripcionerror == ""  ) {

    		$(".displaySuccess").css({
    			"margin-top":"0px",
    			"opacity":"1"
    		})
			$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Agregar nuevo registro de vacante');

    		$.ajax({
		     	url: 'crearvacante.php',
		     	type: 'POST',
		    	dataType: 'JSON',
		        data: $("#advacante").serialize(),
		    	success: function(data){
					var status = (data.status);
					

					if(status == "Success"){
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> Vacante creada exitosamente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "failed"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Error al crear nueva vacante')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "exists"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> ID de vacante existente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					}
		    	}
    		})
    	}

    })
	//------------------------------------------------------------
	$("#aplicar_vacante").submit(function(e){
		var 
			nombre_asperror,
    		id_vacanteerror,
    		emailerror,
    		num_conerror,
    		por_queerror;
			//descripcionerror
			 

    	if($(".nombre_asp").val() == ""){
    		nombre_asperror = "Por favor llene el nombre del aspirante";
    	} else if($.isNumeric($(".nombre_asp").val()) && $(".nombre_asp").val() != ""){
    		nombre_asperror = "Este campo no puede contener números";
    	} else {
    		nombre_asperror = "";
    	}

    	if( $(".id_vacante").val() == ""){
    		id_vacanteerror = " ";
    	} else {
    		id_vacanteerror = "";
    	}

    	if($(".email").val() == ""){
    		emailerror = "Por favor llene correo";
    	
    	} else {
    		emailerror = "";
    	}

    	if($(".num_con").val() == ""){
    		num_conerror = "Por favor llene el numero de contacto";
    	} else {
    		num_conerror = "";
    	}


    	if($(".por_que").val() == ""){
    		por_queerror = "Por favor llene la justificación";
    	} else {
    		por_queerror = "";
    	}

    	

    	$(".nombre_asperror").html(nombre_asperror);
    	$(".id_vacanteerror").html(id_vacanteerror);
    	$(".emailerror").html(emailerror);
    	$(".num_conerror").html(num_conerror);
    	$(".por_queerror").html(por_queerror);
    	

    	if(nombre_asperror == "" && id_vacanteerror == "" && emailerror == "" && num_conerror == "" && por_queerror == ""  ) {

    	e.preventDefault();
		$(".displaySuccess").css({
			"margin-top":"0px",
			"opacity":"1"
		})
		$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Agregar nuevo registro de vacante');

    		$.ajax({
		     	url: 'aplicarvacante.php',
		     	type: 'POST',
		    	dataType: 'JSON',
		        data: $("#aplicar_vacante").serialize(),
		    	success: function(data){
					var status = (data.status);
					
					if(status == "Success"){
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> Vacante creada exitosamente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "failed"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Error al crear nueva vacante')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "exists"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> ID de vacante existente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					}
		    	}
    		})
    
		}
    })
   /*
    	Add Empolyee Form
    */
    $("#editemployee").submit(function(e){
    	e.preventDefault();

    	var empiderror,
    		firstnameerror,
    		middlenameerror,
    		lastnameerror,
    		phoneerror,
    		jobtypeerror,
    		dateemployederror,
    		resaddresserror,
    		reslocationerror,
    		gpsreslocationerror,
    		resdirectionerror,
    		photoerror,
    		IDnumbererror,
    		idtypeerror,
    		nationalIDerror,
    		fullnameerror,
    		relationshiperror,
    		kinphoneerror,
    		kinresaddresserror,
    		empstatuserror,
    		kinresdirectionerror;

    		if($(".firstname").val() == ""){
				firstnameerror = "Por favor ingrese el primero nombre";
			} else if($.isNumeric($(".firstname").val()) && $(".firstname").val() != ""){
				firstnameerror = "este campo no puede contener números";
			} else {
				firstnameerror = "";
			}
	
			if($.isNumeric($(".middlename").val()) && $(".middlename").val() != ""){
				middlenameerror = "este campo no puede contener números";
			} else {
				middlenameerror = "";
			}
	
			if($(".lastname").val() == ""){
				lastnameerror = "Por favor ingrese apellidos";
			} else if($.isNumeric($(".lastname").val()) && $(".lastname").val() != ""){
				lastnameerror = "este campo no puede contener números";
			} else {
				lastnameerror = "";
			}
	
			if($(".phone").val() == ""){
				phoneerror = "Por favor ingrese numero telefonico";
			} else if(!($.isNumeric($(".phone").val())) && $(".phone").val() != ""){
				phoneerror = "Este campo no puede contener letras";
			} else {
				phoneerror = "";
			}
	
			if($(".jobtype").val() == ""){
				jobtypeerror = "Por favor ingrese tipo de empleado";
			} else {
				jobtypeerror = "";
			}
	
			if($(".dateemployed").val() == ""){
				dateemployederror = "Por favor ingrese fecha de empleo";
			} else {
				dateemployederror = "";
			}
	
			if($(".empstatus").val() == ""){
				empstatuserror = "Por favor ingrese el estatus del empleado";
			} else {
				empstatuserror = "";
			}
	
			if($(".resaddress").val() == ""){
				resaddresserror = "Por favor ingrese el lugar de nacimiento ";
			} else {
				resaddresserror = "";
			}
	
			if($(".reslocation").val() == ""){
				reslocationerror = "Por favor ingrese la ciudad donde reside";
			} else {
				reslocationerror = "";
			}
	
			if($(".gpsreslocation").val() == ""){
				gpsreslocationerror = "Por favor ingrese el codigo postal";
			} else {
				gpsreslocationerror = "";
			}
	
			if($(".resdirection").val() == ""){
				resdirectionerror = "Por favor ingrese dirección de residencia";
			} else {
				resdirectionerror = "";
			}
	
			if($(".passport_file").html() == ""){
				photoerror = "seleccione un archivo y haga clic en cargar";
			} else {
				photoerror = "";
			}
	
			if($(".idnumber").val() == ""){
				IDnumbererror = "Por favor ingrese el numero de identificación";
			} else {
				IDnumbererror = "";
			}
	
			if($(".idtype").val() == ""){
				idtypeerror = "Por favor seleccione el tipo de identifación";
			} else {
				idtypeerror = "";
			}
	
			if($(".selected_nationalID_file").html() == ""){
				nationalIDerror = "seleccione un archivo y haga clic en cargar";
			} else {
				nationalIDerror = "";
			}
	
			if($(".fullname").val() == ""){
				fullnameerror = "Por favor ingrese el nombre completo ";
			} else {
				fullnameerror = "";
			}
	
			if($(".relationship").val() == ""){
				relationshiperror = "Por favor ingrese la relación ";
			} else {
				relationshiperror = "";
			}
	
			if($(".kinphone").val() == ""){
				kinphoneerror = "Por favor ingrese el numero telefonico";
			} else if(!($.isNumeric($(".kinphone").val())) && $(".kinphone").val() != ""){
				kinphoneerror = "Este campo no puede contener letras";
			} else {
				kinphoneerror = "";
			}
	
			if($(".kinresaddress").val() == ""){
				kinresaddresserror = "Por favor ingrese la ciudad donde reside";
			} else {
				kinresaddresserror = "";
			}
	
			if($(".kinresdirection").val() == ""){
				kinresdirectionerror = "Por favor ingrese la dirección de residencia";
			} else {
				kinresdirectionerror = "";
			}
	

    	$(".firstnameerror").html(firstnameerror);
    	$(".middlenameerror").html(middlenameerror);
    	$(".lastnameerror").html(lastnameerror);
    	$(".phoneerror").html(phoneerror);
    	$(".jobtypeerror").html(jobtypeerror);
    	$(".dateemployederror").html(dateemployederror);
    	$(".empstatuserror").html(empstatuserror);
    	$(".resaddresserror").html(resaddresserror);
    	$(".reslocationerror").html(reslocationerror);
    	$(".gpsreslocationerror").html(gpsreslocationerror);
    	$(".resdirectionerror").html(resdirectionerror);
    	$(".photoerror").html(photoerror);
    	$(".IDnumbererror").html(IDnumbererror);
    	$(".fullnameerror").html(fullnameerror);
    	$(".idtypeerror").html(idtypeerror);
    	$(".nationalIDerror").html(nationalIDerror);
    	$(".relationshiperror").html(relationshiperror);
    	$(".kinphoneerror").html(kinphoneerror);
    	$(".kinresaddresserror").html(kinresaddresserror);
    	$(".kinresdirectionerror").html(kinresdirectionerror);


    	if(firstnameerror == "" && middlenameerror == "" && lastnameerror == "" && phoneerror == "" && jobtypeerror == "" && dateemployederror == "" && resaddresserror == "" && reslocationerror == "" && gpsreslocationerror == "" && resdirectionerror == "" && IDnumbererror == "" && fullnameerror == "" && idtypeerror == "" &&  relationshiperror == "" && kinphoneerror == "" && kinresaddresserror == "" && kinresdirectionerror == "" && empstatuserror == "") {

    		$(".displaySuccess").css({
    			"margin-top":"0px",
    			"opacity":"1"
    		})
			$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Agregar nuevo registro de empleado');

    		$.ajax({
		     	url: 'editemployee.php',
		     	type: 'POST',
		    	dataType: 'JSON',
		        data: $("#editemployee").serialize(),
		    	success: function(data){
					var status = (data.status);

					if(status == "Success"){
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> Registro actualizado con éxito')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "failed"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Error al agregar un nuevo registro')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "exists"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> ID de empleado existente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					}
		    	}
    		})
    	}

    })

	$("#adduser").submit(function(event){
		event.preventDefault();

		var firstnameerror;
		var lastnameerror;
		var usernameerror;
		var passworderror;
		var emailerror;
		var confirmpassworderror;
		var usertypeerror;

		if($(".firstname").val() == ""){
			firstnameerror = "Por favor ingrese su nombre";
		} else {
			firstnameerror = "";
		}

		if($.isNumeric($(".firstname").val())){
			firstnameerror = "Este campo no puede contener números";
		}
	
		if($(".lastname").val() == ""){
			lastnameerror = "Por favor ingrese apellido";
		} else {
			lastnameerror = "";
		}

		if($.isNumeric($(".lastname").val())){
			lastnameerror = "Este campo no puede contener números";
		}
		if($(".email").val() == ""){
			emailerror = "Por favor ingrese correo electronico";
		} else {
			emailerror = "";
		}

		if($(".username").val() == ""){
			usernameerror = "Por favor ingrese el nombre de usuario";
		} else {
			usernameerror = "";
		}

		if($(".username").val() != "" && $(".username").val().length < 6){
			usernameerror = "El nombre de usuario debe tener al menos 6 caracteres";
		}

		var passreg = /^[0-9a-zA-Z]+$/;
		var passreg2 = /^[0-9]+$/;
		var passreg3 = /^[a-zA-Z]+$/;


		if($(".password").val().match(passreg2) ){
			passworderror = "La contraseña debe contener al menos un número o letra";
		} else if($(".password").val().match(passreg3) ){
			passworderror = "La contraseña debe contener al menos un número o letra";
		} else if($(".password").val() == ""){
			passworderror ="Por favor, ingrese contraseña";
		} else {
			passworderror = "";
		}

		
		if($(".password").val() != "" && $(".password").val().length < 12){
			passworderror = "La contraseña debe tener al menos 12 caracteres";
		}

		if($(".password").val() != $(".confirmpassword").val() ){
			confirmpassworderror = "Las contraseñas no coinciden";
		} else {
			confirmpassworderror = "";
		}

		if($(".usertype").val() == ""){
			usertypeerror = "Seleccione el rol de usuario";
		} else {
			usertypeerror = "";
		}

		$(".firstnameerror").html(firstnameerror);
		$(".lastnameerror").html(lastnameerror);
		$(".usernameerror").html(usernameerror);
		$(".usernameerror").html(usernameerror);
		$(".emaileerror").html(emailerror);
		$(".passworderror").html(passworderror);
		$(".confirmpassworderror").html(confirmpassworderror);
		$(".usertypeerror").html(usertypeerror);

		if(firstnameerror == "" && lastnameerror == "" && usernameerror == "" && passworderror =="" && confirmpassworderror =="" && emailerror == ""){

			$(".displaySuccess").css({
    			"margin-top":"0px",
    			"opacity":"1"
    		})
			$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Agregar nuevo usuario');

		$.ajax({
				type: 'post',
				url: 'adduser.php',
				dataType: 'json',
				data:{
					firstname:$(".firstname").val(),
					lastname: $(".lastname").val(),
					username: $(".username").val(),
					password: $(".password").val(),
					usertype: $(".usertype").val(),
					email: $(".email").val(),
					
					submit: 'submit'
				},
				success: function(data){
					var status = (data.status);

					if(status == "Success"){
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> Usuario agregado exitosamente')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "failed"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Error al agregar nuevo usuario')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					} else if(status == "exists"){
						$(".displaySuccess").css("background","#ff0000");
						$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Nombre de usuario ya existe')
						setTimeout(function(){
							$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

						}, 5000)
					}
				}
			})
		}
	})
    	
})


/*
	User Login
*/
	$("#loginForm").submit(function(event){
		
		event.preventDefault();

		var usernameerror;
		var passworderror;

		if($(".username").val() == ""){
			usernameerror = "Por favor, introduzca su nombre de usuario";
		} else {
			usernameerror = "";
		}

		if($(".username").val() != "" && $(".username").val().length < 6){
			usernameerror = "El nombre de usuario debe tener al menos 6 caracteres";
		}

		if($(".password").val() == ""){
			passworderror ="Por favor, introduzca su contraseña";
		} else {
			passworderror = "";
		}

		
		if($(".password").val() != "" && $(".password").val().length < 12){
			passworderror = "La contraseña debe tener al menos 12 caracteres";
		}


		$(".usernameerror").html(usernameerror);
		$(".passworderror").html(passworderror);

		if( usernameerror == "" && passworderror ==""){
			var response;

			$(".sign_in").html('<span class="sign-icon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Cargando');

		$.ajax({
				type: 'post',
				url: 'index.php',
				dataType: 'json',
				data:{
					username: $(".username").val(),
					password: $(".password").val(),
					submit: 'submit'
				},
				success: function(data){
					response = (data.response);

					if(response == "Success"){
						$(".LogResponse").fadeIn();
						$(".LogResponse").html("Correcto");
						$(".LogResponse").css("background","#02fb8a");
						$(".LogResponse").css("color","#29820d");
						$(".sign_in").html('<span class="sign-icon"><i class="fa fa-lock"></i></span> Iniciar Sesión');

						setTimeout(function() {
							window.location.replace("dashboard");;
						}, 3000);

					} else if(response == "password"){
						$(".LogResponse").fadeIn();
						$(".LogResponse").css("background","#900404");
						$(".LogResponse").css("color","#ff6666");
						$(".LogResponse").html("Contraseña incorrecta");
						$(".sign_in").html('<span class="sign-icon"><i class="fa fa-lock"></i></span> Iniciar Sesión');

						setTimeout(function(){
							$(".LogResponse").fadeOut();
						}, 3000)

					} else if(response == "username"){
						$(".LogResponse").fadeIn();
						$(".LogResponse").css("background","#900404");
						$(".LogResponse").css("color","#ff6666");
						$(".LogResponse").html("Usuario incorrecto");
						$(".sign_in").html('<span class="sign-icon"><i class="fa fa-lock"></i></span> Iniciar Sesión')

						setTimeout(function(){
							$(".LogResponse").fadeOut();
						}, 3000)
					}
				}
			})
		}
	})

/*
	Change username
*/
$("#changeusernameForm").submit(function(e){
	e.preventDefault()

	var usernameerror;
	var passworderror;

	var username = $(".username").val();
	var password = $(".password").val();

	if($(".username").val() == ""){
		usernameerror = "Por favor, introduzca su nombre de usuario";
	} else {
				usernameerror = "";
	}

	if($(".username").val() != "" && $(".username").val().length < 12){
		usernameerror = "El nombre de usuario debe tener al menos 12 caracteres";
	}

	if($(".password").val() == ""){
		passworderror ="Por favor, introduzca su contraseña";
	} else {
				passworderror = "";
	}

			
	if($(".password").val() != "" && $(".password").val().length < 12){
		passworderror = "La contraseña debe tener al menos 12 caracteres";
	}

	$(".usernameerror").html(usernameerror);
	$(".passworderror").html(passworderror);

	if(usernameerror == "" && passworderror == ""){


		$(".displaySuccess").css({
    		"margin-top":"0px",
    		"opacity":"1"
    	})
		$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Guardando');

	 	$.ajax({
			type: 'post',
			url: 'settings.php',
			dataType: 'json',
			data:{
				username: username,
				password: password,
				changeusername: 'changeusername'
			},
			success: function(data){
				var status = (data.status);

				if(status == "success"){
					$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> El nombre de usuario se cambió correctamente')
					setTimeout(function(){
						$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":""
				    	})
					$(".displaySuccess").html('');

					}, 5000)
				} else if(status == "failed"){
					$(".displaySuccess").css("background","#ff0000");
					$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> ¡UPS! Se ha producido un error')
					setTimeout(function(){
						$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    	})
					$(".displaySuccess").html('');

					}, 5000)
				} else if(status == "userfailed"){
					$(".displaySuccess").css("background","#ff0000");
					$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Nombre de usuario ya existe')
					setTimeout(function(){
						$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

					}, 5000)
				} else if(status == "passfailed"){
					$(".displaySuccess").css("background","#ff0000");
					$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> La contraseña actual no es válida')
					setTimeout(function(){
						$(".displaySuccess").css({
				    			"margin-top":"",
				    			"opacity":"",
				    			"background":""
				    		})
						$(".displaySuccess").html('');

					}, 5000)
				}
			}
		})
	}
})

$("#changepasswordForm").submit(function(e){
	e.preventDefault()

	var oldpasserror;
	var newpasserror;
	var cpasserror;

	var oldpass = $(".oldpass").val();
	var newpass = $(".newpass").val();
	var connewpassword = $(".cpassword").val();

	var passreg = /^[0-9a-zA-Z]+$/;
	var passreg2 = /^[0-9]+$/;
	var passreg3 = /^[a-zA-Z]+$/;


	if(oldpass.match(passreg2) ){
		oldpasserror = "La contraseña debe contener al menos un número o letra";
	} else if(oldpass.match(passreg3) ){
		oldpasserror = "La contraseña debe contener al menos un número o letra";
	} else if(oldpass == ""){
		oldpasserror ="Por favor, introduzca su contraseña";
	} else {
		oldpasserror = "";
	}

			
	if(oldpass != "" && oldpass.length < 12){
		oldpasserror = "La contraseña debe tener al menos 12 caracteres";
	}

	if(newpass.match(passreg2) ){
		newpasserror = "La contraseña debe contener al menos un número o letra";
	} else if(newpass.match(passreg3) ){
		newpasserror = "La contraseña debe contener al menos un número o letra";
	} else if(newpass == ""){
		newpasserror ="Por favor, introduzca su contraseña";
	} else {
		newpasserror = "";
	}

			
	if(newpass != "" && newpass.length < 12){
		newpasserror = "La contraseña debe tener al menos 12 caracteres";
	}

	if(newpass != "" && newpass != connewpassword ){
		cpasserror = "Las contraseñas no coinciden";
	} else {
		cpasserror = "";
	}

	$(".oldpasserror").html(oldpasserror);
	$(".newpasserror").html(newpasserror);
	$(".cpasserror").html(cpasserror);

	if(oldpasserror == "" && newpasserror == "" && cpasserror == ""){

		$(".displaySuccess").css({
    		"margin-top":"0px",
    		"opacity":"1"
    	})
		$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></span> Guardando');

	   	$.ajax({
			type: 'post',
			url: 'settings.php',
			dataType: 'json',
			data:{
				oldpass: oldpass,
				newpass: newpass,
				changepassword: 'changepassword'
			},
					success: function(data){
						var status = (data.status);

						if(status == "success"){
							$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> Contraseña cambiada con éxito')
							setTimeout(function(){
								$(".displaySuccess").css({
						    			"margin-top":"",
						    			"opacity":""
						    	})
								$(".displaySuccess").html('');

							}, 5000)
						} else if(status == "failed"){
							$(".displaySuccess").css("background","#ff0000");
							$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> ¡UPS! Se ha producido un error')
							setTimeout(function(){
								$(".displaySuccess").css({
						    			"margin-top":"",
						    			"opacity":"",
						    			"background":""
						    	})
								$(".displaySuccess").html('');

							}, 5000)
						} else if(status == "incorrect"){
							$(".displaySuccess").css("background","#ff0000");
							$(".displaySuccess").html('<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> La contraseña actual no es válida')
							setTimeout(function(){
								$(".displaySuccess").css({
						    			"margin-top":"",
						    			"opacity":"",
						    			"background":""
						    		})
								$(".displaySuccess").html('');

							}, 5000)
						}
					}
				})
	   		}
	   })
/*
	All Employee Filter
*/
function searchFilter(page_num) {
	page_num = page_num?page_num:0;
	var keywords = $('.filterVal').val();
	var sortBy = $('.sortVal').val();
	$.ajax({
	    type: 'POST',
	    url: 'getData.php',
	    //data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
	    data:{
	      page: page_num,
	      keywords: keywords,
	      sortBy: sortBy,
	      action: 'allemployee'
	    },
	    beforeSend: function () {
	        //$('body, html').animate({scrollTop:$('.freelancer-flow').offset().top}, 'slow');
	        $("#displayempList").css("opacity","0.3");
	    },
	    success: function (data) {
	        $('#displayempList').html(data);
	        $("#displayempList").css("opacity","1");
	    }
	})
}

/*
	Current Employee Filter
*/
function currsearchFilter(page_num) {
	page_num = page_num?page_num:0;
	var keywords = $('.filterVal').val();
	var sortBy = $('.sortVal').val();
	$.ajax({
	    type: 'POST',
	    url: 'getData.php',
	    //data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
	    data:{
	      page: page_num,
	      keywords: keywords,
	      sortBy: sortBy,
	      action: 'currentemployees'
	    },
	    beforeSend: function () {
	        //$('body, html').animate({scrollTop:$('.freelancer-flow').offset().top}, 'slow');
	        $("#displayempList").css("opacity","0.3");
	    },
	    success: function (data) {
	        $('#displayempList').html(data);
	        $("#displayempList").css("opacity","1");
	    }
	})
}

/*
	Current Employee Filter
*/
function pastsearchFilter(page_num) {
	page_num = page_num?page_num:0;
	var keywords = $('.filterVal').val();
	var sortBy = $('.sortVal').val();
	$.ajax({
	    type: 'POST',
	    url: 'getData.php',
	    //data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
	    data:{
	      page: page_num,
	      keywords: keywords,
	      sortBy: sortBy,
	      action: 'pastemployees'
	    },
	    beforeSend: function () {
	        //$('body, html').animate({scrollTop:$('.freelancer-flow').offset().top}, 'slow');
	        $("#displayempList").css("opacity","0.3");
	    },
	    success: function (data) {
	        $('#displayempList').html(data);
	        $("#displayempList").css("opacity","1");
	    }
	})
}
/*
	Get Employee data
*/
$("#displayempList").on('click', '.action_view', function(){
	var id = $(this).attr("data-id");

	$.ajax({
		type: "POST",
		url: "retrievedata.php",
		data:{
			record_id: id,
			action: "retrieve"
		},
		beforeSend: function(){
		$("#table").html('<span class="loading_content"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><br>Recuperar registros</span>');
			$(".loading_content").css("display","block");
			$(".modal").css("display","block");
		},
		success: function(data){
			setTimeout(function(){
				$("#table").html(data);
			}, 1000)			
		}
	})
})
/*
	Close Modal
*/
$(".close-modal").click(function(){
	$(".modal").fadeOut();
})

/*
	Deleting Record Section
*/
$("#displayempList").on('click', '.action_delete', function(){
	var id = $(this).attr("data-id");
	$(".del_warning").html("¿Está seguro de que desea eliminar este registro?");
	$(".del_modal").fadeIn();
	$(".yesbtn").attr("data-id", id);
})

$("#displayempList").on('click', '.action_edit', function(){
	var id = $(this).attr("data-id");
	window.location.href = "edit_employee.php?id="+id;
})

$(".nobtn").click(function(){	
	$(".del_modal").fadeOut();
	$(".del_warning").html("");
	$(".yesbtn").attr("data-id", "");
})

function afterDelete(){
	$(".del_modal").fadeOut();
	$(".del_warning").html("");
	$(".yesbtn").attr("data-id", "");

	window.location.reload();	
}

$(".yesbtn").click(function(){
	var id = $(this).attr("data-id");

	$(".del_warning").html("Eliminando registro ...");

	$.ajax({
		type: "POST",
		url: "retrievedata.php",
		dataType: "JSON",
		data:{
			record_id: id,
			action: "delete"
		},
		success: function(data){
			var status = (data.status);

			if(status == "success"){
				$(".del_warning").html("Registro eliminado");
				setTimeout(function(){
					afterDelete();
				}, 1000)
			} else if(status == "failed"){				
				$(".del_warning").html("Ha ocurrido un error. No se pudo borrar el registro");
			}
		}
	})
})