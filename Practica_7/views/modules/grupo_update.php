<!--  /////////////// MODULO DE EDITAR GRUPOS ///////////////// -->
<!-- Recuadro -->
<?php
// Si el url tiene un id se guarda en u avariable
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    // si no se regresa al index
    header("location:index.php?action=grupos");
}
?>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Modificar Grupos</h4>
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
            $res = $con->updateGrupo($id, $clave, $carrera);
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
    $datos = $con->single($id, 'grupos');
    ?>
        <div class="row">
            <form method="post">
              
              <!--value="<?php echo $datos->nombre; ?>"-->
              
                <!-- Campo ID -->
                <div class="col-md-6">
                    <label>Id:</label>
                    <input type="number" class='form-control' maxlength="11" value="<?php echo $datos->id; ?>" disabled>
                </div>
              
                <!-- Campo Clave -->
                <div class="col-md-6">
                    <label>Clave:</label>
                    <input type="number" name="clave" id="clave" class='form-control' maxlength="11" value="<?php echo $datos->clave; ?>" required>
                </div>
              
              <!-- Campo Carrera -->
                <div class="col-md-6">
                    <label>Carrera:</label>
                    <input type="text" name="carrera" id="carrera" class='form-control' maxlength="50" value="<?php echo $datos->carrera; ?>" required>
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