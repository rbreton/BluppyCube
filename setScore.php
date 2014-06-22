<?php 
  include_once("inc/config.inc.php");
  $user = mysqli_real_escape_string($objMySQLi, $_GET['user']);
  $score = mysqli_real_escape_string($objMySQLi, $_GET['score']);
  $sql = "SELECT * FROM t_user WHERE t_user.name_user = '" . $user ."'";
  $query_result  = $objMySQLi -> query($sql);
  if($query_result->num_rows != 0){
    $rsEvent = $query_result->fetch_object();
    $sql = "UPDATE t_user SET name_user = '$user', score = $score WHERE t_user.name_user = '$user'";
    $query_result  = $objMySQLi -> query($sql);
  }else{
    $sql = "INSERT INTO t_user (id_user, name_user, pass_user, score) VALUES (NULL, '$user', 'as4aw4asf', $score)";
    $query_result  = $objMySQLi -> query($sql);
  }
?>
