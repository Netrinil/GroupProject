<?php
include_once "dbConnector.php";
include_once "../Helper.php";

header('Content-Type: application/json');

// Get the db connection
// Get the data
$myDbConn = ConnGet();
$id = $_GET["pageId"];

// Get the records
$dataSet = MyPageRemove($myDbConn, $id);

mysqli_close($myDbConn);

?>