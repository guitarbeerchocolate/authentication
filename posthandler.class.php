<?php
require_once 'classes/authenticate.class.php';
class posthandler
{
  private $postObject;  
  function __construct($p)
  {
    $this->postObject = (object) $p;        
    if($this->postObject->method && (method_exists($this, $this->postObject->method)))
    {
      $evalStr = '$this->'.$this->postObject->method.'();';
      eval($evalStr);
    }
    else
    {
      echo 'Invalid method supplied';
    }
  }

  function login()
  { 
    $auth = new authenticate;    
    echo $auth->login($this->postObject->username, $this->postObject->password);    
  }
}
new posthandler($_POST);
?>