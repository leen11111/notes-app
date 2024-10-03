<?php
include "../connect.php";
include "../auth/functions.php";

$projectID =filtterRequest('project-id');



$stmt = $con ->prepare("DELETE FROM `projects` WHERE `project-id`=?");

$stmt-> execute(array($projectID));
$count = $stmt ->rowCount();


if ($count >0){
      echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }
?>