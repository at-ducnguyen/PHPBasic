<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<style>
body {
    padding-top: 50px;
}
.color-link{
    background-color: red;
    color: white !important;
}
.color-link:hover{
    color: black !important;
}
</style>
<title>PHP Basic</title>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><i class="glyphicon glyphicon-home"></i> Home</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php session_start(); if(isset($_SESSION['username'])) : ?>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> Member List </a>
                    <ul class="dropdown-menu multi-level">
                        <li><a href="/member.php"><i class="glyphicon glyphicon-th-list"></i> Php Pagination</a></li>
                        <li class="divider"></li>
                        <li><a href="/memberlist.php"><i class="glyphicon glyphicon-th-list"></i> Jquery Pagination </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li><a href="/profile.php">Profile</a></li>
                        <li><a href="/update.php">Update Profile</a></li>
                        <li><a href="/changepassword.php">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout.php">Logout <i class="glyphicon glyphicon-log-out"></i></a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="/register.php">Register <i class="glyphicon glyphicon-log-in"></i></a></li>
            <li><a href="/login.php" >Login <i class="glyphicon glyphicon-log-in"></i></a></li>
            <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav">
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<style>
    .dropdown-menu{
    border-radius: 0px;
    -webkit-box-shadow: none;
    box-shadow: none
}

.dropdown-submenu {
    position: initial;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
  left: 100%;
  margin-top: -1px;
  margin-left: -1px;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  min-height: 101%;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>