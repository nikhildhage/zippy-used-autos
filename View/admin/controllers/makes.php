<?php
require_once("../../../Model/database.php");
require_once('../../../Model/make_db.php');

$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'make_name', FILTER_SANITIZE_STRING)
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_makes';
switch ($action) {
    case "list_makes":
        $makes = get_makes();
        include('../adminVehicleMakeList.php');
        break;

    case "add_make":
        if (!empty($make_name)) {
            add_make($make_name);
            header("Location: makes.php?action=list_makes");
            exit();
        } else {
            $error_message = "Invalid make name. Please check the field and try again.";
            include('view/error.php');
            exit();
        }
        break;

    case "delete_make":
        if ($make_id) {
            delete_make($make_id);
            header("Location: makes.php?action=list_makes");
            exit();
        } else {
            $error_message = "Missing or incorrect make ID.";
            include('view/error.php');
            exit();
        }
        break;

    default:
        $makes = get_makes();
        include('../adminVehicleMakeList.php');
}

?>
