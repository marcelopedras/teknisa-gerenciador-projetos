
<form id="atividade-form" action="<?php echo $action ?>" data-transition="slide" data-ajax="false" method="post">
	
	<input type="hidden" name="atividade_id" value="<?php echo $atividade->getId();?>"></input>
	
	
	<div>
		<label for="atividade">Nome</label>
		<input type="text" name="nome" value="<?php echo $atividade->getNome();?>"></input>
	</div>
	
	<div>
		<label for="descricao">Descrição</label>
		<textarea type="date" name="descricao"><?php echo $atividade->getDescricao();?></textarea>
	</div>
	
	<div>
		<label for="data_inicio">Data de Início</label>
		<input type="date" name="data_inicio" value="<?php echo $atividade->getDataInicio();?>"></input>
	</div>
	
	<div>
		<label for="data_termino">Data de Término</label>
		<input type="date" name="data_termino" value="<?php echo $atividade->getDataTermino();?>"></input>
	</div>
	
	<div>
		<label for="representantes">Representante</label>
		<select name="representantes">			
			<?php foreach($representantes as $representante){?>
				<option value="<?php echo $representante->getId();?>"<?php if($representante->getId() === $representante_selecionado){echo 'selected="true"';}?>><?php echo $representante->getNome();?></option>
			<?php }?>
		</select>
	</div>
	
	<input type="submit" value="Enviar"></input>
</form>
