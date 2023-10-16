<?php
include("../db.php");

if (isset($_POST['insert_ci'])){
    $idcliente = $_POST['idcliente'];
    $datetime = $_POST['datetime'];
    $descripsion = $_POST['descripsion'];

    $query = "INSERT INTO Citas(ClienteID, FechaHoraCita, Descripcion, Estado) VALUES ('$idcliente', '$datetime', '$descripsion', 'Pendiente')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Tarea Guardada satisfactoriamente';
    header("Location: ../index.php");
}


