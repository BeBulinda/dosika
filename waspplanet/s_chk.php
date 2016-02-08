<?php 
//session_start();
if(!isset($_SESSION['artiste'])){
    Header('Location:login.php');
}