<?php
/* Smarty version 3.1.36, created on 2020-07-03 22:46:34
  from 'C:\xampp\htdocs\madereros\views\empleadosfooter.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eff992ae64d14_69692707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f253e1e89ac02c0fb1f4ed62f95d479b5c47121' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\empleadosfooter.xhtml',
      1 => 1593809189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eff992ae64d14_69692707 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade bd-example-modal-sm" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"  id="mySmallModalLabel">Modal Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				No se encontraron registros para su busqueda.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
  </div>
</div>


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

<?php echo '<script'; ?>
 type="text/javascript" language="javascript" >
		 $(document).ready(function(){

		 	$('#shBusqueda').click(function(){ 	
				$('#consultaForm').toggle();
				document.getElementById("shBusqueda").innerHTML = "[+]";
			});

			var submit = document.getElementById('submit'); 
			$('a#byDNICUIL').click(function(){ 	
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "DNICUIL";
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por DNI/CUIL";
			});
			$('a#byDCH').click(function(){ 
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "DNICUILH";			
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por DNI/CUIL en Historial";
			});
			$('a#byAN').click(function(){ 
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "AN";			
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por Apellido/Nombre";
			});
			$('a#byANH').click(function(){ 
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "ANH";			
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por Apellido/Nombre en Historial";
			});

			submit.addEventListener('click', function(event){ 
			    updateform('consultaForm'); 
			}); 


			
			function updateform(id){
			    var data = $('#'+id).serialize();
			     //alert("sale:"+data);


			    $.ajax({
			        type: 'POST',
			        url: "./models/getlist.php",
			        data: data,
			        success: function(data) {
			        	//alert(data);
			        	//var table = $('#scrollVertical').DataTable();
			        	//table.clear().draw();
			        	//dataArr=Array.from(data);
						//table.row.add(data    					).draw();
						console.log(data);
						if (data=="Sin resultados") {
							console.log("se ejecuta"); 
							$("#mymodal").modal("show");
						}else{
						$('#tablaBusqueda').html(data);		            
			             //alert(data);
						//alert(data);
						}
			        },
			        error: function(data) { // if error occured
			            alert("Error occured, please try again");
			        },
			    });

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
>
		<?php echo $_smarty_tpl->tpl_vars['modal']->value;
}
}
