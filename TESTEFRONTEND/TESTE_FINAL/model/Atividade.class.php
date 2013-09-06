<?php

namespace model;

class Atividade
{
	private $id;
	private $nome;
	private $descricao;
	private $data_inicio;
	private $data_termino;
	private $projeto_id;
	private $representante_id;
	
	function __construct($id, $nome, $descricao, $data_inicio, $data_termino, $projeto_id, $representante_id)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->data_inicio = $data_inicio;
		$this->data_termino = $data_termino;
		$this->projeto_id = $projeto_id;
		$this->representante_id = $representante_id	;
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
	
	function getDataInicio()
	{
		return $this->data_inicio;
	}
	
	function getDataTermino()
	{
		return $this->data_termino;
	}
	
	function getProjetoId()
	{
		return $this->projeto_id;
	}
	
	function getRepresentanteId()
	{
		return $this->representante_id;
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
	
	function setDataInicio($data_inicio)
	{
		$this->data_inicio = $data_inicio;
	}
	
	function setDataTermino($data_termino)
	{
		$this->data_termino = $data_termino;
	}
	
	function setProjetoId($projeto_id)
	{
		$this->projeto_id = $projeto_id;
	}
	
	function setRepresentanteId($representante_id)
	{
		$this->representante_id = $representante_id;
	}
}
?>