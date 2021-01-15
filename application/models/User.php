<?php

namespace application\models;

use application\core\Model;
use application\lib\Users;

class User extends Model {

	public $errors;

	public function loginValidate($post) {
		$user = new Users();
		if (!($post['login'])) {
			$this->errors['login'] = "Введите логин";
			return false;
		} else if (!($post['password'])) {
			$this->errors['password'] = "Введите пароль";
			return false;
		}
		return true;
	}

	public function registrationValidate($post) {
		$user = new Users();
		if (!$user->isUnique('login', $post['login'])) {
			$this->errors['login'] = 'такой логин уже занят';
		} else if (mb_strlen($post['login']) < 6 || preg_match('/[^\w\d\s]/u', $post['login'])) { 
			$this->errors['login'] = 'Логин должен быть минимум из 6 символов, только буквы и цифры';
		}
		if (!$user->isUnique('email', $post['email'])) {
			$this->errors['email'] = 'такой email уже занят';
		} else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = 'Email введен неверно';
		}
		if (!preg_match('/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $post['password'])) {
			$this->errors['password'] = 'Пароль должен быть минимум 6 символов, обязательно должны содержать цифру, буквы в разных регистрах и спец символ (знаки)';
		}
		if ($post['password'] !== $post['confirm_password']) {
			$this->errors['confirm_password'] = 'Пароль подтвержден неверно';
		}
		if (mb_strlen($post['name']) < 2 || preg_match('/[^a-zA-Zа-яА-Я0-9]/ui', $post['name'])) {
			$this->errors['name'] = 'Имя должно быть минимум 2 символа , только буквы и цифры';
		}
		return !count($this->errors);
	}
}
