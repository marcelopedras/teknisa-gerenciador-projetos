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
	<div data-role="page" id="projeto-exibe" data-add-back-btn="true">
		<div data-role="header">			
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=login" class="ui-btn-right">Sair</a>
			<h1>Projeto <?php echo $projeto->getNome();?> </h1>			
		</div>	
		
		<div data-role="content">
			<h3>Nome do Projeto</h3>
			<p><?php echo $projeto->getNome();?></p>
			
			<h3>Descrição</h3>
			<p><?php echo $projeto->getDescricao();?></p>
			
			<h3>Data de início</h3>
			<p><?php echo $projeto->getDataInicial();?></p>
			
			<h3>Data de término</h3>
			<p><?php echo $projeto->getDataFinal();?></p>
			<hr />
			<h3>Cliente</h3>
			<p><?php echo $cliente->getNome();?></p>
			
			<h3>Telefone</h3>
			<p><?php echo $cliente->getTelefone();?></p>
			
			<h3>Endereço</h3>
			<p><?php echo $cliente->getEndereco();?></p>
			
		</div>
		
		<div data-role="footer" data-position="fixed">
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=processa_login" class="ui-btn-left">Home</a>
			<h1>Teknisa</h1>
		</div>		
	</div>
</body>
</html>
