<?php
	
	class Inventario
	{

		private $idStock;
		private $stock;

		function __construct($idStock,$stock)
		{
			$this->idStock = $idStock;
			$this->stock = $stock;
		}


		public function getIdStock()
		{
			return $this->idStock;
		}

		public function getStock()
		{
			return $this->stock;
		}

	}
 ?>