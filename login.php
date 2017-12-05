<?php include 'menu.php'; ?>
<?php
session_start();
if (isset($_SESSION['username'])) {
 header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Asian Tech - Internship</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
  <?php
  require_once("db.php");
  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "" || $password =="") {
     $err = "*Username or password is blank";
   }
   else{
     $sql = "SELECT * FROM users where username = '$username' and password = '$password' ";
     $query = $conn->prepare($sql);
     $query->execute();
     if ($query->rowCount() == 0) {
      $err = "*Username or password is incorrect !";
    }
    else{
      $_SESSION['username'] = $username;
      header('Location: profile.php');
    }
  }
}
?>
<div style="margin-left: 350px; margin-right: 650px">
  <h1>Asian Tech - Login</h1>
  <p style="color: red"><?php echo isset($err) ? $err :'' ;?></p>
  <form method="post" action="" class="">
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control"  placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter Password">
    </div>
    <button type="submit" name="submit" class="btn btn-danger">Submit</button> or <a href="register.php">Register</a> if you are a new user !</form>
  </div>
</body>
</html>

