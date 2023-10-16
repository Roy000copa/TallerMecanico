<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Proveedores WHERE ProveedorID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $NumeroTelefono = $row['NumeroTelefono'];
    $Direccion = $row['Direccion'];
  }
}

if (isset($_POST['update_pro'])) {
  $id = $_GET['id'];
  $nombre = $_POST['name'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];

  $query = "UPDATE Proveedores set Nombre = '$nombre', NumeroTelefono = '$telefono', Direccion = '$direccion' WHERE ProveedorID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Proveedor Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="edit_pro.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="text" name="name" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Nombre">
          </div>
          <div class="form-group container p-2">
            <input type="number" name="telefono" class="form-control" value="<?php echo $NumeroTelefono; ?>" placeholder="Telefono">
          </div>
          <div class="form-group container p-2">
            <input type="text" name="direccion" class="form-control" value="<?php echo $Direccion; ?>" placeholder="Direccion">
          </div>
          <button class="btn btn-success" name="update_pro">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>