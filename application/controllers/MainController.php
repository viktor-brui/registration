<?php

namespace application\controllers;

use application\core\Controller;
use application\models\User;
use application\lib\Users;

class MainController extends Controller {

	public function indexAction() {
		$user = new Users();
		$vars = [
			'isGuest' => $user->isGuest()
		];
		if (!$user->isGuest()) {
			$user->setId($_SESSION['user']);
			$user->read();
			$vars['name'] = $user->getName();
		}
		$this->view->render('Главная страница', $vars);
	}
}
