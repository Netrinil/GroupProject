<?php
include_once "../back-end/dbConnector.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE users SET isActive = 1 WHERE id = " . intval($id) ;
    $conn = ConnGet();
    $result = mysqli_query($conn, $query);

}

header('location:/front-end/ManageUsers.php');
exit;
?>