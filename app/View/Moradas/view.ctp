<div class="moradas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Morada'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Morada'), array('action' => 'edit', $morada['Morada']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Morada'), array('action' => 'delete', $morada['Morada']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $morada['Morada']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Moradas'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Morada'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Registos'), array('controller' => 'registos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Registo'), array('controller' => 'registos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($morada['Morada']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numcasa'); ?></th>
		<td>
			<?php echo h($morada['Morada']['numcasa']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Quarteirao'); ?></th>
		<td>
			<?php echo h($morada['Morada']['quarteirao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bairro'); ?></th>
		<td>
			<?php echo h($morada['Morada']['bairro']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Distrito'); ?></th>
		<td>
			<?php echo h($morada['Morada']['distrito']); ?>
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
	<h3><?php echo __('Related Registos'); ?></h3>
	<?php if (!empty($morada['Registo'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Apelido'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Nuit'); ?></th>
		<th><?php echo __('Numbi'); ?></th>
		<th><?php echo __('Morada Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($morada['Registo'] as $registo): ?>
		<tr>
			<td><?php echo $registo['id']; ?></td>
			<td><?php echo $registo['Nome']; ?></td>
			<td><?php echo $registo['Apelido']; ?></td>
			<td><?php echo $registo['Telefone']; ?></td>
			<td><?php echo $registo['Email']; ?></td>
			<td><?php echo $registo['Nuit']; ?></td>
			<td><?php echo $registo['Numbi']; ?></td>
			<td><?php echo $registo['morada_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'registos', 'action' => 'view', $registo['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'registos', 'action' => 'edit', $registo['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'registos', 'action' => 'delete', $registo['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $registo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Registo'), array('controller' => 'registos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
