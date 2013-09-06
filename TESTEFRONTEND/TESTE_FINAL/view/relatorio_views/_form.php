
<form id="relatorio-form" action="<?php echo $action ?>" data-transition="slide" data-ajax="false" method="post">
	
	<input type="hidden" name="id" value="<?php echo $relatorio->getId();?>"></input>
	<div>
		<label for="atividades">Atividade</label>
		<select name="atividades">			
			<?php foreach($atividades as $atividade){?>
				<option value="<?php echo $atividade->getId();?>"<?php if($atividade->getId() === $atividade_selecionada){echo 'selected="true"';}?>><?php echo $atividade->getNome();?></option>
			<?php }?>
		</select>
	</div>

	<div>
		<label for="data">Data</label>
		<input type="date" name="data" value="<?php echo $relatorio->getData();?>"></input>
	</div>
	
	<div>
		<label for="descricao">Descrição</label>
		<textarea type="date" name="descricao"><?php echo $relatorio->getDescricao();?></textarea>
	</div>
		<input type="submit" value="Enviar"></input>
</form>
