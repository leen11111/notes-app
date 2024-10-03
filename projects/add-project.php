<?php

include "../connect.php";
include "../auth/functions.php";

$title =filtterRequest('project-title');
$content =filtterRequest ('project-content');
$date =filtterRequest ('project-date');
$TaskStartTime =filtterRequest ('project-start-time');
$TaskEndTime =filtterRequest ('project-end-time');
$ReminderTaskDate =filtterRequest ('Reminder-project-date');
$taskImportance =filtterRequest ('project-importance');
$userID = filtterRequest ('project-user');
$projectStatus = filtterRequest ('project-Status');



$stmt = $con ->prepare("INSERT INTO `projects`( 
   `project-title`, 
   `project-content`, 
   `project-date`,   
   `project-start-time`, 
   `project-end-time`, 
   `Reminder-project-date`, 
   `project-importance`, 
   `project-user`, 
   `project-Status`)
 VALUES (?  ,  ?  ,  ?  ,  ?  ,  ?  ,  ? ,  ?  ,  ?  , ?  )");


$stmt-> execute(array(
   $title ,
   $content ,
   $date ,
   $TaskStartTime ,
   $TaskEndTime ,
   $ReminderTaskDate ,
   $taskImportance ,
   $userID ,
   $projectStatus));
$count = $stmt ->rowCount();


if ($count >0){
       echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }
?>