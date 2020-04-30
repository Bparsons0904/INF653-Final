<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



include_once '../model/db.php';
include_once '../model/quotes_db.php';

// $inputType = ($_SERVER['REQUEST_METHOD'] === 'POST') ? INPUT_POST : INPUT_GET;
// $text = htmlspecialchars(filter_input($inputType, 'text'));
// $authorID = filter_input($inputType, 'authorID', FILTER_VALIDATE_INT);
// $categoryID = filter_input($inputType, 'categoryID', FILTER_VALIDATE_INT);

// Instantiate DB & connect

global $db;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // $text = htmlspecialchars(filter_input($inputType, 'text'));
    $authorID = filter_input(INPUT_GET, 'authorID', FILTER_VALIDATE_INT);
    $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
    $limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);
    $random = htmlspecialchars(filter_input(INPUT_GET, 'random')) == 'true' ? true : false;
    $quotes = getQuotes($authorID, $categoryID, $limit);
    $quotes = $random ? ($quotes[mt_rand(0, count($quotes) - 1)]) : $quotes;   

    echo json_encode($quotes);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $text = htmlspecialchars(strip_tags($data->text));
    $authorID = htmlspecialchars(strip_tags($data->authorID));
    $categoryID = htmlspecialchars(strip_tags($data->categoryID));

    addQuote($text, $authorID, $categoryID);
} else {
    $data = array("message" => "You did not send a GET or POST Request");
    echo json_encode($data);
}




// $quotes = get_quotes(0, 0);
// print_r($quotes);
// Get row count
// $num = count($quotes);

// // Check if any 
// if ($num > 0) {
//     // Turn to JSON & output
//     echo json_encode($quotes);
// } else {
//     // No Posts
//     echo json_encode(
//         array('message' => 'No Posts Found')
//     );
// }
