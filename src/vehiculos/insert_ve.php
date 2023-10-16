<?php
include("../db.php");

if (isset($_POST['insert_ve'])) {
    $placa = $_POST['placa'];
    $idCliente = $_POST['idCliente'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];

    // Insertar la foto en la base de datos
    $query = "INSERT INTO Vehiculos(Placa, ClienteID, Marca, Modelo, Anio) VALUES ('$placa', '$idCliente', '$marca', '$modelo', '$anio')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("query Failed");
    }

    // Inicializar la sesión y agregar el mensaje de éxito
    $_SESSION['message'] = 'Vehículo insertado';
    header("Location: ../index.php");
}

?>

