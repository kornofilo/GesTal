
<html>
     <head><?php
     if (isset($this->session->userdata['logged_in'])) {
          $username = ($this->session->userdata['logged_in']['username']);
          $email = ($this->session->userdata['logged_in']['email']);
          $id = ($this->session->userdata['logged_in']['id']);
          $grupo = ($this->session->userdata['logged_in']['grupo_del_usuario']);

     } else {
     header("location: login");
     }
     ?>
     <title>inicio</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
     <!--link the bootstrap css file-->
     <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
     </head>

     <body><?php
     echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
     echo "<br/>";
     echo "<br/>";
     echo "Welcome to Admin Page";
     echo "<br/>";
     echo "<br/>";
     echo "Your id  is" . $id;
     echo "<br/>";
      echo "Your grupo is" . $grupo;
     echo "<br/>";
     echo "Your Email is " . $email;
     echo "<br/>";
     ?>
          <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>numero</th>
                              <th>modulo </th>
                              <th>grupo</th>
                              <th>s</th>
                              <th>i</th>
                              <th>u</th>
                              <th>d</th>
                              <th>direccion</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($modelos); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $modelos[$i]->descripcion; ?></td>
						     <td><?php echo $modelos[$i]->nombre_grupo; ?></td>
						     <td><?php echo $modelos[$i]->s; ?></td>
                                   <td><?php echo $modelos[$i]->i; ?></td>
                                   <td><?php echo $modelos[$i]->u; ?></td>
                                   <td><?php echo $modelos[$i]->d; ?></td>

                                   <td><?php echo "<a href=".base_url("index.php/productos/eliminar")."/".$modelos[$i]->id_modulo.">"." <span class='glyphicon glyphicon-trash'></span></a>" ;?> </td>
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <center><a href="<?php echo base_url() ?>index.php/productos/producto_registration_show">Para Registro... Aqui</a>
                    </center>
               <p>Search icon: <span class="glyphicon glyphicon-zoom-out"></span></p>
               <?php
$A='macbook.jpg';
?>
<img src="http://localhost:8081/ciboot2/imagenes/<?php echo $A?>">
          </div>
          </div>
          </div>
     </body>
</html>
