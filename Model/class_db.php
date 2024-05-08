<?php
function get_classes()
{
    global $db;
    $query = "SELECT * from class";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_className($class_id)
{
    global $db;
    $query = "SELECT class FROM class WHERE id = :class_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result['class'];
}

function delete_class($class_id)
{
    
}

function add_class()
{
}
