<?php
session_start();
unset($_SESSION['user']);
setcookie('remember-me','',time()-3600,'/');
header("Location: login.php");
die;