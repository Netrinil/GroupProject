<?php
include_once "MyHeader.php";
?>


<div>
    Page Id: &nbsp;<input type="text" id="pageId" value="9" placeholder="9" /><br />

</div>
<button name="a" onclick="myRestoreEvent()">Restore</button>
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

    function myRestoreEvent() {
        //alert("my click"); // Use for debugging
        $id = document.getElementById("pageId").value;
        //alert("title: " + $title); // Use for debugging


        loadJson($id);
    }

    // Call the microservice and get the data
    function loadJson(id) {
        //alert("loading"); // Use for debugging
        $request.open('POST', '../back-end/apiRestoreQuery.php?pageId=' + id);
        //alert("query called"); // Use for debugging
        // $request.onload = loadComplete;
        $request.send();
    }
</script>

<?php
include_once "MyFooter.php";
?>
