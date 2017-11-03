
<html>
<?php     
          $this->load->view('nav');
     ?>
     <head>
     <title>inicio</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
     <!--link the bootstrap css file-->
     <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
     </head>

     <body>
     <div id="page-content-wrapper">
     <b id="logout"><a href="<?php echo base_url()."index.php/user_authentication/logout" ?>">Cerrar Sesion</a></b>
     


          <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">

          <?php if (count($modelos)==0){ ?>
                <p class="alert alert-danger"><a href="javascript:void(0)" class="close"></a><b>atencion!</b >no hay modulos disponoibles para este usuario<p>
          <?php } else { ?>
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

                                   <td><?php echo "<a href=".base_url("index.php/productos/eliminar")."/".$modelos[$i]->id_modulo.">"." <span class='glyphicon glyphicon-ok'></span></a>" ;?> </td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <center><a href="<?php echo base_url() ?>index.php/productos/producto_registration_show">Para Registro... Aqui</a>
                    </center>
               <p>Search icon: <span class="glyphicon glyphicon-zoom-out"></span></p>
              

<?php }?>
          </div>
          </div>
          </div>
          </div>
     </body>
</html>
