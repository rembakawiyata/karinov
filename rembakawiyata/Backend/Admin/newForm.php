<?php
    include "../local-server-connect.php";
    session_start();
    $userInfo = $_SESSION['user_info'];

    if (!isset($userInfo) || $userInfo[2] != "administrator") {
        header("location: ../../login.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="newForm.css">
        <script type="text/javascript" src="../../Jquery/jquery.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="article-form">
                <form>
                    <label>Judul Artikel</label>
                    <input type="text" placeholder="Judul Artikel" class="input-field" id="judul" require>
                    <label>Isi Artikel</label>
                    <textarea placeholder="Isi Artikel" class="input-field article-box" id="deskripsi" require></textarea>
                    <label>Link Video</label>
                    <textarea placeholder="Link Video" class="input-field" id="video" require></textarea>
                    <button type="button" class="submit-btn" id="submit-article">Upload</button>
                </form>
            </div>
            <div class="article-list">
                <?php
                    $getData = mysqli_query($connectUser, "SELECT * FROM artikel");
                    while ($row = mysqli_fetch_assoc($getData)) {
                        echo "<div class='list-item'>";
                        echo "<p>Id: ".$row['id']."</p>";
                        echo "<p>Judul: ".$row['judul']."</p>";
                        echo "<p>Link Video: <a target='_blank' href='".$row['video']."'>Lihat Video</a></p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
        <script>
            $("#submit-article").click(() => {
                var judul = $("#judul").val();
                var deskripsi = $("#deskripsi").val();
                var video = $("#video").val();

                if (judul != '' && deskripsi != '' && video != '') {
                    $.post('formHandler.php', {
                        submit: 'submitted',
                        judul: judul,
                        deskripsi: deskripsi,
                        video: video
                    }, alert("Article has been submitted!"));

                    $("#judul").val('');
                    $("#deskripsi").val('');
                    $("#video").val('');

                    location.reload();
                }
            });
        </script>
    </body>
</html>