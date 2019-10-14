<?php

namespace application\models;

use application\core\Model;

class Admin extends Model {

	public $error;

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно!';
			return false;
		}
		return true;
	}

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

	public function taskEdit($post, $id) {
		$post['status'] = isset($post['status']) ? 1 : 0;
		$params = [
			'id' => $id,
			'name' => $post['name'],
			'email' => $post['email'],
			'description' => $post['description'],
			'status' => $post['status']
		];
		$addedit = '';
		$desc = $this->getTaskData($id)[0];

		if ($desc['description']!=$post['description']) {
			$params['edit'] = 1;
			$addedit = ', edit = :edit ';
		}

		$this->db->query("UPDATE tasks SET name = :name, email = :email, description = :description, status = :status $addedit WHERE id = :id", $params);
	}

	public function isTaskExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM tasks WHERE id = :id', $params);
	}

	public function taskDelete($id){
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM tasks WHERE id = :id', $params);
	}

	public function getTaskData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM tasks WHERE id = :id', $params);
	}

}