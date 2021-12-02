DROP DATABASE IF EXISTS BDProyectoFinal;
CREATE DATABASE BDProyectoFinal;
USE BDProyectoFinal;


CREATE TABLE modelo(
	idModelo int unique NOT NULL IDENTITY(1,1),
	modelo varchar(25),
	constraint PK_Modelo PRIMARY KEY (idModelo)
);

CREATE TABLE color(
	idColor int unique not null IDENTITY(1,1),
	color varchar(25),
	constraint PK_Color PRIMARY KEY (idColor) 
);

CREATE TABLE automovil(
	idAutomovil int unique not null IDENTITY(1,1),
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
	idAutomovil int not null ,
	cedula int not null,
	usuario varchar(50) not null,
	constraint FK_Automovil FOREIGN KEY (idAutomovil) references automovil (idAutomovil),
	constraint FK_Cliente FOREIGN KEY (cedula) references cliente (cedula),
	constraint FK_Usuario FOREIGN KEY (usuario) references usuario (usuario)
);

--Procedimientos almacenados
--Lleva Identity, se borro el param id
CREATE PROCEDURE sp_insertar_modelo(
	@modelo varchar(25)
)
AS
	BEGIN
		INSERT INTO modelo(modelo)
		VALUES (@modelo)
	END
GO

--Lleva Identity, se borro el param id
CREATE PROCEDURE sp_insertar_color(
	@color varchar(25)
)
AS
	BEGIN
		INSERT INTO color(color)
		VALUES (@color)
	END
GO

----------------------------------------------------------------------------------------------
--BORRAR EL IDAUTOMOVIL DEL INSERT!!!
CREATE PROCEDURE sp_insertar_automovil(
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
DECLARE @index int
DECLARE @inputTranCount int
SELECT @inputTranCount = @@TRANCOUNT
PRINT '@@TRANCOUNT al inicio del sp_insertar_automovil2 es ' + CAST(@inputTranCount AS VARCHAR(2))
IF(@inputTranCount = 0)
BEGIN
	PRINT 'Empezando la transaccion en el sp_insertar_automovil2'
	BEGIN TRAN newAutomovilTransaction
END
BEGIN
	PRINT 'Creando el SavePoint en el sp_insertar_automovil2'
	SAVE TRANSACTION newAutomovilTransaction
END
PRINT 'Insertando un nuevo row...'
SELECT @index = COUNT(*) FROM automovil 
								WHERE 
									marca = @marca AND 
									idModelo = @idModelo AND
									estilo = @estilo AND
									idColor = @idColor AND
									capacidadPasajeros = @capacidadPasajeros AND
									combustible = @combustible AND
									transmision = @transmision AND
									anio = @anio
IF(@index < 1)
	INSERT INTO automovil(marca,idModelo,estilo,idColor,capacidadPasajeros,combustible,transmision,anio,stock,precio,detalles)
	VALUES(@marca,@idModelo,@estilo,@idColor,@capacidadPasajeros,@combustible,@transmision,@anio,@stock,@precio,@detalles)
ELSE
	UPDATE automovil
	SET stock = stock+1
	WHERE	marca = @marca AND 
			idModelo = @idModelo AND
			estilo = @estilo AND
			idColor = @idColor AND
			capacidadPasajeros = @capacidadPasajeros AND
			combustible = @combustible AND
			transmision = @transmision AND
			anio = @anio
IF(@@ERROR > 0)
BEGIN
	ROLLBACK TRANSACTION newAutomovilTransaction
	PRINT 'Un error ocurrio mientras se intentaba hacer un INSERT. Se hizo un rollback a la trans'
	PRINT '@@TRANCOUNT al finalizar el rollback es: ' + CAST(@@TRANCOUNT as VARCHAR(2))
	RETURN
END
IF(@inputTranCount = 0)
BEGIN
	COMMIT
	PRINT 'Se hizo un commit transaction. @@TRANCOUNT es: ' + CAST(@@TRANCOUNT as VARCHAR(2))
END


--SELECT * FROM automovil
--						  idAutomovil,marca,idModelo,estilo,idColor,capacidadPasajeros,combustible,transmision,anio,stock,precio,detalles
--EXEC sp_insertar_automovil3 'Ford', 2, 'deportivo', 1, 4, 1, 2, 2017, 5, 5000000, 'Ayy papaaaa'
--DELETE FROM automovil WHERE idAutomovil=5




-----------------------------------------------------------------------------------------------

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
		DELETE FROM automovil WHERE idAutomovil <= @idAutomovil
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
	@usuario varchar(50)
)
AS
	BEGIN
		INSERT INTO venta (idAutomovil,cedula,usuario)
		VALUES (@idAutomovil,@cedula,@usuario)
	END
GO

