<?php
namespace controller;
use lib\GerenciadorSessao;

class RelatorioController
{
	function __construct()
	{		
		if(!GerenciadorSessao::recupera())
		{
			header("location:./view/erro_views/exibeErroLogin.html");
		}	
	}
	
	function listaPorAtividade()
	{
		if(isset($_GET['atividade_id']))
		{
			$atividade = \model\AtividadeCrud::recupera($_GET['atividade_id']);
			if($atividade)
			{
				$relatorios = \model\RelatorioCrud::listaPorAtividadeId($_GET['atividade_id']);
				$empregados = array();
				foreach($relatorios as $relatorio)
				{
					$empregados[]=\model\EmpregadoCrud::recuperaPorRelatorioId($relatorio->getId());	
				}
				$projeto = \model\ProjetoCrud::recuperaPorAtividadeId($atividade->getId()); 		
			}					
		}
		if(!$atividade)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		
		include "./view/relatorio_views/lista-por-atividade.php";	
	}
	
	function listaPorEmpregado()
	{
		if(isset($_GET['empregado_id']))
		{
			$empregado = \model\EmpregadoCrud::recupera($_GET['empregado_id']);
			if($empregado)
			{
				$relatorios = \model\RelatorioCrud::listaPorEmpregadoId($_GET['empregado_id']);
				$atividades = array();
				foreach($relatorios as $relatorio)
				{
					$atividades[] = \model\AtividadeCrud::recuperaPorRelatorioId($relatorio->getId());
				}				
				$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($_GET['empregado_id']); 		
			}					
		}
		if(!$empregado)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		
		include "./view/relatorio_views/lista-por-empregado.php";	
	}
	
	function novo()
	{
		
		if(isset($_GET['projeto_id']))
		{
			$projeto = \model\ProjetoCrud::recupera($_GET['projeto_id']);
			if($projeto)
			{
				$atividades = \model\AtividadeCrud::listaPorProjetoId($projeto->getId());
				$relatorio = new \model\Relatorio(null, null, null, null,null);
				$atividade_selecionada = false;	
			}
		}
		else
		{
			//header("location:./view/erro_views/exibeErroRedirecionamento.html");	
			echo 'teste';	
		}
		
		include "./view/relatorio_views/novo.php";
				
	}
	
	function exibe()
	{		
		if(isset($_GET['relatorio_id']))
		{
			$relatorio = \model\RelatorioCrud::recupera($_GET['relatorio_id']);
			if($relatorio)
			{
				$atividade = \model\AtividadeCrud::recuperaPorRelatorioId($_GET['relatorio_id']);
				$empregado = \model\EmpregadoCrud::recuperaPorRelatorioId($_GET['relatorio_id']);
				$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
			}				
		}
		if(!$relatorio)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		include "./view/relatorio_views/exibe.php";
			
	}
	
	function cria()
	{
		if(isset($_POST['data']))
		{
			$data = $_POST['data'];
			$descricao = $_POST['descricao'];			
			$atividade_id =	$_POST['atividades'];
		}
		else
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");		
		}
		$empregado = \model\EmpregadoCrud::recuperaPorUsuarioId(GerenciadorSessao::recupera()->getId());
		$relatorio = new \model\Relatorio(null, $data, $descricao, $atividade_id, $empregado->getId());
		
		\model\RelatorioCrud::cria($relatorio);
		
		
		$atividade = \model\AtividadeCrud::recuperaPorRelatorioId($relatorio->getId());
		//$empregado = \model\EmpregadoCrud::recuperaPorRelatorioId($relatorio->getId());
		$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
		$relatorios = \model\RelatorioCrud::listaPorEmpregadoId($empregado->getId());				
				
		
		$mensagem = "Relatório criado com sucesso!";
		include "./view/relatorio_views/sucesso.php";	
	}
	
	function edita()
	{
		if(isset($_GET['relatorio_id']))
		{
			$relatorio = \model\RelatorioCrud::recupera($_GET['relatorio_id']);
			if($relatorio)
			{
				$atividade = \model\AtividadeCrud::recuperaPorRelatorioId($_GET['relatorio_id']);
				$atividade_selecionada = $atividade->getId();
				$empregado = \model\EmpregadoCrud::recuperaPorRelatorioId($_GET['relatorio_id']);
				$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
				$atividades = \model\AtividadeCrud::listaPorProjetoId($projeto->getId());
			}				
		}
		if(!$relatorio)
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");	
		}
		include "./view/relatorio_views/edita.php";	
	}
	
	function atualiza()
	{
		if(isset($_POST['data']))
		{
			$data = $_POST['data'];
			$descricao = $_POST['descricao'];
			$id = $_POST['id'];
			$atividade_id =	$_POST['atividades'];
		}
		else
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");		
		}
		
		
		$relatorio = \model\RelatorioCrud::recupera($id);
		
		$relatorio->setData($data);
		$relatorio->setDescricao($descricao);
		$relatorio->setAtividadeId($atividade_id);
		
		\model\RelatorioCrud::altera($relatorio);	
		
		$atividade = \model\AtividadeCrud::recuperaPorRelatorioId($relatorio->getId());
		$empregado = \model\EmpregadoCrud::recuperaPorRelatorioId($relatorio->getId());
		$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
		//$relatorios = \model\RelatorioCrud::listaPorEmpregadoId($empregado->getId());				
				
		
		$mensagem = "Relatório atualizado com sucesso!";
		include "./view/relatorio_views/sucesso.php";
		
		
		
			
	}
	
	function destroi()
	{
		if(isset($_GET['relatorio_id']))
		{
			$relatorio = \model\RelatorioCrud::recupera($_GET['relatorio_id']);
			$empregado = \model\EmpregadoCrud::recuperaPorRelatorioId($relatorio->getId());
			$usuario = \model\UsuarioCrud::recuperaPorEmpregadoId($empregado->getId());
			$atividade = \model\AtividadeCrud::recuperaPorRelatorioId($relatorio->getId());
			$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
			if($usuario->getId() === GerenciadorSessao::recupera()->getId())
			{
				\model\RelatorioCrud::deleta($relatorio->getId());	
			}				
			
			
			$mensagem = "Relatório apagado com sucesso!";
			include "./view/relatorio_views/sucesso.php";
		}
		else
		{
			header("location:./view/erro_views/exibeErroRedirecionamento.html");				
		}				
	}	
}
?>