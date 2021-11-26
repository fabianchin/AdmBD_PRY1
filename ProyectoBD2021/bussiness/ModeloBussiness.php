<?php 
 
	include '../Data/ModeloData.php';

	class ModeloBussiness
	{

    	private $persistencia;


    	public function __construct()
    	{
        	$this->persistencia = new ModeloData();
    	}


		public function Crear($modelo)
		{
			return $this->persistencia->Crear($modelo);
		}


		public function Leer()
		{
			return $this->persistencia->Leer();
		}


		public function Eliminar($id)
		{
			return $this->persistencia->Eliminar($id);
		}


		public function Modificar($modelo)
		{
			return $this->persistencia->Modificar($modelo);
		}


		public function LeerPorProductor($id)
		{
			return $this->persistencia->LeerPorProductor($id);
		}

	}
?>