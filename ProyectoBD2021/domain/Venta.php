<?php
	
	class Venta
	{

		private $idAutomovil;
		private $cedula;
		private $usuario;
		private $precioTotal;

		function __construct($idAutomovil,$cedula,$usuario,$precioTotal)
		{
			$this->idAutomovil = $idAutomovil;
			$this->cedula = $cedula;
			$this->usuario = $usuario;
			$this->precioTotal = $precioTotal;
		}

		public function getIdVenta()
		{
			return $this->idVenta;
		}

		public function getVenta()
		{
			return $this->venta;
		}

	}
 ?>