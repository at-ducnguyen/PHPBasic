<?php include 'menu.php'; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
$username = $_SESSION['username'];
require_once('db.php');
$sql="SELECT * FROM users where username='$username'";
$query = $conn->prepare($sql);
$query->execute();
$row = $query->fetch();
?>
<html>
<head>
	<title>Profile</title>
	<meta charset="utf-8">
</head>
<body>
	<div class=" col-md-6 col-md-offset-3">
   <h3>Hello <?php echo $_SESSION['username'];  ?> You are login successfully !
     <a href="logout.php">Logout </a> 
     <p></p>
   </h3>
 </div> 
 <div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="well well-sm">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img src=" <?=$row['avatar']?>" alt="" class="img-rounded img-responsive" />
          </div>
          <div class="col-sm-6 col-md-8">
            <h4>
              <?='Username : '.$row['username']?></h4>
              <small><i class="glyphicon glyphicon-map-marker">
              </i><cite title="San Francisco, USA"> <?=$row['address']?> </cite></small>
              <p>
                <i class="glyphicon glyphicon-envelope"></i> <?=$row['email']?>
                <br />
                <i class="glyphicon glyphicon-globe"></i><a href=" <?=$row['url']?>"> <?=$row['url']?></a>
                <br />
                <i class="glyphicon glyphicon-gift"></i> <?=$row['birthday']?></p>
                <!-- Split button -->
                <div class="btn-group">
                  <a href="changepassword.php"><button type="button" class="btn btn-primary">
                  Change Password</button></a>
                  <a href="update.php"><button type="button" class="btn btn-primary">
                  Update Profile</button></a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </style>
</body>
</html>