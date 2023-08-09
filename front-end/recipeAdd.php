<?php
include_once "MyHeader.php";
?>


<div>
    Recipe Name: &nbsp;<input type="text" id="recipeTitle" value="Waffles" placeholder="Waffles" /><br />
    Recipe Category: &nbsp;<input type="text" id="recipeHeader" value="Breakfast" placeholder="Breakfast" /><br />
    Recipe Description: &nbsp;<input type="text" id="recipeText" value="Leggo my Eggo" placeholder="Leggo my Eggo" /><br />

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
        $title = document.getElementById("recipeTitle").value;
        $header = document.getElementById("recipeHeader").value;
        $text = document.getElementById("recipeText").value;
        //alert("title: " + $title); // Use for debugging
        //alert("header: " + $header); // Use for debugging
        //alert("text: " + $text); // Use for debugging

        loadJson($title, $header, $text);
    }

    // Call the microservice and get the data
    function loadJson(title, header, text) {
        //alert("loading"); // Use for debugging
        $request.open('POST', '../back-end/apiAddQuery.php?recipeTitle=' + title + '&recipeHeader=' + header + '&recipeText=' + text);
        //alert("query called"); // Use for debugging
        // $request.onload = loadComplete;
        $request.send();
    }
</script>

<?php
include_once "MyFooter.php";
?>
