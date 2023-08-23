<?php
include_once "MyHeader.php";

if (!$_SESSION["isAdmin"]) {
    header("location: http://localhost:62530/front-end/index.php");
}


// Use this page to change the value of a page
$Pages = MyPagesGetAllUnapproved($myDbConn);
ListDisplay($Pages);
?>


<?php
include_once "MyFooter.php";
?>

