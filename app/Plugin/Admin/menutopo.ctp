<ul class="actions"> 
<!-- Menu de topo -->
	<?php 
/*
Chamar no layout, abaixo da div <div id="header">
		<?php echo $this->element('menutopo');//Aqui?>
*/
	$grupo = $current_user['group_id'];
	$user=$current_user['username'];
	if(!$user) $user='Não logado!';

	if($user=='Não logado!'){
		echo $this->Html->link(__('Login'), '/login'); 
	}else{
		if($grupo ==1){
			echo $this->Html->link(__('Usuários'), '/users'); 
			echo $this->Html->link(__('Grupos'), '/groups'); 
			echo $this->Html->link(__('Privilégios'), '/privileges'); 
			echo '&nbsp;'.$this->Html->link(__('Posts'), array('plugin'=>null,'controller'=>'posts','action'=>'index')); 
/*			echo $this->Html->link(__('Funcionários'), array('controller'=>'funcionarios','action'=>'index'));
			echo $this->Html->link(__('Produtos'), array('controller'=>'produtos','action'=>'index'));
			echo $this->Html->link(__('Pedidos'), array('controller'=>'pedidos','action'=>'index'));*/
			echo '&nbsp;'.$this->Html->link(__('Logout'), array('plugin'=>'admin','controller'=>'users','action'=>'logout'));
		}else{
			echo $this->Html->link(__('Posts'), array('plugin'=>null,'controller'=>'posts','action'=>'index')); 
/*			echo $this->Html->link(__('Funcionários'), array('controller'=>'funcionarios','action'=>'index'));
			echo $this->Html->link(__('Produtos'), array('controller'=>'produtos','action'=>'index'));
			echo $this->Html->link(__('Pedidos'), array('controller'=>'pedidos','action'=>'index'));*/
			echo '&nbsp;'.$this->Html->link(__('Logout'), array('plugin'=>'admin','controller'=>'users','action'=>'logout'));
		}
	}
		echo '&nbsp;&nbsp;&nbsp;Logado como: '. $user; 
	?>
</ul> 
