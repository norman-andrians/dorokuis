<?php
include '../connect.php';

$data;
$usercode;
$code;

if (isset($_COOKIE['user']) && isset($_GET['id'])) {
    $usercode = $_COOKIE['user'];
    $code = $_GET['id'];
    $data = mysqli_query($connection, "SELECT * FROM `gquiz` WHERE `qid` = $code ORDER BY `gnum`");
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
            <div class="ab-close-btn"><a href="./myquiz.php?id=<?php echo $code; ?>"><button><i class="fa-solid fa-xmark"></i></button></a></div>
            <h1 class="adf-title">Add new question</h1>
            <form action="./quiz-data.php" method="post" class="add-form">
                <div class="adf-inp"><input type="text" name="qname" id="name" placeholder="Type your question here..."></div>
                <div class="adf-desc">Click alphabet options to settle on the correct answer</div>
                <div class="qoptions">
                    <div class="opt-row"><div class="opt-alp"><button type="button">A. </button></div><div class="adf-opt"><input type="text" name="opt1" id="" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">B. </button></div><div class="adf-opt"><input type="text" name="opt2" id="" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">C. </button></div><div class="adf-opt"><input type="text" name="opt3" id="" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">D. </button></div><div class="adf-opt"><input type="text" name="opt4" id="" placeholder="Type on answer option here..."></div></div>
                </div>
                <div class="adf-warn"><?php if (isset($_GET['answer']) && $_GET['answer'] == "null") {
                    echo "please choose one answer"; } ?></div>
                <input id="addanswer" type="hidden" name="gans" value="">
                <input type="hidden" name="id" value="<?php echo $code; ?>">
                <div class="adf-button"><button type="submit" name="added" value="true">Add</button></div>
            </form>
        </div>
    </div>
    <?php
    }
    else if (isset($_GET['edit'])) {
        $ncode = $_GET['ncode'];
        $current_quiz = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `gquiz` WHERE `ncode` = $ncode"));
    ?>
    <div class="add-popup">
        <div class="add-box">
            <div class="ab-close-btn"><a href="./myquiz.php?id=<?php echo $code; ?>"><button><i class="fa-solid fa-xmark"></i></button></a></div>
            <h1 class="adf-title">Edit question</h1>
            <form action="./quiz-data.php" method="post" class="add-form">
                <div class="adf-inp"><input type="text" name="qname" id="name" placeholder="Type your question here..." value="<?php echo $current_quiz['gname']; ?>"></div>
                <div class="adf-desc">Click alphabet options to settle on the correct answer</div>
                <div class="qoptions">
                    <div class="opt-row"><div class="opt-alp"><button type="button">A. </button></div><div class="adf-opt"><input type="text" name="opt1" id="" value="<?php echo $current_quiz['opa']; ?>" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">B. </button></div><div class="adf-opt"><input type="text" name="opt2" id="" value="<?php echo $current_quiz['opb']; ?>" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">C. </button></div><div class="adf-opt"><input type="text" name="opt3" id="" value="<?php echo $current_quiz['opc']; ?>" placeholder="Type on answer option here..."></div></div>
                    <div class="opt-row"><div class="opt-alp"><button type="button">D. </button></div><div class="adf-opt"><input type="text" name="opt4" id="" value="<?php echo $current_quiz['opd']; ?>" placeholder="Type on answer option here..."></div></div>
                </div>
                <div class="adf-warn"><?php if (isset($_GET['answer']) && $_GET['answer'] == "null") {
                    echo "please choose one answer"; } ?></div>
                <input id="editanswer" type="hidden" name="gans" value="<?php echo $current_quiz['gans']; ?>">
                <input type="hidden" name="id" value="<?php echo $code; ?>">
                <input type="hidden" name="ncode" value="<?php echo $ncode; ?>">
                <div class="adf-button"><button type="submit" name="edited" value="true">Apply</button></div>
            </form>
        </div>
    </div>
    <?php
    }
    else if (isset($_GET['del']) && $_GET['del'] == "false" && $_GET['ncode'] != '') {
    ?>
    <div class="delete-popup add-popup">
        <div class="del-box add-box">
            <div class="ab-close-btn"><a href="./myquiz.php?id=<?php echo $code; ?>"><button><i class="fa-solid fa-xmark"></i></button></a></div>
            <h1 class="adf-title">Delete Question</h1>
            <div class="del-desc">Are you sure want to delete this question?</div>
            <form class="del-btns" action="./quiz-data.php" method="POST">
                <input type="hidden" name="ncode" value="<?php echo $_GET['ncode'] ?>">
                <input type="hidden" name="id" value="<?php echo $code; ?>">
                <button id="del" type="submit" name="del" value="true">Yes</button>
                <button id="nope" type="submit" name="del" value="false">No</button>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="quiz-title">
        <h1><?php echo mysqli_fetch_array(mysqli_query($connection, "SELECT `name` FROM `quiz` WHERE `qid` = $code"))[0]; ?></h1>
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
                    <div class="q-edit-btn">
                        <a href="?id=<?php echo $code; ?>&ncode=<?php echo $qrows['ncode']; ?>&edit=yes"><button>Edit</button></a></div>
                    <div class="q-del-btn">
                        <a href="?id=<?php echo $code; ?>&ncode=<?php echo $qrows['ncode']; ?>&del=false"><button>Delete</button></a>
                    </div>
                </div>
            </div>
            <?php
            echo markedAnswer($qrows['gans'], $qrows['gnum']);
        }
        ?>
        </div>
        <div class="add-btn"><a href="?add=yes&id=<?php echo $code; ?>"><button id="add-btn">Add</button></a></div>
    </div>
    <div class="propos-btns">
        <button>Public</button>
    </div>
    <script type="module" src="../assets/scripts/quiz-choices.js"></script>
</body>
</html>