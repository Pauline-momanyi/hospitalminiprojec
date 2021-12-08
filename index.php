<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LANDING PAGE</title>
    <style>
        body, html {
            height: 100%;
        }
        .container {
            position: relative;
            background-image: url("images/img1.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            filter: blur(4px); /* Adding blur background image */
        }
        .text {
            text-align: center;
            position: absolute;
            left : 30%;
            top: 30%;
            width: 50%;
            background-color: rgba(256 , 256,256,0.5);
            font-size: 30px;
        }
    </style>
</head>
<body>
<div class="container"></div>
<div class="text">
    <h3> HOSPITAL MANAGEMENT SYSTEM </h3>
    <button class="btn btn-check"><a href="form.php">CLICK TO CONTINUE</a> </button>
</div>
</body>
</html>