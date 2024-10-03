<?php
include "../connect.php";
include "../auth/functions.php";

$title =filtterRequest('task-title');
$content =filtterRequest ('task-content');
$date =filtterRequest ('task-date');
$TaskStartTime =filtterRequest ('task-start-time');
$TaskEndTime =filtterRequest ('task-end-time');
$ReminderTaskDate =filtterRequest ('Reminder-task-date');
$taskImportance =filtterRequest ('task-importance');
$taskStatus = filtterRequest ('task-Status');
$taskID = filtterRequest ('taskID');




$stmt = $con ->prepare("UPDATE `tasks` SET 
`task-title`        = ? ,
`task-content`      = ? ,
`task-date`         = ? ,
`task-start-time`   = ? ,
`task-end-time`     = ? ,
`Reminder-task-date`= ? ,
`task-importance`   = ? ,
`task-Status`       = ?           WHERE `taskID`      = ?  ");




$stmt-> execute(array(
   $title , 
   $content ,
   $date,
   $TaskStartTime,
   $TaskEndTime,
   $ReminderTaskDate, 
   $taskImportance,
   $taskStatus, 
   $taskID));
$count = $stmt ->rowCount();


if ($count >0){
      echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }



?>
