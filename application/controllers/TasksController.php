<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

use application\lib\Pagination;


interface TaskInterface { 
    public function taskValidate($post); 
    public function addAction(); 
    public function tasksAction(); 
} 


class TasksController extends Controller implements TaskInterface {

	public $error;

	public function taskValidate($post) {
		if (empty($post['name'])) {
			$this->error = 'Укажите имя';
			return false;
		} elseif (empty($post['email'])) {
			$this->error = 'Укажите емайл';
			return false;
		} elseif (filter_var($post['email'], FILTER_VALIDATE_EMAIL) === false) {
			$this->error = 'Не верный формат емайла';
			return false;
		} elseif (empty($post['description'])) {
			$this->error = 'Опишите задачу';
			return false;
		}

		return true;
	}	

	public function addAction() {
		if (!empty($this->request->post)) {
			if (!$this->taskValidate($this->request->post)) {
				$this->view->message('error', $this->error);
			}
			$id = $this->model->taskAdd($this->request->post);
			if (!$id) {
				$this->view->message('success', 'Ошибка обработки задачи');
			}
			$this->view->message('success', 'Задача добавлена');
		}
		$this->view->render('Добавить задачу');
	}

	public function tasksAction() {
		$sort = 'id'; $order = 'DESC';
		if (isset($this->route['sort'])) {
			$sort = $this->route['sort'];

			$order_type = 'ASC';
			$pos = stripos($sort, $order_type);
			if ($pos !== false) {	
				$sort = preg_replace("/$order_type/i", '', $sort);
				$order = $order_type;
			}

			$sort_type = ['name', 'email', 'status'];
			if (!in_array($sort, $sort_type))
			{
				$sort = 'id'; $order = 'DESC';
			}
		}
		$pagination = new Pagination($this->route, $this->model->tasksCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->tasksList($this->route, $pagination->getMax(), $sort, $order),
		];
		$this->view->render('Задачи', $vars);
	}

}