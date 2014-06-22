<?php 
  include_once("inc/config.inc.php");
  $user = mysqli_real_escape_string($objMySQLi, $_GET['user']);
  $sql = "SELECT t_user.score FROM t_user WHERE t_user.name_user = '" . $user ."'";
  $query_result  = $objMySQLi -> query($sql);
  if($query_result->num_rows != 0){
    $rsEvent = $query_result->fetch_object();
    echo $rsEvent-> score;
  }else{
    echo 'Error';
  }
?>
