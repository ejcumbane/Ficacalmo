<?php
App::uses('AppController', 'Controller');
/**
 * Ingredientes Controller
 *
 * @property Ingrediente $Ingrediente
 * @property PaginatorComponent $Paginator
 */
class IngredientesController extends AppController {

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
		$this->Ingrediente->recursive = 0;
		$this->set('ingredientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ingrediente->exists($id)) {
			throw new NotFoundException(__('Invalid ingrediente'));
		}
		$options = array('conditions' => array('Ingrediente.' . $this->Ingrediente->primaryKey => $id));
		$this->set('ingrediente', $this->Ingrediente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ingrediente->create();
			if ($this->Ingrediente->save($this->request->data)) {
				$this->Session->setFlash(__('The ingrediente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingrediente could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ingrediente->exists($id)) {
			throw new NotFoundException(__('Invalid ingrediente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ingrediente->save($this->request->data)) {
				$this->Session->setFlash(__('The ingrediente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingrediente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ingrediente.' . $this->Ingrediente->primaryKey => $id));
			$this->request->data = $this->Ingrediente->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ingrediente->id = $id;
		if (!$this->Ingrediente->exists()) {
			throw new NotFoundException(__('Invalid ingrediente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ingrediente->delete()) {
			$this->Session->setFlash(__('The ingrediente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ingrediente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
