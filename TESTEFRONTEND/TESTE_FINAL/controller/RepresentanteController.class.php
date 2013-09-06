<?php

namespace controller;
use lib\GerenciadorSessao;

class RepresentanteController
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
		//if(isset($_GET['projeto_id']))
		//{
		//	$projeto = \model\ProjetoCrud::recupera($_GET['projeto_id']);
		//	if($projeto)
		//	{
		//		$atividades = \model\AtividadeCrud::listaPorProjetoId($_GET['projeto_id']);		
		//	}					
		//}
		//if(!$projeto)
		//{
		//	header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		//}
		//var_dump($atividades);
		//include "./view/atividade_views/lista.php";	
	}
	
	function novo()
	{
		
	}
	
	function exibe()
	{		
		if(isset($_GET['atividade_id']))
		{
			$atividade = \model\AtividadeCrud::recupera($_GET['atividade_id']);
			if($atividade)
			{
				$representante =  \model\RepresentanteCrud::recuperaPorAtividadeId($atividade->getId());
				$projeto = \model\ProjetoCrud::recuperaPorAtividadeId($atividade->getId()); 
			}				
		}
		if(!$atividade)
		{			
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		
		
		include "./view/representante_views/exibe.php";
			
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