<?php

namespace application\core;

use application\core\Request;
use application\core\View;


abstract class Controller {

	public $route;
	public $view;
	public $access;
	public $request;

	public function __construct($route) {
		$this->route = $route;
		$this->request = new Request;
		if (!$this->checkAccess()) {
			View::errorCode(403);
		}
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
		elseif (isset($this->request->session['admin']) and $this->isAccess('admin')) {
			return true;
		}
		return false;
	}

	public function isAccess($key) {
		return in_array($this->route['action'], $this->access[$key]);
	}

}