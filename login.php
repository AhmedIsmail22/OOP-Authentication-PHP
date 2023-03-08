<?php 
require_once 'function.php';
require_once 'header.php'; 

if($_SESSION['login']){
    header("location:index.php");
}
if(isset($_POST['submit'])){

    $login = new Login();
    $result = $login->login($_POST['nameEmail'],$_POST['password']);

    if($result == 1){

        $_SESSION['login'] = true;
        $_SESSION['id'] = $login->idUser();

            header("location:index.php");
    }elseif($result == 10){
        echo
            "<script>alert('Condetional Error')</script>";
    }elseif($result == 100){
        echo
            "<script>alert('User Not Exist')</script>";
    }
}


?>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Register</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none"></a>
                </div>
            </div>
            <form method="POST" action="">
    
            <div class="mb-3">
                    <label for="email" class="form-label">Name or E-Mail</label>
                    <input type="text" class="form-control" id="email" name="nameEmail" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form><br><br>
            <a href="register.php">Register</a>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
