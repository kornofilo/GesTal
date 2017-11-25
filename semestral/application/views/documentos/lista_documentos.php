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

          <?php if ($usuarios==false) {
               $this->load->view('no');
              }else{ ?>
          <center><h2>lista de documentos</h2></center>
          <h4>filtar por </h4>
          <a href="<?php echo base_url()?>index.php/documentos/acendente" class="btn btn-success"  >
               fecha acendente</a>
               <a href="<?php echo base_url()?>index.php/documentos/decendente" class="btn btn-danger"  >
               fecha decendente</a>
               <h4>buscar por nombre</h4>
               <?php
                   echo form_open('documentos/buscar');
                   
                      echo form_input('nombre');
                         echo form_submit('submit', 'buscar');
                         echo form_close();?>


               <table class="table table-striped table-hover">
                    <thead>
                         <tr> 
                             <th>identificador</th> 
                              <th>Nombre del Documento</th>
                              <th>Version</th>
                              <th>Fecha de creacion</th>
                              <th>Creado por</th>
                              <th>Fecha de subida</th>
                              <th>Ver metadata</th>
                              <th>Ver Direccion</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($usuarios); ++$i) { ?>
                              <tr>
                                   <td><?php echo $usuarios[$i]->id;?></td>
                                   <td><?php echo $usuarios[$i]->nombre_documento;?></td>
                                   <td><?php echo $usuarios[$i]->version; ?></td>
                                   
                                   <td><?php echo $usuarios[$i]->fecha_creacion; ?></td> 
                                   <td><?php echo $usuarios[$i]->nombre; ?></td> 
                                   <td><?php echo $usuarios[$i]->fecha_subida; ?></td>
                                   <td><a href="<?php echo base_url('index.php/documentos/lista_metadata/'.$usuarios[$i]->id);?>" class="btn btn-info"  >ver</a>  </td>
                                    <td><a href="<?php echo base_url('index.php/documentos/direccion/'.$usuarios[$i]->id);?>" class="btn btn-warning"  >ver</a> </td>

                              </tr>
                              </tr>
                         <?php } 

                         }?>
                    </tbody>
               </table>
               <center>

               
               <a href="<?php echo base_url()?>index.php/documentos/documento_registration" class="btn btn-success"  >
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