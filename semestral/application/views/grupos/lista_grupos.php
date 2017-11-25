
<html>
     <?php     
          $this->load->view('nav');
     ?>
     <title>inicio</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
     <!--link the bootstrap css file-->
     <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  

     <body>

<!--carga espacio para contener cuerpo-->
     <div id="page-content-wrapper">
          <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
          <?php if ($ver==0) {
               $this->load->view('no');
              }else{ ?>
               <center><h2>lista de grupos</h2><center>
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>numero</th>
                              <th>nombre_del grupo</th>
                              <th>departamento</th>
                              <th>acciones</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($grupos); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $grupos[$i]->nombre_grupo; ?></td>
						     <td><?php echo $grupos[$i]->departamento; ?></td>
                                   <td><a href="<?php echo base_url('index.php');?>" class="btn btn-info"  >actualizar</a> </td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
                <?php  }?>
               <center>
               
               <a href="<?php echo base_url()?>index.php/grupo/grupo_registration" class="btn btn-info"  >crear nuevo grupo</a>
              
                    </center>
          </div>
          </div>
            </div>
          </div>
     </body>
</html>
