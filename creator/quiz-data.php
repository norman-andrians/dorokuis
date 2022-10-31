<?php
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

header("loaction:myquiz.php");
}
?>