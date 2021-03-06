<?php
namespace app\controllers;
use app\core\Controller;
use app\lib\DB;

  class AdminController extends Controller {

    public $main;

    public function __construct($route) {
      parent::__construct($route);
    }

    public function loginAction() {
      if (isset($_SESSION['admin'])) {
        $this->view->redirect('/');
      }
      if(!empty($_POST)) {
        if(!$this->model->loginValidate($_POST)) {
          $this->view->message($this->model->error);
        } else {
          $_SESSION['admin'] = 1;
          $this->view->redirect('/');
        }
      }
        $this->view->render('Login page');
    }

    public function editAction() {
      if(!$this->model->isTaskExists($this->getID())) {
        $this->view->message('id is not exists.');
      }
      if(!empty($_POST)) {
        if (isset($_POST['status']) && ($_POST['status'] == 'Done' || $_POST['status'] == 'NotDone')) {
          $this->model->statusEdit($_POST, $this->getID());
          $this->view->message('Status successfully changed');
          $this->view->redirect('/');
        } elseif (!$this->model->taskValidate($_POST, 'edit')) {
          $this->view->message($this->model->error);
        } elseif($this->model->isTaskChanged($_POST, $this->getID())) {
          $this->model->taskEdit($_POST, $this->getID());
          $this->view->message('Task successfully edited');
          $this->view->redirect('/');
        } else {
          $this->view->message('Task is not edited');
        }
      }
      $taskdata = $this->model->taskData($this->getID());
      if ($taskdata) {
        $var = [
          'data' => $taskdata[0],
        ];
        $this->view->render('Edit Page', $var);
      } else {
        $this->view->redirect('/');
      }
    }

    public function deleteAction() {
      if(!$this->model->isTaskExists($this->getID())) {
        $this->view->message('task is not exists.');
      } else {
        $this->model->deleteTask($this->getID());
        $this->view->message('Task deleted successfully!');
      }
      $this->view->redirect('/');
    }

    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect('/');
    }
  }


 ?>
