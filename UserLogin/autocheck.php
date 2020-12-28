<?php 
require_once("./autoload.php");
$userModel = new UserModel();
if (isset($_GET['mssv'])) {
    if (count($userModel->getUserByMSSV($_GET['mssv'])) > 0) {
        if(count($userModel->getUserByMSSVS($_GET['mssv'])) == 0){
            $autocheck = $userModel->Insert($_GET['mssv']);
            echo 1; //có sinh viên nhưng chưa điểm danh
        }else{
            echo 0; //có sinh viên nhưng điểm danh rồi
        }
    }else{
        echo 2; //không có sinh viên này trong danh sách
    }
}