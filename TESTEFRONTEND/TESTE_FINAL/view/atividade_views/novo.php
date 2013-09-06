<!DOCTYPE html>
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
	<div data-role="page" id="atividade-novo" data-add-back-btn="true">
		<div data-role="header">
			
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=login" class="ui-btn-right">Sair</a>
			<h1>Nova Atividade - Projeto <?php echo $projeto->getNome();?> </h1>
		</div>	
		
		<div data-role="content">
			<?php
			$action = "/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=cria-atividade";
			include "./view/atividade_views/_form.php";
			?>				
		</div>
		
		<div data-role="footer" data-position="fixed">
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=processa_login" class="ui-btn-left">Home</a>
			<h1>Criar uma nova atividade</h1>
		</div>		
	</div>
</body>
</html>
