<?php
App::uses('AppController', 'Controller');
/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 * @property PaginatorComponent $Paginator
 */
class PedidosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pedido->recursive = 0;
		$this->set('pedidos', $this->Paginator->paginate());
	}


	public function indexdia() {
		$this->helpers[] = "Time";
		$this->helpers[] = "Number";
		$conditions = array();
		//Transformar POST em GET
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action'] = $this->request->params['action'];
			//  Precisamos substituir a página de cada vez que alterar os parâmetros
			$filter_url['page'] = 1;

			// Para cada filtro, vamos adicionar um parâmetro GET para a url gerada
			foreach($this->data['Filter'] as $name => $value){
				if($value){
					// Você pode querer higienizar o valor R $ aqui
					// ou até mesmo fazer um urlencode para ter certeza
					$filter_url[$name] = urlencode($value);
				}
			}	
			// agora que temos gerado uma URL com parâmetros GET, 
			// vamos redirecionar para essa página
			return $this->redirect($filter_url);
		} else {
			// Inspecione todos os parâmetros nomeados para aplicar os filtros
			foreach($this->params['named'] as $param_name => $value){
				// Não se aplicam os parâmetros padrão chamado utilizados para a paginação
				if(!in_array($param_name, array('page','sort','direction','limit'))){
					// Você pode usar um interruptor aqui para fazer filtros especiais
					// Você gosta "entre as datas", "maior que", etc.
					if($param_name == "search"){
						$conditions['OR'] = array(
							array('Pedido.created LIKE' => '%' . $value . '%')
						);
					} else {
						$conditions['Pedido.'.$param_name] = $value;
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		$this->Pedido->recursive = 0;
		$this->paginate = array('limit' => 15, 'conditions' => $conditions, 'order' => array('Pedido.created' => 'desc'));
		$this->set('pedidos', $this->paginate());


		// Passe o parâmetro de busca para destacar o texto
		$this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pedido->exists($id)) {
			throw new NotFoundException(__('Invalid pedido'));
		}
		$options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
		$this->set('pedido', $this->Pedido->find('first', $options));
	}


public function indextipo() {
		$this->helpers[] = "Time";
		$this->helpers[] = "Number";
		$conditions = array();
		//Transformar POST em GET
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action'] = $this->request->params['action'];
			//  Precisamos substituir a página de cada vez que alterar os parâmetros
			$filter_url['page'] = 1;

			// Para cada filtro, vamos adicionar um parâmetro GET para a url gerada
			foreach($this->data['Filter'] as $name => $value){
				if($value){
					// Você pode querer higienizar o valor R $ aqui
					// ou até mesmo fazer um urlencode para ter certeza
					$filter_url[$name] = urlencode($value);
				}
			}	
			// agora que temos gerado uma URL com parâmetros GET, 
			// vamos redirecionar para essa página
			return $this->redirect($filter_url);
		} else {
			// Inspecione todos os parâmetros nomeados para aplicar os filtros
			foreach($this->params['named'] as $param_name => $value){
				// Não se aplicam os parâmetros padrão chamado utilizados para a paginação
				if(!in_array($param_name, array('page','sort','direction','limit'))){
					// Você pode usar um interruptor aqui para fazer filtros especiais
					// Você gosta "entre as datas", "maior que", etc.
					if($param_name == "search"){
						$conditions['OR'] = array(
							array('Pedido.pizza_id LIKE' => '%' . $value . '%')
						);
					} else {
						$conditions['Pedido.'.$param_name] = $value;
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		$this->Pedido->recursive = 0;
		$this->paginate = array('limit' => 15, 'conditions' => $conditions, 'order' => array('Pedido.created' => 'desc'));
		$this->set('pedidos', $this->paginate());


		// Passe o parâmetro de busca para destacar o texto
		$this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");
	}




/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pedido->create();
			if ($this->Pedido->save($this->request->data)) {
				$this->Session->setFlash(__('The pedido has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pedido could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$pizzas = $this->Pedido->Pizza->find('list');
		$ingredientes = $this->Pedido->Ingrediente->find('list');
		$this->set(compact('pizzas', 'ingredientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pedido->exists($id)) {
			throw new NotFoundException(__('Invalid pedido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pedido->save($this->request->data)) {
				$this->Session->setFlash(__('The pedido has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pedido could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
			$this->request->data = $this->Pedido->find('first', $options);
		}
		$pizzas = $this->Pedido->Pizza->find('list');
		$ingredientes = $this->Pedido->Ingrediente->find('list');
		$this->set(compact('pizzas', 'ingredientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pedido->id = $id;
		if (!$this->Pedido->exists()) {
			throw new NotFoundException(__('Invalid pedido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pedido->delete()) {
			$this->Session->setFlash(__('The pedido has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pedido could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
