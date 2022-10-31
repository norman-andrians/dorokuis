<?php
if (isset($_GET['logout'])) {
    if ($_GET['logout'] == "true") {
        setcookie("user", null, -1, '/');
        header("location:./");
    }
}
else if (isset($_COOKIE["user"])) {
    header("location:user");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit&family=Montserrat:wght@600&family=Noto+Sans&family=PT+Sans&family=Poppins:wght@400;600;700&family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dorokuis</title>
    <link rel="stylesheet" href="./assets/styles/main.css">
    <link rel="stylesheet" href="./assets/styles/main-page.css">
</head>
<body>
    <div class="nav-container">
        <div class="nav-menu">
            <form action="" class="row-menu ftg-form">
                <input type="number" name="" id="" placeholder="Enter code">
                <input type="submit" value="Enter">
            </form>
            <div class="row-menu nm-btn"><a href="./login/"><button>Login</button></a></div>
            <div class="row-menu nm-btn"><a href="#"><button>SignUp</button></a></div>
        </div>
    </div>
    <div class="landing-page">
        <div class="lp-text">
            <div class="main-heading">
                <h1>It matters<br><span class="lt">how you ask</span></h1>
                <div class="l-desc">Assessment, Introduction, and pracice that motivate every students to mastery</div>
            </div>
            <div class="main-input">
                <div class="lp-s-button reg-btn"><a href="#"><button>
                    <div class="lp-btn-h4">CREATE</div>
                    <div class="lp-btn-t">SignUp</div>
                </button></a></div>
            </div>
        </div>
    </div>
</body>
</html>