<?php

namespace model;
use db\SqliteDb;
use model\Empregado;

class EmpregadoCrud
{
	static function cria($empregado)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();

		
		$q = $pdo->prepare("insert into Empregados(nome, email, telefone, projeto_id, usuario_id) values(:nome, :email, :telefone, :projeto_id, :usuario_id)");
		
		
		if($q->execute(array(
						':nome' => $empregado->getNome(),
						':email' => $empregado->getEmail(),
						':telefone' => $empregado->getTelefone(),						
						':projeto_id' => $empregado->getProjetoId(),
						':usuario_id' => $empregado->getUsuarioId()
						)))
						{
							$empregado->setId($pdo->lastInsertId());										
						return $empregado;	
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
		
		$q = $pdo->prepare("select * from Empregados where id = :id");		
		$q->execute(array(':id' => $id));
				
		$obj = $q->fetchObject();
		if($obj)
		{		
			$empregado = new Empregado($obj->id, $obj->nome, $obj->email, $obj->telefone,  $obj->projeto_id, $obj->usuario_id);
			return $empregado;
		}
		else
		{
			return null;
		}			
	}
	
	static function altera($empregado)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("update Empregados set nome = :nome, email = :email, telefone = :telefone, projeto_id = :projeto_id, usuario_id = :usuario_id where id = :id");		
		
		if($q->execute(array(
					':id' => $empregado->getId(),
					':nome' => $empregado->getNome(),
					':email' => $empregado->getEmail(),
					':telefone' => $empregado->getTelefone(),
					':projeto_id' => $empregado->getProjetoId(),
					':usuario_id' => $empregado->getUsuarioId()
					)))
					{																
						return $empregado;
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
		
		$q = $pdo->prepare("delete from Empregados where id = :id");		
		
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
	
	static function recuperaPorRelatorioId($relatorio_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Empregados.id, Empregados.nome, Empregados.email, Empregados.telefone, Empregados.projeto_id, Empregados.usuario_id from Empregados join Relatorios on Empregados.id = Relatorios.empregado_id where Relatorios.id = :relatorio_id");		
		$q->execute(array(':relatorio_id' => $relatorio_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$empregado = new Empregado($obj->id, $obj->nome, $obj->email, $obj->telefone, $obj->projeto_id, $obj->usuario_id);
			return $empregado;
		}
		else
		{
			return null;
		}				
	}
	
	static function recuperaPorUsuarioId($usuario_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Empregados.id, Empregados.nome, Empregados.email, Empregados.telefone, Empregados.projeto_id, Empregados.usuario_id from Empregados join Usuarios on Empregados.usuario_id = Usuarios.id where Usuarios.id = :usuario_id");		
		$q->execute(array(':usuario_id' => $usuario_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$empregado = new Empregado($obj->id, $obj->nome, $obj->email, $obj->telefone, $obj->projeto_id, $obj->usuario_id);
			return $empregado;
		}
		else
		{
			return null;
		}		
	}
	
	static function listaPorProjetoId($projeto_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Empregados.id, Empregados.nome, Empregados.email, Empregados.telefone, Empregados.projeto_id, Empregados.usuario_id from Empregados join Projetos on Empregados.projeto_id = Projetos.id where Projetos.id = :projeto_id");		
		$q->execute(array(':projeto_id' => $projeto_id));
		
		$empregados = array();
		while($obj = $q->fetchObject())
		{
			$empregado = new Empregado($obj->id, $obj->nome, $obj->email, $obj->telefone, $obj->projeto_id, $obj->usuario_id);
			$empregados[] = $empregado;	
		}
		return $empregados;	
	} 	
}
?>