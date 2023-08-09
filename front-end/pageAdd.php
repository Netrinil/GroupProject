<?php
include_once "MyHeader.php";
?>


<div>
    Page Name: &nbsp;<input type="text" id="pageTitle" value="" placeholder="Recipe or Category" /><br />
    Page Category: &nbsp;<input type="text" id="pageHeader" value="" placeholder="Category" /><br />
    Page Description: &nbsp;<input type="text" id="pageText" value="" placeholder="Description" /><br />

</div>
<button name="a" onclick="myAddEvent()">Add</button>
<p id="debugA"></p>
<p id="debugB"></p>
<p id="debugC"></p>
<p id="jsonData" style="text-align:center"></p>

<script>
    $request = new XMLHttpRequest();

    // Don't run until the page is loaded and ready
    $(document).ready(function () {
        // alert("Ready");
    });

    function myAddEvent() {
        //alert("my click"); // Use for debugging
        $title = document.getElementById("pageTitle").value;
        $header = document.getElementById("pageHeader").value;
        $text = document.getElementById("pageText").value;
        //alert("title: " + $title); // Use for debugging
        //alert("header: " + $header); // Use for debugging
        //alert("text: " + $text); // Use for debugging

        loadJson($title, $header, $text);
    }

    // Call the microservice and get the data
    function loadJson(title, header, text) {
        //alert("loading"); // Use for debugging
        $request.open('POST', '../back-end/apiAddQuery.php?pageTitle=' + title + '&pageHeader=' + header + '&pageText=' + text);
        //alert("query called"); // Use for debugging
        // $request.onload = loadComplete;
        $request.send();
    }
</script>

<?php
include_once "MyFooter.php";
?>
