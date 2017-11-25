
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
    
          <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
          <?php if ($ver==0) {
               $this->load->view('no');
          }else{ ?>
<center><h2>lista de grupos-modulos</h2><center>
           <h4>filtar por grupo</h4>
           <?php
                   echo form_open('grupos_modulos/lista_modulo');
                   
                    
                         echo form_dropdown('id_del_grupo', $grupos);
                         echo"<br/>";
                        
                         echo form_submit('submit', 'eviar');
                         echo form_close();

          if (count($modelos)==0){ ?>
                <p class="alert alert-danger"><a href="javascript:void(0)" class="close"></a><b>atencion!</b >no hay modulos disponoibles para este grupo <p>
          <?php } else { ?>
               <table class="table table-striped table-hover">
                    <thead>
                         <tr>  
                              <th>numero</th>
                              <th>modulo </th>
                              <th>grupo</th>
                              <th>selecionar</th>
                              <th>insertar</th>
                              <th>actualizar</th>
                              <th>eliminar</th>
                              <th>accion</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for ($i = 0; $i < count($modelos); ++$i) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $modelos[$i]->descripcion; ?></td>
						     <td><?php echo $modelos[$i]->nombre_grupo; ?></td>
						     <td><?php if(($modelos[$i]->s)==1){echo('si');}else{echo ('no');} ?></td>
                                   <td><?php if(($modelos[$i]->i)==1){echo('si');}else{echo ('no');}  ?></td>
                                   <td><?php if(($modelos[$i]->u)==1){echo('si');}else{echo ('no');}  ?></td>
                                   <td><?php if(($modelos[$i]->d)==1){echo('si');}else{echo ('no');}  ?></td>

                                   <td>
<a href="<?php echo base_url('index.php/grupos_modulos/editar/'.$modelos[$i]->id_del_grupo.'/'.$modelos[$i]->id_del_modulo);?>" class="btn btn-info"  >actualizar</a>
<a href="<?php echo base_url('index.php/grupos_modulos/eliminar/'.$modelos[$i]->id_del_grupo.'/'.$modelos[$i]->id_del_modulo);?>" class="btn btn-danger"  >eliminar</a></td>
                                   
                              </tr>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <?php  } 

               }?>
               <center>

               <h4>asignar modulo al grupo</h4>
               <?php


                 
                   echo form_open('grupos_modulos/nuevo_modulo');

                       
                         echo"<br/>";
                         echo form_dropdown('id_del_grupo', $grupos);
                         
                         
                         
                         echo form_submit('submit', 'Sign Up');
                         echo form_close();
                    
                    

               ?> 
              
              </center>
              


          </div>
          </div>
          </div>
          </div>
     </body>
   
</html>

