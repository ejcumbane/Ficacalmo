<?php
App::uses('AppModel', 'Model');
/**
 * Pedido Model
 *
 * @property Pizza $Pizza
 * @property Ingrediente $Ingrediente
 */
class Pedido extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'registo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pizza_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ingrediente_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pizza' => array(
			'className' => 'Pizza',
			'foreignKey' => 'pizza_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ingrediente' => array(
			'className' => 'Ingrediente',
			'foreignKey' => 'ingrediente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
