<?php

// Get a list of ALL Vehicles 
function get_vehicles($sort_order)
{
    // Fetch all items from the database to display
    global $db;
    $orderBy = $sort_order == 'year_desc' ? 'v.year DESC' : 'v.price DESC';
    $query = "SELECT v.id, v.year, v.model, v.price, t.type, c.class, m.make from vehicles v
                LEFT JOIN type t ON v.type_id = t.id  
                LEFT JOIN class c ON v.class_id = c.id 
                LEFT JOIN make m  ON v.make_id = m.id
                ORDER BY $orderBy";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

//Get a lst of vehicles that with a specific type 
function get_vehicles_by_type($type_id, $sort_order) {
    global $db;
    $orderBy = $sort_order == 'year_desc' ? 'v.year DESC' : 'v.price DESC';
    $query = "SELECT v.id, v.year, v.model, v.price, t.type, c.class, m.make 
              FROM vehicles v
              LEFT JOIN type t ON v.type_id = t.id  
              LEFT JOIN class c ON v.class_id = c.id 
              LEFT JOIN make m ON v.make_id = m.id
              WHERE t.id = :type_id
              ORDER BY $orderBy";
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}


//Get a lst of vehicles that with a specific class 
function get_vehicles_by_class($class_id, $sort_order)
{
    global $db;
    $orderBy = $sort_order == 'year_desc' ? 'v.year DESC' : 'v.price DESC';
    $query = "SELECT v.id, v.year, v.model, v.price, t.type, c.class, m.make
              FROM vehicles v
              LEFT JOIN type t ON v.type_id = t.id  
              LEFT JOIN class c ON v.class_id = c.id 
              LEFT JOIN make m ON v.make_id = m.id
              WHERE c.id = :class_id
              ORDER BY $orderBy";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

//Get a lst of vehicles that with a specific make 
function get_vehicles_by_make($make_id, $sort_order)
{
    global $db;
    $orderBy = $sort_order == 'year_desc' ? 'v.year DESC' : 'v.price DESC';
    $query = "SELECT v.id, v.year, v.model, v.price, t.type, c.class, m.make
              FROM vehicles v
              LEFT JOIN type t ON v.type_id = t.id  
              LEFT JOIN class c ON v.class_id = c.id 
              LEFT JOIN make m ON v.make_id = m.id
              WHERE m.id = :make_id
              ORDER BY $orderBy";
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function delete_vehicle($id)
{
    global $db;
    $query = "DELETE FROM vehicles WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}


function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id)
{
    global $db;
    $query = "INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (:year, :model, :price, :type_id, :class_id, :make_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}
