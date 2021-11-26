<?php
	
	class Color
	{

		private $idColor;
		private $color;

		function __construct($idColor,$color)
		{
			$this->idColor = $idColor;
			$this->color = $color;
		}


		public function getIdColor()
		{
			return $this->idColor;
		}

		public function getColor()
		{
			return $this->color;
		}

	}
 ?>