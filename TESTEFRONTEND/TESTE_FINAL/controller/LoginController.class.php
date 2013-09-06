<?php


namespace controller;


//use model\UsuarioCrud;
		
class LoginController
{
	function login()
	{	
		\lib\GerenciadorSessao::destroi();
				
		header("location:./view/login_views/login.html");
	}
	
	function processaLogin()
	{		
		$username='';
		$senha ='';
		
		if(isset($_POST['username']) && isset($_POST['senha']))
		{
			$username = $_POST['username'];
			$senha = $_POST['senha'];	
		}			
			
		$usuario = \model\UsuarioCrud::recuperaPorUserNameESenha($username, $senha);
		
		if($usuario === null)
		{
			$usuario = \lib\GerenciadorSessao::recupera();
		}			
		
		if($usuario)
		{						
			\lib\GerenciadorSessao::cria($usuario);
			
			
			if($usuario->isAdministrador())
			{
				header("location:./view/login_views/admin.html");
			}
			else
			{
				if($usuario->isGerente())
				{
					//header("location:./view/login_views/gerente.html");
					
					$empregado = \model\EmpregadoCrud::recuperaPorUsuarioId($usuario->getId());
					$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
					$cliente =\model\ClienteCrud::recuperaPorProjetoId($projeto->getId());	
					include "./view/login_views/gerente.php";
				}
				else
				{
					//analista		
					$empregado = \model\EmpregadoCrud::recuperaPorUsuarioId($usuario->getId());
					$projeto = \model\ProjetoCrud::recuperaPorEmpregadoId($empregado->getId());
					$cliente =\model\ClienteCrud::recuperaPorProjetoId($projeto->getId());					
					include "./view/login_views/analista.php";
				}	
			}		
		}
		else
		{
			//exibe mensagem de erro no login
			header("location:index.php?rota=erro-login");	
		}		
	}
}
?>