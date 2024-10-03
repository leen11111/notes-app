<?php

include "../connect.php";
include "../auth/functions.php";


$userID = filtterRequest('id');


// Query to count completed tasks
$stmt = $con->prepare("SELECT COUNT(*) AS completed_tasks FROM `tasks` WHERE `task-user`=? AND `task-Status` = 'completed'");
$stmt->execute(array( $userID));
$CompletedTasks = $stmt->fetch(PDO::FETCH_ASSOC)['completed_tasks'];



// Query to count completed sub-tasks
$stmt = $con->prepare("SELECT COUNT(*) AS completed_sub_tasks FROM `sub-tasks` WHERE `USER-SubTask-ID`=? AND `sub-task-Status` = 'completed'");
$stmt->execute(array( $userID));
$CompletedSubTasks = $stmt->fetch(PDO::FETCH_ASSOC)['completed_sub_tasks']; 





// Query to count completed projects
$stmt = $con->prepare("SELECT COUNT(*) AS completed_projects FROM `projects` WHERE `project-user`=? AND `project-Status` = 'completed'");
$stmt->execute(array( $userID));
$CompletedProjects = $stmt->fetch(PDO::FETCH_ASSOC)['completed_projects'];



// Calculate experience points
$experience_points = ($CompletedTasks * 5) + ($CompletedSubTasks * 5) + ($CompletedProjects * 10);




// Optionally, save experience points to a database or another table
$stmt = $con->prepare("UPDATE `users` SET `ExperiencePoints`=  ?  WHERE `id`=?");
$stmt->execute(array( $experience_points ,$userID));
$count = $stmt ->rowCount();

if ($count >0){
    echo json_encode(array("status"=>"success ! the experience points = " .$experience_points)) ;
 }else {
    echo json_encode(array("status"=>"fail"));
 }
?>
