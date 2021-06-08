<?php require_once("../resources/config.php"); ?>

<?php
if(isset($_POST['submitimage'])){
  if (count($_FILES) > 0) {
      if (is_uploaded_file($_FILES['image']['tmp_name'])) {
          $cid = $_POST['cid'];
          $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $sql = "UPDATE `category` SET `categoryimage`= '{$imgData}' WHERE `categoryid` = '$cid'";
          $result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
          if (isset($result)) {
              header("Location: categories.php");
          }
      }
  }
}

?>
