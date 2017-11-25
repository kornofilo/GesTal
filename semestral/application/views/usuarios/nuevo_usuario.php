	<html>
	<?php 
         $this->load->view('nav'); 
	 ?>
	<head>
	
		<title>Registration Form</title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mystyle.css">
		
	</head>
	<style>
	body {
		background-image: url(<?php echo base_url();?>imagenes/books.png);
	}
</style>

	<body>
		<div id="main">
			<div id="login">
				<h2>Registro de nuevo usuario</h2>
				<hr/>
				<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('usuarios/new_user_registration');

					echo form_label('nombre: ');
					
					echo form_input('correo');
					
					echo"<br/>";
					echo form_label('cedula : ');
					
					echo form_input('cedula');

					echo"<br/>";
					echo form_label('telefono: ');
					
					echo form_input('telefono');

					echo"<br/>";
					echo form_label('correo: ');
					echo"<br/>";
					echo form_input('nombre');

					echo"<br/>";
					echo form_label('contraseña: ');
					echo"<br/>";
					echo form_password('password');

					
					echo"<br/>";
					echo form_submit('submit', 'Sign Up');
					echo form_close();
				?>
				<a href="<?php echo base_url()."index.php/usuarios/lista_usuarios" ?> ">regresar</a>
			</div>
		</div>
	</body>
</html>