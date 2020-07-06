<?php
/* Smarty version 3.1.36, created on 2020-07-05 22:18:35
  from 'C:\xampp\htdocs\madereros\views\empresasfichafooter.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f02359b8f7838_51807983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e40381f870a4955106cbc39605a84f180d56cbf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\empresasfichafooter.xhtml',
      1 => 1593980305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f02359b8f7838_51807983 (Smarty_Internal_Template $_smarty_tpl) {
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


        <!-- Datepickers -->
		<?php echo '<script'; ?>
 src="assets/vendor/datepicker/js/picker.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/datepicker/js/picker.date.js"><?php echo '</script'; ?>
>
        
        
		<?php echo '<script'; ?>
 type="text/javascript" language="javascript" >
		 $(document).ready(function(){

            $('.datepicker').pickadate({
                monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Juilo', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                today: 'Hoy',
                clear: 'Cancelar',
                close: 'Cerrar',
                editable: true,
                selectYears: true,
                formatSubmit: 'yyyy-mm-dd'
            })

            console.log('sale');

			$('#localidad').change(function() {
				data = "id="+$('select option:selected').val();
				console.log(data);
				$.ajax({
			        type: 'POST',
			        url: "./models/ajaxlocalidad.php",
			        data: data,
			        success: function(data) {
			        	//alert(data);
			        	//var table = $('#scrollVertical').DataTable();
			        	//table.clear().draw();
			        	//dataArr=Array.from(data);
			        	//table.row.add(data    					).draw();
			            //alert(data);
						$("#codigo_postal").val(data);
			             //alert(data);
			            //alert(data);
			        },
			        error: function(data) { // if error occured
			            alert("Error occured, please try again");
			        },
			    });
			});
		 });
		<?php echo '</script'; ?>
><?php }
}
