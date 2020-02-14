<?php

namespace application\controllers;

use application\controllers\TasksController;
use application\core\View;


class MainController extends TasksController {

	public function __construct($route) {
		parent::__construct($route);

		$this->model = $this->loadModel($route['controller']);

		$this->view = new View($route);
		$this->view->layout = 'default';
	}

}