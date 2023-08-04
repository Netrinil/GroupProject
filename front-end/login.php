<?php
include_once "MyHeader.php";

// Use this page to change the value of
// $_SESSION["isAdmin"] or such

?>

<h1>User Login</h1>
<br/>
<br/>
<form method="post" id='form'>
    <label>Username</label>
    <input type='text' name='userId'/>
    <br/>
    <label>Password</label>
    <input type='password' name='password'/> 

</form>
<script>
</script>
<?php
include_once "MyFooter.php";
?>

