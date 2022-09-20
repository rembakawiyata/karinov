<?php
    include "local-server-connect.php";

    $userArray = array();
    $getUser = mysqli_query($connectUser, "SELECT * FROM users");

    while($row = mysqli_fetch_assoc($getUser)) {
        $userArray[$row['user_id']] = $row['username'];
    }

?>