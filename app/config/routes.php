<?php

return [
  //MainController
  '' => [
      'controller' => 'main',
      'action' => 'index',
  ],

  'main/index/([0-9]+)' => [
      'controller' => 'main',
      'action' => 'index',
  ],

  'add' => [
      'controller' => 'main',
      'action' => 'add',
  ],

  //AdminController
  'admin/login' => [
      'controller' => 'admin',
      'action' => 'login',
  ],

  'admin/logout' => [
      'controller' => 'admin',
      'action' => 'logout',
  ],

  'admin/edit/([0-9]+)' => [
		'controller' => 'admin',
		'action' => 'edit',
	],

  'admin/delete/([0-9]+)' => [
      'controller' => 'admin',
      'action' => 'delete',
  ],


];
