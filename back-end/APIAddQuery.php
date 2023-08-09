<?php
include_once "dbConnector.php";
include_once "../Helper.php";

header('Content-Type: application/json');

// Get the db connection
// Get the data
$myDbConn = ConnGet();
$title = $_GET["pageTitle"];
$header = $_GET["pageHeader"];
$text = $_GET["pageText"];
if ($title == $header)
{
    $parent = 3;
}
else
{
    $parent = GetCategoryId($header);
}

// Get the records
$dataSet = MyPageCreate($myDbConn, $title, $header, $text, $parent);

mysqli_close($myDbConn);

?>