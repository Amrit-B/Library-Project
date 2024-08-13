<?php
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['uname']);
    header('location:login.php');
}
?>