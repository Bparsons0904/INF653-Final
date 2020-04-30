<?php 
        require('../../model/db.php');
        require('../../model/quotes_db.php');
        require('../../model/authors_db.php');
        require('../../model/categories_db.php');
        // require('./model/make_db.php');
       
        // Set variables for filters
        $authorID = filter_input(INPUT_GET, 'authorID', FILTER_VALIDATE_INT);
        $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
        // $limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);
        $random = filter_input(INPUT_GET, 'random', FILTER_VALIDATE_INT);
        $sortDirection = filter_input(INPUT_GET, 'sortDirection', FILTER_VALIDATE_INT);
    
        // Set array of results for filters
        $authors = getAuthors();
        $categories = getCategories();
    
        // Set array of all vehicles matching filter selections
        $quotes = getQuotes($authorID, $categoryID, 0);
        $quotes = $random == 'true' ? ($quotes[mt_rand(0, count($quotes) - 1)]) : $quotes;
        // print_r($quotes);
        // Include required files
        include('header.php');
        include('navigation.php');

        // include('view/pages/footer.php');
?>