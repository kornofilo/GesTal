<html>
<!-- instanciando variables de sesion -->

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
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>numero</th>
                              <th>descripcion</th>
                              <th>ruta</th>
                              
                              
                              
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($modulos); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $modulos[$i]->descripcion; ?></td>
                                   <td><?php echo $modulos[$i]->ruta; ?></td>
                                   
                                   <td><a href="<?php echo base_url('index.php/modulos/eliminar/'.$modulos[$i]->id_modulo);?>" class="btn btn-danger"  >eliminar</a> </td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               
          </div>
          </div>
          </div>
          <br/>
          </div>
     </div>
</div>



</body>
</html>