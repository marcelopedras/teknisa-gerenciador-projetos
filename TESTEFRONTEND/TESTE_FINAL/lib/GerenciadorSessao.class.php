<?php
namespace lib;
use model\UsuarioCrud;
use model\Usuario;

class GerenciadorSessao
{
	static function cria($usuario)
	{
		$_SESSION['usuario'] = $usuario->getUserName();
		$_SESSION['usuario_id'] = $usuario->getId();	
	}
	
	static function checa($usuario)
	{
		if(isset($_SESSION['usuario']) && isset($_SESSION['usuario_id']))
		{
			$username = $_SESSION['usuario'];
			$usuario_id = $_SESSION['usuario_id'];
			
			if(($username == $usuario->getUserName()) && ($usuario_id ==  $usuario->getId()))
			{
				return true;
			} 
		}
		return false;		
	}
	
	static function destroi()
	{
		if(isset($_SESSION['usuario']) && isset($_SESSION['usuario_id']))
		{		
			unset($_SESSION['usuario']);
			unset($_SESSION['usuario_id']);
			return true;
		}
		return false;
	}
	
	static function recupera()
	{		
		if(isset($_SESSION['usuario']) && isset($_SESSION['usuario_id']))
		{			
			$usuario_id = $_SESSION['usuario_id'];			
			return UsuarioCrud::recupera($usuario_id);			
		}
		else
		{
			return null;
		}	
	}		
}
?>