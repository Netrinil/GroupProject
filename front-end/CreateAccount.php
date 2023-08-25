<?php
include_once "MyHeader.php";
?>

<div>
    First Name: &nbsp;<input type="text" id="firstName" value="" placeholder="First Name" /><br />
    Last Name: &nbsp;<input type="text" id="lastName" value="" placeholder="Last Name" /><br />
    User Name: &nbsp;<input type="text" id="accountID" value="" placeholder="User Name" /><br />
    Password: &nbsp;<input type="password" id="password" value="" placeholder="Password" /><br />
    Repeat Password: &nbsp;<input type="password" id="repeatPassword" value="" placeholder="Retype Password" /><br />
</div>

<button name="a" onclick="myAddEvent()">Create Account</button>
<p id="debugA"></p>
<p id="debugB"></p>
<p id="debugC"></p>
<p id="jsonData" style="text-align:center"></p>

<script>
    $request = new XMLHttpRequest();

    // Don't run until the page is loaded and ready
    //$(document).ready(function () {
        // alert("Ready");
    //});

    function myAddEvent() {
        //alert("my click"); // Use for debugging
        fName = document.getElementById("firstName").value;
        lName = document.getElementById("lastName").value;
        userId = document.getElementById("accountID").value;
        pswrd = document.getElementById("password").value;
        rPswrd = document.getElementById("repeatPassword").value;
        //alert("title: " + $title); // Use for debugging
        //alert("header: " + $header); // Use for debugging
        //alert("text: " + $text); // Use for debugging

        loadJson(fName, lName, userId, pswrd, rPswrd);
    }

    // Call the microservice and get the data
    function loadJson(fName, lName, userId, pswrd, rPswrd)
    {
        //alert("loading"); // Use for debugging
        //var path = '../back-end/APIAddAccountQuery.php?firstName=' + fName + '&lastName=' + lName + '&accountID=' + userId + '&password=' + pswrd + '&repeatPassword=' + rPswrd;
        //alert(path);
        if (pswrd == rPswrd)
        {
            alert("Account Created");
            $request.open('POST', '../back-end/APIAddAccountQuery.php?firstName=' + fName + '&lastName=' + lName + '&accountID=' + userId + '&password=' + pswrd + '&repeatPassword=' + rPswrd);
        }
        else
            alert("Password do not match");
        //alert("query called"); // Use for debugging
        // $request.onload = loadComplete;
        $request.send();
    }
</script>

<?php
include_once "MyFooter.php";
?>