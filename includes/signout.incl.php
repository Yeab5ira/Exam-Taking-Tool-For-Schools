<?php 
session_start();

if(isset($_SESSION['username'])){
    session_unset();
    session_destroy();
    header("Location: ../index.php?signedout=true");
    exit();
}else{
    header("Location: ../studentDashboard.php");
}

?>