<?php 
require_once 'function.php';
require_once 'header.php'; 

if($_SESSION['login']){
    header("location:index.php");
}
if(isset($_POST['submit'])){

    $register = new Register();
    $result = $register->registration($_POST['name'],$_POST['email'],$_POST['password'],$_POST['confirmpassword']);

    if($result == 1){
        echo
            "<script>alert('Data Is Inserted Successfully.')</script>";

            header("location:login.php");
    }elseif($result == 10){
        echo
            "<script>alert('User Is exist')</script>";
    }elseif($result == 100){
        echo
            "<script>alert('Password And Confirm Password Not Matching.')</script>";
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
                    <label for="email" class="form-label">Name</label>
                    <input type="text" class="form-control" id="email" name="name" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form><br><br>
            <a href="login.php">Login</a>
        </div>
    </div>
    
</div>

<?php require_once 'footer.php'; ?>
