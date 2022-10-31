<?php
include '../connect.php';

$data = mysqli_query($connection, "SELECT * FROM `userccount`");

$correct = false;

if (isset($_POST['login'])) {
    $usermail = $_POST['usermail'];
    $userpass = $_POST['userpass'];

    while ($rows = mysqli_fetch_array($data)) {
        if ($usermail == $rows['usermail'] && $userpass == $rows['userpass']) {
            $correct = true;
            setcookie("user", $rows['username'], time() + (86400 * 30), "/"); // 86400 = 1hari
            header("location:../user");
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Montserrat:wght@600&family=Noto+Sans&family=PT+Sans&family=Poppins:wght@400;600;700&family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dorokuis</title>
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/lgn-page.css">
</head>
<body>
    <div class="main-box">
        <div class="main-form">
            <h1 class="main-head"><span class="lt">Dorokuis</span> login</h1>
            <form action="index.php" method="post" class="f-log">
                <div class="inp-text"><input type="email" name="usermail" id="email" placeholder="email" required></div>
                <div class="inp-text"><input type="password" name="userpass" id="pass" placeholder="password" required></div>
                <div class="warn-text"><?php if ($correct == false && isset($_POST['login'])) { echo "email atau password yang dimasukan salah"; } ?></div>
                <div class="inp-sub"><input type="submit" value="Login" name="login"></div>
            </form>
        </div>
    </div>
</body>
</html>