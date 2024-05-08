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
    global $db;
    $query = "DELETE FROM class WHERE id = :class_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class()
{
    global $db;
    $query = "INSERT INTO class (class) VALUES (:class)";
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closeCursor();
}
