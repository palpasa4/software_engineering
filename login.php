<?php 
include 'config.php';
include 'header.php';
if(isset($_SESSION['user_data'])){
    header("location:http://localhost/blog/admin/index.php");
}

session_start();
    if(isset($_POST['login_btn']))
    {
        $email=mysqli_real_escape_string($config,$_POST['email']);
        $pass=mysqli_real_escape_string($config,$_POST['password']);
        $sql="SELECT * FROM user WHERE email='{$email}' AND password='{$pass}'";
        $query=mysqli_query($config,$sql);
        $data=mysqli_num_rows($query);
    if($data)
    {
        $result=mysqli_fetch_assoc($query);
        $user_data=array($result['user_id'],$result['username'],$result['role']);
        $_SESSION['user_data']=$user_data;
        header("location:admin/index.php");
    }
    else{
        $_SESSION['error']="Invalid email/password.";
    }
    }?>
<div class="container" style="backg">
    <div class="row">
        <div class = "col-xl-4 col-md-4 m-auto p-5 mt-5  rounded">
        <?php 
            if(isset($_SESSION['error']))
            {
                $error=$_SESSION['error'];
                echo "<p class='bg-danger p-2 text-white'>".$error."</p>";
                unset($_SESSION['error']);
            }?>
            <div class="container card border-0 shadow bg-secondary">
            <form action="" method="POST">
            <p class="text-center fs-4 text-light fw-bold mt-3" >Login Your Account:</p>
            <div class="mb-3 mt-2">
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>

            <div class="text-center mb-3" >
                <input type="submit" name="login_btn" class="btn btn-primary" value="LogIn" >
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
