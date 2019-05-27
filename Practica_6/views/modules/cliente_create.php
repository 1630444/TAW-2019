<!--  /////////////// MODULO DE CREAR CLIENTES ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Registrar Clientes</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
        if (isset($_POST) && !empty($_POST)) {
            // Se instancia la clase de la Base de datos
            $con = new Database();
            // Se pasan las entradas a las variables correspondientes
            $tipo = $_POST['tipo'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            //Se crea el registro en la base de datos
            $res = $con->createCliente($tipo, $nombre, $apellido);
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

                <!--Campo Tipo de cliente-->
                <div class="col-md-6">
                    <label>Tipo de cliente:</label>
                    <select name="tipo" id="tipo" class='form-control'>
                        <option selected disabled="disabled">Ingresa el tipo</option>
                        <option value="habituales">Habituales</option>
                        <option value="esporadicos">Esporadicos</option>
                    </select>
                </div>

                <!-- Campo Nombre -->
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="45" required>
                </div>

                <!-- Campo Apellido -->
                <div class="col-md-6">
                    <label>Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class='form-control' maxlength="45" required>
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