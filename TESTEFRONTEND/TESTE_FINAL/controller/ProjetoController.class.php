<?php

namespace controller;
use lib\GerenciadorSessao;

class ProjetoController
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
		
	}
	
	function novo()
	{
		
	}
	
	function exibe()
	{
		
		//analista		
		//$empregado = \model\EmpregadoCrud::recuperaPorUsuarioId($this->usuario->getId());
		//$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
		//var_dump($projeto);
		
		if(isset($_GET['projeto_id']))
		{
			$projeto = \model\ProjetoCrud::recupera($_GET['projeto_id']);
			$cliente = \model\ClienteCrud::recuperaPorProjetoId($_GET['projeto_id']);				
		}
		if(!$projeto)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		include "./view/projeto_views/exibe.php";
			
	}
	
	function cria()
	{
		
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