<html>
                 <?php     
                 $this->load->view('nav');
                 ?>
                 <title>inicio</title>
                 <br>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
     <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
      <div id="page-content-wrapper">
          <div class="page-content inset">
                <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
              <?php if ($ver==0) {
               $this->load->view('no');
              }else{ ?>
                <center><h2>lista de usuarios </h2><center>
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
                                   <td><?php echo $usuarios[$i]->correo; ?></td>
                                   <td><?php echo $usuarios[$i]->cedula; ?></td>
                                   <td><?php echo $usuarios[$i]->telefono; ?></td>
                                   <td><?php echo $usuarios[$i]->nombre; ?></td>
                                   <td><?php echo $usuarios[$i]->nombre_grupo; ?></td>
                                   <td><a href="<?php echo base_url('index.php/usuarios/eliminar/'.$usuarios[$i]->id_usuario);?>" class="btn btn-danger"  >eliminar</a>
                                   <a href="<?php echo base_url('index.php/usuarios/editar/'.$usuarios[$i]->id_usuario);?>" class="btn btn-warning"  >editar</a>  </td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <?php  }?>
               <center>
               <a href="<?php echo base_url()?>index.php/usuarios/user_registration_show" class="btn btn-info"  >crear nuevo usuario</a>

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