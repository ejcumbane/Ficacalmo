
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
				<h3><i class="fa fa-angle-right"></i> Registo de Cliente</h3>

				<!-- BASIC FORM ELELEMNTS -->
				<div class="row mt">

		<div class="col-md-12">
						<div class="form-panel">
							<h4 class="mb"><i class="fa fa-angle-right"></i> Dados de Cliente</h4>			
			<?php echo $this->Form->create('Registo', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('apelido', array('class' => 'form-control', 'placeholder' => 'Apelido'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone', array('class' => 'form-control', 'placeholder' => 'Telefone'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nuit', array('class' => 'form-control', 'placeholder' => 'Nuit'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('numbi', array('class' => 'form-control', 'placeholder' => 'Numbi'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('casa', array('class' => 'form-control', 'placeholder' => 'Casa'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('quarteirao', array('class' => 'form-control', 'placeholder' => 'Quarteirao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'placeholder' => 'Bairro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('distrito', array('class' => 'form-control', 'placeholder' => 'Distrito'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
