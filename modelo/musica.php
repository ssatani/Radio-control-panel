<?php
	class musica
	{
	    private $idmusica = '0';
	    private $idusuario = '0';
	    private $idartista='0';
	    private $idgenero = '0';
	    private $titulo='';
	    private $fecha='';

	    public function __construct($Idmusica,$Idusuario,$Idartista,$Idgenero,$Titulo,$Fecha){
			$this->idmusica = $Idmusica;
			$this->idusuario = $Idusuario;
			$this->idartista = $Idartista;
			$this->idgenero = $Idgenero;
			$this->titulo = $Titulo;
			$this->fecha = $Fecha;
	    }
	    public function Idmusica()
	    {
	        return $this->idmusica;
	    }
	    public function Idusuario()
	    {
	        return $this->idusuario;
	    }
	    public function Idartista()
	    {
	        return $this->idartista;
	    }
	    public function Idgenero()
	    {
	        return $this->idgenero;
	    }
	    public function Titulo()
	    {
	        return $this->titulo;
	    }
	    public function Fecha()
	    {
	        return $this->fecha;
	    }
	}
?>