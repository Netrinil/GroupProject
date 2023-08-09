<?php
include_once "dbConnector.php";
include_once "../Helper.php";

header('Content-Type: application/json');

// Get the db connection
// Get the data
$myDbConn = ConnGet();
$title = $_GET["recipeTitle"];
$header = $_GET["recipeHeader"];
$text = $_GET["recipeText"];
$parent = GetCategoryId($header);

// Get the records
$dataSet = MyPageCreate($myDbConn, $_GET["recipeTitle"], $_GET["recipeHeader"], $_GET["recipeText"], $parent);

mysqli_close($myDbConn);

?>