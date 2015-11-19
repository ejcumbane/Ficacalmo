<div class="ingredientes form">
<?php echo $this->Form->create('Ingrediente'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ingrediente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ingrediente.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Ingrediente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ingredientes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
