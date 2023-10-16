<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM Clientes WHERE ClienteID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Cliente Eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>