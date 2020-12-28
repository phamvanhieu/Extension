<?php 
require_once("./autoload.php");
$userModel = new UserModel();
require_once("./header.php");
$users = $userModel->getAllUser();
  ?>
  <table class="table table-striped">
    <h3 class="text-center">DANH SÁCH SINH VIÊN ĐIỂM DANH</h3>
      <thead>
        <tr  class="bg-dark text-white">
         
          <th hidden>custom_id</th>
          <th>MSSV</th>
          <th >Fullname</th>
          <th >Số Tiết Vắng</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($users as $key => $value):
        ?>
        <tr>
          <td hidden  ><?php echo $value['custom_id'] ?></td>
          <td class="mssv"><?php echo $value['mssv'] ?></td>
          <td><?php echo $value['fullname'] ?></td>
          <td><input style="width: 50px;" type="text" id="<?php echo $value['mssv'] ?>" value="" class="sotietvang"></td>
        </tr>
        <?php 
        endforeach 
        ?>
      </tbody>
    </table>
    <?php require_once("./footer.php"); ?>