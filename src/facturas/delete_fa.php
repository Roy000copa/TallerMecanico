<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM Facturas WHERE FacturaID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Factura Eliminada';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>