--SELECT * FROM cliente
--SELECT * FROM usuario
--EXEC sp_insertar_usuario 'fabian@gmail.com', '123fabian', 2
--EXEC sp_insertar_venta 1,702580147,'fabian@gmail.com', 123321

/*
EXEC sp_insertar_modelo 'GT'
EXEC sp_insertar_modelo 'Mustang'
EXEC sp_insertar_color 'azul'
EXEC sp_insertar_color 'rojo'
EXEC sp_insertar_automovil 'Ford', 1, 'sedan', 1, 4, 1, 1, 2020, 5, 5000000, 'Excelente Vehiculo'
EXEC sp_insertar_automovil 'Ford', 2, 'sedan', 2, 5, 1, 2, 2021, 3, 8000000, 'deportivo'
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

EXEC sp_eliminar_automovil 1
select * from automovil
*/

--Inner Join para reporte de venta
--[idAutomovil][cedula][usuario],[precioVenta]
SELECT a.marca, m.modelo, c.cedula, c.nombre, c.correo, u.usuario as 'Vendedor', a.precio
FROM venta v
INNER JOIN automovil a
	ON v.idAutomovil=a.idAutomovil
INNER JOIN modelo m
	ON a.idModelo=m.idModelo
INNER JOIN cliente c
	ON v.cedula=c.cedula
INNER JOIN usuario u
	ON v.usuario=u.usuario

--Inner Join para la consulta en php para obtener los datos de vehiculos (para todos: se elimina el where)
SELECT a.marca, m.modelo, estilo, c.color, a.capacidadPasajeros, a.combustible, a.transmision, a.anio, a.stock, a.precio, a.detalles 
FROM automovil a 
inner join color c on a.idColor=c.idColor 
inner join modelo m on a.idModelo=m.idModelo
WHERE a.idModelo = 2

--Inner Join para reporte con filtro de modelo en automovil
SELECT m.idModelo, m.modelo FROM automovil a inner join modelo m on a.idModelo=m.idModelo

--Inner Join para reporte con filtro de modelo en venta
SELECT m.idModelo, m.modelo FROM venta v inner join automovil a on v.idAutomovil=a.idAutomovil inner join modelo m on a.idModelo = m.idModelo

--Trigger: Debe realizarse un trigger que actualice el stock una vez que se ejecuta una venta en el sistema.
CREATE TRIGGER tr_actualizarStock
ON venta FOR INSERT
AS
BEGIN
    -- update table2, using the same rows as were updated in table1
    UPDATE a
    SET a.stock = a.stock-1
    FROM automovil a
    INNER JOIN Inserted i ON a.idAutomovil = i.idAutomovil        
END
GO

--Creacion de backups
--La creacion de este backup tambien esta en los Jobs de SQL Server Agent con este mismo codigo, un job que se llama 'createbackup'
--La direccion hay que cambiarla si se va a probar en una compu que no sea la mia (fabian), ojala a un HDD por temas de permisos
USE BDProyectoFinal
GO
BACKUP DATABASE [BDProyectoFinal]
TO  DISK = N'D:\SQLBackups\BDProyectoFinal.bak'
WITH CHECKSUM;

--Proc Almacenado OJO CAMBIAR LA RUTA
CREATE PROCEDURE sp_generarbackup
AS
	BEGIN
		BACKUP DATABASE [BDProyectoFinal]
		TO  DISK = N'D:\SQLBackups\BDProyectoFinal.bak'
		WITH CHECKSUM;
	END
GO

--EXEC sp_generarbackup;

--Login SP
CREATE PROC sp_validateUserExist(
	@mail varchar(100),
	@pass varchar(100)
)
AS
DECLARE @correoUsuario varchar(100)
DECLARE @contrasenaUsuario varchar(100)
DECLARE @resultado bit
	BEGIN
		SET @correoUsuario = (SELECT DISTINCT u.usuario FROM usuario u WHERE u.usuario = @mail AND contrasenia = @pass)
		SET @contrasenaUsuario = (SELECT u.contrasenia FROM usuario u WHERE u.usuario = @mail AND contrasenia = @pass)
		IF(@mail = @correoUsuario AND @pass = @contrasenaUsuario)
			SET @resultado = 'true'
		ELSE
			SET @resultado = 'false'
		SELECT @resultado
	END
GO

--EXEC sp_validateUserExist 'fabian@gmail.com','123fabian'

/*
@usuario varchar(50),
	@contrasenia varchar(50),
	@tipo int
*/

CREATE PROC sp_Sesion_Iniciar(
	@mail varchar(100),
	@pass varchar(100))
AS
	BEGIN
		SELECT u.usuario, u.contrasenia, u.tipo FROM usuario u WHERE u.usuario = @mail AND u.contrasenia = @pass
	END
GO


