<html>
<!-- instanciando variables de secion -->
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

</body>

<div id="wrapper" class="active">  
<!-- Sidebar -->
<div id="sidebar-wrapper">
	<ul id="sidebar_menu" class="sidebar-nav">
	<li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
	</ul>
		<ul class="sidebar-nav" id="sidebar">
			<?php for ($i = 0; $i < count($modulos); ++$i) { ?>
			<li><a href="<?php echo base_url($modulos[$i]->ruta);?> "><?php echo $modulos[$i]->descripcion ?> </a></li>
			<?php } ?>
		</ul>
</div>
<!-- Page content -->
	<div id="page-content-wrapper">
	<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
			<div id="profile">
				<?php
				echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
				echo "<br/>";
				echo "<br/>";
				echo "Welcome to Admin Page";
				echo "<br/>";
				echo "<br/>";
				echo "Your id  is" . $id;
				echo "<br/>";
				echo "Your Email is " . $email;
				echo "<br/>";
				?>
			<b id="logout"><a href="logout">Cerrar Sesion</a></b>
			</div>
		<br/>
		</div>
	</div>
</div>
<body>


</body>
</html>