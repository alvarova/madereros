<?php
class Usuario
{
	private $id;
	private $Nombre;
	private $Apellido;
	private $Email;
	private $Password;
	private $Nivel;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}