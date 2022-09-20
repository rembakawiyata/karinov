<?php
    include "./Backend/local-server-connect.php";
?>
<html>
    <body>
        <div class="article-nav">
            <!--Navigasi samping isi artikel-->
            <head>
                <meta charset="utf-8">
                <title>Artikel Jendela Ilmu Rembaka Wiyata</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" media="screen and (min-width: 1024px)" href="./Css/articles.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
            </head>
            <body>
                <input type="checkbox" id="check">
                <!--header area start-->
                <header>
                    <div class="left_area">
                        <h3>Rembaka Wiyata</h3>
                    </div>
                    <div class="right_area">
                        <a href="#" class="search_btn">Cari Artikel</a>
                    </div>
                </header>
                <!--header area end-->
                <!--sidebar start-->
                <div class="sidebar">
                    <ul>
                        <?php
                            $getArticles = mysqli_query($connectUser, "SELECT * FROM artikel");
                            while ($row = mysqli_fetch_assoc($getArticles)) {
                                echo '<li><a target="_blank" href="./article.php?id='.$row['id'].'">'.$row['judul'].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <!--sidebar end-->

                <div class="content">
                    <div class="art-section1">
                        <div class="article-content">
                            <!--Isi artikel terdiri dari gambar text dll-->
                            <!--Dibuat flex-->
                            <?php
                                $getArticles = mysqli_query($connectUser, "SELECT * FROM artikel");
                                while ($row = mysqli_fetch_assoc($getArticles)) {
                                    $videoYTId = substr($row['video'], -11);
                                    echo '
                                        <div class="group" onclick="location.href=\'./article.php?id='.$row['id'].'\'">
                                            <img class="imgart1" src="https://img.youtube.com/vi/'.$videoYTId.'/0.jpg" width="100%">
                                            <div class="group-text">'.$row['judul'].'</div>
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="transition1"></div>
                    <div class="art-section2">
                        <div class="article-content">
                            <!--Isi artikel terdiri dari gambar text dll-->
                            <!--Dibuat flex-->
                        </div>
                    </div>
                </div>
            </body>   
            <footer>
                <div class="row">
                    <div class="col">
                        <p>
                            Rembaka Wiyata
                            2022
                        </p>
                    </div>
                    <div class="col">
                        <h3>Ftmd 2022 <div class="underline"><span></span></div></h3>
                        <p>Made for aksang FTMD 2022</p>
                        <p>By IT TEAM FTMD 2022</p>
                        <h4>085751194707</h4>
                    </div>
                    <div class="col">
                        <h3 class="linkpos">Links<div class="underline"><span></span></div></h3>
                        <ul class="footernav">
                            <li onclick="location.href='#'"><a>Home</a></li>
                            <li onclick="location.href=''"><a>Content</a></li>
                            <li onclick="location.href=''"><a>Forum</a></li>
                            <li onclick="location.href=''"><a>Contact</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h3>Social Media<div class="underline"><span></span></div></h3>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/ftmd.22/" target="_blank"><i class="fa-brands fa-instagram" ></i></a>
                            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="copyright1">FTMD @ 2022 - All Rights Reserved</p>
            </footer>
        </div>
    </body>
</html>