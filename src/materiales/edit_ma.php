<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM materialreparacion WHERE MaterialID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $IdTarea = $row['TareaID'];
    $IdProveedor = $row['ProveedorID'];
    $Nombre = $row['Nombre'];
    $Cantidad = $row['Cantidad'];
    $Precio = $row['Precio'];
    $Fecha = $row['FechaAdquisicion'];

  }
}

if (isset($_POST['update_ma'])) {
  $id = $_GET['id'];
  $idtarea = $_POST['idtarea'];
  $idproveedor = $_POST['idproveedor'];
  $nombre = $_POST['nombre'];
  $cantidad = $_POST['cantidad'];
  $precio = $_POST['precio'];
  $fecha = $_POST['fecha'];


  $query = "UPDATE materialreparacion set TareaID = '$idtarea', ProveedorID = '$idproveedor', Nombre = '$nombre', Cantidad = '$cantidad', Precio = '$precio', FechaAdquisicion = '$fecha' WHERE MaterialID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Material Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="edit_ma.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="number" name="idtarea" class="form-control" value="<?php echo $IdTarea; ?>" placeholder="Tarea" autofocus>
          </div>
          <div class="form-group container p-2">
            <input type="number" name="idproveedor" class="form-control" value="<?php echo $IdProveedor; ?>" placeholder="Proveedor">
          </div>
          <div class="form-group container p-2">
            <input type="text" name="nombre" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Material">
          </div>
          <div class="form-group container p-2">
            <input type="number" name="cantidad" class="form-control" value="<?php echo $Cantidad; ?>" placeholder="Cantidad">
          </div>
          <div class="form-group container p-2">
            <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $Precio; ?>" placeholder="Precio">
          </div>
          <div class="form-group container p-2">
            <input type="text" name="fecha" class="form-control" value="<?php echo $Fecha; ?>" placeholder="Fecha">
          </div>
          <button class="btn btn-success" name="update_ma">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>