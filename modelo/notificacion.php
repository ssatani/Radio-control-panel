<?php
	class notificacion
	{
	    private $idnotificacion = '0';
	    private $idusuario = '0';
	    private $titulo = '';
	    private $descripcion = '';
	    private $fecha='';
	    private $nota='';

	    public function __construct($Idnotificacion,$Idusuario,$Titulo,$Descripcion,$Fecha,$Nota){
	    	
			$this->idnotificacion = $Idnotificacion;
			$this->idusuario = $Idusuario;
			$this->titulo = $Titulo;
			$this->descripcion = $Descripcion;
			$this->fecha = $Fecha;
			$this->nota = $Nota;
	    	    
	    }

	    public function Idnotificacion()
	    {
	        return $this->idnotificacion;
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
	     public function Fecha()
	    {
	        return $this->fecha;
	    }
	    public function Nota()
	    {
	        return $this->nota;
	    }
	}
?>