<html>

                 <?php     
                 $this->load->view('nav');
                 ?>
                 <title>inicio</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
     <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
     <div id="page-content-wrapper">
          <div class="page-content inset">
                <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
          
          <center><h2>lista metadata del documento <?php echo  $usuarios[0]->id;?></h2></center>
               <table class="table table-striped table-hover">
                    <thead>
                      <!-- no debo traer id -->
                         <tr>  
                              <th>identificador</th>
                              <th>descripcion</th>
                               <th>valor</th>
                              <th>documento</th>
                              <th>creador por</th>
                              
                              <th>acciones</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($usuarios); ++$i) { ?>
                              <tr>
                                   <td><?php echo $usuarios[$i]->id;?></td>
                                   <td><?php echo $usuarios[$i]->descripcion; ?></td> 
                                   <td><?php echo $usuarios[$i]->valor; ?></td>
                                   <td><?php echo $usuarios[$i]->id_documento; ?></td> 
                                   <td><?php echo $usuarios[$i]->nombre; ?></td> 
                                   <td></td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <center>

               <?php $id=0;
                     $id=$this->uri->segment(3);
                     ?>
               <a href="<?php echo base_url('index.php/documentos/nueva_metadata/'.$id);?>" class="btn btn-danger"  >
               nuevo metadata</a>

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