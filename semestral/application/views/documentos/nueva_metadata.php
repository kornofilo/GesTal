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
				     $id=0;
                     $id=$this->uri->segment(3);
                     
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('documentos/registro_nuevo/'.$id);

					echo form_label('Nombre del documento:');
					echo"<br/>";
					 echo form_dropdown('tipos', $tipos	);
                         echo"<br/>";

					echo form_label('descripcion :');
					echo"<br/>";
					echo form_input('descripcion');

					

			
					echo form_submit('submit', 'insertar');
					echo form_close();
				?>
				<a href="<?php echo base_url()."index.php/documentos/lista_documentos" ?> ">regresar</a>
			</div>
		</div>
	</div>
	</body>
</html>