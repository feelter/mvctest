<?php

namespace application\core;

use application\core\View;

abstract class Controller {

	public $route;
	public $view;
	public $access;

	public function __construct($route) {
		$this->route = $route;
		if (!$this->checkAccess()) {
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($name) {
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	public function checkAccess() {
		$this->access = require 'application/access/'.$this->route['controller'].'.php';
		if ($this->isAccess('all')) {
			return true;
		}
		elseif (isset($_SESSION['admin']) and $this->isAccess('admin')) {
			return true;
		}
		return false;
	}

	public function isAccess($key) {
		return in_array($this->route['action'], $this->access[$key]);
	}

}