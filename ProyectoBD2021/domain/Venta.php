<?php
	
	class Venta
	{

		private $idAutomovil;
		private $cedula;
		private $usuario;

		function __construct($idAutomovil,$cedula,$usuario)
		{
			$this->idAutomovil = $idAutomovil;
			$this->cedula = $cedula;
			$this->usuario = $usuario;
		}

		public function getIdAutomovil()
		{
			return $this->idAutomovil;
		}

		public function getCedula()
		{
			return $this->cedula;
		}

		public function getUsuario()
		{
			return $this->usuario;
		}
	}
 ?>