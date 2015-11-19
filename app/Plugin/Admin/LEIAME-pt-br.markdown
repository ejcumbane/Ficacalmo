# Plugin Admin para CakePHP

Objetivo - controlar o acesso dos usuários ao aplicativo. Ele controla o acesso a cada action de cada controller.
O controle associa o grupo do usuário ao action, gravando numa tabela. Quando cadastramos um grupo com um action, o componente garantirá acesso para todos os usuários do grupo nesse action.

Além de controlar os usuários ele também vem com um pequeno menu que mostra para os usuários somente os controllers que ele tem acesso.


## Requisitos

Não use tabelas com nomes users, groups nem privileges. Caso já tenha, precisará fazer as adaptações


## Passos:

- Seu aplicativo deve estar concluído. Caso não tenha, crie pelo menos o exemplo de blog.

- Caso seu aplicativo não seja um aplicativo de testes, recomenda-se um backup completo do seu aplicativo (todos os arquivos e todo o banco) antes de continuar

- Download
	https://github.com/ribafs/cakeadmin

- Faça o download, descompacte e renomeie a pasta para Admin

- Copie toda a pasta Admin para app/Plugin. 
	Obs.: Se estiver usando um Linux precisa garantir que o Apache possa escrever também na pasta Admin.

- Importar para seu banco o script admin.sql, que contem as tabelas users, groups e privileges

- Adicione ao app/Config/bootstrap.php:
CakePlugin::load('Admin', array('bootstrap' => false, 'routes' => true));

- Copie os seguintes arquivos para seu aplicativo:

cake.admin.css app/webroot/css
menutopo.ctp app/View/Elements
default.ctp app/View/Layouts Sobrescreva o existente ou apenas adicione a linha seguinte ao default.ctp:

			Adicione abaixo da div Header, como abaixo:
		<div id="header">
			<?php echo $this->element('menutopo');?>

## Adicionar Usuários

Sugestão para testes:

Usuário do grupo admins
login - admin
senha - admin

Usuário do grupo managers
login - manager
senha - manager

Acesse
http://localhost/posts/users

Não se preocupe com os dois Notices acima. Logo corrigiremos.
Adicione os dois usuários.


## Adicionar ao AppController.php:
Ajuste o nome do controller posts de acordo com o seu, caso seja diferente.

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


## PRONTO

Já pode testar. Acesse:
http://localhost/posts
E tente acessar os actions add ou edit, por exemplo.


## Cadastrando as Permissões

Acesse como admin e cadastre todas os actions cujo acesso deseja tornar restrito.
Observe que as permissões para os controllers Users, Groups e Privileges já estão cadastradas e todas dão acesso somente ao admin. Altere se achar por bem.
Apenas cadastre agora as permissões das tabelas do seu aplicativo, as tabelas de conteúdo:
http://localhost/posts/privileges

Atente para não esquecer nenhum privilégio. Os que esquecer ou deixar de fora irão permitir acesso sem login.


## Actions Não Cadastrados

Os actions não cadastrados mostrarão a mensagem "Privilégio não cadastrado!".
Basta que cadastre este action para o usuário manager que a mensagem desaparecerá.


## Menu de topo

Após instalar e configurar o AccessControl faça os ajustes necessário no Elements/menutopo.ctp para adicionar suas tabelas e remover as que não deseja que apareças.


## Licença

Este componente é distribuído com a mesma licença do CakePHP, que é a licença MIT.


