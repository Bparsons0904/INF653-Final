<?php
    function getCategories() {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'SELECT *
                FROM categories
                ORDER BY categoryName';

        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        // print_r($categories);
        // Return queried to do vehicles
        return $categories;
    }

    // function deleteMake($makeID) {
    //     // Open Database
    //     global $db;
    //     // Check if category id greater than 1, not null
    //     $query = 'DELETE FROM makes
    //             WHERE makeID = :makeID';

    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':makeID', $makeID);
    //     $statement->execute();
    //     $statement->closeCursor();
    // }

    // function addMake($makeName) {
    //     // Open Database
    //     global $db;
    //     // Check if category id greater than 1, not null
    //     $query = 'INSERT INTO makes (makeName)
    //             VALUES (:makeName)';

    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':makeName', $makeName);
    //     $statement->execute();
    //     $statement->closeCursor();
    // }
?>