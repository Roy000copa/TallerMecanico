<?php
include("../db.php");

if (isset($_POST['insert_de'])){
    $idfactura = $_POST['idfactura'];
    $idtarea = $_POST['idtarea'];
    $idreporte = $_POST['idreporte'];
    $idmaterial = $_POST['idmaterial'];


    $query = "INSERT INTO DetallesFactura(FacturaID, TareaID, ReporteID, MaterialID) VALUES ('$idfactura', '$idtarea', '$idreporte', '$idmaterial')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Detalle de la factura Guardada';
    header("Location: ../index.php");
}
?>