<!DOCTYPE html>
<html>
	<head>
	<?php echo $this -> element('head'); ?>
	<?php echo $this -> element('menutopo'); ?>
	</head>
	</style>
	<body>

		<div id="container">
			<!-- navbar top -->
			
			
			<?php //echo $this -> element('navbar-side'); ?>
			<div id="page-wrapper">
				<?php echo $this -> Session -> flash(); ?>
				<?php echo $this -> fetch('content'); ?>
			</div>

		</div>
	</body>

</html>
