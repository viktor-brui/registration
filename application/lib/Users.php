<?php 

namespace application\lib;

use application\lib\Xmldb;

class Users extends Xmldb {
    public $salting   = 'hzedwp6eq0m';
    protected $_table = 'users';
    protected $_cols  = array('login', 'password', 'email', 'name');

    private $_id;
    private $_login;
    private $_password;
    private $_email;
    private $_name;

    public function setId($id) {
        $this->_id = $id;
    }

    public function getId() {
        return $this->_id;
    }

    public function setLogin($_login) {
        $this->_login = $_login;
    }

    public function getLogin() {
        return $this->_login;
    }

    public function setPassword($_password) {
        $this->_password = $_password;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function setEmail($_email) {
        $this->_email = $_email;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setName($_name) {
        $this->_name = $_name;
    }

    public function getName() {
        return $this->_name;
    }

    public function isGuest() {
        return !isset($_SESSION['user']);
    }
}
