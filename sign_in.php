<?php
    $sing_in_user = 0;
    $sing_in_failed = 0;
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * from `registration` where username='$username' and password='$password'";

        $results = mysqli_query($con, $sql);
        if($results) {
            $num = mysqli_num_rows($results);
            if($num > 0) {
                // echo "Sign in success!";
                $sing_in_user = 1;
            } else {
                // echo 'Invalid username or password';
                $sing_in_failed = 1;
            }
        }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
</head>
<body>
    <div class="nwt-auth">
        <?php
            if($sing_in_failed) {
                ?><h2 style="background-color: red; color: #fff; padding: 14px; border-radius: 5px">Invalid username or password!</h2><?php
            }
            if($sing_in_user) {
                ?><h2 style="background-color: green; color: #fff; padding: 14px; border-radius: 5px">Signin success!</h2><?php
            }
        ?>
        <form action="sign_in.php" method="post">
            <div class="nwt-field">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="nwt-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="nwt-field">
                <input type="submit" name="sign_in" value="Sign In">
            </div>
        </form>
    </div>
</body>
</html>