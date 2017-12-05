<?php include 'menu.php'; ?>
<?php 
session_start();
if (!isset($_SESSION['username'])) {
 echo 'You need login to see list of member ! Click <a href="login.php"> here </a> to login'; } 
 else {
  require_once('db.php');

  //Get list user
  $sql = "SELECT * FROM users";
  $query = $conn->prepare($sql);
  $query->execute();
  $users = $query->fetchAll(); 
  //End get list user ser

  //Pagination
  $totalRecords = $query->rowCount();
  $recordPerPage = 3; 
  $totalPage = ceil($totalRecords/$recordPerPage);
  if(isset($_GET['page'])){
    $currentPage= $_GET['page'];
  } else $currentPage = 1;
  $offset = ($currentPage-1)*$recordPerPage;
  $limit = "LIMIT $offset,$recordPerPage";
  $query = "SELECT * FROM users ".$limit; 
  $result = $conn->prepare($query);
  $result->execute();
  $users = $result->fetchAll(PDO::FETCH_ASSOC);
  //End pagination
  ?>
<div class="content">  
  <div class="container">
    <div class="row">
      <div class="panel panel-default widget">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-user"></span>
          <h3 class="panel-title">
          User Member List</h3>
          <span class="label label-info">
            <?php echo 'Total member : '.$totalRecords; ?></span>
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
                <nav aria-label="Page navigation example" style="text-align: center;">
                  <ul class="pagination">
                    <?php if($currentPage > 1 && $totalPage > 0) : ?>
                      <li class="page-item"><a class="page-link" href="/member.php?page=<?=($currentPage-1)?>">Previous</a></li>
                    <?php endif; ?>
                    <?php for($i=1; $i<=$totalPage; $i++): ?>
                      <li class="page-item"><a class="page-link" href='./member.php?page=<?=$i?>'><?=$i?></a> </li>
                    <?php endfor; ?>
                    <?php if($currentPage < $totalPage && $totalPage > 1): ?>
                     <li class="page-item"><a class="page-link" href="/member.php?page=<?=($currentPage+1)?>"> Next</a> </li>
                   <?php endif;?>
                 </ul>
               </nav>
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
       .content{
        margin-top: 50px
       }
     </style>
</div>


     <?php } ?>
     
