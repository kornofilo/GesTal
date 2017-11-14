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
               <table class="table table-striped table-hover">
                    <thead>
                      <!-- no debo traer id -->
                         <tr>  
                              <th>Nombre del Documento</th>
                              <th>Version</th>
                              
                              <th>Fecha de creacion</th>
                              <th>Creado por</th>
                              <th>Fecha de subida</th>
                              <th>Identificacion de la direccion</th>
                              <th>Ver metadata</th>
                              <th>Ver Direccion</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($usuarios); ++$i) { ?>
                              <tr>
                                   <td><?php echo $usuarios[$i]->nombre_documento;?></td>
                                   <td><?php echo $usuarios[$i]->version; ?></td>
                                   
                                   <td><?php echo $usuarios[$i]->fecha_creacion; ?></td> 
                                   <td><?php echo $usuarios[$i]->nombre; ?></td> 
                                   <td><?php echo $usuarios[$i]->fecha_subida; ?></td>
                                   <td><?php echo $usuarios[$i]->id_direccion; ?></td> 
                                   <td><a href="<?php echo base_url()?>index.php/documentos/documento_registration" class="btn btn-info"  >Ver</td>
                                    <td><a href="<?php echo base_url()?>index.php/documentos/documento_registration" class="btn btn-danger"  >Ver</td>

                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <center>
               <a href="<?php echo base_url()?>index.php/documentos/documento_registration" class="btn btn-info"  >
               crear nuevo documento</a>

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