<?php
App::uses('Ingrediente', 'Model');

/**
 * Ingrediente Test Case
 *
 */
class IngredienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingrediente',
		'app.pedido',
		'app.registo',
		'app.pizza',
		'app.categoria',
		'app.estado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ingrediente = ClassRegistry::init('Ingrediente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingrediente);

		parent::tearDown();
	}

}
