<?php
    function getAuthors() {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'SELECT *
                FROM authors
                ORDER BY authorName';

        $statement = $db->prepare($query);
        $statement->execute();
        $authors = $statement->fetchAll();
        $statement->closeCursor();
        // print_r($authors);
        // Return queried to do vehicles
        return $authors;
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