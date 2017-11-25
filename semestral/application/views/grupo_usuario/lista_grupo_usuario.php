<html>


                 <?php     
                 $this->load->view('nav');
                 ?>
                 <title>inicio</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
     <!--link the bootstrap css file-->
     <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
     <!-- Page content -->
     <div id="page-content-wrapper">
     <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
                <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
          <center><h2>lista de usuarios por grupo</h2></center>
          <a href="<?php echo base_url('index.php/usuario_grupo/lista_usuarios_grupos_sin');?>" class="btn btn-danger"  >usuarios sin grupo asignado</a> 
          <br>
          <a href="<?php echo base_url('index.php/usuario_grupo/lista_usuarios_grupos');?>" class="btn btn-danger"  >ver todos los usuarios </a> 
          <?php if ($usuarios == FALSE) : ?>
                <p class="alert alert-danger"><a href="javascript:void(0)" class="close"></a><b>Alerta !</b > no hay usuarios sin asignar grupo <p>
          <?php else : ?>

               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>numero</th>
                              <th>nombre</th>
                              <th>grupo</th>
                              <th>acciones</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($usuarios); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $usuarios[$i]->nombre; ?></td>
                                   <td><?php echo $usuarios[$i]->nombre_grupo;?></td>
                                   <td><a href="<?php echo base_url('index.php/usuario_grupo/show_grupo/'.$usuarios[$i]->id_usuario);?>" class="btn btn-danger"  >asignar grupo</a> </td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
              <?php endif; ?>
          </div>
          </div>
          </div>
          <br/>
          </div>
     </div>
</div>



</body>
</html>