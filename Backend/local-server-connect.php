<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbUser = 'karinov';
    $connectUser = mysqli_connect($host, $user, $pass, $dbUser);

    $hostComment = 'localhost';
    $userComment = 'root';
    $passComment = '';
    $dbComment = 'comment_section';


    $connectComment = mysqli_connect($hostComment, $userComment, $passComment, $dbComment);
?>