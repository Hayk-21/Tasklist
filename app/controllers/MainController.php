<?php
namespace app\controllers;
use app\core\Controller;
use app\lib\DB;
use app\lib\Pagination;


  class MainController extends Controller {

    public $sort;

    public function indexAction() {
        if(!empty($_POST['sort'])) {
          $_SESSION['sort'] = $_POST['sort'];
        }
        $pageID = $this->getID();
        if (!$pageID) $pageID = 1;
        $pagination = new Pagination($this->route, $pageID, ($this->model->taskCount())/3, 1);
        $vars = [
          'pagination' => $pagination->get(),
          'list' => $this->model->taskList($pageID, $_SESSION['sort'][0]),
        ];
        $this->view->render('Homepage', $vars);
    }

    public function addAction() {
      $vars = [
        'name' => '',
        'email' => '',
        'task' => '',
      ];
      if(!empty($_POST)) {
        $vars = [
          'name' => $_POST['name'],
          'email' => $_POST['email'],
          'task' => $_POST['task'],
        ];
        if(!$this->model->taskValidate($_POST, 'add')) {
          $this->view->message( $this->model->error);
        } else {
          $id = $this->model->addTask($_POST);
          $this->view->redirect('/');
        }
      }
      $this->view->render('Add Page', $vars);
    }
  }


 ?>