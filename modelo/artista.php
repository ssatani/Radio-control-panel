<?php
	class artista
	{
	    private $idartista = '0';
	    private $nombre = '';
	    private $idusuario='0';
	  
	    public function __construct($Idartista,$Idusuario,$Nombre){
			$this->idartista = $Idartista;
			$this->nombre = $Nombre;
			$this->idusuario = $Idusuario;
	    }

	    public function Idartista()
	    {
	        return $this->idartista;
	    }
	    public function Nombre()
	    {
	        return $this->nombre;
	    }
	   	public function Idusuario()
	    {
	        return $this->idusuario;
	    }
	}
?>