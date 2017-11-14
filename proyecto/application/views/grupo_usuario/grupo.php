	<html>
	<?php 
         $this->load->view('nav'); 
	 ?>
	<head>
	
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mystyle.css">
		
	</head>
	<body>
	<?php $id=0;
          $id=$this->uri->segment(3);?>
		<div id="main">
			<div id="login">
				<h2>Formulario de Registro de nuevo producto</h2>
				<hr/>
				<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('usuario_grupo/actualiza_grupo');
                    ?>
                    <input type="hidden" name="id_usuario" class="form-control" required value="<?=$id?>">
					<?php
					echo"<br/>";
					echo form_label('grupo: ');
					echo"<br/>";
					echo form_dropdown('id_del_grupo', $grupo);
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