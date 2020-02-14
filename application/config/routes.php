<?php

return [
	// MainController for Users
	'' => [
		'controller' => 'main',
		'action' => '',
		'redirect' => 'main/tasks',
	],
	'add' => [
		'controller' => 'main',
		'action' => 'add',
	],

	//tasks pages
	'main/tasks' => [
		'controller' => 'main',
		'action' => 'tasks',
	],
	'main/tasks/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'tasks',
	],
	'main/tasks-{sort:\w+}' => [
		'controller' => 'main',
		'action' => 'tasks',
	],
	'main/tasks-{sort:\w+}/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'tasks',
	],


	// AdminController for Admin
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],

	//tasks pages
	'admin/tasks' => [
		'controller' => 'admin',
		'action' => 'tasks',
	],
	'admin/tasks/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'tasks',
	],
	'admin/tasks-{sort:\w+}' => [
		'controller' => 'admin',
		'action' => 'tasks',
	],
	'admin/tasks-{sort:\w+}/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'tasks',
	],

];