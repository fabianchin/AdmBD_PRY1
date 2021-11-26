<?php
	
	class Venta
	{

		private $idVenta;
		private $venta;

		function __construct($idVenta,$venta)
		{
			$this->idVenta = $idVenta;
			$this->venta = $venta;
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