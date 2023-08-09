<?php
include_once "MyHeader.php";
?>


<div>
    Page Id: &nbsp;<input type="text" id="pageId" value="" placeholder="9" /><br />
    Page Name: &nbsp;<input type="text" id="pageTitle" value="" placeholder="Recipe or Category" /><br />
    Page Category: &nbsp;<input type="text" id="pageHeader" value="" placeholder="Category" /><br />
    Page Description: &nbsp;<input type="text" id="pageText" value="" placeholder="Description" /><br />
    Page is active: &nbsp;<input type="text" id="pageActive" value="" placeholder="0 or 1" /><br />

</div>
<button name="a" onclick="myEditEvent()">Update</button>
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

    function myEditEvent() {
        //alert("my click"); // Use for debugging
        $title = document.getElementById("pageTitle").value;
        $id = document.getElementById("pageId").value;
        $header = document.getElementById("pageHeader").value;
        $text = document.getElementById("pageText").value;
        $active = document.getElementById("pageActive").value;
        //alert("title: " + $title); // Use for debugging
        //alert("header: " + $header); // Use for debugging
        //alert("text: " + $text); // Use for debugging

        loadJson($id, $title, $header, $text, $active);
    }

    // Call the microservice and get the data
    function loadJson(id, title, header, text, active) {
        //alert("loading"); // Use for debugging
        $request.open('POST', '../back-end/apiUpdateQuery.php?pageId=' + id + '&pageTitle=' + title + '&pageHeader=' + header + '&pageText=' + text + '&pageActive=' + active);
        //alert("query called"); // Use for debugging
        // $request.onload = loadComplete;
        $request.send();
    }
</script>

<?php
include_once "MyFooter.php";
?>
