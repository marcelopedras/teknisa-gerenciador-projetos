<?php

namespace controller;
use lib\GerenciadorSessao;

class AtividadeController
{
	function __construct()
	{		
		if(!GerenciadorSessao::recupera())
		{
			header("location:./view/erro_views/exibeErroLogin.html");
		}	
	}
	
	function lista()
	{
		if(isset($_GET['projeto_id']))
		{
			$projeto = \model\ProjetoCrud::recupera($_GET['projeto_id']);
			if($projeto)
			{
				$atividades = \model\AtividadeCrud::listaPorProjetoId($_GET['projeto_id']);
				$empregado = \model\EmpregadoCrud::recuperaPorUsuarioId(GerenciadorSessao::recupera()->getId());		
			}					
		}
		if(!$projeto)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		//var_dump($atividades);
		include "./view/atividade_views/lista.php";	
	}
	
	function novo()
	{
		if(isset($_GET['projeto_id']))
		{
			$projeto = \model\ProjetoCrud::recupera($_GET['projeto_id']);
			if($projeto)
			{
				$cliente = \model\ClienteCrud::recuperaPorProjetoId($projeto->getId());
				$representantes = \model\RepresentanteCrud::listaPorClienteId($cliente->getId());
				$atividade = new \model\Atividade(null, null, null, null, null, null, null);
				$representante_selecionado = false;
			}
		}
		
		if(!$projeto)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		include "./view/atividade_views/novo.php";
				
	}
	
	function exibe()
	{		
		if(isset($_GET['atividade_id']))
		{
			$atividade = \model\AtividadeCrud::recupera($_GET['atividade_id']);
			if($atividade)
			{
				$projeto = \model\ProjetoCrud::recuperaPorAtividadeId($_GET['atividade_id']);		
			}				
		}
		if(!$atividade)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		include "./view/atividade_views/exibe.php";
			
	}
	
	function cria()
	{
		if(isset($_POST['nome']))
		{
			$nome = $_POST['nome'];
			$descricao = $_POST['descricao'];			
			$data_inicio =	$_POST['data_inicio'];
			$data_termino =	$_POST['data_termino'];
			$representante_id = $_POST['representantes'];
		}
		else
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");		
		}
		
		$empregado = \model\EmpregadoCrud::recuperaPorUsuarioId(GerenciadorSessao::recupera()->getId());
		$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
		$projeto_id = $projeto->getId();
		
		$atividade = new \model\Atividade(null, $nome, $descricao, $data_inicio, $data_termino, $projeto_id, $representante_id);
		
		\model\AtividadeCrud::cria($atividade);
		
		
		//$atividade = \model\AtividadeCrud::recuperaPorRelatorioId($relatorio->getId());
		//$empregado = \model\EmpregadoCrud::recuperaPorRelatorioId($relatorio->getId());
		//$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
		//$relatorios = \model\RelatorioCrud::listaPorEmpregadoId($empregado->getId());				
				
		
		$mensagem = "Atividade criada com sucesso!";
		include "./view/atividade_views/sucesso.php";		
	}
	
	function edita()
	{
		
	}
	
	function atualiza()
	{
		
	}
	
	function destroi()
	{
		
	}
}
?>