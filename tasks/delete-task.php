<?php
include "../connect.php";
include "../auth/functions.php";

$taskID =filtterRequest('taskID');



$stmt = $con ->prepare("DELETE FROM `tasks` WHERE `taskID`=?");

$stmt-> execute(array($taskID));
$count = $stmt ->rowCount();


if ($count >0){
      echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }
?>