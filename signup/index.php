<?php
include '../connect.php';

$data = mysqli_query($connection, "SELECT * FROM `userccount`");

$correct = false;

if (isset($_POST['sign'])) {
    $username = $_POST['username'];
    $usermail = $_POST['usermail'];
    $userpass = $_POST['userpass'];
    $new_id = rand(100000, 999999);

    while ($rows = mysqli_fetch_array($data)) {
        if ($usermail != $rows['usermail'] && $userpass != $rows['userpass'] && $new_id != $rows['u_id']) {
            $correct = true;
            mysqli_query($connection, "INSERT INTO `userccount` (`usermail`, `userpass`, `username`, `id`, `u_id`) VALUES ('$usermail', '$userpass', '$username', NULL, '$new_id')");
            setcookie("user", $new_id, time() + (86400 * 30), "/"); // 86400 = 1hari
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
            <h1 class="main-head"><span class="lt">Dorokuis</span> sign-up</h1>
            <form action="index.php" method="post" class="f-log">
                <div class="inp-text"><input type="text" name="username" id="name" placeholder="username" required></div>
                <div class="inp-text"><input type="email" name="usermail" id="email" placeholder="email" required></div>
                <div class="inp-text"><input type="password" name="userpass" id="pass" placeholder="password" required></div>
                <div class="warn-text"><?php if ($correct == false && isset($_POST['login'])) { echo "email atau password yang dimasukan sudah tersedia ada"; } ?></div>
                <div class="inp-sub"><input type="submit" value="Up" name="sign"></div>
            </form>
        </div>
    </div>
</body>
</html>