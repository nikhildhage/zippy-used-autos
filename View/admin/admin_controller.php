<?php
require_once("../../Model/database.php");
require_once('../../Model/vehicles_db.php');
require_once('../../Model/type_db.php');
require_once('../../Model/class_db.php');
require_once('../../Model/make_db.php');

// Filter input to prevent XSS and SQL Injection
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$sort_order = filter_input(INPUT_POST, 'sort_order', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'sort_order', FILTER_SANITIZE_STRING) ?: 'price_desc';
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case "list_vehicles":
        if ($make_id) {
            $vehicles = get_vehicles_by_make($make_id, $sort_order);
        } elseif ($type_id) {
            $vehicles = get_vehicles_by_type($type_id, $sort_order);
        } elseif ($class_id) {
            $vehicles = get_vehicles_by_class($class_id, $sort_order);
        } else {
            $vehicles = get_vehicles($sort_order);
        }
        include('./adminVehicleList.php');
        break;

    case "delete_vehicle":
        if ($vehicle_id) {
            try {
                delete_vehicle($vehicle_id);
                header("Location: admin_controller.php?action=list_vehicles");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error deleting vehicle. Details: " . $e->getMessage();
                include('view/error.php');
                exit();
            }
        } else {
            $error_message = "Missing or incorrect vehicle ID.";
            include('view/error.php');
            exit();
        }
        break;

    default:
        $vehicles = get_vehicles($sort_order);
        include('./adminVehicleList.php');
}
?>

