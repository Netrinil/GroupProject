<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myDBConn = ConnGet();
$myJsonResult = MyJoinJsonGet($myDBConn);

$myJSON = null;
$row = null;

if ($myJsonResult) {
    while ($row = mysqli_fetch_array($myJsonResult)) {
        $rowArray[] = json_decode($row[0]);
    }

    $myJSON = json_encode($rowArray);
}

mysqli_close($myDBConn);
echo $myJSON;
?>