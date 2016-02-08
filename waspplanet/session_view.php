<?php
session_start();
echo "Artiste Cred: ". $_SESSION['artiste']. "<br/><br/>";
echo "U_ID Cred: ". $_SESSION['u_id']. "<br/><br/>";
echo "Subscriber Cred: ". $_SESSION['username'];
?>