<?php
include_once "MyHeader.php";

if (isset($_POST['submit'])) {
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $conn = ConnGet();
    $query = 'SELECT * FROM Users where userId = "' . $userId . '" and Pswd = "' . $password . '"';
    $results = mysqli_query($conn, $query);
    $result = $results->fetch_array() ?? '';
    $userID = $result['id'] ?? 0;
    $isAdmin = $result['isAdmin'] ?? 0;
    if ($results == "" || $results == null) {

        echo ('<script>alert("Try Again")</script>');
    } else {
        $_SESSION["isAdmin"] = $isAdmin;
        $_SESSION["userID"] = $userID;
        header("location: http://localhost:62530/front-end/index.php");
    }
    ;


}
echo ($result)

    ?>

<h1>User Login</h1>
<br />
<br />
<form method="post" id='form'>
    <label>Username</label>
    <input type='text' name='userId' id="userId" />
    <br />
    <label>Password</label>
    <input type='password' name='password' id="password" />
    <br />
    <input type="submit" id="submit" name="submit" value="submit" />

</form>
<script></script>
<?php
include_once "MyFooter.php";
?>

