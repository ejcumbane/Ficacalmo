<?php
App::uses('AppController', 'Controller');
/**
 * Pizzas Controller
 *
 * @property Pizza $Pizza
 * @property PaginatorComponent $Paginator
 */
class PizzasController extends AppController {

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
		$this->Pizza->recursive = 0;
		$this->set('pizzas', $this->Paginator->paginate());
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
							array('Pizza.tipo LIKE' => '%' . $value . '%')
						);
					} else {
						$conditions['Pizza.'.$param_name] = $value;
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		$this->Pizza->recursive = 0;
		$this->paginate = array('limit' => 15, 'conditions' => $conditions, 'order' => array('Pizza.tipo' => 'desc'));
		$this->set('pizzas', $this->paginate());


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
		if (!$this->Pizza->exists($id)) {
			throw new NotFoundException(__('Invalid pizza'));
		}
		$options = array('conditions' => array('Pizza.' . $this->Pizza->primaryKey => $id));
		$this->set('pizza', $this->Pizza->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pizza->create();
			if ($this->Pizza->save($this->request->data)) {
				$this->Session->setFlash(__('The pizza has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pizza could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$categorias = $this->Pizza->Categoria->find('list');
		$this->set(compact('categorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pizza->exists($id)) {
			throw new NotFoundException(__('Invalid pizza'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pizza->save($this->request->data)) {
				$this->Session->setFlash(__('The pizza has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pizza could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Pizza.' . $this->Pizza->primaryKey => $id));
			$this->request->data = $this->Pizza->find('first', $options);
		}
		$categorias = $this->Pizza->Categoria->find('list');
		$this->set(compact('categorias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pizza->id = $id;
		if (!$this->Pizza->exists()) {
			throw new NotFoundException(__('Invalid pizza'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pizza->delete()) {
			$this->Session->setFlash(__('The pizza has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pizza could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
