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
				<h2>Formulario de Registro de nuevo producto</h2>
				<hr/>
				<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('usuarios/new_user_registration');

					echo form_label('nombre:');
					echo"<br/>";
					echo form_input('nombre');
					
					
					echo form_label('cedula : ');
					echo"<br/>";
					echo form_input('cedula');

					echo"<br/>";
					echo form_label('telefono: ');
					echo"<br/>";
					echo form_input('telefono');

					
					echo form_label('correo: ');
					echo form_input('correo');

					echo"<br/>";
					echo form_label('contraseña: ');
					echo"<br/>";
					echo form_input('password');

					echo"<br/>";
					echo form_label('grupo: ');
					echo"<br/>";
					echo form_input('id_del_grupo');
					echo"<br/>";
					echo"<br/>";
					echo form_submit('submit', 'Sign Up');
					echo form_close();
				?>
				<a href="<?php echo base_url()."index.php/usuarios/lista_usuarios" ?> ">regresar</a>
			</div>
		</div>
	</div>
	</body>
</html>