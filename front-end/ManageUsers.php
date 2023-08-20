<?php
include_once "MyHeader.php";


?>

<p id="A"></p>
<p id="B"></p>

<p id="jsonData"></p>

<script>

    var request = new XMLHttpRequest();

    loadJson();

    function loadJson() {
        request.open('GET', '../back-end/apiJsonQuery.php');
        request.onload = loadComplete;
        request.send();
    }

    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myReturn = "<table><tr id='head'><td>Id &nbsp; &nbsp; </td><td>First Name &nbsp; &nbsp; </td><td>Last Name &nbsp; &nbsp; </td><td>UserId &nbsp; &nbsp; </td><td> isAdmin &nbsp; &nbsp; </td><td> isActive &nbsp; &nbsp; </td></tr>";

        myResponse = request.responseText;
        
        
        myData = JSON.parse(myResponse);

        for (index in myData) {
            $promoteOrDemoteButton = '';
            $isAdminValue = '';
            if (myData[index].isAdmin == '0') {
                $isAdminValue = "User";
                $promoteOrDemoteButton = "<a href='promote.php?id=" + myData[index].Id + "'><button>Promote</button></a></td>";
            } else if (myData[index].isAdmin == '1') {
                $isAdminValue = "Admin";
                $promoteOrDemoteButton = "<a href='demote.php?id=" + myData[index].Id + "'><button>Demote</button></a></td>";

            }

            $isActiveValue = '';
            $disableOrEnableButton = '';
            if (myData[index].isActive == '0') {
                $isActiveValue = 'Account Disabled';
                $disableOrEnableButton = "<a href='activate.php?id=" + myData[index].Id + "'><button>Activate</button></a></td>";
            } else if (myData[index].isActive == '1') {
                $isActiveValue = "Account Active";
                $disableOrEnableButton = "<a href='deactivate.php?id=" + myData[index].Id  + "'><button>Deactivate</button></a></td>";

            }

            
            

            myReturn += "<tr><td>" + myData[index].Id + "</td><td>" +
                myData[index].First_Name + "</td><td>" + 
                myData[index].Last_Name + "</td><td>" +
                myData[index].UserId + "</td><td>" +
                $isAdminValue + "</td><td>" +
                $isActiveValue + "</td><td>" + 
                $promoteOrDemoteButton + "<td>" +
                $disableOrEnableButton + "<tr>"
        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn;
    }

</script>

<?php
include_once "MyFooter.php";
?>