<?php
include_once "../back-end/dbConnector.php";

if (!$_SESSION["isAdmin"]) {
    header("location: http://localhost:62530/front-end/index.php");
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE users SET isAdmin = 1 WHERE id = " . intval($id);
    $conn = ConnGet();
    $result = mysqli_query($conn, $query);

}

header('location:/front-end/ManageUsers.php');
exit;
?>