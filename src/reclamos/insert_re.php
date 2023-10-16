<?php
include("../db.php");

if (isset($_POST['insert_re'])){
    $idcliente = $_POST['idcliente'];
    $datetime = $_POST['datetime'];
    $descripsion = $_POST['descripsion'];

    $query = "INSERT INTO Reclamos(ClienteID, FechaReclamo, Descripcion, Estado) VALUES ('$idcliente', '$datetime', '$descripsion', 'No Atendido')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Reclamo Guardado';
    header("Location: ../index.php");
}


