<?php
require_once("./Model/database.php");
require_once('./Model/vehicles_db.php');
require_once('./Model/type_db.php');
require_once('./Model/class_db.php');
require_once('./Model/make_db.php');

// Filter input to prevent XSS and SQL Injection
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$sort_order = filter_input(INPUT_POST, 'sort_order', FILTER_SANITIZE_STRING);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_assignments';
switch ($action) {
    case "list_vehicles":
    case "sort_vehicles":
        // Assuming the sort order is changed by the user via POST
        header("Location: .?action=list_vehicles&sort_order=$sort_order");
        exit();
        break;
    case "filter_by_make":
        // Redirect to filtered vehicles by make
        header("Location: .?action=list_vehicles&make_id=$make_id");
        exit();
        break;
    case "filter_by_type":
        // Redirect to filtered vehicles by type
        header("Location: .?action=list_vehicles&type_id=$type_id");
        exit();
        break;
    case "filter_by_class":
        // Redirect to filtered vehicles by class
        header("Location: .?action=list_vehicles&class_id=$class_id");
        exit();
        break;
    default:
        $sort_order = $sort_order ?: 'price_desc'; // default sorting order by price descending
        if ($make_id) {
            $vehicles = get_vehicles_by_make($make_id, $sort_order);
        } elseif ($type_id) {
            $vehicles = get_vehicles_by_type($type_id, $sort_order);
        } elseif ($class_id) {
            $vehicles = get_vehicles_by_class($class_id, $sort_order);
        } else {
            $vehicles = get_vehicles($sort_order); // Get all vehicles with sorting
        }
        include('view/vehicleList.php');
}
?>

