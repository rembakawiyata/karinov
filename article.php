<?php
    session_start();
    include "./Backend/local-server-connect.php";
    include "./Backend/user-data.php";

    $id = $_GET['id'];

    $userInfo = $_SESSION['user_info'];

    $query = mysqli_query($connectUser, "SELECT * FROM artikel WHERE id='$id'");

    while($row = mysqli_fetch_array($query)) {
        $judul = $row['judul'];
        $desc = nl2br($row['deskripsi']);
        $link = $row['video'];
    }

    if (substr($link, 0, 4) == "www.") {
        $pattern = 'www.';
        $link = str_ireplace($pattern, "https://www.", $link);

    }
    if (substr($link, 0, 15) == "www.youtube.com" || substr($link, 0, 23) == "https://www.youtube.com") {
        $pattern = 'embed/';
        $link = str_ireplace("watch?v=", $pattern, $link);
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php
            echo $judul;
        ?></title>
        <link rel="stylesheet" media="screen and (min-width: 1024px)" href="./Css/articleItem.css"> 
        <script src="https://kit.fontawesome.com/ab7db22d73.js" crossorigin="anonymous"></script>
        <script src="../Jquery/jquery.js"></script>
    </head>
    <body>
        <span>
            <input type="hidden" value=<?php echo $id; ?> id="articleId">

            <?php
                if (isset($userInfo)) {
                    echo '<input type="hidden" value="'.$userInfo[1].'" id="articleId">';
                } else {
                    echo '<input type="hidden" value="anonymus" id="articleId">';
                }
            ?>
        </span>
        <nav>
            <div class="wrapper">
                <div class="logo"><h2>Rembaka Wiyata</h2></div>
                <div class="menu">
                    <ul>
                        <li onclick="location.href='#'">Home</li>
                        <li onclick="location.href='./articles.html'">Content</li>
                        <li onclick="location.href=''">Forum</li>
                        <li onclick="location.href=''">Contact</li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="background">
            <!--background bisa diganti-->
            <img src="https://www.itb.ac.id/files/dokumentasi/1618210624-DSC_8353.JPG" width="100%">
        </div> 
        <div class="articlex">
            <div class="judulartikel">
                <h1><?php echo $judul; ?></h1> 
            </div>
            <div class="articlebody">
                <div class="article-content">
                    <!--Isi judul video dan text article-->
                    <div class="linkvid">
                    <!--gunakan fitur embed youtube utk link dibawah-->
                    <iframe width="560" height="315" <?php echo "src='".$link."'"; ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <hr>
                    <!--artikel ditulis dibawah-->
                    <article>
                        <p><?php echo $desc; ?></p>
                    </article>
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
                <p class="email-id">noratajuanaaron@gmail.com</p>
                <h4>085751194707</h4>
            </div>
            <div class="col">
                <h3>Links<div class="underline"><span></span></div></h3>
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
    <!-- <script>
        $("#submit").click(() => {
            console.log("button is clicked");
            var articleId = $("#articleId").val();
            var userId = $("#userId").val();
            var comment = $("#comment").val();

            $.post('./Comments/commentForm.php', {
                submit: 'submit',
                articleId: articleId,
                userId: userId,
                comment: comment,
                type: 'parent'
            }, alert("Comment is sent!"));
        });
    </script> -->

    <style>
        *{
            text-decoration: none;
            margin: 0px;
            padding: 0px;
        }
        .wrapper{
            width: 100%;
            margin: auto;
            position: relative;
            height: 30px;
        }
        nav{
            width: 100%;
            position: fixed;
            top: 0;
            background: #ee8e4f;
            z-index: 9999999;
            text-align: right;
            padding: 20px 20px;
            box-shadow: 0.2px 0.2px 3px grey;
        }
        body{
            background-color: #fafbfb;
        }
        .logo{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600;
            float: left;
            color: rgb(255, 255, 255);
            margin: 0;
            text-transform: uppercase;
            font-size: 15px;
        }
        nav ul{
            list-style: none;
            margin-right: 40px;
        }
        nav ul li{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            padding: 10px 20px;
            text-transform: capitalize;
            cursor: pointer;
            transition: all 300ms;
            color: rgb(255, 255, 255);
        }
        nav ul li:hover{
            background-color: #5f2109;
            color: white;
        }
        .background{
            width: 100%;
        }
        .articlex{
            margin-top: -500px;
            justify-content: center;
            width: 92%;
            margin-left: 4%;
        }
        .judulartikel{
            position: relative;
            text-align: center;
            padding: 30px;
            padding-top: 30px;
            background-color: #fafbfb;
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0px 1px 1px #cdcdcd;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .articlebody{
            display: flex;

        }
        .article-content{
            flex-basis: 100%;
            padding: 10px;
            background-color: #fafbfb;
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0px 1px 1px #cdcdcd;
        }
        .linkvid{
            display: block;
            margin-left: auto;
            margin-right: auto;
            object-fit: fill;
            width: 500px;
            height: 300px;
            margin-bottom: 50px;
        }
        .comment-section{
            flex-basis: 20%;
            padding: 10px;
            background-color: #fafbfb;
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0px 1px 1px #cdcdcd;
            max-width: 20%;
            word-wrap: break-word;
        }
        article{
            margin-left: 20px;
        }
        footer{
            width: 100%;
            margin-top: 30px;
            background: linear-gradient(to right, #00093c, #2d0b00);
            color: #fff;
            padding: 100px 0 30px;
            border-top-left-radius: 125px;
            font-size: 13px;
            line-height: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .row{
            width: 85%;
            margin: auto;
            margin-left: 150px;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
            
        }
        .col{
            flex-basis: 20%;
            padding: 10px;
        }
        .col:nth-child(2){
            flex-basis: 25%;
        }
        .col:nth-child(3){
            flex-basis: 15%;
        }
        .logofooter{
            width: 40px;
            margin-bottom: 10px;
        }
        .col h3{
            width: fit-content;
            margin-bottom: 25px;
            position: relative;
        }
        .email-id{
            width: fit-content;
            border-bottom: 1px solid #ccc;
            margin: 20px 0;
        }
        .col ul li{
            list-style: none;
            margin-bottom: 12px;

        }
        .col ul li a{
            text-decoration: none;
            color: white;
        }
        .social-icons .fa-brands{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            font-size: 20px;
            color:#000;
            background: #fff;
            margin-right: 15px;
            cursor: pointer;
        }
        hr{
            width: 95%;
            border: 0;
            border-bottom: 3px solid rgb(114, 113, 113);
            margin: 20px auto;
        }
        .copyright1{
            text-align: center;
        }
        .footernav{
            cursor: pointer;
        }
        .underline{
            width: 100%;
            height: 5px;
            background: #767676;
            border-radius: 3px;
            position: absolute;
            top: 25px;
            left: 0;
            overflow: hidden;
        }
        .underline span{
            width: 15px;
            height: 100%;
            background: white;
            border-radius: 3px;
            position: absolute;
            top: 0;
            left: 10px;
            animation: moving 2s linear infinite;
        }
        @keyframes moving{
            0%{
                left: -20px;
            }
            100%{
                left: 100%;
            }
        }

        @media (max-width: 700px){
            footer{
                bottom: unset;
            }
            .col{
                flex-basis: 100%;
            }
            .col:nth-child(2){
                flex-basis: 100%;
            }
            .col:nth-child(3){
                flex-basis: 100%;
            }
        }
        .comment-section .form .input-group{
            width: 100%;
            height: 30px;
            margin-bottom: 30px ;
        }
        .comment-section .form .input-group label{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            margin-bottom: -15px;
            display: block;
        }
        .comment-section .form .input-group input{
            width: 100%;
            height: 100%;
            border: 1px solid #5f2109; 
            outline: none;
            padding: 5px 10px ;
        }
        .comment-section .form .input-group textarea{
            width: 100%;
            height: 100%;
            border: 1px solid #5f2109; 
            outline: none;
            padding: 5px 10px ;
            resize: none;
            height: 100px;
        }
        .form .hr1{
            margin-top: 10px;
            width: 100%;
        }
        .comment-section .prvw-comments .single-item{
            background: #efefef;
            padding: 10px 10px;
            border: none ; 

        }
        .comment-section .prvw-comments .single-item h4{
            font-size: 20px;
            font-weight: 700;

        }
        .comment_footer{
            display: flex;
            font-size: 10px;
            opacity: 0.6;
            gap: 8px;
            justify-content: flex-end;
            align-items: center;
            margin-top: 6px;
        }
        .show-reply{
            cursor: pointer;
        }
        .replies{
            margin-left: 20px;
            margin-top: 10px;
            background-color: #fafbfb;
            border-left: 2px solid #cfcfcf;
            padding-left: 10px;
        }
        #submit{
            font-size: 15px;
            margin-top: 76px;
            padding: 5px;
        }
    </style>
</html>