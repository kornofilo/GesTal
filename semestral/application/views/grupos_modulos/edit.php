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
			
			    <h3>seleciones los permisos a tener:<br> el grupo:  <?php echo $grupos[0]->nombre_grupo;?><br> el modulo: <?php
						     echo $grupos[0]->descripcion; ?></h3>

			    <?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					 

					 $id_del_grupo=0;
                     $id_del_grupo=$this->uri->segment(3);
                      $id_del_modulo=0;
                      $id_del_modulo=$this->uri->segment(4);
                     
					echo form_open('grupos_modulos/update');
					
                    ?><input type="hidden" name="id_del_grupo" class="form-control" required value="<?=$id_del_grupo?>">
                    <input type="hidden" name="id_del_modulo" class="form-control" required value="<?=$id_del_modulo?>">
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