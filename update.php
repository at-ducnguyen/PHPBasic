<?php include 'menu.php'; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}
?>
<?php 
require_once('db.php');
$user = $_SESSION['username'];
$sql="SELECT * FROM users where username='$user'";
$query = $conn->prepare($sql);
$query->execute();
$user = $query->fetch();
$username = $user['username'];

$err=" * Required field";
$error = array();
$target_dir = "upload/";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $avatar = $_POST["avatar"];
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if ($email == "") {
        $error["email"] = " *Please fill out this field! ";
    }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = " *Invalid email format"; 
        }

if($avatar){
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $error["avatar"] = " *Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }

if (!$error){
    if ($avatar) {
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
    $update = "UPDATE users SET email='$email' WHERE username='$username'";
    $queryUpdate = $conn->prepare($update);
    $queryUpdate->execute();
   header('Location:profile.php');
}else{

    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
    $update = "UPDATE users SET email='$email',avatar='$target_file' WHERE username='$username'";
    $queryUpdate = $conn->prepare($update);
    $queryUpdate->execute();
   header('Location:profile.php');
}
                       
} 
}

?>
<div style="margin-left: 250px;margin-right: 450px">
    <h1 class="text-center">Update Your Profile</h1> 
    <p style="color: red"><?=$err?></p>

    <form method="post" action="" enctype="multipart/form-data">
        <table cellspacing="0" cellpadding="5" class="table">
            <tr>
                <td>Username <span style="color: red">*</span></td>
                <td><input name="username" value="<?php echo $username?>" class="form-control" readonly></td> 
            </tr>
            
            <tr>
                <td>Email <span style="color: red">*</span></td>
                <td><input type="mail" name="email" value="<?php echo !isset($email) ? $user['email'] : $email?>" class="form-control" placeholder="Enter your email"><span style="color: red">
                    <?php echo isset($error['email']) ? $error['email'] : '' ;?></span></td>
            </tr>

            <tr>
                <td>Avatar</td>
                <td><input type="file" name="avatar" class="form-control"/><span style="color: red">
                    <?php echo isset($error['avatar']) ? $error['avatar'] : '';?></span></td>

            </tr> 
            <tr>
                <td></td>
                <td colspan="1"><input type="submit" name="submit" class="btn btn-primary" value="Update"/>
                    <a href="profile.php"><input type="button" value="Back" class="btn btn-success"></a>
                    
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
