<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM ReportesReparacion WHERE ReporteID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $IdTarea = $row['TareaID'];
    $DateTime = $row['FechaReparacion'];
    $Descripcion = $row['FallasEncontradas'];
  }
}

if (isset($_POST['update_rep'])) {
  $id = $_GET['id'];
  $idtarea = $_POST['idtarea'];
  $datetime = $_POST['datetime'];
  $descripcion = $_POST['descripsion'];


  $query = "UPDATE ReportesReparacion set TareaID = '$idtarea', FechaReparacion = '$datetime', FallasEncontradas = '$descripcion' WHERE ReporteID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Reporte Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="edit_rep.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group container p-2">
            <input type="number" name="idtarea" class="form-control" value="<?php echo $IdTarea; ?>" placeholder="Id Cliente" autofocus>
          </div>
          <div class="form-group container p-2">
            <input type="text" name="datetime" class="form-control" value="<?php echo $DateTime; ?>" placeholder="Fecha">
          </div>
          <div class="form-group container p-2">
            <textarea class="form-control" name="descripsion" rows="2" placeholder="Descripcion"><?php echo $Descripcion; ?></textarea>
          </div>
          <button class="btn btn-success" name="update_rep">
            Cambiar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>