<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    include "users.php";

    $resp = ["success" => false, "error" => ""];

    if (!isset($_POST['uname']) && isset($_POST['pass'])) {
        $resp["error"] = "Incorrect POST request";
        echo json_encode($resp);
        exit;
    }

    if (!isset($users[$_POST["uname"]])) {
        $resp["error"] = "User not in users";
        echo json_encode($resp);
        exit;
    }

    if (!password_verify($_POST['pass'], $users[$_POST["uname"]])) {
        $resp["error"] = "Incorrect password";
        echo json_encode($resp);
        exit;
    }

    $_SESSION['username'] = $_POST['uname'];
    $_SESSION['password'] = $_POST['pass'];
    $resp["success"] = true;

    echo json_encode($resp);
    exit;
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>login</title>
    </head>
    <body>
        <form id="login-form" action="login.php">
            <br/>
            Username:
            <input type="text" id="uname" name="uname" required>

            <br/>
            Password:
            <input type="password" id="pass" name="pass" required>

            <input type="submit" value="Login">
        </form>

        <span id="err" style="color: red;"></span>
    </body>

    <script>
        document.getElementById("login-form").addEventListener('submit', function(e) {
            e.preventDefault();

            const uname = document.getElementById("uname").value;
            const pass = document.getElementById("pass").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", 'login.php', true);

            var formData = new FormData();
            formData.append('uname', uname);
            formData.append('pass', pass);

            xhr.onreadystatechange = function() {
                if (xhr.status === 200) {
                    var resp = JSON.parse(xhr.responseText);

                    if (resp.success) {
                        window.location.href = 'main.php'
                    } else {
                        document.getElementById('err').textContent = resp.error
                    }
                }
            }

            xhr.send(formData);
        })
    </script>
</html>
