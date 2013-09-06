<?php

namespace model;
use db\SqliteDb;
use model\Atividade;

class AtividadeCrud
{	
	static function cria($atividade)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();

		
		$q = $pdo->prepare("insert into Atividades(nome, descricao, data_inicio, data_termino, projeto_id, representante_id) values(:nome, :descricao, :data_inicio, :data_termino, :projeto_id, :representante_id)");
		
		
		if($q->execute(array(
						':nome' => $atividade->getNome(),
						':descricao' => $atividade->getDescricao(),
						':data_inicio' => $atividade->getDataInicio(),
						':data_termino' => $atividade->getDataTermino(),
						':projeto_id' => $atividade->getProjetoId(),
						':representante_id' => $atividade->getRepresentanteId()
						)))
						{
							$atividade->setId($pdo->lastInsertId());										
						return $atividade;	
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
		
		$q = $pdo->prepare("select * from Atividades where id = :id");		
		$q->execute(array(':id' => $id));
				
		$obj = $q->fetchObject();
		if($obj)
		{		
			$atividade = new Atividade($obj->id, $obj->nome, $obj->descricao, $obj->data_inicio,  $obj->data_termino, $obj->projeto_id, $obj->representante_id);
			return $atividade;
		}
		else
		{
			return null;
		}		
	}
	
	static function altera($atividade)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("update Atividades set nome = :nome, descricao = :descricao, data_inicio = :data_inicio, data_termino = :data_termino, projeto_id = :projeto_id, representante_id = :representante_id where id = :id");		
		
		if($q->execute(array(
					':id' => $atividade->getId(),
					':nome' => $atividade->getNome(),
					':descricao' => $atividade->getDescricao(),
					':data_inicio' => $atividade->getDataInicio(),
					':data_termino' => $atividade->getDataTermino(),
					':projeto_id' => $atividade->getProjetoId(),
					':representante_id' => $atividade->getRepresentanteId()
					)))
					{																
						return $atividade;
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
		
		$q = $pdo->prepare("delete from Atividades where id = :id");		
		
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
		
		$q = $pdo->prepare("select Atividades.id, Atividades.nome, Atividades.descricao, Atividades.data_inicio, Atividades.data_termino, Atividades.projeto_id, Atividades.representante_id from Atividades join Relatorios on Atividades.id = Relatorios.atividade_id where Relatorios.id = :relatorio_id");		
		$q->execute(array(':relatorio_id' => $relatorio_id));
				
		$obj = $q->fetchObject();		
		if($obj)
		{		
			$atividade = new Atividade($obj->id, $obj->nome, $obj->descricao, $obj->data_inicio, $obj->data_termino, $obj->projeto_id,$obj->representante_id);
			return $atividade;
		}
		else
		{
			return null;
		}			
	}
	
	static function listaPorRepresentanteId($representante_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Atividades.id, Atividades.nome, Atividades.descricao, Atividades.data_inicio, Atividades.data_termino, Atividades.projeto_id, Atividades.representante_id from Atividades join Representantes on Atividades.representante_id = Representantes.id where Representantes.id = :representante_id");		
		$q->execute(array(':representante_id' => $representante_id));
				
		$atividades = array();
		while($obj = $q->fetchObject())
		{
			$atividade = new Atividade($obj->id, $obj->nome, $obj->descricao, $obj->data_inicio, $obj->data_termino, $obj->projeto_id, $obj->representante_id);
			$atividades[] = $atividade;	
		}
		return $atividades;		
	}
	
	static function listaPorProjetoId($projeto_id)
	{
		$db = new \db\SqliteDb();
		$pdo = $db->getCon();
		
		$q = $pdo->prepare("select Atividades.id, Atividades.nome, Atividades.descricao, Atividades.data_inicio, Atividades.data_termino, Atividades.projeto_id, Atividades.representante_id from Atividades join Projetos on Atividades.projeto_id = Projetos.id where Projetos.id = :projeto_id");		
		$q->execute(array(':projeto_id' => $projeto_id));
				
		$atividades = array();
		while($obj = $q->fetchObject())
		{
			$atividade = new Atividade($obj->id, $obj->nome, $obj->descricao, $obj->data_inicio, $obj->data_termino, $obj->projeto_id, $obj->representante_id);
			$atividades[] = $atividade;	
		}
		return $atividades;		
	}	
}
?>