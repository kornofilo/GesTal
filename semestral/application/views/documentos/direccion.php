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
          <center><h2>Direccion</h2><center>
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>numero</th>
                              <th>Nombre del Folder</th>
                              <th>Identificacion del Estante</th>
                              <th>Identificacion de la Caja</th>
                              <th>Identificacion de la Bodega</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($usuarios); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $usuarios[$i]->nombre_folder; ?></td>
                                   <td><?php echo $usuarios[$i]->id_de_estante; ?></td>
                                   <td><?php echo $usuarios[$i]->id_de_caja; ?></td>
                                   <td><?php echo $usuarios[$i]->id_de_bodega; ?></td>   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <center><h4>cambiar folder</h4>
               <?php $id=0;
                     $id=$this->uri->segment(3);
                    


                 
                   echo form_open('documentos/actualizar_dir');

                       ?><input type="hidden" name="hidden" class="form-control" required value="<?=$id?>">
                        <?php
                         echo"<br/>";
                         echo form_dropdown('id_folder',$fl);
                         
                         echo form_submit('submit', 'Sign Up');
                         echo form_close();
                    
                    

               ?> 

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