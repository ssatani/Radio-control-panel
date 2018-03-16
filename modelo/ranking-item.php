<?php
	class ranking
	{
		private $idusuario = '0';
		private $idprogramacion = '0';
	    private $programacion_titulo="Desconocido"

	    private $idranking = '0';
	    private $ranking_titulo="Titulo";
	    private $ranking_descripcion="Descipcion Ranking Musical"
	    private $ranking_fecha="00:00 del 00/00/0000";

	    private $top="0";
	    private $votos="0";
	 

	    public function __construct($Idusuario,$Idprogramacion,$Programacion_titulo,$Idranking,$Ranking_titulo,$Ranking_descripcion,$Ranking_fecha,$Top,$Votos){
			$this->idusuario = $Idusuario;
			$this->idprogramacion = $Idprogramacion;
			$this->programacion_titulo = $Programacion_titulo;
			$this->idranking = $Idranking;
			$this->ranking_titulo = $Ranking_titulo;
			$this->ranking_descripcion = $Ranking_descripcion;
			$this->ranking_fecha = $Ranking_fecha;
			$this->top=$Top;
			$this->votos=$Votos;
	    }
	    public function Idusuario()
	    {
	        return $this->idusuario;
	    }
	    public function Idprogramacion()
	    {
	        return $this->idprogramacion;
	    }
	    public function Programacion_titulo()
	    {
	        return $this->programacion_titulo;
	    }
	    public function Idranking()
	    {
	        return $this->idranking;
	    }
	    public function Ranking_titulo()
	    {
	        return $this->ranking_titulo;
	    }
	    public function Ranking_descripcion()
	    {
	        return $this->ranking_descripcion;
	    }
	    public function Ranking_fecha()
	    {
	        return $this->ranking_fecha;
	    }
	    public function Top()
	    {
	        return $this->top;
	    }
	    public function Votos()
	    {
	        return $this->votos;
	    }
	}
?>