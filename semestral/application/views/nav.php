<head>

<?php $modulos = ($this->session->userdata['nav']['modulos']);?>
	<title>Administracion</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
</head>
<body>
<?php $this->load->view('close');?>
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