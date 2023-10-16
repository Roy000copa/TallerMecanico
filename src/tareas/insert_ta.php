<?php
include("../db.php");

if (isset($_POST['insert_ta'])){
    $idvehiculo = $_POST['placa'];
    $idmecanico = $_POST['idmecanico'];
    $descripcion = $_POST['descripcion'];
    $tiempo = $_POST['tiempo'];

    $query = "INSERT INTO TareasReparacion(Placa, MecanicoID, Descripcion, TiempoReparacion) VALUES ('$idvehiculo', '$idmecanico', '$descripcion', '$tiempo')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Tarea Guardada';
    header("Location: ../index.php");
}
?>