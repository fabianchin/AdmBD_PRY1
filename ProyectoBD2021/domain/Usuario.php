<?php
	
	class Usuario
	{

		private $usuario;
		private $contrasena;
        private $tipo;

		function __construct($usuario,$contrasena,$tipo)
		{
			$this->usuario = $usuario;
			$this->contrasena = $contrasena;
            $this->tipo = $tipo;
		}


		public function getUsuario()
		{
			return $this->usuario;
		}

		public function getContrasena()
		{
			return $this->contrasena;
		}

        public function getTipo()
        {
            return $this->tipo;
        }

	}
 ?>