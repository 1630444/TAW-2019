<!--  /////////////// MODULO DE CREAR TUTORIA ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Registrar Materia</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
      // Se instancia la clase de la Base de datos
            $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            
            // Se pasan las entradas a las variables correspondientes
            $nombre = $_POST['nombre'];
            $id_maestro = $_POST['id_maestro'];
            
            //Se crea el registro en la base de datos
            $res = $con->createMateria($nombre,$id_maestro);
            if ($res) {
                $message = "Datos insertados con éxito";
                $class = "alert alert-success";
            } else {
                $message = "No se pudieron insertar los datos";
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

                <!-- Campo Nombre -->
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="30" required>
                </div>
              
                <!-- Campo Maestro -->
                <div class="col-md-6">
                    <label>Maestro:</label>
                    <select name="id_maestro" id="id_maestro" class='form-control' required>
                      <option value="" selected disabled hidden>Seleccione un maestro</option>
                      <?php
                      // Se consiguen todos los registros para llenar el select
                      $listado = $con->readTable('maestros');
                      while ($row = $listado->fetch(PDO::FETCH_OBJ)) {
                        echo "<option value=\"$row->id\">$row->apellido $row->nombre</option>";
                      }
                      ?>
                    </select>
                </div>

                <div class="col-md-12 pull-right">
                    <hr>
                    <!-- Boton de guardar datos -->
                    <button type="submit" class="btn btn-success pull-right">Guardar datos</button>
                </div>
            </form>
        </div>
        
    </div>
    <!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->