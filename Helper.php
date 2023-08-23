<?php
include_once "back-end/dbConnector.php";
?>

<?php
// //////////////////////////////////////////////////
function MenuDisplay($dataset)
{
    $myDbConn = ConnGet();

    // &nbsp; &nbsp;<a href="ContactUs.php">

    if ($dataset) {
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        while ($row = mysqli_fetch_array($dataset)) {
            echo ' &nbsp; &nbsp; <a href="Index.php?PageId=' . $row['id'] . '" >' . $row['Title'] . '</a>';
        }
    } // End if
    else {
        echo "No menu items<br />";
        echo mysqli_error($myDbConn);
    }

}
// //////////////////////////////////////////////////
function ListDisplay($dataset)
{
    $myDbConn = ConnGet();

    // &nbsp; &nbsp;<a href="ContactUs.php">

    if ($dataset) {
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        while ($row = mysqli_fetch_array($dataset)) {
            echo ' &nbsp; &nbsp; ' . $row['Title'] . ': &nbsp; &nbsp; <a href="../back-end/APIGetUnapprovedQuery.php?PageId=' . $row['id'] . '" ><button>Approve</button></a></ br>';
        }
    } // End if
    else {
        echo "No menu items<br />";
        echo mysqli_error($myDbConn);
    }

}
// /////////////////
function PageDisplay($PageData)
{

    if ($PageData) {
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        $row = mysqli_fetch_array($PageData);

        echo ' &nbsp; &nbsp; <h2> ' . $row['Header1'] . ' </h2> <br />';
        echo ' &nbsp; &nbsp; <p> ' . $row['Text1'] . '</p> <br />';

    } // End if
    else {
        echo "No Page data to display <br />";
    }

}
// //////////////////
function GetCategoryId($Category)
{
    $myDbConn = ConnGet();
    if ($Category) {
        $data = PageContentGetByTitle($myDbConn, $Category);
        $result = mysqli_fetch_array($data);

        return $result['id'];
    } // End if
    else {
        echo "No Page data to display <br />";
    }
}

function AddRecipe($title, $header, $text, $parent)
{

}

?>