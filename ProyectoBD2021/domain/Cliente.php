<?php
	
	class Cliente
	{

		private $cedula;
		private $nombre;
        private $direccion;
        private $telefono;
        private $ocupacion;
        private $correo;

		function __construct($cedula,$nombre,$direccion,$telefono,$ocupacion,$correo)
		{
			$this->cedula = $cedula;
			$this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->ocupacion = $ocupacion;
            $this->correo = $correo;
		}


		public function getCedula()
		{
			return $this->cedula;
		}

		public function getNombre()
		{
			return $this->nombre;
		}

        public function getDireccion()
        {
            return $this->direccion;
        }

        public function getTelefono()
        {
            return $this->telefono;
        }

        public function getOcupacion()
        {
            return $this->ocupacion;
        }

        public function getCorreo()
        {
            return $this->correo;
        }

	}
 ?>