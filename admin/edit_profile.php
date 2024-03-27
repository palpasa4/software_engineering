<?php

?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row ">
        <div class = "col-xl-5 col-md-4 m-auto p-5 mt-5 bg-info">
            <form action="" method="POST">
            <p class="text-center text-white fw-bold fs-4">Edit Your Details: </p>
            <div class="mb-3">
                <input type="text" name="username" placeholder="Username" class="form-control" required 
                value="">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="password" name="c_pass" placeholder="Confirm Password" class="form-control" required>
            </div>
            <div class="text-center mb-3" >
                <input type="submit" name="login_btn" class="btn btn-primary" value="Update" >
            </div>
            </form>
        </div>
    </div>
</div>
</html>