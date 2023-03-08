<?php


require_once 'header.php';

require_once 'function.php';


if($_SESSION['login']){
    $id = $_SESSION['id'];
    $select = new Select;
    $name = $select->selection($id);
    echo "<div class='alert alert-success text-center mt-5' 
    >Wlcome $name</div>";
    echo "
        <a href='logout.php'>Logout</a>
    ";
}else {
    header('location:login.php');
}

require_once 'footer.php';