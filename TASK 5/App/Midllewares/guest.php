<?php
if(!empty($_SESSION['user']))
{
    header("Location: index.php");
    die;
}