<?php 
define("HOME", getEnv("DOCUMENT_ROOT")."teknisa/TESTEFRONTEND/TESTE_FINAL/");

spl_autoload_register(function ($class) {

	$nome = str_replace("\\", "/" , $class . '.class.php');
	
	if( file_exists( HOME . $nome ) ){
		include_once( HOME . $nome );	
	}

});
?>