<?php

// Get a list of ALL Vehicles 
function get_vehicles()
{
    // Fetch all items from the database to display
    global $db;
    $query = "SELECT v.year, v.model, v.price, t.type, c.class, m.make from vehicles v
                LEFT JOIN type t ON v.type_id = t.id  
                LEFT JOIN class c ON v.class_id = c.id 
                LEFT JOIN make m  ON v.make_id = m.id";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

//Get a lst of vehicles that with a specific type 
function get_vehicles_by_type($type_id)
{
}

//Get a lst of vehicles that with a specific class 
function get_vehicles_by_class($class_id)
{
}

//Get a lst of vehicles that with a specific make 
function get_vehicles_by_make($make_id)
{
}

function delete_vehicle($id)
{
}


function add_vehicle()
{
}