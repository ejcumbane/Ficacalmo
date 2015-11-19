<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css(
			array(
				'bootstrap.min',
				'font-awesome',
				'style',
				'bootstrap-theme.min',
				'bootstrap-theme',
				'bootstrap.min',
				'bootstrap-fullcalendar',
				'jquery.easy-pie-chart',
				'jquery.fancybox',
				'jquery.gritter',
				'jquery.gritter0',
				'style-responsive',
				'table-responsive',
				'to-do',
				'zabuto_calendar'
				));
				
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script(
			array(
				'bootstrap.min',
				'bootstrap-inputmask.min',
				'bootstrap-switch',
				'calendar-conf-events',
				'Chart',
				'chartjs-conf',
				'common-scripts',
				'easy-pie-chart',
				'form-component',
				'fullcalendar.min',
				'gritter-conf',
				'jquery.backstretch.min',
				'jquery.dcjqaccordion.2.7',
				'jquery.easy-pie-chart',
				'jquery.fancybox',
				'jquery.gritter',
				'jquery.nicescroll',
				'jquery.scrollTo.min',
				'jquery.sparkline',
				'jquery.tagsinput',
				'jquery.ui.touch-punch.min',
				'jquery-1.8.3.min',
				'jquery-ui-1.9.2.custom.min',
				'morris-conf',
				'sparkline-chart',
				'tasks',
				'zabuto_calendar',
		
		));
	?>
</head>