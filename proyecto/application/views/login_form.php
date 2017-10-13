<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>GesTal Documental System</title>
    <link rel="stylesheet" type="text/css" title="style" media="screen" href="<?= base_url(); ?>css/css//style.css" />
</head>

    <body>
  <hgroup>
  <h1>GesTal</h1>
  <h3>Your Documental System</h3>
</hgroup>

<?php echo form_open('user_authentication/user_login_process'); ?>

  <div class="group">

    <input type="text" name="username"><span class="highlight"></span><span class="bar"></span>
    <label>Name</label>
    
  </div>
  <div class="group">

    <input type="Password" name="password"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>

  </div>

   <input type="submit" value=" Login " name="submit"/><br />

  <a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">Para Registro... Aqui</a>
 <?php echo form_close(); ?>


<footer><a href="" target="_blank"><img src="img/doc.png"></a>
  <p>You Gotta Love <a href="/" target="_blank">GesTal</a></p>
</footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
