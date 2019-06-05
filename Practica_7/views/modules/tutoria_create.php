<!--  /////////////// MODULO DE CREAR TUTORIA ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Registrar Tutoria</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
      // Se instancia la clase de la Base de datos
            $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            
            // Se pasan las entradas a las variables correspondientes
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $tipo = $_POST['tipo'];
            $tema = $_POST['tema'];
            $id_maestro = $_POST['id_maestro'];
            
            //Se crea el registro en la base de datos
            $res = $con->createTutoria($fecha,$hora,$tipo,$tema,$id_maestro);
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

                <!-- Campo Fecha -->
                <div class="col-md-6">
                    <label>Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class='form-control' required>
                </div>
              
                <!-- Campo Hora -->
                <div class="col-md-6">
                    <label>Hora:</label>
                    <input type="time" name="hora" id="hora" class='form-control' required>
                </div>
              
                <!-- Campo Tipo -->
                <div class="col-md-6">
                    <label>Tipo:</label>
                    <select name="tipo" id="tipo" class='form-control' required>
                      <option value="" selected disabled hidden>Seleccione un tipo</option>
                      <option value="individual">Individual</option>
                      <option value="grupal">Grupal</option>
                    </select>
                </div>
              
                <!-- Campo Tema -->
                <div class="col-md-6">
                    <label>Tema:</label>
                    <input type="text" name="tema" id="tema" class='form-control' maxlength="50" required>
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