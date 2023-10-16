<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM DetallesFactura WHERE DetalleID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $IdFactura = $row['FacturaID'];
    $IdTarea = $row['TareaID'];
    $IdReporte = $row['ReporteID'];
    $IdMaterial = $row['MaterialID'];
  }
}

if (isset($_POST['update_de'])) {
  $id = $_GET['id'];
  $idfactura = $_POST['idfactura'];
  $idtarea = $_POST['idtarea'];
  $idreporte = $_POST['idreporte'];
  $idmaterial = $_POST['idmaterial'];

  $query = "UPDATE DetallesFactura set FacturaID = '$idfactura', TareaID = '$idtarea', ReporteID = '$idreporte', MaterialID = '$idmaterial' WHERE DetalleID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Detalle de la factura Actualizada';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="edit_de.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="number" name="idfactura" class="form-control" value="<?php echo $IdFactura; ?>" placeholder="ID Factura">
          </div>
          <div class="form-group container p-2">
            <input type="number" name="idtarea" class="form-control" value="<?php echo $IdTarea; ?>" placeholder="ID Tarea">
          </div>
          <div class="form-group container p-2">
            <input type="number" name="idreporte" class="form-control" value="<?php echo $IdReporte; ?>" placeholder="ID Reporte">
          </div>
          <div class="form-group container p-2">
            <input type="number" name="idmaterial" class="form-control" value="<?php echo $IdMaterial; ?>" placeholder="ID Material">
          </div>
          <button class="btn btn-success" name="update_de">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>