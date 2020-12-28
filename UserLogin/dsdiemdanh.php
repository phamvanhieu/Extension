<?php 
require_once("./autoload.php");
$userModel = new UserModel();
$date = date("Y/m/d");
$usersCheckByDay = $userModel->getUserCheckedByDate($date);
echo json_encode($usersCheckByDay);