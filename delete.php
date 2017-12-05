<?php
    require_once('db.php');
    $id =$_REQUEST['id'];
    $query = $conn->prepare("DELETE FROM users WHERE id = $id");
    $query->execute();
    header('Location:memberlist.php');     

    ?>