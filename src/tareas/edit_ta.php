<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM TareasReparacion WHERE TareaID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Placa = $row['Placa'];
    $IdMecanico = $row['MecanicoID'];
    $Descripcion = $row['Descripcion'];
    $Tiempo = $row['TiempoReparacion'];
  }
}

if (isset($_POST['update_ta'])) {
  $id = $_GET['id'];
  $idvehiculo = $_POST['placa'];
  $idmecanico = $_POST['idmecanico'];
  $descripcion = $_POST['descripcion'];
  $tiempo = $_POST['tiempo'];

  $query = "UPDATE TareasReparacion set Placa = '$idvehiculo', MecanicoID = '$idmecanico', Descripcion = '$descripcion', TiempoReparacion = '$tiempo' WHERE TareaID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Tarea Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="edit_ta.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="text" name="placa" class="form-control" value="<?php echo $Placa; ?>" placeholder="Placa" autofocus>
          </div>
          <div class="form-group container p-2">
            <input type="number" name="idmecanico" class="form-control" value="<?php echo $IdMecanico; ?>" placeholder="ID Mecanico">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="descripcion" rows="2" placeholder="Descripcion"><?php echo $Descripcion; ?></textarea>
          </div>
          <div class="form-group container p-2">
            <input type="number" name="tiempo" step="0.01" class="form-control" value="<?php echo $Tiempo; ?>" placeholder="Tiempo Estimado">
          </div>
          <button class="btn btn-success" name="update_ta">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>