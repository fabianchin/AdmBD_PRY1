<?php
	
	class Modelo
	{

		private $idModelo;
		private $modelo;

		function __construct($idModelo,$modelo)
		{
			$this->idModelo = $idModelo;
			$this->modelo = $modelo;
		}


		public function getIdModelo()
		{
			return $this->idModelo;
		}

		public function getModelo()
		{
			return $this->modelo;
		}

	}
 ?>
