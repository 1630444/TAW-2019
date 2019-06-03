<!--  /////////////// MODULO DE EDITAR ALUMNOS ///////////////// -->
<!-- Recuadro -->
<?php
// Si el url tiene un id se guarda en u avariable
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    // si no se regresa al index
    header("location:index.php?action=alumno");
}
?>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Modificar Alumno</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
        // Se instancia la clase de la Base de datos
        $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            // Se pasan las entradas a las variables correspondientes
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nac = $_POST['fecha_nac'];
            $matricula = $_POST['matricula'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            //Se crea el registro en la base de datos
            $res = $con->updateAlumno($id, $nombre, $apellido, $fecha_nac, $matricula, $email, $tel);
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
    $datos = $con->single($id, 'alumnos');
    ?>
        <div class="row">
            <form method="post">
              
              <!--value="<?php echo $datos->nombre; ?>"-->
              
                <!-- Campo ID -->
                <div class="col-md-6">
                    <label>Id:</label>
                    <input type="number" class='form-control' maxlength="11" value="<?php echo $datos->id; ?>" disabled>
                </div>
              
                <!-- Campo Nombre -->
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="30" value="<?php echo $datos->nombre; ?>" required>
                </div>

                <!-- Campo Apellido -->
                <div class="col-md-6">
                    <label>Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class='form-control' maxlength="30" value="<?php echo $datos->apellido; ?>" required>
                </div>
              
                <!-- Campo Fecha de nacimiento -->
                <div class="col-md-6">
                    <label>Fecha de nacimiento:</label>
                    <input type="date" name="fecha_nac" id="fecha_nac" class='form-control' value="<?php echo $datos->fecha_nac; ?>" required>
                </div>

                <!-- Campo Matricula -->
                <div class="col-md-6">
                    <label>Matricula:</label>
                    <input type="text" name="matricula" id="matricula" class='form-control' maxlength="7" value="<?php echo $datos->matricula; ?>" required>
                </div>
              
                <!-- Campo Email -->
                <div class="col-md-6">
                    <label>E-mail:</label>
                    <input type="email" name="email" id="email" class='form-control' maxlength="20" value="<?php echo $datos->email; ?>" required>
                </div>
              
              <!-- Campo Telefono -->
                <div class="col-md-6">
                    <label>Telefono:</label>
                    <input type="text" name="tel" id="tel" class='form-control' maxlength="15" value="<?php echo $datos->matricula; ?>" required>
                </div>

                <div class="col-md-12 pull-right">
                    <hr>
                    <!-- Boton Actualizar datos -->
                    <button type="submit" class="btn btn-success pull-right">Actualizar datos</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->