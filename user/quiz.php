<?php
include '../connect.php';

if (isset($_POST['id'])) {
    $code = $_POST['id'];
    if (isset($_POST['del'])) {
        mysqli_query($connection, "DELETE FROM `quiz` WHERE `qid` = '$code'");
        mysqli_query($connection, "DELETE FROM `gquiz` WHERE `qid` = '$code'");
    }
}
else {
    header("location:./");
}
?>