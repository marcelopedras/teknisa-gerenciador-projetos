<?php
	session_start();
	include_once("config.php");

	use lib\Roteador;
		
	
	
	$rota = null;
	if(isset($_GET['rota']))
	{
		$rota = $_GET['rota'];
	}
	else
	{
		$rota = 'default';
	}
	
	$roteador = new Roteador('default', 'LoginController', 'login', 'erro-redirecionamento', 'ErroController', 'exibeErroRedirecionamento');
	
	/**
	* 
	* Rotas
	* 
	*/
	
	//Login
	$roteador->novaRota('login', 'LoginController', 'login');
	$roteador->novaRota('processa_login', 'LoginController', 'processaLogin');
	$roteador->novaRota('logout', 'LoginController', 'logout');
	
	//Erro
	$roteador->novaRota('erro-login', 'ErroController', 'exibeErroLogin');
	
	//Usuários	
	$roteador->novaRota('lista-usuarios', 'UsuarioController', 'lista');
	$roteador->novaRota('exibe-usuario', 'UsuarioController', 'exibe');
	$roteador->novaRota('novo-usuario', 'UsuarioController', 'novo');
	$roteador->novaRota('cria-usuario', 'UsuarioController', 'cria');
	$roteador->novaRota('edita-usuario', 'UsuarioController', 'edita');
	$roteador->novaRota('atualiza-usuario', 'UsuarioController', 'atualiza');
	$roteador->novaRota('destroi-usuario', 'UsuarioController', 'destroi');
	
	//Clientes
	$roteador->novaRota('lista-clientes', 'ClienteController', 'lista');
	$roteador->novaRota('exibe-cliente', 'ClienteController', 'exibe');
	$roteador->novaRota('novo-cliente', 'ClienteController', 'novo');
	$roteador->novaRota('cria-cliente', 'ClienteController', 'cria');
	$roteador->novaRota('edita-cliente', 'ClienteController', 'edita');
	$roteador->novaRota('atualiza-cliente', 'ClienteController', 'atualiza');
	$roteador->novaRota('destroi-cliente', 'ClienteController', 'destroi');
	
	//Representantes
	$roteador->novaRota('lista-representante', 'RepresentanteController', 'lista');
	$roteador->novaRota('exibe-representante', 'RepresentanteController', 'exibe');
	$roteador->novaRota('novo-representante', 'RepresentanteController', 'novo');
	$roteador->novaRota('cria-representante', 'RepresentanteController', 'cria');
	$roteador->novaRota('edita-representante', 'RepresentanteController', 'edita');
	$roteador->novaRota('atualiza-representante', 'RepresentanteController', 'atualiza');
	$roteador->novaRota('destroi-representante', 'RepresentanteController', 'destroi');
	
	//Atividades
	$roteador->novaRota('lista-atividades', 'AtividadeController', 'lista');
	$roteador->novaRota('exibe-atividade', 'AtividadeController', 'exibe');
	$roteador->novaRota('novo-atividade', 'AtividadeController', 'novo');
	$roteador->novaRota('cria-atividade', 'AtividadeController', 'cria');
	$roteador->novaRota('edita-atividade', 'AtividadeController', 'edita');
	$roteador->novaRota('atualiza-atividade', 'AtividadeController', 'atualiza');
	$roteador->novaRota('destroi-atividade', 'AtividadeController', 'destroi');
	
	//Projetos
	$roteador->novaRota('lista-projetos', 'ProjetoController', 'lista');
	$roteador->novaRota('exibe-projeto', 'ProjetoController', 'exibe');
	$roteador->novaRota('novo-projeto', 'ProjetoController', 'novo');
	$roteador->novaRota('cria-projeto', 'ProjetoController', 'cria');
	$roteador->novaRota('edita-projeto', 'ProjetoController', 'edita');
	$roteador->novaRota('atualiza-projeto', 'ProjetoController', 'atualiza');
	$roteador->novaRota('destroi-cliente', 'ProjetoController', 'destroi');
		
	//Empregados
	$roteador->novaRota('lista-empregados', 'EmpregadoController', 'lista');
	$roteador->novaRota('exibe-empregado', 'EmpregadoController', 'exibe');
	$roteador->novaRota('novo-empregado', 'EmpregadoController', 'novo');
	$roteador->novaRota('cria-empregado', 'EmpregadoController', 'cria');
	$roteador->novaRota('edita-empregado', 'EmpregadoController', 'edita');
	$roteador->novaRota('atualiza-empregado', 'EmpregadoController', 'atualiza');
	$roteador->novaRota('destroi-empregado', 'EmpregadoController', 'destroi');
	
	//Relatorios
	$roteador->novaRota('lista-relatorios-atividade', 'RelatorioController', 'listaPorAtividade');
	$roteador->novaRota('lista-relatorios-empregado', 'RelatorioController', 'listaPorEmpregado');
	$roteador->novaRota('exibe-relatorio', 'RelatorioController', 'exibe');
	$roteador->novaRota('novo-relatorio', 'RelatorioController', 'novo');
	$roteador->novaRota('cria-relatorio', 'RelatorioController', 'cria');
	$roteador->novaRota('edita-relatorio', 'RelatorioController', 'edita');
	$roteador->novaRota('atualiza-relatorio', 'RelatorioController', 'atualiza');
	$roteador->novaRota('destroi-relatorio', 'RelatorioController', 'destroi');
	
	
	
	/**
	* 
	* Exibe o mapeamento
	* 
	*/
	//$roteador->exibeMapeamento();
	
	/**
	* 
	* Efetua roteamento
	* 
	*/
	$roteador->rotear($rota);
	
	
?>