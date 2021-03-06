<!--  /////////////// MODULO DE CREAR GRUPO ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Registrar Grupo</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
      // Se instancia la clase de la Base de datos
            $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            
            // Se pasan las entradas a las variables correspondientes
            $clave = $_POST['clave'];
            $carrera = $_POST['carrera'];
            
            //Se crea el registro en la base de datos
            $res = $con->createGrupo($clave,$carrera);
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

                <!-- Campo Clave -->
                <div class="col-md-6">
                    <label>Clave:</label>
                    <input type="number" name="clave" id="clave" class='form-control' maxlength="11" required>
                </div>
              
              <!-- Campo Carrera -->
                <div class="col-md-6">
                    <label>Carrera:</label>
                    <input type="text" name="carrera" id="carrera" class='form-control' maxlength="50" required>
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