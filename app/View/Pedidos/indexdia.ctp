  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

  	<!-- Latest compiled and minified JavaScript -->
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
			<style>
		#content {
			padding-left: 250px;
			padding-right: 50px;
		}
	</style>


	<div class="row"><br /><br />
				<section id="container" >
			<section id="content">
				<h3><i class="fa fa-angle-right"></i> Lista de Pedidos</h3>

				<!-- BASIC FORM ELELEMNTS -->
				<div class="row mt">

		<div class="col-md-12">
						<div class="form-panel">
							<h4 class="mb"><i class="fa fa-angle-right"></i> Todos os pedidos</h4>
							
			<?php
		// The base url is the url where we'll pass the filter parameters
		$base_url = array('plugin'=>null,'controller' => 'pedidos', 'action' => 'indexdia');
		echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
		// To reset all the filters we only need to redirect to the base_url
		
		echo "</div>";
		
		?>
			<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
				<tr>
					<td width="500"><?php echo $this->Form->input('search', array('class' => 'form-control', 'placeholder'=>'Inserir o dia...','label'=>FALSE));?></td>
					<td><button type="submit" href="#" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-search"></i> Buscar </button> </td>
					<td><?php echo $this->Html->link("Reset",$base_url, array('class'=>'btn btn-danger pull-left ', 'value'=>'Limpar'));  ?></td>
				</tr>
			</table>
		<?php echo $this->Form->end();?>
							
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('registo'); ?></th>
						<th><?php echo $this->Paginator->sort('pizza_id'); ?></th>
						<th><?php echo $this->Paginator->sort('ingrediente_id'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('estado'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($pedidos as $pedido): ?>
					<tr>
						<td><?php echo h($pedido['Pedido']['id']); ?>&nbsp;</td>
						<td><?php echo h($pedido['Pedido']['registo']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($pedido['Pizza']['name'], array('controller' => 'pizzas', 'action' => 'view', $pedido['Pizza']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($pedido['Ingrediente']['name'], array('controller' => 'ingredientes', 'action' => 'view', $pedido['Ingrediente']['id'])); ?>
		</td>
						<td><?php echo h($pedido['Pedido']['created']); ?>&nbsp;</td>
						<td><?php echo h($pedido['Pedido']['estado']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $pedido['Pedido']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $pedido['Pedido']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $pedido['Pedido']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->