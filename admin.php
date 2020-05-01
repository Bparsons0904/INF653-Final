<?php
// // Add database and table functions
require('./model/db.php');
require('./model/quotes_db.php');
require('./model/authors_db.php');
require('./model/categories_db.php');
// require('./model/type_db.php');
// require('./model/class_db.php');
// require('./model/make_db.php');

$display;
session_status() === PHP_SESSION_ACTIVE ? '' : session_start();
$loggedIn = isset($_SESSION['is_valid_admin']);
$approval = false;
$quotes = [];

if (!empty($_POST)) {
    $action = filter_input(INPUT_POST, 'action');
    $quoteID = filter_input(INPUT_POST, 'quoteID');
} else {
    $action = filter_input(INPUT_GET, 'action');
}

if (!$loggedIn) {
    $display = 'view/pages/login.php';
} else if ($action == "approvals") {
    $quotes = getApprovals();
    $approval = true;
    $display = 'view/pages/quotes.php';
} else if ($action == 'delete') {
    deleteQuote($quoteID);
    header("Location: admin.php");
} else if ($action == 'approve') {
    approveQuote($quoteID);

    header("Location: admin.php?action=approvals");
} else if ($action == 'logout') {
    session_unset();
    // Destroy session
    session_destroy();
    // Set variables need to delete cookies
    $name = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    $httponly = $params['httponly'];
    // Delete cookies
    setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
    header("Location: admin.php");
} else if ($action == "submit") {
    $authorIDSubmit = filter_input(INPUT_POST, 'authorIDSubmit', FILTER_VALIDATE_INT);
    $categoryIDSubmit = filter_input(INPUT_POST, 'categoryIDSubmit', FILTER_VALIDATE_INT);
    $textsubmit = htmlspecialchars(filter_input(INPUT_POST, 'textsubmit'));
    addQuote($textsubmit, $authorIDSubmit, $categoryIDSubmit, true);
    header("Location: admin.php");
} else {
    $authorID = filter_input(INPUT_GET, 'authorID', FILTER_VALIDATE_INT);
$categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
    $quotes = getQuotes($authorID, $categoryID, 0);
    $display = 'view/pages/quotes.php';
}

// Set array of results for filters
$authors = getAuthors();
$categories = getCategories();
// Set variables for filters
// $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
// $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
// $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
// $sort = filter_input(INPUT_GET, 'sort', FILTER_VALIDATE_INT);
// $sortDirection = filter_input(INPUT_GET, 'sortDirection', FILTER_VALIDATE_INT);

// Set array of results for filters
// $types = get_types();
// $classes = get_classes();
// $makes = getMakes();

// Set array of all vehicles matching filter selections


// Include required files
include('view/pages/header.php');
include('view/pages/navigation_admin.php');
// include('view/pages/quotes.php');
include($display);
    // include('view/pages/footer.php');
