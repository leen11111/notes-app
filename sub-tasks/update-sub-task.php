<?php
include "../connect.php";
include "../auth/functions.php";


$title             = filtterRequest('sub-task-title');
$content           = filtterRequest ('sub-task-content');
$date              = filtterRequest ('sub-task-date');
$TaskStartTime     = filtterRequest ('sub-task-start-time');
$TaskEndTime       = filtterRequest ('sub-task-end-time');
$ReminderTaskDate  = filtterRequest ('Reminder-sub-task-date');
$taskImportance    = filtterRequest ('sub-task-importance');
$taskStatus        = filtterRequest ('sub-task-Status');
$taskID            = filtterRequest ('sub-task-id');


$stmt = $con ->prepare("UPDATE `sub-tasks` SET 
   `sub-task-title`        =  ?,
   `sub-task-content`      =  ?,
   `sub-task-date`         =  ?,
   `sub-task-start-time`   =  ?,
   `sub-task-end-time`     =  ?,
   `Reminder-sub-task-date`=  ?,
   `sub-task-importance`   =  ?,
   `sub-task-Status`       =  ?
                                 WHERE `sub-task-id` = ? ");


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
