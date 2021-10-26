<?php
header("Content-Type: application/json");
require 'driver_dao.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$driverDAO = new DriverDAO();

switch($requestMethod) {
    case 'GET':
        if(empty($_GET['criteria'])) {
            echo json_encode($driverDAO->getDrivers());
        }
        else {
            echo json_encode($driverDAO->getDriversByNameOrCi($_GET['criteria']));
        }
        break;
}
