<?php
include "../connect.php";
include "functions.php";

$username = filtterRequest ('username');
$email    =filtterRequest('email');
$email    = strtolower($email);
$email    = trim($email);
$password =filtterRequest('password');
$validationResult = validatePassword($password);
$ImageName= personalImageUpload('userImgName');



if (!empty($username)) {
    echo json_encode(array("status" => "username is valid . "));
   }else{
      echo json_encode(array("status" => "username is empty !"));
      exit;
   }

if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
      echo json_encode(array("status" => "Valid email address"));
      } else {
         echo json_encode(array("status" => "Invalid email address !!"));
         exit;
      }


if ($validationResult = true) {
   echo json_encode(array("status" => " good password"));
   } else {
      echo json_encode(array("status" => "your password is wrong !" , "message" => $validationResult));
      exit;
   }


if (!empty($ErrorMassege)){
   echo json_encode(array("status" => " your image is not good"  ,"status" =>$ErrorMassege ));
   exit;
   }elseif($ImageName){
   echo json_encode(array("status" => "good image" ,"status" =>$ImageName ));



   }



$stmt = $con ->prepare("INSERT INTO `users`(`username`, `email`, `password`,`userImgName` ) VALUES (? ,? ,? ,?)");
$stmt-> execute(array( $username, $email ,$password ,$ImageName));
$count = $stmt ->rowCount();


if ($count >0){
   echo json_encode(array("status"=>"seccess" , "message" => "User registered successfully")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }




  ?>
