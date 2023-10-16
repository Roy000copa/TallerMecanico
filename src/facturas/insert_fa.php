<?php
include("../db.php");

if (isset($_POST['insert_fa'])){
    $idcliente = $_POST['idcliente'];
    $datetime = $_POST['datetime'];
    $total = $_POST['total'];

    $query = "INSERT INTO Facturas(ClienteID, FechaEmision, Total) VALUES ('$idcliente', '$datetime', '$total')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Factura Guardada';
    header("Location: ../index.php");
}
?>