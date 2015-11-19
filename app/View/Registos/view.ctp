<div class="registos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Registo'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Registo'), array('action' => 'edit', $registo['Registo']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Registo'), array('action' => 'delete', $registo['Registo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $registo['Registo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Registos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Registo'), array('action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($registo['Registo']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($registo['Registo']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Apelido'); ?></th>
		<td>
			<?php echo h($registo['Registo']['apelido']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone'); ?></th>
		<td>
			<?php echo h($registo['Registo']['telefone']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($registo['Registo']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nuit'); ?></th>
		<td>
			<?php echo h($registo['Registo']['nuit']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numbi'); ?></th>
		<td>
			<?php echo h($registo['Registo']['numbi']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Casa'); ?></th>
		<td>
			<?php echo h($registo['Registo']['casa']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Quarteirao'); ?></th>
		<td>
			<?php echo h($registo['Registo']['quarteirao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bairro'); ?></th>
		<td>
			<?php echo h($registo['Registo']['bairro']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Distrito'); ?></th>
		<td>
			<?php echo h($registo['Registo']['distrito']); ?>
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
	<?php if (!empty($registo['Pedido'])): ?>
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
	<?php foreach ($registo['Pedido'] as $pedido): ?>
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
