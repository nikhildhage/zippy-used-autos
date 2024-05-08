<?php
require_once("./Model/database.php");
require_once('./Model/vehicles_db.php');
require_once('./Model/type_db.php');
require_once('./Model/class_db.php');
require_once('./Model/make_db.php');

// Filter input to prevent XSS and SQL Injection
$sort_order = filter_input(INPUT_POST, 'sort_order', FILTER_SANITIZE_STRING);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: 'list_vehicles';
$sort_order = $sort_order ?: 'price_desc'; // Default sort

switch ($action) {
    case "list_vehicles":
        if ($make_id) {
            $vehicles = get_vehicles_by_make($make_id, $sort_order);
        } elseif ($type_id) {
            $vehicles = get_vehicles_by_type($type_id, $sort_order);
        } elseif ($class_id) {
            $vehicles = get_vehicles_by_class($class_id, $sort_order);
        } else {
            $vehicles = get_vehicles($sort_order); // Get all vehicles with sorting
        }
        include('View/vehicleList.php');
        break;
    default:
        $vehicles = get_vehicles($sort_order);
        include('View/vehicleList.php');
}
?>

