<?php
namespace app\controllers;
use app\core\Controller;
use app\lib\DB;
use app\lib\Pagination;


  class MainController extends Controller {

    public function indexAction() {
        if(!empty($_POST['sort'])) {
          $_SESSION['sort'] = $_POST['sort'];
          $_SESSION['checkbox'] = $_POST['checkbox'];
        }

        $pageID = $this->getID();
        if (!$pageID)
          $pageID = 1;

        $pagination = new Pagination($this->route, $pageID, ($this->model->taskCount())/3, 1);

        if(!isset($_SESSION['sort']))
          $_SESSION['sort'] = '';
        if(!isset($_SESSION['checkbox']))
          $_SESSION['checkbox'] = '0';

        $vars = [
          'pagination' => $pagination->get(),
          'list' => $this->model->taskList($pageID, $_SESSION['sort'], $_SESSION['checkbox']),
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
          $this->view->message("Task added successfully");
          $this->view->redirect('/');
        }
      }
      $this->view->render('Add Page', $vars);
    }
  }


 ?>
