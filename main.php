<?php

session_start();


$uname = "";
$pass = "";

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $pass = $_SESSION['password'];
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>yo</title>
    </head>
    <body>
        <?php if (!isset($_SESSION['username'])): ?>
        <p>Login <a href="login.php">here</a></p>
        <?php else: ?>


        <p>Hello, <?php echo $uname?> </p>
        <p>Your password is <?php echo $pass?> </p>
        <a href="logout.php">Logout</a>

        <?php endif?>
    </body>
</html>
