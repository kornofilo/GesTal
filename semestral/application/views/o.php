
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
     <b id="logout"><a href="<?php echo base_url()."index.php/user_authentication/logout" ?>">Cerrar Sesion</a></b>
     


          <div class="container">
          <div class="row">
          <div class="col-lg-12 col-sm-12">
           <h4>filtar por grupo</h4>
         
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

                                   
                                   
                              </tr>
                              </tr>
                         
                    </tbody>
               </table>
               <center>
               <h4>asignar modulo al grupo</h4>
               <?php


                   
                   echo form_open('grupos_modulos/nuevo_modulo');

                         echo form_label('grupo');
                         echo"<br/>";
                         echo form_dropdown('id_del_grupo', $grupos);
                         
                         
                         
                         echo form_submit('submit', 'Sign Up');
                         echo form_close();
                    
                    

               }?> 
              
              </center>
              


          </div>
          </div>
          </div>
          </div>
     </body>
</html>
