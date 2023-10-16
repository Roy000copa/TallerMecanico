<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM citas WHERE CitaID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $IdCliente = $row['ClienteID'];
    $DateTime = $row['FechaHoraCita'];
    $Descripcion = $row['Descripcion'];
    $Estado = $row['Estado'];
  }
}

if (isset($_POST['update_ci'])) {
  $id = $_GET['id'];
  $idcliente = $_POST['idcliente'];
  $datetime = $_POST['datetime'];
  $descripcion = $_POST['descripsion'];
  $estado = $_POST['estado'];


  $query = "UPDATE citas set ClienteID = '$idcliente', FechaHoraCita = '$datetime', Descripcion = '$descripcion', Estado = '$estado' WHERE CitaID = '$id'";
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
        <form action="edit_ci.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="number" name="idcliente" class="form-control" value="<?php echo $IdCliente; ?>" placeholder="Id Cliente" autofocus>
          </div>
          <div class="form-group container p-2">
            <input type="text" name="datetime" class="form-control" value="<?php echo $DateTime; ?>" placeholder="Fecha/hora">
          </div>
          <div class="form-group container p-2">
            <textarea class="form-control" name="descripsion" rows="2" placeholder="Descripcion"><?php echo $Descripcion; ?></textarea>
          </div>
          <div class="form-group container p-2">
            <input type="text" name="estado" class="form-control" value="<?php echo $Estado; ?>" placeholder="Fecha/hora">
          </div>
          <button class="btn btn-success" name="update_ci">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>