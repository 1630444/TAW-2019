<?php
include_once('utilities.php');
//$user_access = [];
$total_users = count($user_access);
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Concentrado</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Contando datos</h3>
          <p>Totales</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">

                <!--Tabla totales-->
              <table>
                <thead>
                  <!--Titulo de la tabla-->
                  <tr>
                    <!--Columnas-->
                    <th width="200">Usuarios</th>
                    <th width="250">Tipos</th>
                    <th width="250">Status</th>
                    <th width="250">Accesos</th>
                    <th width="250">Usuarios Activos</th>
                    <th width="250">Usuarios Inactivos</th>
                  </tr>
                </thead>
                <?php 
                  // Se hacec el llamado al archivo de base de datos
                  include ('database.php');
                  // Se instancia la clase
                  $clientes = new Database();
                  //Variables para hacer el conteo
                  $contUsu = 0;
                  $contTip = 0;
                  $contSta = 0;
                  $contAcc = 0;
                  $contUsA = 0;
                  $contUsI = 0;

                  //CONTEO DE USUARIOS
                  // Se llama a los datos de la tabla
                  $listado=$clientes->read('user');
                  // Se recorre el resultado de registros
                  while ($row=mysqli_fetch_object($listado))
                  //Se agrega 1 al contador
                    $contUsu = $contUsu + 1;
                  
                  //CONTEO DE TIPOS DE USUARIO
                  // Se llama a los datos de la tabla
                  $listado=$clientes->read('user_type');
                  // Se recorre el resultado de registros
                    while ($row=mysqli_fetch_object($listado))
                    //Se agrega 1 al contador
                      $contTip = $contTip + 1;

                  //CONTEO DE ESTATUS EXISTENTES
                  // Se llama a los datos de la tabla
                  $listado=$clientes->read('status');
                  // Se recorre el resultado de registros
                    while ($row=mysqli_fetch_object($listado))
                    //Se agrega 1 al contador
                      $contSta = $contSta + 1;

                  //CONTEO DE TIPOS DE USUARIO
                  // Se llama a los datos de la tabla
                  $listado=$clientes->read('user_log');
                  // Se recorre el resultado de registros
                    while ($row=mysqli_fetch_object($listado))
                    //Se agrega 1 al contador
                      $contAcc = $contAcc + 1;
                  
                  //CONTEO DE USUARIOS ACTIVOS
                  // Se llama a los datos de la tabla
                  $listado=$clientes->read_special('SELECT * FROM user WHERE status_id = 1');
                  // Se recorre el resultado de registros
                    while ($row=mysqli_fetch_object($listado))
                    //Se agrega 1 al contador
                      $contUsA = $contUsA + 1;

                  //CONTEO DE USUARIOS INACTIVOS
                  // Se llama a los datos de la tabla
                  $listado=$clientes->read_special('SELECT * FROM user WHERE status_id = 2');
                  // Se recorre el resultado de registros
                    while ($row=mysqli_fetch_object($listado))
                    //Se agrega 1 al contador
                      $contUsI = $contUsI + 1;
				        ?>
               <tbody>
                  <!--Se agrega una nueva fila-->
                    <tr>
                      <td><?php echo $contUsu;?></td>
                      <td><?php echo $contTip;?></td>
                      <td><?php echo $contSta;?></td>
                      <td><?php echo $contAcc;?></td>
                      <td><?php echo $contUsA;?></td>
                      <td><?php echo $contUsI;?></td>
                    </tr>	
                  <?php
                              
                  ?>         
                </tbody>
              </table>

              </div>

              <!--Tabla de user-->
              <table>
                <thead>
                  <!--Titulo de la tabla-->
                  <h4>user</h4>
                  <tr>
                    <!--Columnas-->
                    <th width="200">ID</th>
                    <th width="250">Email</th>
                    <th width="250">Password</th>
                    <th width="250">Status ID</th>
                    <th width="250">User type id</th>
                  </tr>
                </thead>
                <?php 
                  // Se llama a los datos
				          $listado=$clientes->read('user');
				        ?>
               <tbody>
                  <?php
                    // Se pasa por los registros de la consulta, para agregarlos a la tabla, asignandoles una variable a cada uno
                    while ($row=mysqli_fetch_object($listado)){
                      $id=$row->id;
                      $email=$row->email;
                      $pssw=$row->pssw;
                      $status_id=$row->status_id;
                      $user_type_id=$row->user_type_id;
                  ?>
                  <!--Se agrega una nueva fila-->
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $pssw;?></td>
                      <td><?php echo $status_id;?></td>
                      <td><?php echo $user_type_id;?></td>
                    </tr>	
                  <?php
                              }
                  ?>         
                </tbody>
              </table>

              <!--Tabla de user_log-->
              <table>
                <thead>
                  <h4>user_log</h4>
                  <tr>
                  <!--Columnas-->
                    <th width="200">ID</th>
                    <th width="250">Date logged</th>
                    <th width="250">User ID</th>
                  </tr>
                </thead>
                <?php 
                // Se llama a los datos
				          $listado=$clientes->read('user_log');
				        ?>
               <tbody>
                  <?php 
                  // Se pasa por los registros de la consulta, para agregarlos a la tabla, asignandoles una variable a cada uno
                    while ($row=mysqli_fetch_object($listado)){
                      $id=$row->id;
                      $date_logged=$row->date_logged;
                      $user_id=$row->user_id;
                  ?>
                  <!--Se agrega una nueva fila-->
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $date_logged;?></td>
                      <td><?php echo $user_id;?></td>
                    </tr>	
                  <?php
                              }
                  ?>         
                </tbody>
              </table>

              <!--Tabla de user_type-->
              <table>
                <thead>
                  <h4>user_type</h4>
                  <tr>
                  <!--Columnas-->
                    <th width="200">ID</th>
                    <th width="250">Name</th>
                  </tr>
                </thead>
                <?php 
                // Se llama a los datos
				          $listado=$clientes->read('user_type');
				        ?>
               <tbody>
                  <?php 
                  // Se pasa por los registros de la consulta, para agregarlos a la tabla, asignandoles una variable a cada uno
                    while ($row=mysqli_fetch_object($listado)){
                      $id=$row->id;
                      $name=$row->name;
                  ?>
                  <!--Se agrega una nueva fila-->
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $name;?></td>
                    </tr>	
                  <?php
                              }
                  ?>         
                </tbody>
              </table>

              <!--Tabla de status-->
              <table>
                <thead>
                  <h4>status</h4>
                  <tr>
                  <!--Columnas-->
                    <th width="200">ID</th>
                    <th width="250">Name</th>
                  </tr>
                </thead>
                <?php 
                // Se llama a los datos
				          $listado=$clientes->read('status');
				        ?>
               <tbody>
                  <?php 
                  // Se pasa por los registros de la consulta, para agregarlos a la tabla, asignandoles una variable a cada uno
                    while ($row=mysqli_fetch_object($listado)){
                      $id=$row->id;
                      $name=$row->name;
                  ?>
                  <!--Se agrega una nueva fila-->
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $name;?></td>
                    </tr>	
                  <?php
                              }
                  ?>         
                </tbody>
              </table>

            </div>
          </section>
        </div>
      </div>
    </div>
    
    <?php require_once('footer.php'); ?>