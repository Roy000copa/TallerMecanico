CREATE TABLE Clientes (
    ClienteID INT PRIMARY KEY,
    Nombre VARCHAR(255),
    Apellidos VARCHAR(255),
    NumeroTelefono INT,
    Direccion VARCHAR(255),
    Correo VARCHAR(50)
);

CREATE TABLE Vehiculos (
    Placa VARCHAR(10) PRIMARY KEY,
    ClienteID INT,
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    Anio INT,
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID)
);

CREATE TABLE Citas (
    CitaID INT AUTO_INCREMENT PRIMARY KEY,
    ClienteID INT,
    FechaHoraCita DATETIME,
    Descripcion VARCHAR(255),
    Estado VARCHAR(50),
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID)
);

CREATE TABLE Reclamos (
    ReclamoID INT PRIMARY KEY AUTO_INCREMENT,
    FechaReclamo DATE,
    Descripcion VARCHAR(255),
    Estado VARCHAR(50),
    ClienteID INT,
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID)
);

CREATE TABLE Mecanicos (
    MecanicoID INT PRIMARY KEY,
    Nombre VARCHAR(255),
    ApellidoPaterno VARCHAR(255),
    ApellidoMaterno VARCHAR(255),
    Especialidad VARCHAR(100),
    NumeroTelefono INT
);

CREATE TABLE TareasReparacion (
    TareaID INT PRIMARY KEY AUTO_INCREMENT,
    Placa VARCHAR(10),
    MecanicoID INT,
    Descripcion VARCHAR(255),
    TiempoReparacion DECIMAL(10, 2),
    FOREIGN KEY (Placa) REFERENCES Vehiculos(Placa),
    FOREIGN KEY (MecanicoID) REFERENCES Mecanicos(MecanicoID)
);

CREATE TABLE Proveedores (
    ProveedorID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255),
    NumeroTelefono INT,
    Direccion VARCHAR(255)
);

CREATE TABLE MaterialReparacion (
    MaterialID INT AUTO_INCREMENT PRIMARY KEY,
    TareaID INT,
    ProveedorID INT,
    Nombre VARCHAR(100),
    Cantidad INT,
    Precio DECIMAL(10, 2),
    FechaAdquisicion DATE,
    FOREIGN KEY (TareaID) REFERENCES TareasReparacion(TareaID),
    FOREIGN KEY (ProveedorID) REFERENCES Proveedores(ProveedorID)
);

CREATE TABLE ReportesReparacion (
    ReporteID INT PRIMARY KEY AUTO_INCREMENT,
    TareaID INT,
    FechaReparacion DATE,
    FallasEncontradas VARCHAR(255),
    FOREIGN KEY (TareaID) REFERENCES TareasReparacion(TareaID)
);

CREATE TABLE Facturas (
    FacturaID INT PRIMARY KEY AUTO_INCREMENT,
    ClienteID INT,
    FechaEmision DATE,
    Total DECIMAL(10, 2),
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID)
);

CREATE TABLE DetallesFactura (
    DetalleID INT PRIMARY KEY AUTO_INCREMENT,
    FacturaID INT,
    TareaID INT,
    ReporteID INT,
    MaterialID INT,
    FOREIGN KEY (FacturaID) REFERENCES Facturas(FacturaID),
    FOREIGN KEY (TareaID) REFERENCES TareasReparacion(TareaID),
    FOREIGN KEY (ReporteID) REFERENCES ReportesReparacion(ReporteID),
    FOREIGN KEY (MaterialID) REFERENCES MaterialReparacion(MaterialID)
);

