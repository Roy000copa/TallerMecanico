<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Facturas WHERE FacturaID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $IdCliente = $row['ClienteID'];
    $DateTime = $row['FechaEmision'];
    $Total = $row['Total'];
  }
}

if (isset($_POST['update_fa'])) {
  $id = $_GET['id'];
  $idcliente = $_POST['idcliente'];
  $datetime = $_POST['datetime'];
  $total = $_POST['total'];

  $query = "UPDATE Facturas set ClienteID = '$idcliente', FechaEmision = '$datetime', Total = '$total' WHERE FacturaID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Factura Actualizada';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="edit_fa.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="number" name="idcliente" class="form-control" value="<?php echo $IdCliente; ?>" placeholder="ID Mecanico">
          </div>
          <div class="form-group container p-2">
            <input type="text" name="datetime" class="form-control" value="<?php echo $DateTime; ?>" placeholder="Fecha Emision">
          </div>
          <div class="form-group container p-2">
            <input type="number" name="total" step="0.01" class="form-control" value="<?php echo $Total; ?>" placeholder="Total">
          </div>
          <button class="btn btn-success" name="update_fa">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>