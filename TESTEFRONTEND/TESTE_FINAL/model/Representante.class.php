<?php

namespace model;

class Representante
{
	private $id;
	private $nome;
	private $cargo;
	private $telefone;
	private $cliente_id;
	
	function __construct($id, $nome, $cargo, $telefone, $cliente_id)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->cargo = $cargo;
		$this->telefone = $telefone;
		$this->cliente_id = $cliente_id;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	function getNome()
	{
		return $this->nome;
	}
	
	function getCargo()
	{
		return $this->cargo;
	}
	
	function getTelefone()
	{
		return $this->telefone;
	}
	
	function getClienteId()
	{
		return $this->cliente_id;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}
	
	function setNome($nome)
	{
		$this->nome = $nome;
	}
	
	function setCargo($cargo)
	{
		$this->cargo = $cargo;
	}
	
	function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	
	function setClienteId($cliente_id)
	{
		$this->cliente_id = $cliente_id;
	}
}
?>