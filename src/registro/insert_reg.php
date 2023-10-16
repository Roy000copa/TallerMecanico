<?php
include("../db.php");

if (isset($_POST['insert_reg'])){
    $id = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    
    $query = "INSERT INTO Clientes(ClienteID, Nombre, Apellidos, NumeroTelefono, Direccion, Correo) VALUES ('$id', '$name', '$lastname', '$phone', '$address', '$email')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Su registro fue exitoso';
    header("Location: ../login.php");
}
?>