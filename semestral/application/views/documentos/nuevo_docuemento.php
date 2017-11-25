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
					echo form_open('documentos/nuevo_doc');

					echo form_label('Nombre del documento:');
					echo"<br/>";
					echo form_input('nombre');

					echo form_label('fecha del documento:');
					echo"<br/>";
					echo form_input('fecha');

					echo form_label('tipo:');
					echo"<br/>";
					echo form_input('tipo');

			
					echo form_submit('submit', 'insertar');
					echo form_close();
				?>
				<a href="<?php echo base_url()."index.php/documentos/lista_documentos" ?> ">regresar</a>
			</div>
		</div>
	</div>
	</body>
</html>