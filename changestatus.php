
<?php require_once("../resources/config.php");?>

<?php

  if(isset($_POST['complete'])){
      $oid = $_POST["oid"];
      $pid = $_POST["pid"];
      $cid = $_POST["cid"];
      $query = "UPDATE `orderhistory` SET `status`= '1' WHERE orderid = '$oid' AND pid = '$pid' AND cid = '$cid'";
      $queryrun = mysqli_query($con , $query);
      header("location: index.php");
  }


?>
