<?php
	class genero
	{
	    private $idgenero = '0';
	    private $nombre = '';
	  
	    public function __construct($Idgenero,$Nombre){
			$this->idgenero = $Idgenero;
			$this->nombre = $Nombre;
	    }

	    public function Idgenero()
	    {
	        return $this->idgenero;
	    }
	    public function Nombre()
	    {
	        return $this->nombre;
	    }
	}
?>