<?php
	
	class Automovil
	{

		private $idAutomovil;
		private $marca;
		private $IdModelo;
		private $estilo;
		private $idColor;
		private $capacidadPasajeros;
		private $combustible;
		private $transmision;
		private $anio;
		private $idStock;
		private $precio;
		private $detalles;
        
		function __construct($idAutomovil,$marca,$IdModelo,$estilo,$idColor,$capacidadPasajeros,$combustible,$transmision,$anio,$idStock,$precio,$detalles)
		{
			$this->idAutomovil = $idAutomovil;
			$this->marca = $marca;
			$this->IdModelo = $IdModelo;
			$this->estilo = $estilo;
            $this->idColor = $idColor;
            $this->capacidadPasajeros = $capacidadPasajeros;
            $this->combustible = $combustible;
			$this->transmision = $transmision;
            $this->anio = $anio;
            $this->idStock = $idStock;
			$this->precio = $precio;
            $this->detalles = $detalles;
		}


		public function getIdAutomovil()
		{
			return $this->idAutomovil;
		}

		public function getMarca()
		{
			return $this->marca;
		}

		public function getModelo()
		{
			return $this->IdModelo;
		}

		public function getEstilo()
		{
			return $this->estilo;
		}

		public function getColor()
		{
			return $this->idColor;
		}

		public function getCapacidadPasajeros()
		{
			return $this->capacidadPasajeros;
		}
		
        public function getCombustible()
		{
			return $this->combustible;
		}

		public function getTransmision()
		{
			return $this->transmision;
		}
		
        public function getAnio()
		{
			return $this->anio;
		}
		
        public function getStock()
		{
			return $this->idStock;
		}
		
        public function getPrecio()
		{
			return $this->precio;
		}

		public function getDetalle()
		{
			return $this->detalles;
		}
	}
 ?>
