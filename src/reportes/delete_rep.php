<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM ReportesReparacion WHERE ReporteID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Reporte Eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>