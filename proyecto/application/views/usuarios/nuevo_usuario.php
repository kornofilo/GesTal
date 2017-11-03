	<html>
	<?php 
$this->load->view('nav'); 
	 ?>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mystyle.css">
		
	</head>
	<body>
		<div id="main">
			<div id="login">
				<h2>Formulario de Registro de nuevo producto</h2>
				<hr/>
				<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('usuarios/new_user_registration');

					echo form_label('nombre: ');
					
					echo form_input('nombre');
					
					echo"<br/>";
					echo form_label('cedula : ');
					
					echo form_input('cedula');

					echo"<br/>";
					echo form_label('telefono: ');
					
					echo form_input('telefono');

					echo"<br/>";
					echo form_label('correo: ');
					echo"<br/>";
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
	</body>
</html>