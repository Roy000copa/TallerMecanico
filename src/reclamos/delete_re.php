<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM Reclamos WHERE ReclamoID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Reclamo Eliminada';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>