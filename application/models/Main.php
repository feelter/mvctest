<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

	public function taskValidate($post) {
		if (empty($post['name'])) {
			$this->error = 'Укажите имя';
			return false;
		} elseif (empty($post['email'])) {
			$this->error = 'Укажите емайл';
			return false;
		} elseif (filter_var($post['email'], FILTER_VALIDATE_EMAIL) === false) {
			$this->error = 'Не верный формат емала';
			return false;
		} elseif (empty($post['description'])) {
			$this->error = 'Опишите задачу';
			return false;
		}

		return true;
	}

	public function taskAdd($post) {
		$params = [
			'id' => '',
			'name' => $post['name'],
			'email' => $post['email'],
			'description' => $post['description'],
			'status' => 0,
			'edit' => 0,
		];
		$this->db->query('INSERT INTO tasks VALUES (:id, :name, :email, :description, :status, :edit)', $params);
		return $this->db->lastInsertId();
	}

	public function tasksCount() {
		return $this->db->column('SELECT COUNT(id) FROM tasks');
	}

	public function tasksList($route, $max, $order = 'id', $sort = 'DESC') {
		if (isset($route['page'])) {
		    $route['page'] = $route['page']-1;
		} else {
			    $route['page'] = 0;
		}

		$params = [
			'max' => $max,
			'start' => ($route['page'] * $max),
		];

		return $this->db->row("SELECT * FROM tasks ORDER BY $order $sort LIMIT :start, :max", $params);
	}

}