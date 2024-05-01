<?php
require_once("./Model/database.php");
require_once('./Model/vehicles_db.php');
require_once('./Model/type_db.php');
require_once('./Model/class_db.php');
require_once('./Model/make_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_assignments';
switch ($action) {
    default:
        $vehicles = get_vehicles();
        include('./View/vehicleList.php');
        // No break needed after default as it's the last case
}
