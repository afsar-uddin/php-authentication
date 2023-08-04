<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header('location:sign_in.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <span style="color: green; text-transform: uppercase;"><?php echo $_SESSION['username']; ?></span></h1>
    <a href="sign_out.php">Sign Out</a>
</body>
</html>