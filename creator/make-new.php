<?php
include '../connect.php';

if (isset($_POST['make'])) {
    $name = $_POST['qname'];
    $option = $_POST['optype'];
    $subject = $_POST['subjects'];

    $newcode = 0;
    $af = 5;

    do {
        $newcode = rand(10000, 99999);

        $result = mysqli_query($connection, "SELECT * FROM `quiz` WHERE `qid` = '$newcode'");

        if (mysqli_num_rows($result) < 1) {
            $user_id = $_COOKIE['user'];

            $query = "INSERT INTO `quiz` (`id`, `qid`, `author_id`, `name`, `option`, `type`) VALUES (NULL, '$newcode', '$user_id', '$name', '$option', '$subject')";
            mysqli_query($connection, $query);

            header("location:myquiz.php?id=$newcode");
            break;
        }
    }
    while ($af < 5);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&family=Montserrat:wght@400;600;700&family=Noto+Sans&family=PT+Sans:wght@400;700&family=Poppins:wght@400;600;700&family=Roboto&display=swap" rel="stylesheet">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make New Quiz</title>
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/creator-new.css">
</head>
<body>
    <div class="main-bg">
        <div class="main-content">
            <h1 class="m-header">Make it Yourself</h1>
            <form action="make-new.php" method="post" class="m-form">
                <div class="mf-text">Name this quiz</div>
                <div class="mf-inp-text"><input type="text" name="qname" id="name" placeholder="Enter Quiz Name" required></div>
                <div class="mf-text">Select option type</div>
                <div class="mf-inp-op">
                    <select name="optype" id="type" required>
                        <option value="multichoice">Multiple choice</option>
                    </select>
                </div>
                <div class="mf-text">Choose a subject</div>
                <div class="mf-inp-op">
                    <select name="subjects" id="sub" required>
                        <?php
                        $subjects = array('mathematics','english','science','chemistry','physics','biology','geography','history');

                        foreach ($subjects as $subject) {
                            $subj = ucfirst($subject);
                            echo "<option value=\"$subject\">$subj</option>\n";
                        }
                        ?>
                    </select>
                </div>
                <div class="mf-inp-sub"><input type="submit" value="Next" name="make"></div>
            </form>
        </div>
    </div>
</body>
</html>