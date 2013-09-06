<?php

namespace model;

class Empregado
{
	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $projeto_id;
	private $usuario_id;
	
	function __construct($id, $nome, $email, $telefone, $projeto_id, $usuario_id)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->email = $email;
		$this->telefone = $telefone;
		$this->projeto_id = $projeto_id;
		$this->usuario_id = $usuario_id;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	function getNome()
	{
		return $this->nome;
	}
	
	function getEmail()
	{
		return $this->email;
	}
	
	function getTelefone()
	{
		return $this->telefone;
	}
	
	function getProjetoId()
	{
		return $this->projeto_id;
	}
	
	function getUsuarioId()
	{
		return $this->usuario_id;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}
	
	function setNome($nome)
	{
		$this->nome = $nome;
	}
	
	function setEmail($email)
	{
		$this->email = $email;
	}
	
	function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	
	function setProjetoId($projeto_id)
	{
		$this->projeto_id = $projeto_id;
	}
	
	function setUsuarioId($usuario_id)
	{
		$this->usuario_id = $usuario_id;
	}
}
?>