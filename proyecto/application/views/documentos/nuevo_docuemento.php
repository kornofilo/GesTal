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
				<h2>Formulario de Registro de nuevo folder</h2>
				<hr/>
				<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('folder/nuevo_folder');

				

					echo form_label('Nombre del Folder:');
					echo"<br/>";
					echo form_input('nombre');

					echo form_label('Ingrese el Identificador del Estante:');
					echo"<br/>";
					echo form_input('idestante');

					echo form_label('Ingrese el Identificador de la Caja:');
					echo"<br/>";
					echo form_input('idcaja');

					echo form_label('Ingrese el Identificador de la Bodega:');
					echo form_input('idbodega');
				
					echo form_submit('submit', 'Sign Up');
					echo form_close();
				?>
				<a href="<?php echo base_url()."index.php/folder/lista_folder" ?> ">regresar</a>
			</div>
		</div>
	</div>
	</body>
</html>