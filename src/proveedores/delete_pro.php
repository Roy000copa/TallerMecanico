<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM Proveedores WHERE ProveedorID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Proveedor Eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>