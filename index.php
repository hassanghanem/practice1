<?php

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, 'practice');

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email= strip_tags(mysqli_real_escape_string($con,trim($email)));
    $password= strip_tags(mysqli_real_escape_string($con,trim($password)));


    $query = "select * FROM users WHERE email ='".$email."'";
    $tb1 = mysqli_query($con,$query);
    if(mysqli_num_rows($tb1) > 0){

        $row = mysqli_fetch_array($tb1);
        $password_hash = $row['password'];
        if(Password_verify($password,$password_hash)){
            header('location:home.php');
        }
        else {
            	echo '<script>alert("ERROR Please Register then login!!")</script>';
                header('location:index.php');
        }
    }
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login and Register</title>
    <link rel="stylesheet" href="Style1.css" />
</head>
<body>
    <section id="Signin">
        <div class="container">
            <div class="card">
                <div class="inner-box" id="card">
                    <div class="card-font">
                        <h2>Login</h2>
                        <form method="post" enctype="multipart/form-data" action="index.php">
                            <input type="email" name="email"  class="input-box" placeholder="Your Email ID" required />
                            <input type="password" name="password" class="input-box" placeholder="Password" required />
                            <button type="submit" class="submit-btn">Submit</button>
                            <input type="checkbox" /><span>Remember Me</span>
                        </form>
                        <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                        <a href="">Forget Password</a>
                    </div>


                    <div class="card-back">
                        <h2>Register</h2>
                        <form method="post" action="Registration.php">
                            <input type="text" name="username" class="input-box" placeholder="Your name" required />
                            <input type="email" name="email" class="input-box" placeholder="Your Email ID" required />
                            <input type="password" name="password" class="input-box" placeholder="Password" required />
                            <button type="submit" class="submit-btn">Submit</button>
                            <input type="checkbox" /><span>Remember Me</span>
                        </form>
                        <button type="button" class="btn" onclick="openLogin()">I've an account</button>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <script>
        var card = document.getElementById("card");
        function openRegister() {
            card.style.transform = "rotateY(-180deg)";
        }
        function openLogin() {
            card.style.transform = "rotateY(0deg)";
        }
    </script>
</body>
</html>