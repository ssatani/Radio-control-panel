<?php
	class ranking
	{
	    private $idranking = '0';
	    private $idprogramacion = '0';
	    private $idusuario = '0';
	    private $titulo = '';
	    private $descripcion = '';
	    private $fecha='';
	    private $top='0';
	 

	    public function __construct($Idranking,$Idprogramacionm,$Idusuario,$Titulo,$Descripcion,$Fecha,$Top){
			$this->idranking = $Idranking;
			$this->idprogramacion = $Idprogramacionm;
			$this->idusuario = $Idusuario;
			$this->titulo = $Titulo;
			$this->descripcion = $Descripcion;
			$this->fecha = $Fecha;
			$this->top=$Top;
	    }

	    public function Idranking()
	    {
	        return $this->idranking;
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
	    public function Fecha()
	    {
	        return $this->fecha;
	    }
	    public function Top()
	    {
	        return $this->top;
	    }
	}
?>