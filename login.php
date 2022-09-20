<?php
    include "./Backend/local-server-connect.php";

    if (isset($_POST['post'])) {
        $user = $_POST['user']; 
        $pass = $_POST['pass'];
    
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = mysqli_stmt_init($connectUser);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'The statement is invalid!';
        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) <= 0) {
                echo "<div class='error'>Wrong User or Pass<div>";
                mysqli_stmt_close($stmt);
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $user = $row['username'];
                    $user_id = $row['user_id'];
                    $role = $row['role'];
                }
        
                session_start();
                if ($role == 'administrator') {
                    $_SESSION['user_info'] = array($user, $user_id, $role);
                    header("location: ./Backend/Admin/newForm.php");
                } else {
                    $_SESSION['user_info'] = array($user, $user_id, '');
                }
            }
    
        }

    }
?>

<html>
    <head>
        <link rel="stylesheet" media="screen and (min-width: 1024px)" href="./Css/login.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard</title>
        <script src="https://kit.fontawesome.com/ab7db22d73.js" crossorigin="anonymous"></script>
        <script src="./Jquery/jquery.js"></script>
    </head>
    <body>
        <div class="background">
            <!--background bisa diganti-->
            <div class="fill">
                <form action="" method="POST" class="form">
                    <div class="lognwrap">
                    <h1 class="logn">Login</h1></div>
                    <div class="input-group">
                        <label for="uname">Username</label>
                        <br>
                        <input type="text" id="name" name="user" placeholder="Masukan username" required>
                    </div>
                    <div class="input-group">
                        <label for="pass">Password</label>
                        <br>
                        <input type="text" id="pass" name="pass" placeholder="Masukan password" required>
                    </div>
                    <div class="buttoncen">
                    <button id="submit" name="post">Login</button>
                    </div>
                </form>
            </div>
        </div> 
    </body>
    <!-- <script>
        $("#submit").click(() => {
            var username = $("#name").val();
            var password = $("#pass").val();

            $.post("./login.php", {
                user: username,
                pass: pass,
                post: 'submit'
            }, alert(username + " " + password));
        });
    </script> -->
</html>