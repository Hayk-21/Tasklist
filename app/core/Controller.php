<?php
namespace app\core;
use app\core\View;
use app\models\Main;


abstract class Controller {

  public $route;
  public $view;
  public $acs;

  public function __construct($route) {
    $this->route = $route;
    if (!$this->checkAccess()) {
      echo "Eroor 403";
      exit();
    }
    $this->view = new View($route);
    $this->model = $this->loadModel($route['controller']);
  }

  public function loadModel($name) {
    $path = 'app\models\\'.ucfirst($name);
    if (class_exists($path)) {
      return new $path;;
    }
  }

  public function checkAccess() {
    $this->acs = require 'app/access/'.$this->route['controller'].'.php';
    if($this->isAccess('all')) {
      return true;
    }
    elseif (isset($_SESSION['admin']) and $this->isAccess('admin')) {
      return true;
    }
    return false;
  }

  public function isAccess($key) {
    return in_array($this->route['action'], $this->acs[$key]);
  }

  public function getID() {
    $this->tmp = $this->route['controller'].'/'.$this->route['action'];
    $url = trim($_SERVER['REQUEST_URI'], '/');
    $idlen = strlen($url) - strlen($this->tmp) - 1;
    $this->id = substr($url, strlen($this->tmp) + 1, $idlen);
    return $this->id;
  }
}


 ?>
