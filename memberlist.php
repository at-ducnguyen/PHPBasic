<?php include 'menu.php'; ?>
<?php 
session_start();
 if (!isset($_SESSION['username'])) {
   echo 'You need login to see all list of member ! Click <a href="login.php"> here </a> to login'; } 
  else {
  require_once('db.php');
  $sql = "SELECT * FROM users";
  $query = $conn->prepare($sql);
  $query->execute();
  $users = $query->fetchAll(); 
  ?>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="panel panel-default widget">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-user"></span>
          <h3 class="panel-title">
          User Member List</h3>
          <span class="label label-info">
            <?php echo 'Total member : '.$query->rowCount(); ?></span>
          </div>
          <div class="panel-body">
            <ul class="list-group" id="myList">
              <?php foreach($users as $user): ?>
                <li class="list-group-item" style="list-style-type: none">
                  <div class="row">
                    <div class="col-xs-2 col-md-1">
                      <img src="<?= $user['avatar'] ?>" class="img-circle img-responsive" alt="" /></div>
                      <div class="col-xs-10 col-md-11">
                        <div>
                          <h4 class="text-danger"><?=$user['username']?></h4>
                          <p> <i class="glyphicon glyphicon-map-marker"></i> <?=$user['address']?></p>
                          <p> <i class="glyphicon glyphicon-gift"></i> <?=$user['birthday']?></p>
                          <p> <i class="glyphicon glyphicon-envelope"></i> <?=$user['email']?></p>
                          <p> <i class="glyphicon glyphicon-globe"></i> <?=$user['url']?></p>
                          <div class="action">
                            <button type="button" title="Edit">
                              <span>Profile</span>
                            </button>
                            <a href="delete.php?id=<?=$user['id']?>" onclick="return confirm('Are you sure?')"><button>Delete</button></a>
                            
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php endforeach; ?>
                </ul>
                <div class="col-md-offset-5">

<button id="loadMore" class="btn btn-success">Xem Thêm</button>
<button id="showLess" class="btn btn-danger">Quay Lại</button>
</div>
              </div>
            </div>
          </div>
        </div>


        <style>
        
        body { padding-top:30px; }
        .widget .panel-body { padding:0px; }
        .widget .list-group { margin-bottom: 0; }
        .widget .panel-title { display:inline }
        .widget .label-info { float: right; }
        .widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
        .widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
        .widget .mic-info { color: #666666;font-size: 11px; }
        .widget .action { margin-top:5px; }
        .widget .comment-text { font-size: 12px; }
        .widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }


        #myList li{ display:none;
}



      </style>
      <script>
        
$(document).ready(function () {
size_li = $("#myList li").size();
x=3;
$('#myList li:lt('+x+')').show();
$('#loadMore').click(function () {
x= (x+3 <= size_li) ? x+3 : size_li;
$('#myList li:lt('+x+')').show();
});
$('#showLess').click(function () {
x=(x-3<0) ? 3 : x-3;
$('#myList li').not(':lt('+x+')').hide();
});
});

      </script>

      <?php } ?>