<?php include("db.php")?>
<?php include("includes/header.php")?>

    <!-- Para la tabla clientes ---------------------------------------- -->
    <div class="container p-4">
        <h1>Tabla Clientes</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="clientes/insert_cli.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="password" class="form-control" placeholder="CI" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastname" class="form-control" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_cli" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Clientes";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['ClienteID']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['Apellidos']; ?></td>
                            <td><?php echo $row['NumeroTelefono']; ?></td>
                            <td><?php echo $row['Direccion']; ?></td>
                            <td><?php echo $row['Correo']; ?></td>
                            <td>
                                <a href="clientes/edit_cli.php?id=<?php echo $row['ClienteID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="clientes/delete_cli.php?id=<?php echo $row['ClienteID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- PARA LA TABLA VEHICULO --------------------------------------->
    <div class="container p-4">
        <h1>Tabla Vehiculos</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="vehiculos/insert_ve.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="placa" class="form-control" placeholder="Placa" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="number" name="idCliente" class="form-control" placeholder="ID Cliente" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="marca" class="form-control" placeholder="Marca">
                        </div>
                        <div class="form-group">
                            <input type="text" name="modelo" class="form-control" placeholder="Modelo">
                        </div>
                        <div class="form-group">
                            <input type="number" name="anio" class="form-control" placeholder="Año">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_ve" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>ID Cliente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Vehiculos";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['Placa']; ?></td>
                            <td><?php echo $row['ClienteID']; ?></td>
                            <td><?php echo $row['Marca']; ?></td>
                            <td><?php echo $row['Modelo']; ?></td>
                            <td><?php echo $row['Anio']; ?></td>
                            <td>
                                <a href="vehiculos/edit_ve.php?id=<?php echo $row['Placa']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="vehiculos/delete_ve.php?id=<?php echo $row['Placa']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- PARA LA TABLA CITAS --------------------------------------- -->
    <!-- <div class="container p-4">
        <h1>Tabla Citas</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="citas/insert_ci.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="idcliente" class="form-control" placeholder="ID Cliente" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="datetime" class="form-control" placeholder="Fecha/Hora">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descripsion" rows="2" placeholder="Descripcion"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_ci" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Cliente</th>
                            <th>Fecha/hora</th>
                            <th>Descripsion</th>
                            <th>Estado</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Citas";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['CitaID']; ?></td>
                            <td><?php echo $row['ClienteID']; ?></td>
                            <td><?php echo $row['FechaHoraCita']; ?></td>
                            <td><?php echo $row['Descripcion']; ?></td>
                            <td><?php echo $row['Estado']; ?></td>
                            <td>
                                <a href="citas/edit_ci.php?id=<?php echo $row['CitaID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="citas/delete_ci.php?id=<?php echo $row['CitaID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <!-- PARA LA TABLA MECANICOS ------------------------------------------>
    <div class="container p-4">
        <h1>Tabla Mecanicos</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="mecanicos/insert_me.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="mecanicoid" class="form-control" placeholder="Mecanico ID" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastnameP" class="form-control" placeholder="Apellidos Paterno">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastnameM" class="form-control" placeholder="Apellidos Materno">
                        </div>
                        <div class="form-group">
                            <input type="text" name="especialidad" class="form-control" placeholder="Especialidad">
                        </div>
                        <div class="form-group">
                            <input type="number" name="telefono" class="form-control" placeholder="telefono">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_me" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellido P</th>
                            <th>Apellido M</th>
                            <th>Especialidad</th>
                            <th>Telefono</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Mecanicos";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['MecanicoID']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['ApellidoPaterno']; ?></td>
                            <td><?php echo $row['ApellidoMaterno']; ?></td>
                            <td><?php echo $row['Especialidad']; ?></td>
                            <td><?php echo $row['NumeroTelefono']; ?></td>
                            <td>
                                <a href="mecanicos/edit_me.php?id=<?php echo $row['MecanicoID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="mecanicos/delete_me.php?id=<?php echo $row['MecanicoID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
       <!-- PARA LA TABLA TAREAS ------------------------------------------>
    <div class="container p-4">
        <h1>Tabla Tareas</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="tareas/insert_ta.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="placa" class="form-control" placeholder="Placa">
                        </div>
                        <div class="form-group">
                            <input type="number" name="idmecanico" class="form-control" placeholder="ID Mecanico">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descripcion" rows="2" placeholder="Descripcion"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" step="0.01" name="tiempo" class="form-control" placeholder="Tiempo Estimado">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_ta" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>ID Mecanico</th>
                            <th>Descripcion</th>
                            <th>Tiempo Hr</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM tareasreparacion";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['TareaID']; ?></td>
                            <td><?php echo $row['Placa']; ?></td>
                            <td><?php echo $row['MecanicoID']; ?></td>
                            <td><?php echo $row['Descripcion']; ?></td>
                            <td><?php echo $row['TiempoReparacion']; ?></td>
                            <td>
                                <a href="tareas/edit_ta.php?id=<?php echo $row['TareaID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="Tareas/delete_ta.php?id=<?php echo $row['TareaID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--  PARA LA TABLA MATERIALES ------------------------------------->
    <!-- <div class="container p-4">
        <h1>Tabla Materiales</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="materiales/insert_ma.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="tarea" class="form-control" placeholder="ID Tarea">
                        </div>
                        <div class="form-group">
                            <input type="number" name="proveedor" class="form-control" placeholder="ID Proveedor">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Materiales">
                        </div>
                        <div class="form-group">
                            <input type="number" name="cantidad" class="form-control" placeholder="Cantidad">
                        </div>
                        <div class="form-group">
                            <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio Materiales">
                        </div>
                        <div class="form-group">
                            <input type="text" name="fecha" class="form-control" placeholder="Fecha Adquisicion">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_ma" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Tarea</th>
                            <th>ID Proveedor</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Presio $</th>
                            <th>Fecha Adquisicion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM materialreparacion";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['MaterialID']; ?></td>
                            <td><?php echo $row['TareaID']; ?></td>
                            <td><?php echo $row['ProveedorID']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['Cantidad']; ?></td>
                            <td><?php echo $row['Precio']; ?></td>
                            <td><?php echo $row['FechaAdquisicion']; ?></td>
                            <td>
                                <a href="materiales/edit_ma.php?id=<?php echo $row['MaterialID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="materiales/delete_ma.php?id=<?php echo $row['MaterialID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <!-- PARA LA TABLA RECLAMOS --------------------------------------- -->
    <!-- <div class="container p-4">
        <h1>Tabla Reclamos</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="reclamos/insert_re.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="idcliente" class="form-control" placeholder="ID Cliente" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="datetime" class="form-control" placeholder="Fecha">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descripsion" rows="2" placeholder="Descripcion"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_re" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Cliente</th>
                            <th>Fecha/hora</th>
                            <th>Descripsion</th>
                            <th>Estado</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Reclamos";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['ReclamoID']; ?></td>
                            <td><?php echo $row['ClienteID']; ?></td>
                            <td><?php echo $row['FechaReclamo']; ?></td>
                            <td><?php echo $row['Descripcion']; ?></td>
                            <td><?php echo $row['Estado']; ?></td>
                            <td>
                                <a href="reclamos/edit_re.php?id=<?php echo $row['ReclamoID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="reclamos/delete_re.php?id=<?php echo $row['ReclamoID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <!-- PARA LA TABLA REPORTES --------------------------------------- -->
    <!-- <div class="container p-4">
        <h1>Tabla Reportes</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="reportes/insert_rep.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="tareaid" class="form-control" placeholder="ID Tarea" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="datetime" class="form-control" placeholder="Fecha">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descripsion" rows="2" placeholder="Descripcion"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_rep" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Tarea</th>
                            <th>Fecha</th>
                            <th>Descripsion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM ReportesReparacion";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['ReporteID']; ?></td>
                            <td><?php echo $row['TareaID']; ?></td>
                            <td><?php echo $row['FechaReparacion']; ?></td>
                            <td><?php echo $row['FallasEncontradas']; ?></td>
                            <td>
                                <a href="reportes/edit_rep.php?id=<?php echo $row['ReporteID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="reportes/delete_rep.php?id=<?php echo $row['ReporteID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

       <!-- PARA LA TABLA fACTURAS ------------------------------------------>
    <!-- <div class="container p-4">
        <h1>Tabla Facturas</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="facturas/insert_fa.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="idcliente" class="form-control" placeholder="ID Cliente">
                        </div>
                        <div class="form-group">
                            <input type="text" name="datetime" class="form-control" placeholder="Fecha Emision">
                        </div>
                        <div class="form-group">
                            <input type="number" step="0.01" name="total" class="form-control" placeholder="Total">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_fa" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente ID</th>
                            <th>Fecha Emision</th>
                            <th>Total $</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Facturas";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['FacturaID']; ?></td>
                            <td><?php echo $row['ClienteID']; ?></td>
                            <td><?php echo $row['FechaEmision']; ?></td>
                            <td><?php echo $row['Total']; ?></td>
                            <td>
                                <a href="facturas/edit_fa.php?id=<?php echo $row['FacturaID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="facturas/delete_fa.php?id=<?php echo $row['FacturaID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

           <!-- PARA LA TABLA DETALLES fACTURAS ------------------------------------------>
    <!-- <div class="container p-4">
        <h1>Tabla Detalles Facturas</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="detalles/insert_de.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="idfactura" class="form-control" placeholder="ID Factura">
                        </div>
                        <div class="form-group">
                            <input type="number" name="idtarea" class="form-control" placeholder="ID Tarea">
                        </div>
                        <div class="form-group">
                            <input type="number" name="idreporte" class="form-control" placeholder="ID Reporte">
                        </div>
                        <div class="form-group">
                            <input type="number" name="idmaterial" class="form-control" placeholder="ID Material">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_de" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Factura ID</th>
                            <th>Tarea ID</th>
                            <th>Reporte ID</th>
                            <th>Material ID</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM DetallesFactura";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['DetalleID']; ?></td>
                            <td><?php echo $row['FacturaID']; ?></td>
                            <td><?php echo $row['TareaID']; ?></td>
                            <td><?php echo $row['ReporteID']; ?></td>
                            <td><?php echo $row['MaterialID']; ?></td>
                            <td>
                                <a href="detalles/edit_de.php?id=<?php echo $row['DetalleID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="detalles/delete_de.php?id=<?php echo $row['DetalleID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    


    <!-- PARA LA TABLA DE PROVEEDORES --------------------------------------- -->
    <!-- <div class="container p-4">
        <h1>Tabla Proveedores</h1><hr>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="proveedores/insert_pro.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="number" name="telefono" class="form-control" placeholder="telefono">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Direccion">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="insert_pro" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Proveedores";
                    $result_cliente = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_cliente)) { ?>
                        <tr>
                            <td><?php echo $row['ProveedorID']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['NumeroTelefono']; ?></td>
                            <td><?php echo $row['Direccion']; ?></td>
                            <td>
                                <a href="proveedores/edit_pro.php?id=<?php echo $row['ProveedorID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="proveedores/delete_pro.php?id=<?php echo $row['ProveedorID']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
    
<?php include("includes/footer.php")?>

