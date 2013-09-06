<?php

namespace lib;

class Roteador
{
	private $_rotas = array();
	private $_acoes = array();
	
	function __construct($rota_default, $controle_default, $acao_default, $rota_error, $controle_error, $acao_error)
	{
		$this->_rotas['default'] = $rota_default;
		$this->_acoes['default'] = array('controller' => $controle_default,
								'action' => $acao_default);
								
		$this->_rotas['error'] = $rota_error;
		$this->_acoes['error'] = array('controller' => $controle_error,
								'action' => $acao_error);
	}
	
	function novaRota($rota, $controle, $acao)
	{
		$this->_rotas[] = $rota;
		$this->_acoes[] = array('controller' => $controle,
								'action' => $acao);
	}
	
	function rotear($rota)
	{
		$chave = array_search($rota, $this->_rotas);
		
		if($chave === false)
		{
			$chave = 'error';
		}		
		
		//echo "Controller: " . $this->_acoes[$chave]['controller'] ."<br />";
		//echo "Action: " . $this->_acoes[$chave]['action'] ."<br />";
		$class = '\\controller\\'.$this->_acoes[$chave]['controller'];
		$method = $this->_acoes[$chave]['action'];
		call_user_func(array(new $class(), $method));		
	} 
	
	function exibeMapeamento()
	{
		echo "Rotas Válidas <br />";
		var_dump($this->_rotas);
		echo "<br /><hr />";
		echo "Mapeamento Controller/Action <br />";
		var_dump($this->_acoes);
	}	
}
?>