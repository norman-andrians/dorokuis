<?php
include "../connect.php";

$quiz_data;

if (isset($_COOKIE["user"])) {
    $user_id = $_COOKIE["user"];
    $quiz_data = mysqli_query($connection, "SELECT * FROM `quiz` WHERE `author_id` = '$user_id'");
}
else {
    header("location:../");
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
    <?php
    if (isset($_GET['delete'])) {
    ?>
    <div class="delete-popup add-popup">
        <div class="del-box add-box">
            <div class="ab-close-btn"><a href="./myquiz.php?id=<?php echo $code; ?>"><button><i class="fa-solid fa-xmark"></i></button></a></div>
            <h1 class="adf-title">Delete Quiz</h1>
            <div class="del-desc">Are you sure want to delete this quiz?</div>
            <form class="del-btns" action="./quiz-data.php" method="POST">
                <input type="hidden" name="code" value="<?php echo $_GET['delete'] ?>">
                <input type="hidden" name="id" value="<?php echo $code; ?>">
                <button id="del" type="submit" name="del" value="true">Yes</button>
                <button id="nope" type="submit" name="del" value="false">No</button>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
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
        <?php
        if (mysqli_num_rows($quiz_data) > 0) {
            while ($qrows = mysqli_fetch_array($quiz_data)) {
                ?>
        <div class="myquiz-c-row">
            <div class="myquiz-c-sect">
                <div class="myquiz-c-title"><?php echo $qrows['name']; ?></div>
                <div class="myquiz-c-info">
                    <div class="myquiz-info-row"><?php echo $qrows['option']; ?></div>
                    <div class="myquiz-info-row"><?php echo $qrows['type']; ?></div>
                </div>
            </div>
            <div class="myquiz-c-sect">
                <div class="myquiz-c-actions">
                    <form action="../creator/myquiz.php" method="get" class="myquiz-edit-btn">
                        <button type="submit" name="id" value="<?php echo $qrows['qid']; ?>">Edit</button>
                    </form>
                    <form action="index.php" method="get" class="myquiz-delete-btn">
                        <button type="submit" name="delete" value="<?php echo $qrows['qid']; ?>">Delete</button>
                    </form>
                </div>
            </div>
        </div>
                <?php
            }
        ?>
        <div class="myquiz-create"><button class="btn-create">Create</button></div>
        <?php
        } else {
        ?>
        <div class="no-quiz">
            <h1>You haven't created any quiz yet</h1>
            <div class="mq-create"><button class="btn-create">Create</button></div>
        </div>
        <?php
        }
        ?>
    </div>
    <script src="../assets/scripts/nav-user.js"></script>
</body>
</html>