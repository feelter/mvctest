<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

class AdminController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	public function loginAction() {
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('admin/tasks');
		}
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin/tasks');
		}
		$this->view->render('Вход');
	}

	public function addAction() {
		if (!empty($_POST)) {
			if (!$this->model->taskValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->taskAdd($_POST);
			if (!$id) {
				$this->view->message('success', 'Ошибка обработки задачи');
			}
			$this->view->message('success', 'Задача добавлена');
		}
		$this->view->render('Добавить задачу');
	}

	public function editAction() {
		if (!$this->model->isTaskExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->taskValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->taskEdit($_POST, $this->route['id']);
			$this->view->message('success', 'Сохранено');
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
		unset($_SESSION['admin']);
		$this->view->redirect('admin/login');
	}

	public function tasksAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tasksList($this->route, $pagination->getMax()),
		];
		$this->view->render('Задачи', $vars);
	}

	public function upbynameAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tasksList($this->route, $pagination->getMax(), 'name'),
		];
		$this->view->render('Задачи', $vars);
	}

	public function downbynameAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tasksList($this->route, $pagination->getMax(), 'name', 'ASC'),
		];
		$this->view->render('Задачи', $vars);
	}

	public function upbyemailAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tasksList($this->route, $pagination->getMax(), 'email'),
		];
		$this->view->render('Задачи', $vars);
	}

	public function downbyemailAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tasksList($this->route, $pagination->getMax(), 'email', 'ASC'),
		];
		$this->view->render('Задачи', $vars);
	}

	public function upbystatusAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tasksList($this->route, $pagination->getMax(), 'status'),
		];
		$this->view->render('Задачи', $vars);
	}

	public function downbystatusAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tasksList($this->route, $pagination->getMax(), 'status', 'ASC'),
		];
		$this->view->render('Задачи', $vars);
	}
}