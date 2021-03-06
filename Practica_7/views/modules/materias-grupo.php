<!--  /////////////// MODULO DE CARGA DE GRUPOS ///////////////// -->
<!-- Recuadro -->
<?php
// Si el url tiene un id se guarda en u avariable
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    // si no se regresa al index
    header("location:index.php?action=grupo");
}
?>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">CARGA DE GRUPOS</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
        // Se instancia la clase de la Base de datos
        $con = new Database();
        $datos = $con->single($id, 'grupos');
      echo "<h3> Grupo: $datos->clave</h3>";
      ?>
      
      <?php
        if (isset($_POST) && !empty($_POST)) {
            // Se pasan las entradas a las variables correspondientes
            $id_materia = $_POST['id_materia'];
            //Se crea el registro en la base de datos
            $res = $con->createMatGru($id_materia,$id);
            if ($res) {
                $message = "Datos actualizados con éxito";
                $class = "alert alert-success";
            } else {
                $message = "No se pudieron actualizar los datos";
                $class = "alert alert-danger";
            }

            ?>
            <div class="<?php echo $class ?>">
                <?php echo $message; ?>
            </div>
        <?php
    }
    ?>
        <div class="row">
            <form method="post">
              
              <!--value="<?php echo $datos->nombre; ?>"-->
              
              
              <!-- Campo Materia -->
                <div class="col-md-6">
                    <label>Agregar materia:</label>
                    <select name="id_materia" id="id_materia" class='form-control' required>
                      <option value="" selected disabled hidden>Seleccione una materia</option>
                      <?php
                      // Se consiguen todos los registros para llenar el select
                      $listado = $con->readTable('materias');
                      while ($row = $listado->fetch(PDO::FETCH_OBJ)) {
                        echo "<option value=\"$row->id\"";
                        echo ">$row->id : $row->nombre</option>";
                      }
                      ?>
                    </select>
                </div>

                <div class="col-md-12 pull-right">
                    <hr>
                    <!-- Boton Actualizar datos -->
                    <button type="submit" class="btn btn-success pull-right">Agregar</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-content -->
  
  <!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <!--/// Todo el contenido del recuadro ////-->
        <br>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <!-- Se ponen las cabezeras de la tabla -->
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Maestro asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <!-- Se ponen el pie de la tabla, las mismcasque lascabezereas -->
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Maestro asignado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>

            <?php
            // Se incluye la clase de base de datos, en donde se realia la conexion.
            // Se instancia la clase de la Base de datos
            $con = new Database();
            // Se llama a la funcion que regresa los registros de la tabla 
            $list = $con->readSpecial("SELECT * FROM `materias-grupos` WHERE id_grupo = $id");
            while ($r = $list->fetch(PDO::FETCH_OBJ)) {
              $listado = $con->readSpecial("SELECT * FROM materias WHERE id = $r->id_materia");
            ?>
            <tbody>
                <?php
                // Se recorre cada uno de los registros que halla regresado la consulta para poder consultar los datos de cada uno y guardarlos en variables individuales.
                while ($row = $listado->fetch(PDO::FETCH_OBJ)) {
                   
                    ?>
                    <tr>
                        <!-- Se agrega una fila -->
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $con->singleData($row->id_maestro,'maestros','apellido'); ?></td>
                           
                        <td>
                            
                            <!--Botón para eliminar el registro-->
                            <a class="btn btn-danger waves-effect waves-light" title="Eliminar" data-toggle="tooltip" onclick="
                                            if(confirm('¿Seguro que desea eliminar este registro?')){
                                                document.location.href = 'index.php?action=delete&id=<?php echo $r->id; ?>&table=materias-grupos&id2=<?php echo $id; ?>'
                                            }"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
            }
            }
            ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->
</div>
<!-- /.col-xs-12 -->