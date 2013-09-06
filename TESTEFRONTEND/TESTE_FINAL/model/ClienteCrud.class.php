<?php

namespace model;
use db\SqliteDb;
use model\Cliente;


class ClienteCrud
{
	static function cria($cliente)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("insert into Clientes(nome, telefone, endereco) values(:nome, :telefone, :endereco)");		
		
		if($q->execute(array(
					':nome' => $cliente->getNome(),
					':telefone' => $cliente->getTelefone(),
					'endereco' => $cliente->getEndereco()
					)))
					{	
						
						$cliente->setId($pdo->lastInsertId());										
						return $cliente;
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
		
		$q = $pdo->prepare("select * from Clientes where id = :id");		
		$q->execute(array(':id' => $id));
				
		$obj = $q->fetchObject();
		if($obj)
		{		
			$cliente = new Cliente($obj->id, $obj->nome, $obj->telefone, $obj->endereco);
			return $cliente;
		}
		else
		{
			return null;
		}		
	}
	
	static function altera($cliente)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("update Clientes set nome = :nome, telefone = :telefone, endereco = :endereco where id = :id");		
		
		if($q->execute(array(
					':id' => $cliente->getId(),
					':nome' => $cliente->getNome(),
					':telefone' => $cliente->getTelefone(),
					':endereco' => $cliente->getEndereco()
					)))
					{																
						return $cliente;
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
		
		$q = $pdo->prepare("delete from Clientes where id = :id");		
		
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
	
	static function recuperaPorProjetoId($projeto_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Clientes.id, Clientes.nome, Clientes.telefone, Clientes.endereco from Clientes join Projetos on Clientes.id = Projetos.cliente_id where Projetos.id = :projeto_id");		
		$q->execute(array(':projeto_id' => $projeto_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$cliente = new Cliente($obj->id, $obj->nome, $obj->telefone, $obj->endereco);
			return $cliente;
		}
		else
		{
			return null;
		}			
	}	
	
	static function recuperaPorRepresentanteId($representante_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Clientes.id, Clientes.nome, Clientes.telefone, Clientes.endereco from Clientes join Representantes on Clientes.id = Representantes.cliente_id where Representantes.id = :representante_id");		
		$q->execute(array(':representante_id' => $representante_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$cliente = new Cliente($obj->id, $obj->nome, $obj->telefone, $obj->endereco);
			return $cliente;
		}
		else
		{
			return null;
		}			
	}			
}
?>