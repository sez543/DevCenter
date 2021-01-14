<!DOCTYPE html>
<html lang="en">

<head>
    <title>403 Forbidden</title>
    <style>
    @import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");

    * {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        box-sizing: border-box;
        color: inherit;
    }

    html {
        height: 100%;
    }

    body {
        background-image: linear-gradient(120deg, #424242 0%, #000000 100%);
        height: 100vh;
    }

    h1 {
        font-size: 45vw;
        text-align: center;
        position: fixed;
        width: 100vw;
        z-index: 1;
        color: #ffffff26;
        text-shadow: 0 0 50px rgba(0, 0, 0, 0.07);
        top: 50%;
        transform: translateY(-50%);
        font-family: "Montserrat", monospace;
    }

    .box {
        height: 250px;
        background: rgba(0, 0, 0, 0);
        width: 70vw;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        margin: 0 auto;
        padding: 30px 30px 10px;
        box-shadow: 0 0 150px -20px rgba(0, 0, 0, 0.5);
        z-index: 3;
    }

    P {
        font-family: "Share Tech Mono", monospace;
        color: #f5f5f5;
        margin: 0 0 20px;
        font-size: 18px;
        line-height: 1.2;
    }

    span {
        color: #448aff;
    }

    i {
        color: #fff;
    }

    div a {
        text-decoration: none;
    }

    b {
        color: #ff5252;
    }

    a {
        color: #ffc107 !important;
    }

    a:hover {
        color: #ffc107 !important;
    }

    a.avatar {
        position: fixed;
        bottom: 15px;
        right: -100px;
        animation: slide 0.5s 4.5s forwards;
        display: block;
        z-index: 4
    }

    a.avatar img {
        border-radius: 100%;
        width: 44px;
        border: 2px solid white;
    }

    @keyframes slide {
        from {
            right: -100px;
            transform: rotate(360deg);
            opacity: 0;
        }

        to {
            right: 15px;
            transform: rotate(0deg);
            opacity: 1;
        }
    }
    </style>
</head>

<body style="height: 100%">
    <h1>403</h1>
    <div class="box">
        <p>> <span>ERROR CODE</span>: "<i>HTTP 403 Forbidden</i>"</p>
        <p>> <span>ERROR DESCRIPTION</span>: "<i>Access Denied. You Do Not Have The Permission To
                Access This Page On This Server</i>"</p>
        <p>> <span>ERROR POSSIBLY CAUSED BY</span>: [<b>Access forbidden</b>]</p>
        <p>> <span>SOME PAGES ON THIS SERVER THAT YOU DO HAVE PERMISSION TO ACCESS</span>: [<a href="/">Home Page</a>,
            <a href="about_us.php">About Us</a>, <a href="all_posts.php">Jobs</a>, <a href="contacts.php">Contact
                Us</a>, <a href="login.php">Login</a>, <a href="register.php">Register</a>]
        </p>
    </div>
</body>

</html>