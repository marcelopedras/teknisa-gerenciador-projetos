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
	<div data-role="page" id="relatorio-edita" data-add-back-btn="true">
		<div data-role="header">
			
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=login" class="ui-btn-right">Sair</a>
			<h1>Atividade <?php echo $atividade->getNome()." - Projeto ".$projeto->getNome();?> </h1>
		</div>	
		
		<div data-role="content">
			<?php
			$action = "/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=atualiza-relatorio";
			include "./view/relatorio_views/_form.php";
			?>				
		</div>
		
		<div data-role="footer" data-position="fixed">
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=processa_login" class="ui-btn-left">Home</a>
			<a data-transition="slide" data-ajax="false" href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=destroi-relatorio&relatorio_id=<?php echo $relatorio->getId();?>" class="ui-btn-right">Apagar Relatório</a>
			<h1>Relatório de Atividade <?php echo $atividade->getNome(). ", por ".$empregado->getNome();?></h1>
		</div>		
	</div>
</body>
</html>
