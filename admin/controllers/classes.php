<?php
require_once("../../Model/database.php");
require_once('../../Model/class_db.php');

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'class_name', FILTER_SANITIZE_STRING);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_classes';
switch ($action) {
    case "list_classes":
        $classes = get_classes();
        include('../View/adminVehicleClassList.php');
        break;

    case "add_class":
        if (!empty($class_name)) {
            add_class($class_name);
            header("Location: classes.php?action=list_classes");
            exit();
        } else {
            $error_message = "Invalid class name. Please check the field and try again.";
            include('../../view/error.php');
            exit();
        }
        break;

    case "delete_class":
        if ($class_id) {
            try {
                delete_class($class_id);
                header("Location: classes.php?action=list_classes");
                exit();
            } catch (PDOException $e) {
                $error_message = "Cannot delete this class because it is currently assigned to one or more vehicles.";
                include('../../view/error.php');
                exit();
            }
        } else {
            $error_message = "Missing or incorrect class ID.";
            include('../../view/error.php');
            exit();
        }
        break;

    default:
        $classes = get_classes();
        include('../View/adminVehicleClassList.php');
}
?>
