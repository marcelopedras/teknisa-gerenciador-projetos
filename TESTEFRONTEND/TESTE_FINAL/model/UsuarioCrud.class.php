<?php

namespace model;
use db\SqliteDb;
use model\Usuario;

class UsuarioCrud
{
	static function cria($usuario)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();

		
		$q = $pdo->prepare("insert into Usuarios(username, senha, administrador, gerente) values(:username, :senha, :administrador, :gerente)");
		
		
		if($q->execute(array(
						':username' => $usuario->getUserName(),
						':senha' => $usuario->getSenha(),
						':administrador' => $usuario->isAdministrador(),						
						':gerente' => $usuario->isGerente()						
						)))
						{
							$usuario->setId($pdo->lastInsertId());										
						return $usuario;	
						}
						else
						{
							return null;
						}		
	}
	
	static function recupera($id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select * from Usuarios where id = :id");		
		$q->execute(array(':id' => $id));
				
		$obj = $q->fetchObject();
		if($obj)
		{		
			$usuario = new Usuario($obj->id, $obj->username, $obj->senha, $obj->administrador,  $obj->gerente);
			return $usuario;
		}
		else
		{
			return null;
		}		
	}
	
	static function altera($usuario)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("update Usuarios set username = :username, senha = :senha, administrador = :administrador, gerente = :gerente where id = :id");		
		
		if($q->execute(array(
					':id' => $usuario->getId(),
					':username' => $usuario->getUserName(),
					':senha' => $usuario->getSenha(),
					':administrador' => $usuario->isAdministrador(),
					':gerente' => $usuario->isGerente()
					)))
					{																
						return $usuario;
					}
					else
					{
						return null;
					}	
	}
	
	static function deleta($id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("delete from Usuarios where id = :id");		
		
		if($q->execute(array(
					':id' => $id					
					)))
					{																
						return true;
					}
					else
					{
						return null;
					}	
	}
	
	static function recuperaPorEmpregadoId($empregado_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Usuarios.id, Usuarios.username, Usuarios.senha, Usuarios.administrador, Usuarios.gerente from Usuarios join Empregados on Usuarios.id = Empregados.usuario_id where Empregados.id = :empregado_id");		
		$q->execute(array(':empregado_id' => $empregado_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$usuario = new Usuario($obj->id, $obj->username, $obj->senha, $obj->administrador, $obj->gerente);
			return $usuario;
		}
		else
		{
			return null;
		}			
	}	
	
	static function recuperaPorUserNameESenha($username, $senha)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Usuarios.id, Usuarios.username, Usuarios.senha, Usuarios.administrador, Usuarios.gerente from Usuarios where Usuarios.username like :username and senha like :senha");		
		$q->execute(array(
		':username' => $username,
		':senha' => $senha
		));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$usuario = new Usuario($obj->id, $obj->username, $obj->senha, $obj->administrador, $obj->gerente);
			return $usuario;
		}
		else
		{
			return null;
		}
		
		
	}
}
?>