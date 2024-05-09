<?php
require_once("../../../Model/database.php");
require_once('../../../Model/type_db.php');

$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'type_name', FILTER_SANITIZE_STRING);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_types';
switch ($action) {
    case "list_types":
        $types = get_types();
        include('../adminVehicleTypeList.php');
        break;

    case "add_type":
        if (!empty($type_name)) {
            add_type($type_name);
            header("Location: types.php?action=list_types");
            exit();
        } else {
            $error_message = "Invalid type name. Please check the field and try again.";
            include('view/error.php');
            exit();
        }
        break;

    case "delete_type":
        if ($type_id) {
            delete_type($type_id);
            header("Location: types.php?action=list_types");
            exit();
        } else {
            $error_message = "Missing or incorrect type ID.";
            include('view/error.php');
            exit();
        }
        break;

    default:
        $types = get_types();
        include('../adminVehicleTypeList.php');
}

?>
