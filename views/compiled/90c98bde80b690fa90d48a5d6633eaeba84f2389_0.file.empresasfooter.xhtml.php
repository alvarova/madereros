<?php
/* Smarty version 3.1.36, created on 2020-07-01 02:08:35
  from 'C:\xampp\htdocs\madereros\views\empresasfooter.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5efbd403bf2766_71593983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90c98bde80b690fa90d48a5d6633eaeba84f2389' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\empresasfooter.xhtml',
      1 => 1593562113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efbd403bf2766_71593983 (Smarty_Internal_Template $_smarty_tpl) {
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

		<?php echo '<script'; ?>
 type="text/javascript" language="javascript" >
		 $(document).ready(function(){

		 	$('#shBusqueda').click(function(){ 	
				$('#consultaForm').toggle();
				document.getElementById("shBusqueda").innerHTML = "[+]";
			});

			var submit = document.getElementById('submit'); 
			$('a#byCUIT').click(function(){ 	
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "CUIT";
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por CUIT";
			});
			$('a#byCUITH').click(function(){ 
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "CUITH";			
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por CUIT en Historial";
			});
			$('a#byRS').click(function(){ 
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "RS";			
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por Razon Social";
			});
			$('a#byRSH').click(function(){ 
				elemento = document.getElementById("tipobusqueda");
				elemento.value = "RSH";			
				document.getElementById("tipobusquedaTXT").innerHTML = "Búsqueda por Razon Social en Historial";
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
			            $('#tablaBusqueda').html(data);
			             //alert(data);
			            //alert(data);
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
><?php }
}
