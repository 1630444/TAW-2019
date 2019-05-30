<!--  /////////////// MODULO DE EDITAR CLIENTES ///////////////// -->
<!-- Recuadro -->
<?php
// Si el url tiene un id se guarda en u avariable
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    // si no se regresa al index
    header("location:index.php?action=clientes");
}
?>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Modificar Cliente</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
        // Se instancia la clase de la Base de datos
        $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            // Se pasan las entradas a las variables correspondientes
            $tipo = $_POST['tipo'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            //Se crea el registro en la base de datos
            $res = $con->updateCliente($id, $tipo, $nombre, $apellido);
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
    $datos = $con->single($id, 'clientes');
    ?>
        <div class="row">
            <form method="post">
                <!-- Campo ID -->
                <div class="col-md-6">
                    <label>Id:</label>
                    <input type="number" class='form-control' maxlength="11" value="<?php echo $datos->id; ?>" disabled>
                </div>
                <!--Campo Tipo de cliente-->
                <div class="col-md-6">
                    <label>Tipo de cliente:</label>
                    <select name="tipo" id="tipo" class='form-control'>
                        <option disabled="disabled">Ingresa el tipo</option>
                        <option value="habituales" <?php if ($datos->tipo == "habituales") echo 'selected'; ?>>Habituales</option>
                        <option value="esporadicos" <?php if ($datos->tipo == "esporadicos") echo 'selected'; ?>>Esporadicos</option>
                    </select>
                </div>
                <!-- Campo Nombre -->
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="45" required value="<?php echo $datos->nombre; ?>">
                </div>
                <!-- Campo Apellido -->
                <div class="col-md-6">
                    <label>Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class='form-control' maxlength="45" required value="<?php echo $datos->apellido; ?>">
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