<?php

namespace model;
use db\SqliteDb;
use model\Representante;


class RepresentanteCrud
{
	static function cria($representante)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("insert into Representantes(nome, cargo, telefone, cliente_id) values(:nome, :cargo, :telefone, :cliente_id)");					
		if($q->execute(array(
					':nome' => $representante->getNome(),
					':cargo' => $representante->getCargo(),
					':telefone' => $representante->getTelefone(),
					':cliente_id' => $representante->getClienteId()
					)))
					{	
						
						$representante->setId($pdo->lastInsertId());										
						return $representante;
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
		
		$q = $pdo->prepare("select * from Representantes where id = :id");		
		$q->execute(array(':id' => $id));
				
		$obj = $q->fetchObject();
		if($obj)
		{		
			$representante = new Representante($obj->id, $obj->nome, $obj->cargo, $obj->telefone, $obj->cliente_id);
			return $representante;
		}
		else
		{
			return null;
		}		
	}
	
	static function altera($representante)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("update Representantes set nome = :nome, cargo = :cargo, telefone = :telefone, cliente_id = :cliente_id where id = :id");		
		
		if($q->execute(array(
					':id' => $representante->getId(),
					':nome' => $representante->getNome(),
					':cargo' => $representante->getCargo(),
					':telefone' => $representante->getTelefone(),
					':cliente_id' => $representante->getClienteId()
					)))
					{																
						return $representante;
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
		
		$q = $pdo->prepare("delete from Representantes where id = :id");		
		
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
	
	static function recuperaPorAtividadeId($atividade_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Representantes.id, Representantes.nome, Representantes.cargo, Representantes.telefone, Representantes.cliente_id from Representantes join Atividades on Representantes.id = Atividades.representante_id where Atividades.id = :atividade_id");		
		$q->execute(array(':atividade_id' => $atividade_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$representante = new Representante($obj->id, $obj->nome, $obj->cargo, $obj->telefone, $obj->cliente_id);
			return $representante;
		}
		else
		{
			return null;
		}			
	}	
	
	static function listaPorClienteId($cliente_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Representantes.id, Representantes.nome, Representantes.cargo, Representantes.telefone, Representantes.cliente_id from Representantes join Clientes on Clientes.id = Representantes.cliente_id where Clientes.id = :cliente_id");
		$q->execute(array(':cliente_id' => $cliente_id));
				
		
		$representantes = array();
		while($obj = $q->fetchObject())
		{
			$representante = new Representante($obj->id, $obj->nome, $obj->cargo, $obj->telefone, $obj->cliente_id);
			$representantes[] = $representante;	
		}
		return $representantes;
						
	}	
}
?>