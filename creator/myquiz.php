<?php
include '../connect.php';

$code = 42312;

$data = mysqli_query($connection, "SELECT * FROM `gquiz` WHERE `ncode` = $code ORDER BY `gnum`");

$username = $_COOKIE['user'];

if (isset($_POST['del']) && $_POST['num'] != '' && $_POST['del'] == "true") {
    $deleteIndex = (int)$_POST['del'];

    mysqli_query($connection, "DELETE FROM `gquiz` WHERE `ncode` = $code AND `gnum` = $deleteIndex");

    header("location:myquiz.php");
}

if (isset($_POST['added']) && isset($_POST['qname'])
    && isset($_POST['opt1']) && isset($_POST['opt2']) && isset($_POST['opt3']) && isset($_POST['opt4'])
    && isset($_POST['gans']))
{
    $qname = $_POST['qname'];
    $options = array($_POST['opt1'], $_POST['opt2'], $_POST['opt3'], $_POST['opt4']);
    $answer = $_POST['gans'];
    $name = mysqli_fetch_array(mysqli_query($connection, "SELECT `gname` FROM `gquiz` WHERE `ncode` = $code ORDER BY `gnum`"))[0];
    $num = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(*) FROM `gquiz` WHERE `ncode` = $code ORDER BY `gnum`"))[0] + 1;

    $tquery = "INSERT INTO `gquiz` (`id`, `ncode`, `gname`, `gauthor`, `gtime`, `gscore`, `gnum`, `gquest`, `opa`, `opb`, `opc`, `opd`, `gans`) VALUES (NULL, '$code', '$qname', '$username', '400', '200', '$num', '$qname', '".$options[0]."', '".$options[1]."', '".$options[2]."', '".$options[3]."', '$answer')";

    mysqli_query($connection, $tquery);

    header("location:myquiz.php");
}

function markedAnswer($ans, $nums) {
    $ansindex = 0;

    switch ($ans) {
        case 'a': $ansindex = 0; break;
        case 'b': $ansindex = 1; break;
        case 'c': $ansindex = 2; break;
        case 'd': $ansindex = 3; break;
    }

    $ansout = "<script>document.querySelectorAll('.anss-$nums')[$ansindex].style.background = \"#209665\"; document.querySelectorAll('.anss-$nums')[$ansindex].style.color = \"white\";</script>\n";

    return $ansout;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&family=Montserrat:wght@400;600;700&family=Noto+Sans&family=PT+Sans:wght@400;700&family=Poppins:wght@400;600;700&family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Creator Template</title>
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/creator-quiz-page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9833b8478b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main-nav">
        <div class="nav-menu">
            <div class="nav-row"><a href="../"><button>Home</button></a></div>
        </div>
    </div>
    <?php
    if (isset($_GET['add'])) {
    ?>
    <div class="add-popup">
        <div class="add-box">
            <div class="ab-close-btn"><a href="./myquiz.php"><button><i class="fa-solid fa-xmark"></i></button></a></div>
            <h1 class="adf-title">Add new question</h1>
            <form action="./myquiz.php" method="post" class="add-form">
                <div class="adf-inp"><input type="text" name="qname" id="name" placeholder="Type your question here..."></div>
                <div class="adf-desc">Click alphabet options to settle on the correct answer</div>
                <div class="qoptions">
                    <div class="opt-row"><div class="opt-alp"><button type="button">A. </button></div><div class="adf-opt"><input type="text" name="opt1" id="" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">B. </button></div><div class="adf-opt"><input type="text" name="opt2" id="" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">C. </button></div><div class="adf-opt"><input type="text" name="opt3" id="" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">D. </button></div><div class="adf-opt"><input type="text" name="opt4" id="" placeholder="Type on answer option here..."></div></div>
                </div>
                <input id="addanswer" type="hidden" name="gans" value="">
                <div class="adf-button"><button type="submit" name="added" value="true">Add</button></div>
            </form>
        </div>
    </div>
    <?php
    }
    else if (isset($_GET['del']) && $_GET['del'] == "false" && $_GET['num'] != '') {
    ?>
    <div class="delete-popup add-popup">
        <div class="del-box add-box">
            <div class="ab-close-btn"><a href="./myquiz.php"><button><i class="fa-solid fa-xmark"></i></button></a></div>
            <h1 class="adf-title">Delete Question</h1>
            <div class="del-desc">Are you sure want to delete this question?</div>
            <form class="del-btns" method="POST">
                <input type="hidden" name="num" value="<?php echo $_GET['num'] ?>">
                <button type="submit" name="del" value="true">Yes</button>
                <button>No</button>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="quiz-title">
        <h1><?php echo mysqli_fetch_array(mysqli_query($connection, "SELECT `gname` FROM `gquiz` WHERE `ncode` = $code"))[0]; ?></h1>
    </div>
    <div class="main-quiz">
        <div class="q-rows">
        <?php
        while ($qrows = mysqli_fetch_array($data)) {
            ?>
            <div class="q-row" gnum="<?php echo $qrows['gnum'] ?>">
                <div class="qname"><?php echo $qrows['gquest']; ?></div>
                <div class="q-opt">
                    <div class="q-opt-row anss-<?php echo $qrows['gnum'] ?>"><?php echo $qrows['opa'] ?></div>
                    <div class="q-opt-row anss-<?php echo $qrows['gnum'] ?>"><?php echo $qrows['opb'] ?></div>
                    <div class="q-opt-row anss-<?php echo $qrows['gnum'] ?>"><?php echo $qrows['opc'] ?></div>
                    <div class="q-opt-row anss-<?php echo $qrows['gnum'] ?>"><?php echo $qrows['opd'] ?></div>
                </div>
                <div class="q-ed">
                    <div class="q-edit-btn"><button>Edit</button></div>
                    <form class="q-del-btn">
                        <a href="?num=<?php echo $qrows['gnum']; ?>&del=false"><button>Delete</button></a>
                    </form>
                </div>
            </div>
            <?php
            echo markedAnswer($qrows['gans'], $qrows['gnum']);
        }
        ?>
        </div>
        <div class="add-btn"><a href="?add=yes"><button id="add-btn">Add</button></a></div>
    </div>
    <div class="propos-btns">
        <button>Public</button>
    </div>
    <script type="module" src="../assets/scripts/quiz-choices.js"></script>
</body>
</html>