<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;
use application\models\Main;

class MainController extends Controller {

	public function pageAction() {
		$pagination = new Pagination($this->route, $this->model->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->tasksList($this->route, $pagination->getMax()),
		];
		$this->view->render('Главная страница', $vars);
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