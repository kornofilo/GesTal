<html>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mystyle.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
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

<br><br>

<a href="<?php echo base_url()."index.php/modulo/lista_modulos" ?> ">ver modulos</a>
<br><br><br><br>

<b id="logout"><a href="logout">Cerrar Sesion</a></b>

</div>
<br/>
</body>
</html>