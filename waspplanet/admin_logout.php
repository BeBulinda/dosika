<?php
session_start();
session_destroy();
Header('Location:admin_login.php');
?>