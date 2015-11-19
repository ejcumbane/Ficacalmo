<?php
/**
 * Component AccessControl
 * For CakePHP 2.x
 * Autor: Ribamar FS
 *
 * This component allow access control to each action from application with web interface.
 *
 * Licenced with The MIT License
 * Redistributions require keep copyright below.
 *
 * @copyright     Copyright (c) Ribamar FS (http://ribafs.org)
 * @link          http://ribafs.org
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Component', 'Controller');

class AccessControlComponent extends Component{

//	public $uses = array('Privilege','Group');
	public $components = array('Session','Auth');

	public function startup(Controller $controller) {
		$this->Controller = $controller;
	}

	public function access($controller,$action){
		$this->Privilege = ClassRegistry::init('Privilege');// Allow model use in component
		$this->Group = ClassRegistry::init('Group');

		$group = $this->Privilege->find('first', array(
	            'conditions'=>array('Privilege.controller'=>$controller,'Privilege.action'=>$action),
	            'fields'=>array('Privilege.group_name')
	        ));

		if(isset($group['Privilege']['group_name'])){
			$group = $group['Privilege']['group_name'];
			return $group;
		}else{
			return false;	
		}
	}
}
