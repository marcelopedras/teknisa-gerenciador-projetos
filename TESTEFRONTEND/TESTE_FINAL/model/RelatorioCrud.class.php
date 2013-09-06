<?php

namespace model;
use db\SqliteDb;
use model\Relatorio;

class RelatorioCrud
{
	static function cria($relatorio)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();

		
		$q = $pdo->prepare("insert into Relatorios(data, descricao, atividade_id, empregado_id) values(:data, :descricao, :atividade_id, :empregado_id)");
		
		
		if($q->execute(array(
						':data' => $relatorio->getData(),
						':descricao' => $relatorio->getDescricao(),
						':atividade_id' => $relatorio->getAtividadeId(),						
						':empregado_id' => $relatorio->getEmpregadoId()						
						)))
						{
							$relatorio->setId($pdo->lastInsertId());										
						return $relatorio;	
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
		
		$q = $pdo->prepare("select * from Relatorios where id = :id");		
		$q->execute(array(':id' => $id));
				
		$obj = $q->fetchObject();
		if($obj)
		{		
			$relatorio = new Relatorio($obj->id, $obj->data, $obj->descricao, $obj->atividade_id,  $obj->empregado_id);
			return $relatorio;
		}
		else
		{
			return null;
		}			
	}	
	
	
	static function altera($relatorio)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("update Relatorios set data = :data, descricao = :descricao, atividade_id = :atividade_id, empregado_id = :empregado_id where id = :id");		
		
		if($q->execute(array(
					':id' => $relatorio->getId(),
					':data' => $relatorio->getData(),
					':descricao' => $relatorio->getDescricao(),
					':atividade_id' => $relatorio->getAtividadeId(),
					':empregado_id' => $relatorio->getEmpregadoId()
					)))
					{																
						return $relatorio;
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
		
		$q = $pdo->prepare("delete from Relatorios where id = :id");		
		
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
	
	static function listaPorAtividadeId($atividade_id)
	{
		
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Relatorios.id, Relatorios.data, Relatorios.descricao, Relatorios.atividade_id, Relatorios.empregado_id from Relatorios join Atividades on Relatorios.atividade_id = Atividades.id where Atividades.id = :atividade_id");		
		$q->execute(array(':atividade_id' => $atividade_id));				
			
		$relatorios = array();
		while($obj = $q->fetchObject())
		{
			$relatorio = new Relatorio($obj->id, $obj->data, $obj->descricao, $obj->atividade_id, $obj->empregado_id);
			$relatorios[] = $relatorio;	
		}
		return $relatorios;	
	}
	
	static function listaPorEmpregadoId($empregado_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Relatorios.id, Relatorios.data, Relatorios.descricao, Relatorios.atividade_id, Relatorios.empregado_id from Relatorios join Empregados on Relatorios.empregado_id = Empregados.id where Empregados.id = :empregado_id");		
		$q->execute(array(':empregado_id' => $empregado_id));				
			
		$relatorios = array();
		while($obj = $q->fetchObject())
		{
			$relatorio = new Relatorio($obj->id, $obj->data, $obj->descricao, $obj->atividade_id, $obj->empregado_id);
			$relatorios[] = $relatorio;	
		}
		return $relatorios;		
	}	
}
?>