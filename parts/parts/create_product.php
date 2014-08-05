<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['fldID']) && isset($_POST['fldPart']) && isset($_POST['fldImage'])) {
 
    $id = $_POST['fldID'];
    $part = $_POST['fldPart'];
    $image = $_POST['fldImage'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO parts(fldID, fldPart, fldImage) VALUES('$id', '$part', '$image')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "part successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>
 
For the above code JSON response will be
When POST param(s) is missing
{
    "success": 0,
    "message": "Required field(s) is missing"
}
When product is successfully created
{
    "success": 1,
    "message": "Product successfully created."
}
When error occurred while inserting data
{
    "success": 0,
    "message": "Oops! An error occurred."
}