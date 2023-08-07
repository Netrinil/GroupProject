<?php
include_once("MyHeader.php");    

?>

<?php
    $_SESSION["isAdmin"] = 0;
    header("Location: http://localhost:62530/front-end/index.php");
?>

<?php
include_once "MyFooter.php";
?>