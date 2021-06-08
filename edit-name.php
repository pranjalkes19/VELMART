<?php require_once("../resources/config.php"); ?>

<?php
  if(isset($_POST['submitname'])){
      $cid = $_POST['cid'];
      $name = $_POST['name'];
      echo $cid;
      echo $name;
      $query = "UPDATE `category` SET `categoryname`='$name' WHERE `categoryid` = '$cid'";
      $queryrun = mysqli_query($con , $query);
      header("location: categories.php");
  }

?>
