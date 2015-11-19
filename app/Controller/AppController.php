<?php

App::uses('Controller', 'Controller');
class AppController extends Controller {

	public $components = array(
		'Session','Admin.AccessControl',
		'Auth' => array(
		    'loginRedirect' => array('plugin'=>null,'controller' => 'posts', 'action' => 'index'),
		    'logoutRedirect' => array('plugin'=>null,'controller' => 'posts', 'action' => 'index'),
			'loginAction'    => '/admin/users/login',
			'authError' 	=> '',
		    'authorize' => array('Controller')
		)
	);

	public function beforeFilter(){
		parent::beforeFilter();
		//$this->layout = 'bootstrap';
		$this->set('title_for_layout','Pizzaria FicaCalmo');
		$this->set('current_user', $this->Auth->user());
		$controller=$this->params['controller']; 
		$action=$this->params['action']; 
		$user = $this->Auth->user();
		$_SESSION['current_user']=$user['username'];
		$groupid=$user['group_id'];

        $this->Auth->allow('index', 'addregisto', 'addcliente');//'add'

		if($action != 'index'){// || $action != 'add'
			if(($this->AccessControl->access($controller,$action) == 'admins') && ($groupid ==1)){
				//
			}elseif(($this->AccessControl->access($controller,$action) == 'managers') && ($groupid ==2)){
				//
			}else{
				if($this->AccessControl->access($controller,$action) == false){
					//$this->Session->setFlash(__('Privilégio não cadastrado/Acesso Negado!'));
				}else{
					$this->redirect(array('plugin'=>'admin','controller' => 'users', 'action' => 'login'));
				}
			}
		}

	} 

	public function isAuthorized($user) {
		return true;
	}

}
