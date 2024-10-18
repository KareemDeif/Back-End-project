<?php

define('Main_URL','http://localhost/NiceAdmin/Admins/');

function baseurl($var=null){
  
return Main_URL . $var;
}

function auth($rule2=null ,$rule3=null ,$rule4=null){

  if($_COOKIE['auth_user']){

    if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==$rule2 || $_SESSION['auth']['rule']==$rule3
    || $_SESSION['auth']['rule']==$rule4 ){

      }else{
      header('Location: ' . baseurl('error403.php'));
    }
  }else{
    header('Location: ' . baseurl('login.php'));
  }
  
}

function FilterValidation($input){
$input=ltrim($input);
$input=rtrim($input);
$input=strip_tags($input);
$input=stripslashes($input);

return $input;

}




?>