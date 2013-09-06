<?php

namespace model;

class Projeto
{
	private $id;
	private $nome;
	private $descricao;
	private $data_inicial;
	private $data_final;
	private $cliente_id;
	
	function __construct($id, $nome, $descricao, $data_inicial, $data_final, $cliente_id)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->data_inicial = $data_inicial;
		$this->data_final = $data_final;
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
	
	function getDescricao()
	{
		return $this->descricao;
	}
	
	function getDataInicial()
	{
		return $this->data_inicial;
	}
	
	function getDataFinal()
	{
		return $this->data_final;
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
	
	function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	
	function setDataInicial($data_inicial)
	{
		$this->data_inicial = $data_inicial;
	}
	
	function setDataFinal($data_final)
	{
		$this->data_final = $data_final;
	}
	
	function setClienteId($cliente_id)
	{
		$this->cliente_id = $cliente_id;
	}
}
?>