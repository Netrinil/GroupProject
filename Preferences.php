<?php
include_once "MyHeader.php";

if (isset($_POST['submit'])) {
    setcookie('MyStyle', $_POST['styleId']);
    header("location: http://localhost:62530/front-end/index.php");
}

?>

<h1>Style Preference</h1>
<br />
<br />
<form method="post" id='form'>
    <label>Style 1</label>
    <input type='radio' name='styleId' id="style1" value="1" />
    <br />
    <label>Style 2</label>
    <input type='radio' name='styleId' id="style2" value="2" />
    <br />
    <label>Style 3</label>
    <input type='radio' name='styleId' id="style3" value="3" />
    <br />
    <input type="submit" id="submit" name="submit" value="submit" />

</form>
<script></script>

<?php
include_once "MyFooter.php";
?>

