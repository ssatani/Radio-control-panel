<?php
	class usuario
	{
	    private $idusuario = '0';
	    private $idtipo = '0';
	    private $usuario = '';
	    private $contrasena = '';
	    private $nombre='';
	    private $apellidos='';
	    private $ci='';
	    private $telefono='';
	    private $correo='';

	    public function __construct($Idusuario,$Idtipo,$Usuario,$Contrasena,$Nombre,$Apellidos,$Ci,$Telefono,$Correo){
			$this->idusuario = $Idusuario;
			$this->idtipo = $Idtipo;
			$this->usuario = $Usuario;
			$this->contrasena = $Contrasena;
			$this->nombre = $Nombre;
			$this->apellidos = $Apellidos;
			$this->ci = $Ci;
			$this->telefono = $Telefono;
			$this->correo = $Correo;
	    }

	    public function Idusuario()
	    {
	        return $this->idusuario;
	    }
		public function Idtipo()
	    {
	        return $this->idtipo;
	    }
	    public function Usuario()
	    {
	        return $this->usuario;
	    }
	    public function Contrasena()
	    {
	    	if ($this->contrasena=="") {
	    		return "";
	    	} else {
	    		return password_hash($this->contrasena, PASSWORD_DEFAULT);
	    	}
	    }
	    public function Nombre()
	    {
	        return $this->nombre;
	    }
	    public function Apellidos()
	    {
	        return $this->apellidos;
	    }
	    public function Ci()
	    {
	        return $this->ci;
	    }
	    public function Telefono()
	    {
	        return $this->telefono;
	    }
	    public function Correo()
	    {
	        return $this->correo;
	    }

	}
	
?>