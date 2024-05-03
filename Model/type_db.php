<?php
function get_types()
{
    global $db;
    $query = "SELECT * from type t";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_typename($type_id)
{
}

function delete_type()
{
}

function add_type()
{
}
