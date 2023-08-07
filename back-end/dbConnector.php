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
    $query = "SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 and ParentPage = " . $Parent . " order by Title asc;";
    // SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 and ParentPage = " . $Parent . " order by ParentPage asc, SortOrder Asc;

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get all the page records
function MyPagesAllGet($dbConn) {
    $query = "SELECT id, Title, Header1, Text1, ParentPage, isActive FROM Pages order by ParentPage asc, Title Asc;";

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
        $query = "SELECT id, Title, Header1, Text1 FROM Pages where isActive = 1 order by Title asc limit 1;";

        $return = @mysqli_query($dbConn, $query);
    }

return $return;
}

// ///////////////////////////////////////////////////
// Get all the page records
function MyPageRemove($dbConn, $Id) {

    // Never delete a page. set it to incative
    $query = "Update FROM Pages set isActive = 0 where id = " . $Id;

    return @mysqli_query($dbConn, $query);
}
function MyPageRestore($dbConn, $Id)
{

    $query = "Update FROM Pages set isActive = 1 where id = " . $Id;

    return @mysqli_query($dbConn, $query);
}
function MyPageCreate($dbConn, $title, $header, $text, $parent)
{
    $query = "INSERT INTO Pages (Title, Header1, Text1, ParentPage, isActive)
                VALUES ('" . $title . "', '" . $header . "', '" . $text . "', " . $parent . ", " . 1 . ");";

    return @mysqli_query($dbConn, $query);
}


?>


