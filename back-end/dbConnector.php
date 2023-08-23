<?php
include_once "../Constants.php";
// ///////////////////////////////////////////////////
// Get db connection
function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}
// ///////////////////////////////////////////////////
// Get Select records based on the Parent Id
function MyPagesGet($dbConn, $Parent=0) {
    $query = "SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 and ParentPage = " . $Parent . ";";
    // SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 and ParentPage = " . $Parent . " order by ParentPage asc, SortOrder Asc;

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get all the page records
function MyPagesAllGet($dbConn) {
    $query = "SELECT id, Title, Header1, Text1, ParentPage, isActive FROM Pages order by ParentPage asc;";

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get all the page records
function MyRecipesAllGet($dbConn, $userID)
{
    $query = "SELECT * FROM Pages where (creator = " . $userID . " or isActive = 1 and requireApproval = 0) and ParentPage != 0 and ParentPage != 3 order by ParentPage asc;";

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get Select page
function PageContentGet($dbConn, $Id) {
    $return = null;

    $query = "SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 and id = " . $Id;
    $return = @mysqli_query($dbConn, $query);

    if ((!$return) || ($return->num_rows < 1)){
        // return a defaul fault page
        $query = "SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 limit 1;";

        $return = @mysqli_query($dbConn, $query);
    }

return $return;
}

function PageContentGetByTitle($dbConn, $Title)
{
    $return = null;

    $query = "SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 and Title = '" . $Title . "';";
    $return = @mysqli_query($dbConn, $query);

    if ((!$return) || ($return->num_rows < 1)) {
        // return a defaul fault page
        $query = "SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 limit 1;";

        $return = @mysqli_query($dbConn, $query);
    }

    return $return;
}

// ///////////////////////////////////////////////////
// Get all the page records
function MyPageRemove($dbConn, $Id) {

    // Never delete a page. set it to incative
    $query = "Update Pages set isActive = 0 where id = " . $Id;

    return @mysqli_query($dbConn, $query);
}
function MyPageRestore($dbConn, $Id)
{

    $query = "Update Pages set isActive = 1 where id = " . $Id;

    return @mysqli_query($dbConn, $query);
}
function MyPageCreate($dbConn, $title, $header, $text, $parent, $userID, $isUser)
{
    $query = "INSERT INTO Pages (Title, Header1, Text1, ParentPage, isActive, creator, requireApproval)
                VALUES ('" . $title . "', '" . $header . "', '" . $text . "', " . $parent . ", " . 1 . ", " . $userID . ", " . $isUser . ");";

    return @mysqli_query($dbConn, $query);
}
function MyPageUpdate($dbConn, $id, $title, $header, $text, $parent, $active)
{
    $query = "UPDATE Pages SET Title = '" . $title . "', Header1 = '" . $header . "', Text1 = '" . $text . "', ParentPage = " . $parent . ", isActive = " . $active . " WHERE id = " . $id . ";";

    return @mysqli_query($dbConn, $query);
}

function MyJoinJsonGet($dbConn)
{

    $query = "SELECT JSON_OBJECT(
        'Id', id,
        'First_Name', First_Name,
        'Last_Name', Last_Name,
        'UserId', UserId,
        'isAdmin', isAdmin,
        'isActive', isActive) as Json1
        FROM users";

    return @mysqli_query($dbConn, $query);
}

function AccountCreate($dbConn, $fName, $lName, $userId, $pswd)
{
    $query = "INSERT INTO users (First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
                Values('" . $fName . "', '" . $lName . "', '" . $userId . "', '" . $pswd . "','" . 0 . "','" . 1 . ");";
    return @mysqli_query($dbConn, $query);
}

?>


