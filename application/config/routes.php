<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'page',
	],
	'main/page/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'page',
	],

	'main/upbyname' => [
		'controller' => 'main',
		'action' => 'upbyname',
	],
	'main/upbyname/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'upbyname',
	],
	'main/downbyname' => [
		'controller' => 'main',
		'action' => 'downbyname',
	],
	'main/downbyname/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'downbyname',
	],

	'main/upbyemail' => [
		'controller' => 'main',
		'action' => 'upbyemail',
	],
	'main/upbyemail/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'upbyemail',
	],
	'main/downbyemail' => [
		'controller' => 'main',
		'action' => 'downbyemail',
	],
	'main/downbyemail/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'downbyemail',
	],

	'main/upbystatus' => [
		'controller' => 'main',
		'action' => 'upbystatus',
	],
	'main/upbystatus/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'upbystatus',
	],
	'main/downbystatus' => [
		'controller' => 'main',
		'action' => 'downbystatus',
	],
	'main/downbystatus/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'downbystatus',
	],

	'add' => [
		'controller' => 'main',
		'action' => 'add',
	],

	// AdminController
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
	'admin/tasks' => [
		'controller' => 'admin',
		'action' => 'tasks',
	],
	'admin/tasks/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'tasks',
	],

	'admin/upbyname' => [
		'controller' => 'admin',
		'action' => 'upbyname',
	],
	'admin/upbyname/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'upbyname',
	],
	'admin/downbyname' => [
		'controller' => 'admin',
		'action' => 'downbyname',
	],
	'admin/downbyname/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'downbyname',
	],

	'admin/upbyemail' => [
		'controller' => 'admin',
		'action' => 'upbyemail',
	],
	'admin/upbyemail/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'upbyemail',
	],
	'admin/downbyemail' => [
		'controller' => 'admin',
		'action' => 'downbyemail',
	],
	'admin/downbyemail/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'downbyemail',
	],

	'admin/upbystatus' => [
		'controller' => 'admin',
		'action' => 'upbystatus',
	],
	'admin/upbystatus/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'upbystatus',
	],
	'admin/downbystatus' => [
		'controller' => 'admin',
		'action' => 'downbystatus',
	],
	'admin/downbystatus/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'downbystatus',
	],

];