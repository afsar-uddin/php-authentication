<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];
        
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
                echo "User already exists!";
            } else {
                $sql = " insert into `registration`(username, password) values('$username', '$password') ";
                $results = mysqli_query($con, $sql);
        
                if($results) {
                    echo "Data inserted!";
                } else {
                    die(mysqli_error($con));
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
                <input type="submit" name="sign_up" value="Sign Up">
            </div>
        </form>
    </div>
</body>
</html>