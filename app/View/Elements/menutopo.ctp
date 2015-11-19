	<?php 
	$grupo = $current_user['group_id'];
	$user=$current_user['username'];
	if(!$user) $user='Não logado!';

	if($user=='Não logado!'){
		echo $this -> element('login');
		
	}else{
		if($grupo ==1){
			echo $this -> element('admin');
		}else{
			echo $this -> element('clientes');

		}
	}
	?>
