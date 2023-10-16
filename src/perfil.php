<?php include("includes/header_log.php")?>
<?php
include("db.php");

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Realizar la consulta SQL
    $query = "SELECT * FROM Clientes WHERE ClienteID = '$password' AND Nombre = '$username'";
    $result = mysqli_query($conn, $query);

    // Verificar si se encontró un registro
    if ($result && mysqli_num_rows($result) > 0) {
    // Mostrar los datos del usuario
        echo "<table>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["ClienteID"] . "</td>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Apellidos"] . "</td>";
            echo "<td>" . $row["NumeroTelefono"] . "</td>";
            echo "<td>" . $row["Direccion"] . "</td>";
            echo "<td>" . $row["Correo"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontró ningún usuario.";
    }

}
?>


    <div style="display: flex; justify-content: space-betwen;" class="container p-4">
        <div><img src="https://th.bing.com/th/id/OIP.hcRhDT8KVqzySjYJmBhlzgHaHa?pid=ImgDet&rs=1" style="width: 200px; height: 200px; border-radius: 50%;"></div>
        <div>
            <h1>Bienvenido</h1>
        </div>
    </div>
<?php include("includes/footer.php")?>