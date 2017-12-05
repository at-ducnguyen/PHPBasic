<?php include 'menu.php'; ?>
<?php
    require_once('db.php');
    $id =$_REQUEST['id'];
    $sql = "SELECT * FROM `users` WHERE id=$id";
    $query = $conn->prepare($sql);
    $query->execute();
$user = $query->fetch();
?>

<body>
	<div class=" col-md-6 col-md-offset-3">
   <h3>This is <?php echo $user['username'];  ?> profile !
     
   </h3>
 </div> 
 <div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="well well-sm">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img src="/<?=$user['avatar']?>" alt="" class="img-rounded img-responsive" />
          </div>
          <div class="col-sm-6 col-md-8">
            <h4>
              <?='Username : '.$user['username']?></h4>
              <small><i class="glyphicon glyphicon-map-marker">
              </i><cite title="San Francisco, USA"> <?=$user['address']?> </cite></small>
              <p>
                <i class="glyphicon glyphicon-envelope"></i> <?=$user['email']?>
                <br />
                <i class="glyphicon glyphicon-globe"></i><a href=" <?=$user['url']?>"> <?=$user['url']?></a>
                <br />
                <i class="glyphicon glyphicon-gift"></i> <?=$user['birthday']?></p>
                
                <div class="btn-group">
                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

