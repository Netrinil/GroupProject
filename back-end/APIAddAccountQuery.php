<?php
include_once "dbConnector.php";
include_once "../Helper.php";

header('Content-Type: application/json');

$myDbConn = ConnGet();
$fName = $_GET["firstName"];
$lName = $_GET["lastName"];
$userId = $_GET["accountID"];
$pswrd = $_GET["password"];
$rPswrd = $_GET["repeatPassword"];
if($pswrd == $rPswrd)
{
    $dataSet = AccountCreate($myDbConn, $fName, $lName, $userId, $pswrd);

    mysqli_close($myDbConn);
}
?>