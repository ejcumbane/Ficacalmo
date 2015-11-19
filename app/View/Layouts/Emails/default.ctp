<!DOCTYPE html>
<html>
	<head>
		  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

  	<!-- Latest compiled and minified JavaScript -->
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	</head>
	<?php echo $this -> element('head'); ?>
	</style>
	<body>

		<div id="container">
			<!-- navbar top -->
			
			<?php echo $this -> element('menutopo'); ?>
			<?php //echo $this -> element('navbar-side'); ?>
			<div id="main-content">
				<?php echo $this -> Session -> flash(); ?>
				<?php echo $this -> fetch('content'); ?>
			</div>

		</div>
	</body>

</html>
