<?php 

	include '../../data/Sesion_Consulta.php';

	class SesionNegocio
	{

    	private $persistencia;


    	public function __construct()
    	{
        	$this->persistencia = new SesionConsulta();
    	}

		public function VerificarDatos($correo,$contrasena)
		{
			return $this->persistencia->VerificarDatos($correo,$contrasena);
		}

		public function IniciarSesion($correo,$contrasena)
		{
			return $this->persistencia->IniciarSesion($correo,$contrasena);
		}

	}