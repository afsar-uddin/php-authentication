<?php
    $user = 0;
    $success = 0;
    $password_not_match = 0;
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        var_dump($_POST);
        
        /*
        $sql = " insert into `registration`(username, password) values('$username', '$password') ";
        $results = mysqli_query($con, $sql);

        if($results) {
            echo "Data inserted!";
        } else {
            die(mysqli_error($con));
        }
        */

        $sql = "SELECT * from `registration` where username='$username'";

        $results = mysqli_query($con, $sql);
        if($results) {
            $num = mysqli_num_rows($results);
            if($num > 0) {
                // echo "User already exists!";
                $user = 1;
            } else {
                if($password === $cpassword) {

                    $sql = " insert into `registration`(username, password) values('$username', '$password') ";
                    $results = mysqli_query($con, $sql);
            
                    if($results) {
                        // echo "Signup complete successfully!";
                        $success = 1;
                        // header('location:sign_in.php');
                    } else {
                        die(mysqli_error($con));
                    }

                } else {
                    $password_not_match = 1;
                }

            }
        }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <div class="nwt-auth">
        <?php
            if($user) {
                ?><h2 style="background-color: red; color: #fff; padding: 14px; border-radius: 5px">username is already taken! Try another username</h2><?php
            }
            if($success) {
                ?><h2 style="background-color: green; color: #fff; padding: 14px; border-radius: 5px">Signup is successfully completed! For sign in click <a href="sign_in.php">Here</a></h2><?php
            }
            if($password_not_match) {
                ?><h2 style="background-color: orange; color: #fff; padding: 14px; border-radius: 5px">password and confirm password not matched! please try again...</h2><?php
            }
            var_dump($password_not_match);
        ?>
        <form action="sign_up.php" method="post">
            <div class="nwt-field">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="nwt-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="nwt-field">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword">
            </div>
            <div class="nwt-field">
                <input type="submit" name="sign_up" value="Sign Up">
            </div>
        </form>
    </div>
</body>
</html>