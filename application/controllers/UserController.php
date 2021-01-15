<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Main;
use application\lib\Users;
use application\core\View;


class UserController extends Controller {
	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'user';
	}

	public function loginAction() {
		if (isset($_SESSION['user'])) {
			$this->view->redirect();
		}
		if (!empty($_POST)) {
			if (!$this->isAjax()) {
				View::errorCode('no-js');
			}

			if ($this->model->loginValidate($_POST)) {
				$user = new Users();
				$userId = $user->login($_POST['login'], md5($user->salting . $_POST['password']));
				if ($userId) {
					$_SESSION['user'] = (int)$userId;
					$this->view->location('/');
				} else {
					$this->view->message('error', "Неверный логин или пароль");
				}
			} else {
				$this->view->responseValidate('error', $this->model->errors);
			}
		}
		$this->view->render('Вход');
	}

	public function registrationAction() {
		if (isset($_SESSION['user'])) {
			$this->view->redirect();
		}
		if (!empty($_POST)) {
			if (!$this->isAjax()) {
				View::errorCode('no-js');
			}

			$validationForm = $this->model->registrationValidate($_POST);
			if (!$validationForm) {
				$this->view->responseValidate('error', $this->model->errors);
			}

			$user = new Users();
			$user->setLogin($_POST['login']);
			$user->setPassword(md5($user->salting . $_POST['password']));
			$user->setEmail($_POST['email']);
			$user->setName($_POST['name']);
			$user->save();

			$userId = $user->login($_POST['login'], md5($user->salting . $_POST['password']));
			$_SESSION['user'] = (int)$userId;
			$this->view->location('/');
		}
		$this->view->render('Вход');
	}

	public function logoutAction() {
		unset($_SESSION['user']);
		$this->view->redirect();
	}
}
