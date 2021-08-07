<?php
namespace app\models;
use app\core\Model;

class Main extends Model {

  public $error;

  public function getData() {
    debug($this->db);
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

  public function addTask($post) {
    $params = [
      'id' => '',
      'name' => $post['name'],
      'email' => $post['email'],
      'task' => $post['task'],
      'edited' => '',
      'status' => '',
      'date' => ''
    ];
    $this->db->query('INSERT INTO tasks VALUES (:id, :name, :email, :task, :edited, :status, :date)', $params);
    return $this->db->lastInsertId();
  }

  public function taskCount() {
    return $this->db->column('SELECT COUNT(id) FROM tasks');
  }

  public function taskList($id, $sort) {
    if(empty($sort)) $sort = 'id';
    $max = 3;
    $params = [
      'max' => $max,
			'start' => ((($id ?? 1) - 1) * $max),
    ];
    return $this->db->row('SELECT * FROM tasks ORDER BY '.$sort.' LIMIT :start, :max', $params);
  }
}


 ?>
