<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
<style>
	body{
		background-image: url("../img/login-bg.jpg")
	}
</style>
	<body>

		<!-- **********************************************************************************************************************************************************
		MAIN CONTENT
		*********************************************************************************************************************************************************** -->

		<div id="login-page">
			<div class="container">
				<div class="form-login">

					<?php echo $this -> Session -> flash('auth'); ?>
					<?php
					//echo $this->Form->create(null,array('/posts/index'));
					echo $this -> Form -> create('User');
					?>

					<h2 class="form-login-heading">Acesso ao sistema</h2>
					<div class="login-wrap">
						<?php echo $this -> Form -> input('username', array('class'=>"form-control", 'label'=>FALSE, 'placeholder'=>"Digite username")); ?><br />
						<?php echo $this -> Form -> input('password', array('class'=>"form-control", 'label'=>FALSE,'placeholder'=>"Digite sua senha")); ?>
						<label class="checkbox"> <span class="pull-right"> <a data-toggle="modal" href="login.html#myModal"> Esqueceu a sua senha?</a> </span> </label>
						<button class="btn btn-theme btn-block" type="submit">
							<i class="fa fa-lock"></i> ENTRAR
						</button>
						<hr>

						<div class="login-social-link centered">
							<p>
								or you can sign in via your social network
							</p>
							<button class="btn btn-facebook" type="submit">
								<i class="fa fa-facebook"></i> Facebook
							</button>
							<button class="btn btn-twitter" type="submit">
								<i class="fa fa-twitter"></i> Twitter
							</button>
						</div>
						<div class="registration">
							Ainda não tem conta?
							<br/>
							<a class="" href="#"> Criar a conta </a>
						</div>

					</div>

					<!-- Modal -->
					<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title">Forgot Password ?</h4>
								</div>
								<div class="modal-body">
									<p>
										Enter your e-mail address below to reset your password.
									</p>
									<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

								</div>
								<div class="modal-footer">
									<button data-dismiss="modal" class="btn btn-default" type="button">
										Cancel
									</button>
									<button class="btn btn-theme" type="button">
										Submit
									</button>
								</div>
							</div>
						</div>
					</div>
					<!-- modal -->

					<?php echo $this -> Form -> end(); ?>
				</div>

			</div>
		</div>

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--BACKSTRETCH-->
		<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
		<script type="text/javascript" src=".../js/jquery.backstretch.min.js"></script>
		<script>
			$.backstretch("..img/login-bg.jpg", {
				speed : 500
			});
		</script>

	</body>
</html>
