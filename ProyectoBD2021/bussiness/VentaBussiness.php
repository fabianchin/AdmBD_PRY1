<?php 

	include '../data/VentaData.php';

	class VentaBussiness
	{

    	private $consulta;

    	public function __construct()
    	{
        	$this->consulta = new VentaData();
    	}

		public function Crear($venta)
		{
			return $this->consulta->insertVenta($venta);
		}

		public function Leer()
		{
			return $this->consulta->Leer();
		}

		public function Eliminar($id)
		{
			return $this->consulta->deleteVenta($id);
		}

		/*public function Modificar($vehiculo)
		{
			return $this->consulta->updateVenta($vehiculo);
		}*/

	}
?>