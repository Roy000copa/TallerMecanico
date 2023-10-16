<?php
include("../db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Clientes WHERE ClienteID = '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Id = $row['ClienteID'];
    $Nombre = $row['Nombre'];
    $Apellidos = $row['Apellidos'];
    $Telefono = $row['NumeroTelefono'];
    $Direccion = $row['Direccion'];
    $Email = $row['Correo'];
  }
}

if (isset($_POST['update_cli'])) {
  $id = $_GET['id'];
  $password= $_POST['password'];
  $nombre= $_POST['name'];
  $apellidos = $_POST['lastname'];
  $telefono = $_POST['phone'];
  $direccion = $_POST['address'];
  $email = $_POST['email'];

  $query = "UPDATE Clientes set ClienteID = '$password', Nombre = '$nombre', Apellidos = '$apellidos', NumeroTelefono = '$telefono', Direccion = '$direccion', Correo = '$email' WHERE ClienteID = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h1>Que desea modificar?</h1>
      <div class="card card-body">
      <form action="edit_cli.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group container p-2">
          <input type="number" name="password" class="form-control" value="<?php echo $Id; ?>" placeholder="CI">
        </div>
        <div class="form-group container p-2">
            <input name="name" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Nombres">
        </div>
        <div class="form-group container p-2">
            <input name="lastname" type="text" class="form-control" value="<?php echo $Apellidos;?>"  placeholder="Apellidos">
        </div>
        <div class="form-group container p-2">
            <input name="phone" type="number" class="form-control" value="<?php echo $Telefono;?>"  placeholder="Telefono">
        </div>
        <div class="form-group container p-2">
            <input name="address" type="text" class="form-control" value="<?php echo $Direccion;?>"  placeholder="Direccion">
        </div>
        <div class="form-group container p-2">
            <input name="email" type="email" class="form-control" value="<?php echo $Email;?>"  placeholder="Correo">
        </div>
        <button class="btn btn-success" name="update_cli">
          Cambiar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>