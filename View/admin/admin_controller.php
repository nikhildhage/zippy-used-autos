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

    case "list_makes":
        $makes = get_makes();
        include('./adminVehicleMakeList.php');
        break;

    case "add_make":
        $make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
        if (!empty($make_name)) {
            try {
                add_make($make_name);
                header("Location: admin_controller.php?action=list_makes");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error adding make. Details: " . $e->getMessage();
                include('view/error.php');
                exit();
            }
        } else {
            $error_message = "Invalid make name. Please check the field and try again.";
            include('view/error.php');
            exit();
        }
        break;

    case "delete_make":
        if ($make_id) {
            try {
                delete_make($make_id);
                header("Location: admin_controller.php?action=list_makes");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error deleting make. Details: " . $e->getMessage();
                include('view/error.php');
                exit();
            }
        } else {
            $error_message = "Missing or incorrect make ID.";
            include('view/error.php');
            exit();
        }
        break;

    case "list_types":
        $types = get_types();
        include('./adminVehicleTypeList.php');
        break;

    case "add_type":
        $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
        if (!empty($type_name)) {
            try {
                add_type($type_name);
                header("Location: admin_controller.php?action=list_types");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error adding type. Details: " . $e->getMessage();
                include('view/error.php');
                exit();
            }
        } else {
            $error_message = "Invalid type name. Please check the field and try again.";
            include('view/error.php');
            exit();
        }
        break;

    case "delete_type":
        if ($type_id) {
            try {
                delete_type($type_id);
                header("Location: admin_controller.php?action=list_types");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error deleting type. Details: " . $e->getMessage();
                include('view/error.php');
                exit();
            }
        } else {
            $error_message = "Missing or incorrect type ID.";
            include('view/error.php');
            exit();
        }
        break;

    case "list_classes":
        $classes = get_classes();
        include('./adminVehicleClassList.php');
        break;

    case "add_class":
        $class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
        if (!empty($class_name)) {
            try {
                add_class($class_name);
                header("Location: admin_controller.php?action=list_classes");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error adding class. Details: " . $e->getMessage();
                include('view/error.php');
                exit();
            }
        } else {
            $error_message = "Invalid class name. Please check the field and try again.";
            include('view/error.php');
            exit();
        }
        break;

    case "delete_class":
        if ($class_id) {
            try {
                delete_class($class_id);
                header("Location: admin_controller.php?action=list_classes");
                exit();
            } catch (PDOException $e) {
                $error_message = "Error deleting class. Details: " . $e->getMessage();
                include('view/error.php');
                exit();
            }
        } else {
            $error_message = "Missing or incorrect class ID.";
            include('view/error.php');
            exit();
        }
        break;

    default:
        $vehicles = get_vehicles($sort_order);
        include('./adminVehicleList.php');
}
?>


