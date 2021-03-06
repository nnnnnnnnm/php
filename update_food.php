<?php

/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['type']) && isset($_GET['price']) && isset($_GET['image'])) {
    
    $id = $_GET['id'];
    $name = $_GET['name'];
    $type = $_GET['type'];
    $price = $_GET['price'];
	$image = $_GET['image'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("UPDATE `food` SET name = '$name', type = '$type', price = '$price', image = '$image' WHERE id = '$id'");

    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Food successfully updated.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
