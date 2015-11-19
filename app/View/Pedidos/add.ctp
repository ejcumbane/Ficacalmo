
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<style>
		#content {
			padding-left: 250px;
			padding-right: 250px;
		}
	</style>


	<div class="row"><br /><br />
				<section id="container" >
			<section id="content">
				<h3><i class="fa fa-angle-right"></i> Fazer pedido</h3>

				<!-- BASIC FORM ELELEMNTS -->
				<div class="row mt">

		<div class="col-md-12">
						<div class="form-panel">
							<h4 class="mb"><i class="fa fa-angle-right"></i> Fazer pedido</h4>
			<?php echo $this->Form->create('Pedido', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->hidden('registo', array('class' => 'form-control', 'default' => $_SESSION['current_user']));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('pizza_id', array('class' => 'form-control', 'placeholder' => 'Pizza Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ingrediente_id', array('class' => 'form-control', 'placeholder' => 'Ingrediente Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->hidden('estado', array('class' => 'form-control', 'placeholder' => 'Estado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Enviar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
