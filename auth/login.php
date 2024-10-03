<?php
include "../connect.php";
include "functions.php";


$email     = filtterRequest('email');
$password= filtterRequest('password');


$stmt = $con ->prepare("SELECT * FROM `users` 
   WHERE `email`=? AND  `password`=? ");


if(empty($email) ){
   echo json_encode(array("status"=>"fail" ,"status"=> "Enter your email !" ));
   exit;
   }
if(empty($password)){
    echo json_encode(array("status"=>"fail" ,"status"=>"Enter your password"));
    exit;
   }




$stmt-> execute(array($email, $password));
$count = $stmt ->rowCount();
$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);



if ($count >0){
      echo json_encode(array("status"=>"seccess")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }


?>