<?php
include_once "dbConnector.php";
include_once "../Helper.php";

header('Content-Type: application/json');

// Get the db connection
// Get the data
$myDbConn = ConnGet();
$id = $_GET["pageId"];
$title = $_GET["pageTitle"];
$header = $_GET["pageHeader"];
$text = $_GET["pageText"];
$active = $_GET["pageActive"];
if ($title == $header) {
    $parent = 3;
} else {
    $parent = GetCategoryId($header);
}

// Get the records
$dataSet = MyPageUpdate($myDbConn, $id, $title, $header, $text, $parent, $active);

mysqli_close($myDbConn);

?>