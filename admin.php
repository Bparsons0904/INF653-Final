<?php
    // // Add database and table functions
    require('./model/db.php');
    require('./model/quotes_db.php');
    // require('./model/type_db.php');
    // require('./model/class_db.php');
    // require('./model/make_db.php');
   $display = 'view/pages/quotes.php';
    $action = filter_input(INPUT_GET, 'action');
    if ($action == "approval") {
       $display = 'view/pages/approvals.php';
    }
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
    $quotes = getApprovals();

    // Include required files
    include('view/pages/header.php');
    include('view/pages/navigation_admin.php');
    include($display);
    // include('view/pages/footer.php');
?>
