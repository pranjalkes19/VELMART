<?php
session_start();
session_unset();
$_SESSION['loggedin1']=false;
if(session_destroy()){
header("location: login.php");
}
?>
