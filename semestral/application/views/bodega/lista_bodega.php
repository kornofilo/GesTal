<html>
<!-- instanciando variables de secion -->

    
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
          <?php if ($usuarios==false) {
               $this->load->view('no');
              }else{ ?>
          <center><h2>lista de bodegas</h2><center>
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>Identificacion de la Bodega</th>
                              <th>Nombre de la Bodega</th>
                              <th>Direccion</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($usuarios); ++$i) { ?>
                              <tr>
                                   
                                   <td><?php echo $usuarios[$i]->id_bodega; ?></td>
                                   <td><?php echo $usuarios[$i]->nombre_bodega; ?></td>
                                   <td><?php echo $usuarios[$i]->direccion; ?></td>
                                   
                              </tr>
                              </tr>
                         <?php } 
                         }?>
                    </tbody>
               </table>
               <center>
               <a href="<?php echo base_url()?>index.php/bodega/bodega_registration" class="btn btn-info"  >crear nueva bodega</a>

                    </center>
          </div>
          </div>
          </div>
          <br/>
          </div>
     </div>
</div>



</body>
</html>