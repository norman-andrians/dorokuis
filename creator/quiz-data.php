<?php
include '../connect.php';

if (isset($_POST['id'])) {
    $code = $_POST['id'];

    if (isset($_POST['del'])) {
        if ($_POST['ncode'] != '' && $_POST['del'] == "true") {
            $deleteCode = $_POST['ncode'];

            mysqli_query($connection, "DELETE FROM `gquiz` WHERE `ncode` = $deleteCode");

            header("location:myquiz.php?id=$code");
        }
        else {
            header("location:myquiz.php?id=$code");
        }
    }

    if (
        isset($_POST['added']) && isset($_POST['qname'])
        && isset($_POST['opt1']) && isset($_POST['opt2']) && isset($_POST['opt3']) && isset($_POST['opt4'])
        && isset($_POST['gans'])
    ) {
        $answer = $_POST['gans'];

        if ($answer != "") {
            $qcode = rand(100000, 999999);

            $qname = $_POST['qname'];
            $options = array($_POST['opt1'], $_POST['opt2'], $_POST['opt3'], $_POST['opt4']);
            $num = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `gquiz` WHERE `qid` = $code ORDER BY `gnum`")) + 1;

            $tquery = "INSERT INTO `gquiz` (`id`, `ncode`, `qid`, `gname`, `gtime`, `gscore`, `gnum`, `gquest`, `opa`, `opb`, `opc`, `opd`, `gans`) VALUES (NULL, '$qcode', '$code', '$qname', '400', '200', '$num', '$qname', '" . $options[0] . "', '" . $options[1] . "', '" . $options[2] . "', '" . $options[3] . "', '$answer')";
            mysqli_query($connection, $tquery);

            header("location:myquiz.php?id=$code");
        }
        else {
            header("location:myquiz.php?id=$code&add=yes&answer=null");
        }
    }
}
else {
    header("location:../");
}
?>