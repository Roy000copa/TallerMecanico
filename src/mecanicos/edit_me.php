<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Mecanicos WHERE MecanicoID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $MecanicoID = $row['MecanicoID'];
    $Nombre = $row['Nombre'];
    $ApellidoP = $row['ApellidoPaterno'];
    $ApellidoM = $row['ApellidoMaterno'];
    $Especialidad = $row['Especialidad'];
    $NumeroTelefono = $row['NumeroTelefono'];
  }
}

if (isset($_POST['update_me'])) {
  $id = $_GET['id'];
  $mecanicoid = $_POST['mecanicoid'];
  $nombre = $_POST['name'];
  $paterno = $_POST['lastnameP'];
  $materno = $_POST['lastnameA'];
  $especialidad = $_POST['especialidad'];
  $telefono = $_POST['telefono'];

  $query = "UPDATE Mecanicos set MecanicoID = '$mecanicoid', Nombre = '$nombre', ApellidoPaterno = '$paterno', ApellidoMaterno = '$materno', Especialidad = '$especialidad', NumeroTelefono = '$telefono' WHERE MecanicoID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Mecanico Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="edit_me.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="text" name="mecanicoid" class="form-control" value="<?php echo $MecanicoID; ?>" placeholder="Mecanico ID" autofocus>
          </div>
          <div class="form-group container p-2">
            <input type="text" name="name" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Nombre">
          </div>
          <div class="form-group container p-2">
            <input type="text" name="lastnameP" class="form-control" value="<?php echo $ApellidoP; ?>" placeholder="Apellido Paterno">
          </div>
          <div class="form-group container p-2">
            <input type="text" name="lastnameA" class="form-control" value="<?php echo $ApellidoM; ?>" placeholder="Apellido Materno">
          </div>
          <div class="form-group container p-2">
            <input type="text" name="especialidad" class="form-control" value="<?php echo $Especialidad; ?>" placeholder="Especialidad">
          </div>
          <div class="form-group container p-2">
            <input type="number" name="telefono" class="form-control" value="<?php echo $NumeroTelefono; ?>" placeholder="Telefono">
          </div>
          <button class="btn btn-success" name="update_me">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>