<?php
function get_classes()
{
    global $db;
    $query = "SELECT * from class c";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_classname($class_id)
{
}

function delete_class($class_id)
{
}

function add_class()
{
}
