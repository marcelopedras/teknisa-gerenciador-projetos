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
	<div data-role="page" id="representante-exibe">
		<div data-role="header">
			<a data-transition="slide" data-direction="reverse" href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=lista-atividades&projeto_id=<?php echo $projeto->getId();?>">Atividades</a>
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=login" class="ui-btn-right">Sair</a>
			<h1>Atividade <?php echo $atividade->getNome()." - Projeto ".$projeto->getNome();?> </h1>
			<div data-role="navbar">
				<ul>
					<li><a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=exibe-atividade&atividade_id=<?php echo $atividade->getId();?>">Exibe Atividade</a></li>
					<li><a class="ui-btn-active ui-state-persist" href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=exibe-representante&atividade_id=<?php echo $atividade->getId();?>">Exibe Representante</a></li>
					<li><a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=lista-relatorios-atividade&atividade_id=<?php echo $atividade->getId();?>">Lista Relatórios</a></li>
				</ul>
			</div>
			
		</div>	
		
		<div data-role="content">
			<h3>Nome do Representante</h3>
			<p><?php echo $representante->getNome();?></p>
			
			<h3>Cargo</h3>
			<p><?php echo $representante->getCargo();?></p>
			
			<h3>Telefone</h3>
			<p><?php echo $representante->getTelefone();?></p>			
			
			<h3>Projeto</h3>
			<p><?php echo $projeto->getNome();?></p>
			
			<h3>Atividade</h3>
			<p><?php echo $atividade->getNome();?></p>
			
		</div>
		
		<div data-role="footer" data-position="fixed">
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=processa_login" class="ui-btn-left">Home</a>
			<h1>Representante da Atividade</h1>
		</div>		
	</div>
</body>
</html>
