<?php
App::uses('AppController', 'Controller');
/**
 * Moradas Controller
 *
 * @property Morada $Morada
 * @property PaginatorComponent $Paginator
 */
class MoradasController extends AppController {

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
		$this->Morada->recursive = 0;
		$this->set('moradas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Morada->exists($id)) {
			throw new NotFoundException(__('Invalid morada'));
		}
		$options = array('conditions' => array('Morada.' . $this->Morada->primaryKey => $id));
		$this->set('morada', $this->Morada->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Morada->create();
			if ($this->Morada->save($this->request->data)) {
				$this->Session->setFlash(__('The morada has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The morada could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Morada->exists($id)) {
			throw new NotFoundException(__('Invalid morada'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Morada->save($this->request->data)) {
				$this->Session->setFlash(__('The morada has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The morada could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Morada.' . $this->Morada->primaryKey => $id));
			$this->request->data = $this->Morada->find('first', $options);
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
		$this->Morada->id = $id;
		if (!$this->Morada->exists()) {
			throw new NotFoundException(__('Invalid morada'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Morada->delete()) {
			$this->Session->setFlash(__('The morada has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The morada could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
