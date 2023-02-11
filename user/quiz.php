<?php
include '../connect.php';

if (isset($_POST['code'])) {
    $code = $_POST['code'];
    if (isset($_POST['del'])) {
        if ($_POST['del'] == "true") {
            mysqli_query($connection, "DELETE FROM `quiz` WHERE `qid` = '$code'");
            mysqli_query($connection, "DELETE FROM `gquiz` WHERE `qid` = '$code'");
            header("location:./");
        }
        else if ($_POST['del'] == "false")  {
            header("location:./");
        }
    }
}
else {
    header("location:./");
}
?>