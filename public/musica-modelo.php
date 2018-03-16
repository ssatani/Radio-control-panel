<?php
	class musica
	{
		private $idmusica = '0';
		private $titulo = "Musica";
	    private $fecha="00:00 del 00/00/0000";
	    private $idartista = '0';
	    private $artista="Artista";
	    private $conteo='0';
	    private $voto=false;

	    public function __construct($Idmusica,$Titulo,$Fecha,$Idartista,$Artista,$Conteo,$Voto){
			$this->idmusica = $Idmusica;
			$this->titulo = $Titulo;
			$this->fecha = $Fecha;
			$this->idartista = $Idartista;
			$this->artista = $Artista;
			$this->conteo = $Conteo;
			$this->voto = $Voto;
	    }
	    public function Idmusica()
	    {
	        return $this->idmusica;
	    }
	    public function Titulo()
	    {
	        return $this->titulo;
	    }
	    public function Fecha()
	    {
	        return $this->fecha;
	    }
	    public function Idartista()
	    {
	        return $this->idartista;
	    }
	    public function Artista()
	    {
	        return $this->artista;
	    }
	    public function Conteo()
	    {
	        return $this->conteo;
	    }
	    public function Voto()
	    {
	        return $this->voto;
	    }
	}
?>