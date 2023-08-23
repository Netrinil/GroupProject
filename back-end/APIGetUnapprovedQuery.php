<?php
include_once "dbConnector.php";

if (!$_SESSION["isAdmin"]) {
    header("location: http://localhost:62530/front-end/index.php");
}

if (isset($_GET['PageId'])) {
    $id = $_GET['PageId'];
    $query = "UPDATE Pages SET requireApproval = 0 WHERE id = " . intval($id);
    $conn = ConnGet();
    $result = mysqli_query($conn, $query);
}

header('location:/front-end/ManagePages.php');
exit;
?>