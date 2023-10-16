<?php
include("../db.php");

if (isset($_POST['insert_rep'])){
    $idtarea = $_POST['tareaid'];
    $datetime = $_POST['datetime'];
    $descripsion = $_POST['descripsion'];

    $query = "INSERT INTO ReportesReparacion(TareaID, FechaReparacion, FallasEncontradas) VALUES ('$idtarea', '$datetime', '$descripsion')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Reporte Guardado satisfactoriamente';
    header("Location: ../index.php");
}


