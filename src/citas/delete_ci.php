<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM citas WHERE CitaID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Cita Eliminada';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>