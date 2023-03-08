<?php
require_once 'header.php';
session_start();
unset($_SESSION['id']);
$_SESSION['login'] = false;
header("location:login.php");


require_once 'footer.php';