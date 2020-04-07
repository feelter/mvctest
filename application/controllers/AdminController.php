<?php

namespace application\controllers;

use application\controllers\TasksController;
use application\core\View;


class AdminController extends TasksController {

	public function __construct($route) {
		parent::__construct($route);

		$this->model = $this->loadModel($route['controller']);

		$this->view = new View($route);
		$this->view->layout = 'admin';
	}

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		
		if (empty($post['login']) || empty($post['password'])) {
			$this->error = 'Укажите логин и пароль!';
			return false;
		}
				
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно!';
			return false;
		}

		return true;
	}

	public function loginAction() {
		if (isset($this->request->session['admin'])) {
			$this->view->redirect('admin/tasks');
		}
		if (!empty($this->request->post)) {
			if (!$this->loginValidate($this->request->post)) {
				$this->view->message('error', $this->error);
			}
			$this->request->session['admin'] = true;
			$this->view->location('admin/tasks');
		}
		$this->view->render('Вход');
	}

	public function editAction() {
		if (!$this->model->isTaskExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($this->request->post)) {
			if (!$this->taskValidate($this->request->post)) {
				$this->view->message('error', $this->error);
			}
			$this->model->taskEdit($this->request->post, $this->route['id']);
			$this->view->message('success', 'Сохранено', 'admin/tasks');
		}
		$vars = [
			'data' => $this->model->getTaskData($this->route['id'])[0],
		];
		$this->view->render('Редактировать задачу', $vars);
	}

	public function deleteAction() {
		if (!$this->model->isTaskExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->taskDelete($this->route['id']);
		$this->view->redirect('admin/tasks');
	}

	public function logoutAction() {
		unset($this->request->session['admin']);
		$this->view->redirect('admin/login');
	}

}