<?php 

	include '../data/ClienteData.php';

	class ClienteBussiness
	{

    	private $consulta;

    	public function __construct()
    	{
        	$this->consulta = new ClienteData();
    	}

		public function Crear($cliente)
		{
			return $this->consulta->insertCliente($cliente);
		}

		public function Leer()
		{
			return $this->consulta->Leer();
		}

		public function Eliminar($id)
		{
			return $this->consulta->deleteCliente($id);
		}

		public function Modificar($cliente)
		{
			return $this->consulta->updateCliente($cliente);
		}

	}
?>