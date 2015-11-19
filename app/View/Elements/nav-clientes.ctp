		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              	
              					<?php $user = $current_user['username'];
				if (!$user)
					$user = 'Logado como!';
				?>
              
              	  <p class="centered"><a href="#">
           
              	  	
              	  	<img src="img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo "".$user; ?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Pizzas</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo $this -> Html -> url(array('plugin' => null, 'controller' => 'pedidos', 'action' => 'add')); ?>" >
                          <i class="fa fa-desktop"></i>
                          <span>Fazer pedidos</span>
                      </a>

              </ul>
              <!-- sidebar menu end-->
          </div>

