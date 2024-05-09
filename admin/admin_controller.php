<?php
require_once("../Model/database.php");
require_once('../Model/vehicles_db.php');
require_once('../Model/type_db.php');
require_once('../Model/class_db.php');
require_once('../Model/make_db.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$sort_order = filter_input(INPUT_POST, 'sort_order', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'sort_order', FILTER_SANITIZE_STRING) ?: 'price_desc';
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_vehicles';

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
        include('./View/adminVehicleList.php');
        break;

    case "delete_vehicle":
        if ($vehicle_id) {
            try {
                delete_vehicle($vehicle_id);
                header("Location: admin_controller.php?action=list_vehicles");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error deleting vehicle. Details: " . $e->getMessage();
                include('../../view/error.php');
                exit();
            }
        } else {
            $error_message = "Missing or incorrect vehicle ID.";
            include('../../view/error.php');
            exit();
        }
        break;

    case "add_vehicle":
        if ($year && $model && $price && $make_id && $type_id && $class_id) {
            try {
                add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
                header("Location: admin_controller.php?action=list_vehicles");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error adding vehicle: " . $e->getMessage();
                include('../../view/error.php');
                exit();
            }
        } else {
            $error_message = "All fields are required.";
            include('../../view/error.php');
            exit();
        }
        break;

    case "show_add_form":
        include('./View/adminAddVehicle.php');
        break;

    default:
        $vehicles = get_vehicles($sort_order);
        include('./View/adminVehicleList.php');
}
?>


