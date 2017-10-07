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
    <?php
      if (isset($logout_message)) {
        echo "<div class='message'>";
        echo $logout_message;
        echo "</div>";
      }
    ?>
    <?php
      if (isset($message_display)) {
        echo "<div class='message'>";
        echo $message_display;
        echo "</div>";
      }
    ?>
    <div id="main">
      <div id="login">
        <h2>Inicio de Sesion</h2>
        <hr/>
        <?php echo form_open('user_authentication/user_login_process'); ?>
        <?php
          echo "<div class='error_msg'>";
          if (isset($error_message)) 
          {
          echo $error_message;
          }
          echo validation_errors();
          echo "</div>";
        ?>
        <label>UserName :</label>
        <input type="text" name="username" id="name" placeholder="username"/><br /><br />
        <label>Password :</label>
        <input type="password" name="password" id="password" placeholder="**********"/><br/><br />
        <input type="submit" value=" Login " name="submit"/><br />
        <a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">Para Registro... Aqui</a>
        <?php echo form_close(); ?>
      </div>
    </div>
    <footer><a href="" target="_blank"><img src="<?= base_url(); ?>css/img//doc.png""></a>
    <p>You Gotta Love <a href="/" target="_blank">GesTal</a></p>
    </footer>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
