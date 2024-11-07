<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["CONFIRM"] == "yes") {
        session_start();
        session_destroy();
    }

    header("Location: main.php");
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>logout</title>
    </head>
    <body>
        Logout ?
        <form method="POST">
            <button name="CONFIRM" value="yes">Yes</button>
            <button name="CONFIRM" value="no">No</button>
        </form>
    </body>
</html>
