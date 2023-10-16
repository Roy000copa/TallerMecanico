<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM materialreparacion WHERE MaterialID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Registro Eliminada';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>