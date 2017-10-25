
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

     <body>
    
          <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>numero</th>
                              <th>nombre</th>
                              <th>cedula</th>
                              <th>telefono</th>
                              <th>correo</th>
                              <th>grupo</th>
                              <th>acciones</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($usuarios); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $usuarios[$i]->nombre; ?></td>
						     <td><?php echo $usuarios[$i]->cedula; ?></td>
						     <td><?php echo $usuarios[$i]->telefono; ?></td>
                                   <td><?php echo $usuarios[$i]->correo; ?></td>
                                   <td><?php echo $usuarios[$i]->nombre_grupo; ?></td>
                                   <td><?php echo "<a href=".base_url("index.php/productos/eliminar")."/".$usuarios[$i]->id_usuario.">"." <span class='glyphicon glyphicon-ok'></span></a>" ;?> </td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <center><a href="<?php echo base_url() ?>index.php/productos/producto_registration_show">Para Registro... Aqui</a>
                    </center>
          </div>
          </div>
          </div>
     </body>
</html>
