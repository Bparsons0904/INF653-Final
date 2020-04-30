<?php

function getQuotes($authorID, $categoryID, $limit)
{
    // Open Database
    global $db;
    $bindValues = [];

    // Check if category id greater than 1, not null
    $query = 'SELECT q.quoteID, q.text, a.authorName as authorName, c.categoryName as categoryName
                FROM quotes q
                LEFT JOIN authors a on q.authorID = a.authorID
                LEFT JOIN categories c on q.categoryID = c.categoryID
                WHERE q.approved = 1';
    if ($authorID >= 1) {
        $query .= ' AND q.authorID = :authorID';
        array_push($bindValues, [':authorID', $authorID]);
    }
    if ($categoryID >= 1) {
        $query .= ' AND q.categoryID = :categoryID';
        array_push($bindValues, [':categoryID', $categoryID]);
    }
    $query .= $limit > 0 ? ' LIMIT ' . $limit : "";
    $statement = $db->prepare($query);
    for ($i = 0; $i < count($bindValues); $i++) {
        $statement->bindValue($bindValues[$i][0], $bindValues[$i][1]);
    }
    $statement->execute();
    $quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    // Return queried to do quotes
    // print_r($quotes);
    return $quotes;
}

function getApprovals()
{
    // Open Database
    global $db;
    // Check if category id greater than 1, not null
    $query = 'SELECT q.quoteID, q.text, a.authorName as authorName, c.categoryName as categoryName
                FROM quotes q
                LEFT JOIN authors a on q.authorID = a.authorID
                LEFT JOIN categories c on q.categoryID = c.categoryID
                WHERE q.approved = 0';

    $statement = $db->prepare($query);
    $statement->execute();
    $quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    // Return queried to do quotes
    // print_r($quotes);
    return $quotes;
}

// Delete item from database
function deleteVehicle($vehicleID)
{
    // Open database
    global $db;
    // Get item based on item ID
    $query = 'DELETE FROM vehicles
                WHERE vehicleID = :vehicleID';
    // PDO delete item from database
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
}

// // Add to do item to database
function addQuote($text, $authorID, $categoryID)
{
    // Open database
    global $db;
    // Set query for item to be added
    $query = 'INSERT INTO quotes
                 (text, authorID, categoryID)
              VALUES
                 (:text, :authorID, :categoryID)';
    // PDO insert item into database
    $statement = $db->prepare($query);
    $statement->bindValue(':text', $text);
    $statement->bindValue(':authorID', $authorID);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $statement->closeCursor();
}
