<?php 
require_once("./autoload.php");
$username = $_GET['username'];
$password = $_GET['password'];
$userModel = new UserModel();

$admin = $userModel->getLoginAdmin($username,$password);
if (!isset($_GET['username']) || !isset($_GET['password']) && count($admin) == 0) {
  header("location: login.php");
}
if (count($admin) > 0) :
  if (isset($_GET['date'])):
      $date = $_GET['date'];
  else:
    $d = getdate();
    $date = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
  endif;
  $usersCheckByDay = $userModel->getUserCheckedByDate($date);
  $users = $userModel->getAllUser();
  ?>
  <table class="table table-striped">
    <h3 class="text-center">DANH SÁCH SINH VIÊN ĐIỂM DANH NGÀY <?php echo dateformat($date) ?></h3>
      <thead>
        <tr  class="bg-dark text-white">
          <th  scope="row">UserName</th>
          <th >Fullname</th>
          <th >Email</th>
          <th >Số Tiết Vắng</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($users as $key => $value):
        ?>
        <?php 
          $sotietvang = 5;
          foreach ($usersCheckByDay as $keys => $values):
              if ($userModel->getUserByCustomId($values['user_id'])['custom_id'] == $value['custom_id']) {
                  $sotietvang =  0;
              }
          endforeach
        ?>
        <tr class="bg-success <?php if($sotietvang == "5") echo "bg-warning" ?>">
          <td scope="row"><?php echo $value['username'] ?></td>
          <td><?php echo $value['fullname'] ?></td>
          <td><?php echo $value['email'] ?></td>
          <td class="text-center">
                <?php echo $sotietvang ?>
          </td>
        </tr>
        <?php 
        endforeach 
        ?>
      </tbody>
    </table>
    <div class="" data-toggle="buttons">
      <label class="btn btn-success btn-sm mr-3">
        Đã Điểm Danh
      </label>
      <label class="btn btn-warning btn-sm">
        Chưa Điểm Danh
      </label>
    </div>
  <?php
else:
  echo 0;
endif;