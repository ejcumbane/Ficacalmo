<?php
App::uses('AppController', 'Controller');
/**
 * Registos Controller
 *
 * @property Registo $Registo
 * @property PaginatorComponent $Paginator
 */
class RegistosController extends AppController {

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
		$this->Registo->recursive = 0;
		$this->set('registos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Registo->exists($id)) {
			throw new NotFoundException(__('Invalid registo'));
		}
		$options = array('conditions' => array('Registo.' . $this->Registo->primaryKey => $id));
		$this->set('registo', $this->Registo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function addregisto() {
		if ($this->request->is('post')) {
			$this->Registo->create();
			if ($this->Registo->save($this->request->data)) {
				$this->Session->setFlash(__('The registo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('plugin'=>'admin', 'controller'=>'users','action' => 'addcliente'));
			} else {
				$this->Session->setFlash(__('The registo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Registo->exists($id)) {
			throw new NotFoundException(__('Invalid registo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Registo->save($this->request->data)) {
				$this->Session->setFlash(__('The registo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The registo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Registo.' . $this->Registo->primaryKey => $id));
			$this->request->data = $this->Registo->find('first', $options);
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
		$this->Registo->id = $id;
		if (!$this->Registo->exists()) {
			throw new NotFoundException(__('Invalid registo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Registo->delete()) {
			$this->Session->setFlash(__('The registo has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The registo could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
