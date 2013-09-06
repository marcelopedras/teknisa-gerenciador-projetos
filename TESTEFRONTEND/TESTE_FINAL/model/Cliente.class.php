<?php

namespace model;
 
class Cliente
{
	private $id;
	private $nome;
	private $telefone;
	private $endereco;
	
	function __construct($id, $nome, $telefone, $endereco)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->telefone = $telefone;
		$this->endereco = $endereco;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	function getNome()
	{
		return $this->nome;
	}
	
	function getTelefone()
	{
		return $this->telefone;
	}
	
	function getEndereco()
	{
		return $this->endereco;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}
	
	function setNome($nome)
	{
		$this->nome = $nome;
	}
	
	function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	
	function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}
}
?>