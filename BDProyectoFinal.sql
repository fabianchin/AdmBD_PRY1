CREATE TABLE modelo(
	idModelo int unique not null,
	modelo varchar(25),
	constraint PK_Modelo PRIMARY KEY (idModelo)
);

CREATE TABLE color(
	idColor int unique not null,
	color varchar(25),
	constraint PK_Color PRIMARY KEY (idColor) 
);

CREATE TABLE automovil(
	idAutomovil int unique not null,
	marca varchar(25) not null,
	idModelo int not null,
	estilo varchar(25) not null,
	idColor int not null,
	capacidadPasajeros int not null,
	combustible int not null,
	transmision  bit not null,
	anio int not null,
	stock int not null,
	precio decimal not null,
	detalles varchar(500),
	constraint PK_Automovil PRIMARY KEY (IdAutomovil),
	constraint FK_Modelo FOREIGN KEY (idModelo) references modelo (idModelo),
	constraint FK_Color FOREIGN KEY (idColor) references color (idColor)
);

CREATE TABLE cliente(
	cedula int unique not null,
	nombre varchar(75) not null,
	direccion varchar(200) not null,
	telefono int not null,
	ocupacion varchar(50) not null,
	correo varchar(50) not null,
	constraint PK_Cliente PRIMARY KEY (cedula)
);

CREATE TABLE usuario(
	usuario varchar(50) unique not null,
	contrasenia varchar(50) not null,
	tipo int not null,
	constraint PK_Usuario PRIMARY KEY (usuario)
);

CREATE TABLE venta(
	idAutomovil int not null,
	cedula int not null,
	usuario varchar(50) not null,
	precioVenta decimal not null,
	constraint FK_Automovil FOREIGN KEY (idAutomovil) references automovil (idAutomovil),
	constraint FK_Cliente FOREIGN KEY (cedula) references cliente (cedula),
	constraint FK_Usuario FOREIGN KEY (usuario) references usuario (usuario)
);

--Procedimientos almacenados
CREATE PROCEDURE sp_insertar_modelo(
	@idModelo int,
	@modelo varchar(25)
)
AS
	BEGIN
		INSERT INTO modelo(idModelo, modelo)
		VALUES (@idModelo, @modelo)
	END
GO

CREATE PROCEDURE sp_insertar_color(
	@idColor int,
	@color varchar(25)
)
AS
	BEGIN
		INSERT INTO color(idColor, color)
		VALUES (@idColor, @color)
	END
GO

CREATE PROCEDURE sp_insertar_automovil(
	@idAutomovil int,
	@marca varchar(25),
	@idModelo int,
	@estilo varchar(25),
	@idColor int,
	@capacidadPasajeros int,
	@combustible int,
	@transmision  bit,
	@anio int,
	@stock int,
	@precio decimal,
	@detalles varchar(500)
)
AS
--VALIDAR INSERCION POR COLOR O ESTILO O TRANSMISION
	BEGIN
		INSERT INTO automovil(idAutomovil,marca,idModelo,estilo,idColor,capacidadPasajeros,combustible,transmision,anio,stock,precio,detalles)
		VALUES(@idAutomovil,@marca,@idModelo,@estilo,@idColor,@capacidadPasajeros,@combustible,@transmision,@anio,@stock,@precio,@detalles)
	END
GO

Create Procedure sp_actualizar_automovil(
	@idAutomovil int,
	@idColor int,
	@stock int,
	@precio decimal,
	@detalles varchar(500)
)
AS
	BEGIN
		UPDATE automovil SET idColor=@idColor, stock=@stock, precio=@precio, detalles=@detalles
		WHERE idAutomovil = @idAutomovil
	END
GO

Create Procedure SP_eliminar_automovil(
	@idAutomovil int
)AS
IF EXISTS (SELECT * FROM automovil WHERE idAutomovil = @idAutomovil AND stock = 1)
	BEGIN
		DELETE FROM automovil WHERE idAutomovil = @idAutomovil
		PRINT 'Eliminacion Exitosa!'
	END
ELSE
	BEGIN
		PRINT 'El Stock del vehiculo es mayor a 1'
	END
GO

CREATE PROCEDURE sp_visualizar_automovil(
	@idModelo int
)
AS
	IF (@idModelo IS NULL)	
		BEGIN
			SELECT * FROM automovil
		END
	ELSE
		BEGIN
			SELECT * FROM automovil WHERE idModelo = @idModelo
		END
GO


CREATE PROCEDURE sp_insertar_cliente(
	@cedula int,
	@nombre varchar(75),
	@direccion varchar(200),
	@telefono int,
	@ocupacion varchar(50),
	@correo varchar(50)
)
AS
IF NOT EXISTS (select * FROM cliente where cedula=@cedula)
	BEGIN
		INSERT INTO cliente (cedula,nombre,direccion,telefono,ocupacion,correo)
		VALUES (@cedula,@nombre,@direccion,@telefono,@ocupacion,@correo)
		PRINT 'Registro Exitoso!'
	END
ELSE
	BEGIN
		PRINT 'Cliente ya existe!'
	END
GO

CREATE PROCEDURE sp_insertar_usuario(
	@usuario varchar(50),
	@contrasenia varchar(50),
	@tipo int
)
AS
IF NOT EXISTS (select * from usuario where usuario = @usuario)
	BEGIN
		INSERT INTO usuario(usuario, contrasenia, tipo)
		VALUES (@usuario, @contrasenia, @tipo)
		PRINT 'Registro Exitoso!'
	END
ELSE
	BEGIN
		PRINT 'Usuario ya existe!'
	END
GO

CREATE PROCEDURE sp_insertar_venta(
	@idAutomovil int,
	@cedula int,
	@usuario varchar(50),
	@precioVenta decimal
)
AS
	BEGIN
		INSERT INTO venta (idAutomovil,cedula,usuario,precioVenta)
		VALUES (@idAutomovil,@cedula,@usuario,@precioVenta)
	END
GO

EXEC sp_insertar_modelo 1, 'Fiesta'
EXEC sp_insertar_modelo 2, 'Mustang'
EXEC sp_insertar_color 1, 'azul'
EXEC sp_insertar_color 2, 'rojo'
EXEC sp_insertar_automovil 1, 'Ford', 1, 'sedan', 1, 4, 1, 1, 2020, 5, 5000000, 'Excelente Vehiculo'
EXEC sp_insertar_automovil 2, 'Ford', 2, 'sedan', 2, 5, 1, 2, 2021, 3, 8000000, 'deportivo'
EXEC sp_insertar_cliente 702580147, 'Juan Corrales Torres', 'Victoria centro', 86254712, 'medico', 'juan@gmail.com'
EXEC sp_insertar_usuario 'admin@gmail.com', 'admin12345', 1

select * from modelo
select * from color
select * from automovil
select * from cliente
select * from usuario

EXEC sp_actualizar_automovil 1, 'Ford', 1, 'sedan', 2, 4, 1, 1, 2020, 8, 5040000, 'Excelente Vehiculo y muy comodo'
select * from automovil

EXEC sp_visualizar_automovil 2

EXEC SP_eliminar_automovil 1
select * from automovil

