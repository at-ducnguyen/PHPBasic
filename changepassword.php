<?php include 'menu.php'; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
 header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Asian Tech - Internship</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>   
  <?php 
  require_once('db.php');
  if (isset($_POST["submit"])) {
    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
    $renewpass = $_POST["renewpass"];
    if ($oldpass == '' || $newpass == '' || $renewpass ==''){
      $err = "Please fill out all field";
    }
    elseif ($newpass != $renewpass){
      $err = "Two pass not equal ";
    }
    else{
      $username = $_SESSION['username'];
      $sql="SELECT * FROM users where username='$username'";
      $query = $conn->prepare($sql);
      $query->execute();
      $row = $query->fetch();
      if ($row['password'] != $oldpass){
        $err = "Password is incorrect !";
      }else {
        $sqlUp = "UPDATE users SET password='$newpass' WHERE username='$username'";
        $queryUp = $conn->prepare($sqlUp);
        if($queryUp->execute()){
          header('Location:profile.php');
        }
      }
    }
  }

  ?>
  <div style="margin-left: 250px;margin-right: 450px">
    <h1 class="text-center">Change your Password</h1> 
    <p style="color: red"><?=isset($err) ? $err : '';?></p>

    <form method="post" action="" enctype="multipart/form-data">
      <table cellspacing="0" cellpadding="5" class="table">
        <tr>
          <td>Old Password <span style="color: red">*</span></td>
          <td><input type="password" name="oldpass" class="form-control" placeholder="Enter old password"></td>
        </tr>

        <tr>
          <td>New Password <span style="color: red">*</span></td>
          <td><input type="password" name="newpass" class="form-control" placeholder="Enter new password"></td>
        </tr>

        <tr>
          <td>Retype new Password <span style="color: red">*</span></td>
          <td><input type="password" name="renewpass" class="form-control" placeholder="ReEnter new password"></td>
        </tr>

        <tr>
          <td></td>
          <td><input type="submit" name="submit" class="btn btn-primary" value="Update"/></td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>

