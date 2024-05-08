<?php
function get_types()
{
    global $db;
    $query = "SELECT * from type";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_typename($type_id)
{
    global $db;
    $query = "SELECT type FROM type WHERE id = :type_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result['type'];
}

function delete_type()
{
}

function add_type()
{
}
