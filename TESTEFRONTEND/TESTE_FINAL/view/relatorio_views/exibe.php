﻿<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title> Teknisa </title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/latest/jquery.mobile.min.css" />
	<script src="http://code.jquery.com/jquery.min.js"> </script>
	<script src="http://code.jquery.com/mobile/latest/jquery.mobile.min.js"></script>
</head>
<body>
	<div data-role="page" data-add-back-btn="true" id="relatorio-exibe">
		<div data-role="header">
			
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=login" class="ui-btn-right">Sair</a>
			<h1>Atividade <?php echo $atividade->getNome()." - Projeto ".$projeto->getNome();?> </h1>
		</div>	
		
		<div data-role="content">
			<h3>Autor</h3>
			<p><?php echo $empregado->getNome();?></p>
			
			<h3>Data</h3>
			<p><?php echo $relatorio->getData();?></p>
			
			<h3>Conteúdo</h3>
			<p><?php echo $relatorio->getDescricao();?></p>
			
			<hr />
			
			<h3>Projeto</h3>
			<p><?php echo $projeto->getNome();?></p>
			
			<h3>Atividade</h3>
			<p><?php echo $atividade->getNome();?></p>			
						
		</div>
		
		<div data-role="footer" data-position="fixed">
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=processa_login" class="ui-btn-left">Home</a>
			<h1>Relatório de Atividade <?php echo $atividade->getNome(). ", por ".$empregado->getNome();?></h1>
		</div>		
	</div>
</body>
</html>
