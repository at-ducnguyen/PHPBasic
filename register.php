
<?php include 'menu.php'; ?>
<?php
session_start();

if (isset($_SESSION['username'])) {
 header('Location: profile.php');
}
?>

<?php 
require_once('db.php');
$err=" * Required field";
$error = array();
$data = array();
$target_dir = "upload/";

if (isset($_POST["submit"])) {
  $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $username = $_POST["username"];
  $password = $_POST["password"];
  $repassword = $_POST["repassword"];
  $url = $_POST["url"];
  $email = $_POST["email"];
  $avatar = $_POST["avatar"];
  $address = $_POST["address"];
  $birthday = $_POST["birthday"];
  if ($username == "") {
    $error["username"] = " *Please fill out this field! ";
  }

  elseif (!preg_match("/^[a-zA-Z ]*$/",$username)) {
    $error["username"] = " *Only letters and white space allowed"; 
  }


  if ($password == "") {
    $error["password"] = " *Please fill out this field! ";
  }

  if ($repassword == "") {
    $error["repassword"] = " *Please fill out this field! ";
  }
  elseif ($repassword!=$password) {
    $error["repassword"] = " *Two Password Not Equal !"; 
  }
  

  if ($email == "") {
    $error["email"] = " *Please fill out this field! ";
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error["email"] = " *Invalid email format"; 
  }

  if ($birthday == "") {
    $error["birthday"] = " *Please fill out this field! ";
  }

  if ($address == "") {
   $error["address"] = " *Please fill out this field! ";
 }

 if ($url == "") {
  $error["url"] = " *Please fill out this field! ";
}
elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
  $error["url"] = " * ".$url." is a valid URL. Example : http://example.com"; 
}


if ($_FILES['avatar']['tmp_name']=='') {
  $error["avatar"] = " *Please fill out this field! ";
}
elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  $error["avatar"] = " *Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}


if (!$error){
  $sql="SELECT * FROM users where username='$username'";
  $query = $conn->prepare($sql);
  $query->execute();
  if ($query->rowCount() > 0){
   $err =" *Username has already been taken !";
 }
 else {
  move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
  $insert = "INSERT INTO `users`(`username`, `password`, `email`,`birthday`,`url`,`address`,`avatar`) VALUES ('$username','$password','$email','$birthday','$url','$address','$target_file')";
  $queryIns = $conn->prepare($insert);
  $queryIns->execute();
  header("Location:login.php");
}                  
} 
}

?>
<div style="margin-left: 250px;margin-right: 450px">
  <h1 class="text-center">Register New User</h1> 
  <p style="color: red"><?=$err?></p>

  <form method="post" action="" enctype="multipart/form-data">
    <table cellspacing="0" cellpadding="5" class="table">
      <tr>
        <td>Username <span style="color: red">*</span></td>
        <td><input type="text" name="username" value="<?php echo isset($username) ? $username : ''?>" placeholder="Enter your name" class="form-control"><span style="color: red">
          <?php echo isset($error['username']) ? $error['username'] : ''; ?></span></td> 
        </tr>
        <tr>
          <td>Password <span style="color: red">*</span></td>
          <td><input type="password" name="password" value="<?php echo isset($password) ? $password : ''?>" class="form-control" placeholder="Enter your password"><span style="color: red">
            <?php echo isset($error['password']) ? $error['password'] : ''; ?></span></td>
          </tr>

          <tr>
            <td>Retype Password <span style="color: red">*</span></td>
            <td><input type="password" name="repassword" value="<?php echo isset($repassword) ? $repassword : ''?>" class="form-control" placeholder="Enter your password"><span style="color: red">
              <?php echo isset($error['repassword']) ? $error['repassword'] : ''; ?></span></td>
            </tr>

            
            <tr>
              <td>Email <span style="color: red">*</span></td>
              <td><input type="mail" name="email" value="<?php echo isset($email) ? $email : ''?>" class="form-control" placeholder="Enter your email"><span style="color: red">
                <?php echo isset($error['email']) ? $error['email'] : '' ;?></span></td>
              </tr>

              <tr>
                <td>Birthday <span style="color: red">*</span></td>
                <td><input type="date" name="birthday" value="<?php echo isset($birthday) ? $birthday : ''?>" class="form-control" placeholder="Enter your birthday"><span style="color: red">
                  <?php echo isset($error['birthday']) ? $error['birthday'] : '' ;?></span></td>
                </tr>

                <tr>
                  <td>Address <span style="color: red">*</span></td>
                  <td><input type="text" name="address" value="<?php echo isset($address) ? $address : ''?>" class="form-control" placeholder="Enter your address"><span style="color: red">
                    <?php echo isset($error['address']) ? $error['address'] : '' ;?></span></td>
                  </tr>

                  <tr>
                    <td>Your Website <span style="color: red">*</span></td>
                    <td><input type="text" name="url" value="<?php echo isset($url) ? $url : ''?>" class="form-control" placeholder="Enter your url"><span style="color: red">
                      <?php echo isset($error['url']) ? $error['url'] : '';?></span></td>
                    </tr>
                    <tr>
                      <td>Avatar</td>
                      <td><input type="file" name="avatar" class="form-control"/><span style="color: red">
                        <?php echo isset($error['avatar']) ? $error['avatar'] : '';?></span></td>

                      </tr> 
                      <tr>
                        <td></td>
                        <td><input type="submit" name="submit" class="btn btn-primary" value="Register"/>
                          <a href="login.php"><input type="button" class="btn btn-success" value="Login"/></a>

                        </td>
                      </tr>
                    </table>
                  </form>
                </div>
              </body>
              </html>

