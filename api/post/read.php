<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../model/db.php';
include_once '../../model/quotes_db.php';

// Instantiate DB & connect
//   $database = new Database();
//   $db = $database->connect();
global $db;
// Instantiate blog post object
$quotes = get_quotes(0,0);

// Blog quotes query
//   $result = $quotes->read();
// Get row count
$num = count($quotes);

// Check if any posts
if ($num > 0) {
    // Post array
    // $quotes_arr = array();
    // // $posts_arr['data'] = array();
    // foreach ($quotes as $key => $value) {
    //     echo $quotes[$key]['text'];
    //     $quote_item = array(
    //         'quoteID' => $quotes[$key]['quoteID'],
    //         'text' => html_entity_decode($quotes[$key]['text']),
    //         'author' => html_entity_decode($quotes[$key]['author']),
    //         'category' => html_entity_decode($quotes[$key]['category'])
    //     );
    //     array_push($quotes_arr, $quote_item);
    // }
    // while($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
    //   extract($row);

    //   $quote_item = array(
    //     'quoteID' => $quoteID,
    //     'text' => html_entity_decode($text),
    //     'author' => $authorName,
    //     'category_name' => $categoryName
    //   );

    //   // Push to "data"
    //   array_push($quotes_arr, $quote_item);
    //   // array_push($posts_arr['data'], $post_item);
    // }

    // Turn to JSON & output
    echo json_encode($quotes);

} else {
    // No Posts
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}
