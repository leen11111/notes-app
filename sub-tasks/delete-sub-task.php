<?php
include "../connect.php";
include "../auth/functions.php";

$subtaskID =filtterRequest('sub-task-id');



$stmt = $con ->prepare("DELETE FROM `sub-tasks` WHERE `sub-task-id`=?");

$stmt-> execute(array($subtaskID));
$count = $stmt ->rowCount();


if ($count >0){
      echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }
?>