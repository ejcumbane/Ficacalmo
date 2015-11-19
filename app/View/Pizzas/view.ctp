<div class="pizzas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Pizza'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Pizza'), array('action' => 'edit', $pizza['Pizza']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Pizza'), array('action' => 'delete', $pizza['Pizza']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pizza['Pizza']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Pizzas'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Pizza'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Categorias'), array('controller' => 'categorias', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Categoria'), array('controller' => 'categorias', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Pedidos'), array('controller' => 'pedidos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Pedido'), array('controller' => 'pedidos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($pizza['Pizza']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($pizza['Pizza']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo'); ?></th>
		<td>
			<?php echo h($pizza['Pizza']['Tipo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Preco'); ?></th>
		<td>
			<?php echo h($pizza['Pizza']['Preco']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ingredientes'); ?></th>
		<td>
			<?php echo h($pizza['Pizza']['Ingredientes']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fotos'); ?></th>
		<td>
			<?php echo h($pizza['Pizza']['Fotos']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Categoria'); ?></th>
		<td>
			<?php echo $this->Html->link($pizza['Categoria']['name'], array('controller' => 'categorias', 'action' => 'view', $pizza['Categoria']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Pedidos'); ?></h3>
	<?php if (!empty($pizza['Pedido'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Registo'); ?></th>
		<th><?php echo __('Pizza Id'); ?></th>
		<th><?php echo __('Ingrediente Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($pizza['Pedido'] as $pedido): ?>
		<tr>
			<td><?php echo $pedido['id']; ?></td>
			<td><?php echo $pedido['registo']; ?></td>
			<td><?php echo $pedido['pizza_id']; ?></td>
			<td><?php echo $pedido['ingrediente_id']; ?></td>
			<td><?php echo $pedido['created']; ?></td>
			<td><?php echo $pedido['estado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'pedidos', 'action' => 'view', $pedido['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'pedidos', 'action' => 'edit', $pedido['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'pedidos', 'action' => 'delete', $pedido['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pedido['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Pedido'), array('controller' => 'pedidos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
