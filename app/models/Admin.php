<?php
namespace app\models;
use app\core\Model;

class Admin extends Model {

  public $error;

  public function loginValidate($post) {
    $config = require 'app/config/admin.php';
    if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
      $this->error = 'Login or password not correct';
      return false;
    }
    return true;
  }

  public function taskValidate($post, $type) {
    $nameLen = strlen($post['name']);
    $taskLen = strlen($post['task']);
    if ($nameLen < 3 or $nameLen > 20) {
      $this->error = 'The name must contain from 3 to 20 characters.';
      return false;
    } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      $this->error = 'Email is incorrect.';
      return false;
    } elseif ($taskLen < 10 or $taskLen > 500) {
      $this->error = 'The task must contain from 10 to 500 characters.';
      return false;
    }
    return true;
  }

  public function isTaskExists($id) {
    $params = [
      'id' => $id,
    ];
    return $this->db->column('SELECT id FROM tasks WHERE id = :id', $params);
  }

  public function taskData($id) {
    $params = [
      'id' => $id,
    ];
    return $this->db->row('SELECT * FROM tasks WHERE id = :id', $params);
  }

  public function taskEdit($post, $id) {
    if(isset($post['status'])) {
      $post['status'] = 1;
    } else {
      $post['status'] = 0;
    }
    $params = [
      'id' => $id,
      'name' => $post['name'],
      'email' => $post['email'],
      'task' => $post['task'],
      'edited' => 1,
      'status' => $post['status'],
    ];
    $this->db->query('UPDATE tasks SET name = :name, email = :email, task = :task, edited = :edited, status = :status WHERE id = :id', $params);
  }

  public function deleteTask($id) {
    $params = [
      'id' => $id,
    ];
    $this->db->query('DELETE FROM tasks WHERE id = :id', $params);
  }

}


 ?>
