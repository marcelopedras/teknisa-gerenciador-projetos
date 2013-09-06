<?php

namespace model;

class Relatorio
{
	private $id;
	private $data;
	private $descricao;
	private $atividade_id;
	private $empregado_id;
	
	function __construct($id, $data, $descricao, $atividade_id, $empregado_id)
	{
		$this->id = $id;
		$this->data = $data;
		$this->descricao = $descricao;
		$this->atividade_id = $atividade_id;
		$this->empregado_id = $empregado_id;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	function getData()
	{
		return $this->data;
	}
	
	function getDescricao()
	{
		return $this->descricao;
	}
	
	function getAtividadeId()
	{
		return $this->atividade_id;
	}
	
	function getEmpregadoId()
	{
		return $this->empregado_id;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}
	
	function setData($data)
	{
		$this->data = $data;
	}
	
	function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	
	function setAtividadeId($atividade_id)
	{
		$this->atividade_id = $atividade_id;
	}
	
	function setEmpregadoId($atividade_id)
	{
		$this->empregado_id = $empregado_id;
	}
}
?>