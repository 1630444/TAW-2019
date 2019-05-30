<!--  /////////////// MODULO DE EDITAR HABITACIONES ///////////////// -->
<!-- Recuadro -->
<?php
// Si el url tiene un id se guarda en u avariable
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    // si no se regresa al index
    header("location:index.php?action=habitaciones");
}
?>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Modificar Habitacion</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
        // Se instancia la clase de la Base de datos
        $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            // Se pasan las entradas a las variables correspondientes
            $tipo = $_POST['tipo'];
            $precio = $_POST['precio'];
            //ruta carpeta donde queremos copiar las imágenes
            $uploads_dir = 'views/multimedia';
            // Se extraen los nombres y la tura del archivo de imagen que se suvio
            $tmp_name = $_FILES["imagen"]["tmp_name"][$key];
            // basename() puede evitar ataques de denegación de sistema de ficheros;
            // podría ser apropiada más validación/saneamiento del nombre del fichero
            $name = basename($_FILES["imagen"]["name"][$key]);
            //Se crea el registro en la base de datos
            $res = $con->updateHabitacion($id, $tipo, $precio, "$uploads_dir/$name");
            //Se guarda la imagen en el directorio default
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
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
    $datos = $con->single($id, 'habitaciones');
    ?>
        <div class="row">
            <form method="post">
                <!-- Campo ID -->
                <div class="col-md-6">
                    <label>Id:</label>
                    <input type="number" class='form-control' maxlength="11" value="<?php echo $datos->id; ?>" disabled>
                </div>
                <!--Campo Tipo de habitacion-->
                <div class="col-md-6">
                    <label>Tipo de habitacion:</label>
                    <select name="tipo" id="tipo" class='form-control'>
                        <option disabled="disabled">Ingresa el tipo</option>
                        <option value="simple" <?php if ($datos->tipo == "simple") echo 'selected'; ?>>Simple</option>
                        <option value="doble" <?php if ($datos->tipo == "doble") echo 'selected'; ?>>Doble</option>
                        <option value="matrimonial" <?php if ($datos->tipo == "matrimonial") echo 'selected'; ?>>Matrimonial</option>
                    </select>
                </div>
                <!-- Campo Precio -->
                <div class="col-md-6">
                    <label>Precio:</label>
                    <input type="number" name="precio" id="precio" class='form-control' maxlength="8" required value="<?php echo $datos->precio; ?>">
                </div>
                <!-- Campo Imagenes -->
                <div class="col-md-6">
                    <label>Imagenes:</label><br>
                    <label>Actual</label>
                    <img src="<?php echo $datos->imagenes; ?>" width="50" height="50">
                    <input type="file" name="imagen" accept="image/jpeg, image/png image/jpg" class='form-control' required>

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