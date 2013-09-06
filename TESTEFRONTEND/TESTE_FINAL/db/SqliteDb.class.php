<?php

namespace db;


class SqliteDb
{
	private $con; 
	function __construct()
	{
		$sqlite = "sqlite:".HOME."/db/project_manager.sqlite";
		$this->con = new \PDO($sqlite);	
	}
	
	function __destruct()
	{
		$this->con = null;	
	}
	
	function getCon()
	{
		return $this->con;
	}
}
?>