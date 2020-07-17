<?php
/* Smarty version 3.1.36, created on 2020-07-16 11:41:47
  from 'C:\wamp64\www\madereros\views\empresasfichafooter.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f103cfb758408_73189799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e60b02580e5f7d8fa8b5b2fc3a984abeeebb094d' => 
    array (
      0 => 'C:\\wamp64\\www\\madereros\\views\\empresasfichafooter.xhtml',
      1 => 1594854930,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f103cfb758408_73189799 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<!-- Data Tables -->
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/dataTables.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>

		<!-- Custom Data tables -->
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/custom/custom-datatables.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/custom/fixedHeader.js"><?php echo '</script'; ?>
>

		<!-- Download / CSV / Copy / Print -->
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/buttons.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/jszip.min.js"><?php echo '</script'; ?>
>
		<!-- script src="assets/vendor/datatables/pdfmake.min.js"><?php echo '</script'; ?>
 -->
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/vfs_fonts.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/html5.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/datatables/buttons.print.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/chartist/js/chartist.min.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 src="assets/vendor/chartist/js/chartist-tooltip.js"><?php echo '</script'; ?>
>

		<!-- Input Masks JS -->
		<?php echo '<script'; ?>
 src="assets/vendor/input-masks/cleave.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/input-masks/cleave-phone.js"><?php echo '</script'; ?>
>


        <!-- Datepickers -->
		<?php echo '<script'; ?>
 src="assets/vendor/datepicker/js/picker.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/datepicker/js/picker.date.js"><?php echo '</script'; ?>
>
        
        
		<?php echo '<script'; ?>
 type="text/javascript" language="javascript" >

		document.addEventListener('DOMContentLoaded', () => {	  //Carga Script al estar DOM listo
			var cleave = new Cleave('.cuit', {
				delimiter: ' ',
				blocks: [2, 8, 1],
				uppercase: true
			});
		});
		$(document).ready(function(){

            $('.datepicker').pickadate({
                monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                today: 'Hoy',
                clear: 'Cancelar',
                close: 'Cerrar',
                editable: true,
                selectYears: true,
				format: 'yyyy-mm-dd',
                formatSubmit: 'yyyy-mm-dd'
            });

            console.log('sale');

			$('#id_localidad').change(function() {
				data = "id="+$('select option:selected').val();
				console.log(data);
				$.ajax({
			        type: 'POST',
			        url: "./models/ajaxlocalidad.php",
			        data: data,
			        success: function(data) {
						$("#codigo_postal").val(data);
			        },
			        error: function(data) { // if error occured
			            alert("Error: Intente nuevamente");
			        },
			    });
			});

			
			function ValidaStr(str, idCampo)
			{
				sale="";	
				if (str.length<3) { 
						$('#'+idCampo).focus();
				} else { sale=str; }	
				return(sale);
			}

			function validaCuit(cuit) {
				if (typeof (cuit) == 'undefined')
					return true;
				cuit = cuit.toString().replace(/[-_]/g, "");
				if (cuit == '')
					return false; //No estamos validando si el campo esta vacio, eso queda para el "required"
				if (cuit.length != 11)
					return false;
				else {
						var mult = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];
						var total = 0;
						for (var i = 0; i < mult.length; i++) {
							total += parseInt(cuit[i]) * mult[i];
						}
						var mod = total % 11;
						var digito = mod == 0 ? 0 : mod == 1 ? 9 : 11 - mod;
					}
					return digito == parseInt(cuit[10]);
			}

			function ValidaNum(str, idCampo)
			{
				sale="";
				if (idCampo=='cuit') {
					var temp = str.replace(/\s/g,'');
					valid=validaCuit(temp);
					if (typeof(valid)=='boolean' && (!valid)) { 
						alert('CUIT/CUIL Incorrecto.'); return; 
					} else {
						var lon=11;
						var data = "id="+temp+"&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
";
							console.log("Evaluar "+data);
							$.ajax({
							type: 'POST',
							url: "./models/ajaxcuit.php",
							data: data,
							success: function(data) {						
								//alert('Resultado:'+data);
								console.log(data);
								$(".cuitclass").append("<div class='alert alert-warning' role='alert'><i class='icon-warning'></i> ATENCION: "+data+"<a href='#' class='alert-link'>Link</a>.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
								window.setTimeout(function () { 
									$(".alert-warning").fadeTo(2000, 500).slideUp(500, function(){
    								$(".alert-warning").slideUp(500).remove();});
								}, 2000);

							},
							error: function(data) { // if error occured
								alert("Error occured, please try again");
							},
						});
					}
				}
				else if (idCampo=='telefono') { var lon=8;}
				else { var lon=2;}
				if (str.length<lon) { 
					$('#'+idCampo).focus(); 
				} else { sale=str;}
				return(sale);
			}


			var submit = document.getElementById('submit'); 
			submit.addEventListener('click', function(event){ 
			    updateform('consultaForm'); 
			}); 
			
			function updateform(id){
				
				if (ValidaStr($('#razon_social').val(), 'razon_social')=="") {
					alert("El campo debe tener al menos 4 Caracteres.")
				} else if (ValidaNum($('#cuit').val(), 'cuit')=="") {
					alert("El CUIT/CUIL debe tener al menos 11 numeros")	
				} else if (ValidaStr($('#domicilio').val(), 'domicilio')=="") {
					alert("El campo debe tener al menos 4 Caracteres.")				
				} else if (ValidaNum($('#telefono').val(), 'telefono')=="") {
					alert("El campo debe tener al menos 7 Caracteres.")				
				} else if (ValidaStr($('#correo_electronico').val(), 'correo_electronico')=="") {
					alert("El campo debe tener al menos 8 Caracteres.")				
				} else if (ValidaNum($('#fecha_inicio_actividad').val(), 'fecha_inicio_actividad')=="") {
					alert("La fecha no debe ser nula.")				
				} else if (ValidaNum($('#fecha_alta').val(), 'fecha_alta')=="") {
					alert("La fecha no debe ser nula.")				
				}else {
						
						
						//FALTA DETERMINAR Si ES UPDATE O INSERT verificar si viene con id por GET/POST
						
						fia = $("[name='fecha_inicio_actividad_submit']").val();
						$('#fecha_inicio_actividad').val(fia);
						fia = $("[name='fecha_alta_submit']").val();
						$('#fecha_alta').val(fia);						
						var data = $('#'+id).serialize();
						//alert("Evaluar "+data);
						$.ajax({
							type: 'POST',
							url: "./models/add_records_ajax.php",
							data: data,
							success: function(data) {						
								//alert('Resultado:'+data);
								$("#linkEdit").prop("href", "index.php?acc=empresasficha&id="+data);
								$("#addEmpleados").prop("href", "index.php?acc=empleadosalta&idEmpresa="+data);
								$('#terminado').modal('show');
							},
							error: function(data) { // if error occured
								alert("Error occured, please try again");
							},
						});
				}
			}

			$('form input').keydown(function (e) {
			    if (e.keyCode == 13) {
			        e.preventDefault();
			        updateform('consultaForm');
			        return false;
			    }
			});

		 });
		<?php echo '</script'; ?>
><?php }
}
