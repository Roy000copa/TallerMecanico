<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Vehiculos WHERE Placa = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Placa = $row['Placa'];
    $IdCliente = $row['ClienteID'];
    $Marca = $row['Marca'];
    $Modelo = $row['Modelo'];
    $Anio = $row['Anio'];
  }
}

if (isset($_POST['update_ve'])) {
  $id = $_GET['id'];
  $placa = $_POST['placa'];
  $idCliente = $_POST['idCliente'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $anio = $_POST['anio'];

  $query = "UPDATE Vehiculos set Placa = '$placa', ClienteID = '$idCliente', Marca = '$marca', Modelo = '$modelo', Anio = '$anio' WHERE Placa = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Vehiculo Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
      <form action="edit_ve.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group container p-2">
            <input type="text" name="placa" class="form-control" value="<?php echo $Placa; ?>" placeholder="Placa" autofocus>
        </div>
        <div class="form-group container p-2">
            <input type="number" name="idCliente" class="form-control" value="<?php echo $IdCliente; ?>" placeholder="ID Cliente" autofocus>
        </div>
        <div class="form-group container p-2">
            <input type="text" name="marca" class="form-control" value="<?php echo $Marca; ?>" placeholder="Marca">
        </div>
        <div class="form-group container p-2">
            <input type="text" name="modelo" class="form-control" value="<?php echo $Modelo; ?>" placeholder="Modelo">
        </div>
        <div class="form-group container p-2">
            <input type="text" name="anio" class="form-control" value="<?php echo $Anio; ?>" placeholder="Año">
        </div>
        <button class="btn btn-success" name="update_ve">
          Cambiar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>