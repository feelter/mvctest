<?php

namespace application\models;

use application\core\Model;


class Main extends Model {

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