<?php
include_once("MyHeader.php");

include_once "../back-end/dbConnector.php";

if (!$_SESSION["isAdmin"]) {
    header("location: http://localhost:62530/front-end/index.php");
}


if ($_SESSION['userID'] != $_GET['id']) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "UPDATE users SET isActive = 0 WHERE id = " . intval($id);
        $conn = ConnGet();
        $result = mysqli_query($conn, $query);

    }
}


header('location:/front-end/ManageUsers.php');
exit;
?>