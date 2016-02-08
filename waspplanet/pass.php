<?php
session_start();
if($_SESSION["username"] != true) {
    Header('Location:admin_login.php');
}
