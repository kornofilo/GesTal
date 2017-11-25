	<html>
	<?php
		$this->load->view('nav');
	?>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mystyle.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<style>
	body {
		background-image: url(<?php echo base_url();?>imagenes/books.png);
	}
</style>
	<body>
		<div id="page-content-wrapper">
		<div id="main">
			<div id="login">
			
			    <h3>seleciones los permisos a tener este grupo</h3>

			    <?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					
					echo form_open('grupos_modulos/insertar_permisos');
					echo form_dropdown('id_modulo', $modulos);
                    echo"<br/>";
                    ?><input type="hidden" name="id_del_grupo" class="form-control" required value="<?=$id_del_grupo?>">
                    <?php
					echo form_label('selecionar: ');
					echo"<br/>";
					echo form_checkbox('selecionar');
					
					echo"<br/>";
					echo form_label('inserar : ');
					echo"<br/>";
					echo form_checkbox('inserar');

					echo"<br/>";
					echo form_label('actualizar: ');
					echo"<br/>";
					echo form_checkbox('actualizar');

					echo"<br/>";
					echo form_label('eliminar: ');
					echo"<br/>";
					echo form_checkbox('eliminar');

					
					echo"<br/>";
					echo form_submit('submit', 'Sign Up');
					echo form_close();
				?>
			
			</div>
		</div>
	</div>
	</body>
</html>