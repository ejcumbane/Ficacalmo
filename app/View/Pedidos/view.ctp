<div class="pedidos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Pedido'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Pedido'), array('action' => 'edit', $pedido['Pedido']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Pedidos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Pedido'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Pizzas'), array('controller' => 'pizzas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Pizza'), array('controller' => 'pizzas', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Ingredientes'), array('controller' => 'ingredientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Ingrediente'), array('controller' => 'ingredientes', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($pedido['Pedido']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Registo'); ?></th>
		<td>
			<?php echo h($pedido['Pedido']['registo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Pizza'); ?></th>
		<td>
			<?php echo $this->Html->link($pedido['Pizza']['name'], array('controller' => 'pizzas', 'action' => 'view', $pedido['Pizza']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ingrediente'); ?></th>
		<td>
			<?php echo $this->Html->link($pedido['Ingrediente']['name'], array('controller' => 'ingredientes', 'action' => 'view', $pedido['Ingrediente']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($pedido['Pedido']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Estado'); ?></th>
		<td>
			<?php echo h($pedido['Pedido']['estado']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

