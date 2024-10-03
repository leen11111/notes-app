<?php

include "../connect.php";
include "../auth/functions.php";

$title            = filtterRequest('task-title');
$content          = filtterRequest ('task-content');
$date             = filtterRequest ('task-date');
$TaskStartTime    = filtterRequest ('task-start-time');
$TaskEndTime      = filtterRequest ('task-end-time');
$ReminderTaskDate = filtterRequest ('Reminder-task-date');
$taskImportance   = filtterRequest ('task-importance');
$userID           = filtterRequest ('task-user');
$taskStatus       = filtterRequest ('task-Status');




$stmt = $con ->prepare("INSERT INTO `tasks`(
   `task-title`, 
   `task-content`, 
   `task-date`, 
   `task-start-time`, 
   `task-end-time`, 
   `Reminder-task-date`,  
   `task-importance`, 
   `task-user`, 
   `task-Status`)
 VALUES (   ?  ,  ?  , ?   ,  ?  ,  ?  ,  ?  ,  ?  ,  ?  ,  ?  )");


$stmt-> execute(array(
   $title ,
   $content,
   $date,
   $TaskStartTime,
   $TaskEndTime, 
   $ReminderTaskDate,
   $taskImportance,
   $userID,
   $taskStatus  ));
$count = $stmt ->rowCount();


if ($count >0){
       echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }
?>