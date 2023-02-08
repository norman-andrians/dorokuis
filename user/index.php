<?php
if (!isset($_COOKIE["user"])) {
    header(("location:../"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&family=Montserrat:wght@400;600;700&family=Noto+Sans&family=PT+Sans:wght@400;700&family=Poppins:wght@400;600;700&family=Roboto&display=swap" rel="stylesheet">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Menu</title>
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/admin-page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="main-navigation">
        <div class="main-name row-nav-content">
            <div class="logo-name"><span class="lt">Doro</span>kuis</div>
            <div class="user-name"><?php echo $_COOKIE["user"]; ?></div>
            <div class="typ-acc">Basic Account</div>
        </div>
        <div class="row-nav-content main-create">
            <button class="btn-create">Create</button>
        </div>
        <div class="row-nav-content main-nav">
            <div class="row-nav-btn"><button>Search</button></div>
            <div class="row-nav-btn"><button>My Quiz</button></div>
            <div class="row-nav-btn"><button>Profile</button></div>
            <div class="row-nav-btn"><button>Settings</button></div>
            <div class="row-nav-btn"><button>Logout</button></div>
        </div>
    </div>
    <div class="dtab-menu-content search-c">
        <div class="sc-text">
            <h1>What will you teach today?</h1>
            <form action="../questions/games.php" method="post">
                <div class="sc-inp"><input type="number" name="scode" id="scode" placeholder="enter code (5 digits)" min="0"></div>
                <div class="sc-sub"><input type="submit" value="Enter" name="status"></div>
            </form>
        </div>
    </div>
    <div class="dtab-menu-content myquiz-c" style="display: none;">
        <div class="no-quiz">
            <h1>You haven't created any quiz yet</h1>
            <div class="mq-create"><button class="btn-create">Create</button></div>
        </div>
    </div>
    <script src="../assets/scripts/nav-user.js"></script>
</body>
</html>