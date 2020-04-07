<?php

namespace application\models;

use application\models\Main;


class Admin extends Main {

	public function taskEdit($post, $id) {
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