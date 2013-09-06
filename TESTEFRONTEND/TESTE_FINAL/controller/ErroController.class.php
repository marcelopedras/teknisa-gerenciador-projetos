<?php

namespace controller;

class ErroController
{
	function exibeErroRedirecionamento()
	{
		header("location:./view/erro_views/exibeErroRedirecionamento.html");
		//include "./view/erro_views/exibeErroRedirecionamento.html";
		
	}
	
	function exibeErroLogin()
	{
		header("location:./view/erro_views/exibeErroLogin.html");
		//echo 'deu erro';	
	}
	
	private function destroiSessao()
	{
		//TODO - Fazer destruir sessao
	}
}
?>