<?php
	class programacion
	{
	    private $idprogramacion = '0';
	    private $idusuario = '0';
	    private $titulo = '';
	    private $descripcion = '';
	    private $hora_ini='';
	    private $duracion='';

	    public function __construct($Idprogramacion,$Idusuario,$Titulo,$Descripcion,$Hora_ini,$Duracion){
	    	
			$this->idprogramacion = $Idprogramacion;
			$this->idusuario = $Idusuario;
			$this->titulo = $Titulo;
			$this->descripcion = $Descripcion;
			$this->hora_ini = $Hora_ini;
			$this->duracion = $Duracion;
	    	    
	    }

	    public function Idprogramacion()
	    {
	        return $this->idprogramacion;
	    }
	     public function Idusuario()
	    {
	        return $this->idusuario;
	    }
	    public function Titulo()
	    {
	        return $this->titulo;
	    }
	    public function Descripcion()
	    {
	        return $this->descripcion;
	    }
	    public function Hora_ini()
	    {
	        return $this->hora_ini;
	    }
	    public function Duracion()
	    {
	        return $this->duracion;
	    }
	}
?>