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
	<div data-role="page" id="lista-relatorios-empregado">
		<div data-role="header">			
			<a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=login" class="ui-btn-right">Sair</a>
			<h1>Meus Relatórios do Projeto - <?php echo $projeto->getNome();?></h1>
			
			<div data-role="navbar">
				<ul>
					<li><a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=processa_login">Projeto</a></li>
					<li><a href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=lista-atividades&projeto_id=<?php echo $projeto->getId();?>">Atividades</a></li>
					<li><a class="ui-btn-active ui-state-persist" href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=lista-relatorios-empregado&empregado_id=<?php echo $empregado->getId();?>">Meus Relatórios</a></li>
				</ul>
			</div>
		</div>	
		
		<div data-role="content">
			<ol data-role="listview" data-filter="true" data-inset="true" data-split-icon="gear">
			<?php for($i=0; $i< count($relatorios); $i++){?>
			
				<li>
					<a data-transition="slide" href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=exibe-relatorio&relatorio_id=<?php echo $relatorios[$i]->getId();?>"><?php echo $relatorios[$i]->getData()." - ". $atividades[$i]->getNome();?></a>
					<a data-transition="slide" href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=edita-relatorio&relatorio_id=<?php echo $relatorios[$i]->getId();?>">Editar</a>					
				</li>
			
			<?php }?>
			</ol>
		</div>
		
		<div data-role="footer" data-position="fixed">
		<a data-transition="slide" href="/teknisa/TESTEFRONTEND/TESTE_FINAL/index.php?rota=novo-relatorio&projeto_id=<?php echo $projeto->getId();?>" class="ui-btn-left">Adicionar Relatório</a>
			<h1>Teknisa</h1>
		</div>		
	</div>
</body>
</html>
