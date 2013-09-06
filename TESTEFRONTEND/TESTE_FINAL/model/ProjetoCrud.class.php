<?php

namespace model;
use db\SqliteDb;
use model\Projeto;

class ProjetoCrud
{
	static function cria($projeto)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("insert into Projetos(nome, descricao, data_inicial, data_final, cliente_id) values(:nome, :descricao, :data_inicial, :data_final, :cliente_id)");					
		if($q->execute(array(
					':nome' => $projeto->getNome(),
					':descricao' => $projeto->getDescricao(),
					':data_inicial' => $projeto->getDataInicial(),
					':data_final' => $projeto->getDataFinal(),
					':cliente_id' => $projeto->getClienteId()
					)))
					{	
						
						$projeto->setId($pdo->lastInsertId());										
						return $projeto;
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
		
		$q = $pdo->prepare("select * from Projetos where id = :id");		
		$q->execute(array(':id' => $id));
				
		$obj = $q->fetchObject();
		if($obj)
		{		
			$projeto = new Projeto($obj->id, $obj->nome, $obj->descricao, $obj->data_inicial,  $obj->data_final, $obj->cliente_id);
			return $projeto;
		}
		else
		{
			return null;
		}		
	}
	
	static function altera($projeto)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("update Projetos set nome = :nome, descricao = :descricao, data_inicial = :data_inicial, data_final = :data_final, cliente_id = :cliente_id where id = :id");		
		
		if($q->execute(array(
					':id' => $projeto->getId(),
					':nome' => $projeto->getNome(),
					':descricao' => $projeto->getDescricao(),
					':data_inicial' => $projeto->getDataInicial(),
					':data_final' => $projeto->getDataFinal(),
					':cliente_id' => $projeto->getClienteId()
					)))
					{																
						return $projeto;
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
		
		$q = $pdo->prepare("delete from Projetos where id = :id");		
		
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
		
		$q = $pdo->prepare("select Projetos.id, Projetos.nome, Projetos.descricao, Projetos.data_inicial, Projetos.data_final, Projetos.cliente_id from Projetos join Empregados on Projetos.id = Empregados.projeto_id where Empregados.id = :empregado_id");		
		$q->execute(array(':empregado_id' => $empregado_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$projeto = new Projeto($obj->id, $obj->nome, $obj->descricao, $obj->data_inicial, $obj->data_final, $obj->cliente_id);
			return $projeto;
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
		
		$q = $pdo->prepare("select Projetos.id, Projetos.nome, Projetos.descricao, Projetos.data_inicial, Projetos.data_final, Projetos.cliente_id from Projetos join Atividades on Projetos.id = Atividades.projeto_id where Atividades.id = :atividade_id");		
		$q->execute(array(':atividade_id' => $atividade_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$projeto = new Projeto($obj->id, $obj->nome, $obj->descricao, $obj->data_inicial, $obj->data_final, $obj->cliente_id);
			return $projeto;
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
		
		$q = $pdo->prepare("select Projetos.id, Projetos.nome, Projetos.descricao, Projetos.data_inicial, Projetos.data_final, Projetos.cliente_id from Projetos join Clientes on Projetos.cliente_id = Clientes.id where Clientes.id = :cliente_id");		
		$q->execute(array(':cliente_id' => $cliente_id));
				
		$projetos = array();
		while($obj = $q->fetchObject())
		{
			$projeto = new Projeto($obj->id, $obj->nome, $obj->descricao, $obj->data_inicial, $obj->data_final, $obj->cliente_id);
			$projetos[] = $projeto;	
		}
		return $projetos;
	}
}
?>