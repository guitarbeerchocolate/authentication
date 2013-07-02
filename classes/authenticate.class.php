<?php
@session_start();
class authenticate
{
  public $id;
  private $username;
  private $password;
  private $db;

  function __construct()
  {
    $this->db = new database;
  }

  function login($u, $p)
  {
    $this->username = $this->db->escape($u);
    $this->password = $this->db->escape(md5($p));
    $q = "SELECT * FROM users WHERE username='{$this->username}' AND password='{$this->password}'";
    $result = $this->db->singleRow($q);
    if($result->id)
    {
      $this->id = $result->id;
      $this->username = $result->username;
      $this->createSession();
      return 'private.php?sessionid='.session_id();
    }
    else
    {
      $this->destroySession();
      return 'index.php';
    }
  }

  function logout()
  {
    $this->destroySession();
  }

  private function createSession()
  {
    $_SESSION['AUTH_ID'] = $this->id;
    $_SESSION['AUTH_USERNAME'] = $this->username;
  }

  private function destroySession()
  {
    unset($_SESSION['AUTH_ID']);
    unset($_SESSION['AUTH_USERNAME']);
    session_destroy();
  }

  function __destruct()
  {

  }
}
?>