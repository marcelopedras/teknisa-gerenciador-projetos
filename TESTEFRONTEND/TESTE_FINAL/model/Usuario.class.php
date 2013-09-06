<?php

namespace model;

class Usuario
{
	private $id;
	private $username;
	private $senha;
	private $administrador;
	private $gerente;
	
	function __construct($id, $username, $senha, $administrador, $gerente)
	{
		$this->id = $id;
		$this->username = $username;
		$this->senha = $senha;
		$this->administrador = $administrador;
		$this->gerente = $gerente;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	function getUserName()
	{
		return $this->username;
	}
	
	function getSenha()
	{
		return $this->senha;
	}
	
	function isAdministrador()
	{
		return $this->administrador;
	}
	
	function isGerente()
	{
		return $this->gerente;
	}
	
	function setId($id)
	{
	 	$this->id = $id;
	}
	
	function setUserName($username)
	{
		$this->username = $username;
	}
	
	function setSenha($senha)
	{
		$this->senha = $senha;
	} 
	
	function setAdministrador($administrador)
	{
		$this->administrador = $administrador;
	}
	
	function setGerente($gerente)
	{
		$this->gerente = $gerente;
	}
}
?>