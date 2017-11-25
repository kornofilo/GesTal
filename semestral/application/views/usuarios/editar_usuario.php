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
				<h2>Formulario de editar usuario </h2>
				<hr/>
				<form action="<?php echo base_url()."index.php/usuarios/update";?>" method="post" class="form-horizontal">
				<input type="hidden" name="hidden" value="<?php echo $data[0]->id_usuario ; ?>">
				<div class="form-group">
					<label for="title" class="col-md-1 text-left">Nombre</label>
					<div class="col-md-10">
						<input type="text" value="<?php echo $data[0]->correo; ?>" name="nombre" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="title" class="col-md-1 text-left">Cedula</label>
					<div class="col-md-10">
						<input type="text" value="<?php echo $data[0]->cedula; ?>" name="cedula" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="title" class="col-md-1 text-left">Telefono</label>
					<div class="col-md-10">
						<input type="text" value="<?php echo $data[0]->telefono; ?>" name="telefono" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="title" class="col-md-2 text-right"></label>
					<div class="col-md-10">
						<input type="submit" name="actualizar" class="btn btn-success" value="Actualizar">
					</div>
				</div>
</form>
				<a href="<?php echo base_url()."index.php/usuarios/lista_usuarios" ?> ">regresar</a>
			</div>
		</div>
	</body>
</html>