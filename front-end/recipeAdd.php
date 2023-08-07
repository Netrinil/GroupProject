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
    var request = new XMLHttpRequest();

    // Don't run until the page is loaded and ready
    $(document).ready(function () {
    //alert("Ready");
    });

    function myAddEvent() {
        //alert("my click"); // Use for debugging
        //alert("data: " + document.getElementById("recipeTitle").value); // Use for debugging
        $title = document.getElementById("recipeTitle").value;
        $header = document.getElementById("recipeHeader").value;
        $text = document.getElementById("recipeText").value;
        $parent = <?php GetCategoryId( ?> $header <?php ); ?>

        loadJson($title, $header, $text, $parent);
    }

    // Call the microservice and get the data
    function loadJson(title, header, text, parent) {
        //alert("title: " + title); // Use for debugging
        request.open('POST', '../Helper.php?recipeTitle=' + title + '&recipeHeader=' + header + '&recipeText=' + text + '&recipeParent=' + parent);
        request.onload = loadComplete;
        request.send();
    }
</script>

<?php
include_once "MyFooter.php";
?>
