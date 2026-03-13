<?php

session_start();
session_unset(); 
session_destroy(); 

echo "<script>alert('Logged out successfully')</script>";
echo "<script>window.open('../user/user_loging.php', '_self')</script>";

?>