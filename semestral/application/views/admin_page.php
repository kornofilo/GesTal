<html>
<!-- instanciando variables de session -->
<?php
if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['username']);
	$email = ($this->session->userdata['logged_in']['email']);
	$id = ($this->session->userdata['logged_in']['id']);
} else {
header("location: login");
}
?>
<head>
	<title>Administracion</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
</head>
<body>
<style>
	body {
		background-image: url(<?php echo base_url();?>imagenes/books.png);
		background-size: auto;
	}
	
</style>

<?php     
     $this->load->view('nav');
 ?>

<div id="wrapper" class="active">  

<div style=" font-family: TimesNewRoman; font-size: 40px;font-weight: bold; color: black; text-align: center; " class="box" id="page-content-wrapper">
	<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
			<div id="profile">
				<?php
				echo "<br/>";
				echo "<br/>";
				echo "<br/>";
				echo "Bienvenido de Vuelta <b id='welcome'><i>" .$email . "</i>!</b>";
				echo "<br/>";
				echo "<br/>";
				echo "Pagina del Administrador";	
				echo "<br/>";
				echo "<br/>";
				echo "Tu Identificacion es :" . $id;
				echo "<br/>";
				echo "<br/>";
				echo "Tu Correo es : " .  $username;
				echo "<br/>";
				?>
			<b id="logout"><a href="logout">Cerrar Sesion</a></b>
			</div>
		<br/>
		</div>
	</div>
</div>
</body>
</html>