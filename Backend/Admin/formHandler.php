<?php
    include "../local-server-connect.php";

    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $desc = $_POST['deskripsi'];
        $video = $_POST['video'];
        $id = uniqid();

        $articleId = mysqli_query($connectUser, "SELECT id FROM artikel");
        while ($row = mysqli_fetch_assoc($articleId)) {
            if ($row['id'] == $id) {
                $id = uniqid();
            }
        }

        $stmt = mysqli_stmt_init($connectUser);
        $sql = "INSERT INTO artikel (id, judul, deskripsi, video) VALUES (?, ?, ?, ?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Error inserting article";
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $id, $judul, $desc, $video);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }


        mysqli_query($connectComment, "
            CREATE TABLE $id (
            id VARCHAR(535),
            user_id VARCHAR(535),
            comment TEXT,
            type VARCHAR(535),
            parent_id VARCHAR(535)
            )");
    }
?>