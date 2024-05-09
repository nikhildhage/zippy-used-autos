<?php
function get_makes()
{
    global $db;
    $query = "SELECT * from make";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_make_names($make_id)
{
    if ($make_id) {
        return "All Categories";
    }
    global $db;
    $query = 'SELECT * FROM make WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category['categoryName'];
}

function delete_make($make_id)
{
    global $db;
    $query = 'DELETE FROM make WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make()
{
    global $db;
    $query = "INSERT INTO type (make) VALUES (:make)";
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}
