# Plugin Admin for CakePHP

## Goal 

To control user access to application. It controls access to each action of each controller.
The setting are recorded in a table. 

Also have a menu what display to users only the controllers that they have access.


## Requirements

Dont use table names with: users, groups or privileges. If you already have tables with this names, you need to make adaptations.

## Steps:

- Import for your database the script accesscontrol.sql, which contains the tables users, groups, and privileges

- If your application is not an application of tests, it is recommended a complete backup of your application (all files and all the bank) before continuing

- Add to app/Config/bootstrap.php:
CakePlugin::load('Admin', array('bootstrap' => false, 'routes' => true));

- Copy the files below to your application:

cake.admin.css to app/webroot/css
menutopo.ctp to app/View/Elements
default.ctp to app/View/Layouts 	Overwrite your or add the line to your default.ctp:			

		<div id="header">
			<?php echo $this->element('menutopo');?>

## Change Passwords

When we change the database server the hash of the passwords from users are no longer recognized.
We need to edit the passwords for each user so that they return to work.

user - admin
pass - admin
Also to user manager.

Access
http://localhost/posts/users

Edit the admin password and the manager password. Only use admin for the admin user and manager to manager user and Save.


## Add to AppController.php:
Adjust the name of posts controller to your application.

	public $components = array(
		'Session','Admin.AccessControl',
		'Auth' => array(
		    'loginRedirect' => array('plugin'=>null,'controller' => 'posts', 'action' => 'index'),
		    'logoutRedirect' => array('plugin'=>'admin','controller' => 'users', 'action' => 'login'),
			'loginAction'    => '/admin/users/login',
			'authError' 	=> 'Faça login antes!',
		    'authorize' => array('Controller')
		)
	);

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout','Seção de Administração para o Aplicativo');
		$this->set('current_user', $this->Auth->user());
		$controller=$this->params['controller']; 
		$action=$this->params['action']; 
		$user = $this->Auth->user();
		$groupid=$user['group_id'];

        $this->Auth->allow('index');//'add'

		if($action != 'index'){// || $action != 'add'
			if(($this->AccessControl->access($controller,$action) == 'admins') && ($groupid ==1)){
				//
			}elseif(($this->AccessControl->access($controller,$action) == 'managers') && ($groupid ==2)){
				//
			}else{
				if($this->AccessControl->access($controller,$action) == false){
					$this->Session->setFlash(__('Privilégio não cadastrado/Acesso Negado!'));
				}else{
					$this->redirect(array('plugin'=>'admin','controller' => 'users', 'action' => 'login'));
				}
			}
		}

	} 

	public function isAuthorized($user) {
		return true;
	}


## READY

Now you can test. go to:
http://localhost/posts
And try to access add or edit actions, for example.


## Registering Permissions

Log in as admin and register all actions whose access you want to become restricted.
Note that the permissions for the controllers Users, Groups and Privileges are already registered and all give access only to the admin. Change it sees fit.
Just register now permissions of your application tables, tables of contents:
http://localhost/posts/privileges

Be careful not to overlook any privilege. Those who forget or leave out will allow access without login.

## Actions not Registereds

The actions that are not registered will show the message "Privilege not registered".
Just register this action to the user manager that the message will disappear.

## Top Menu

After installing and configuring the AccessControl make the adjustments necessary in Elements/menutopo.ctp to add your tables and remove those that do not want you to appear.

## License

This component is distributed under the same CakePHP license, which is the MIT license.


