<?php
header("Content-Type: application/json");
// require 'company_dao.php';
// require 'company.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
// $companyDao = new CompanyDAO();

switch($requestMethod) {
    case 'GET':
        echo json_encode('working!');
        break;
    case 'POST':
        $jsonCompany = file_get_contents('php://input');
        echo json_encode($companyDao->insert($jsonCompany));
        echo $jsonCompany;
        break;
    case 'PUT':
        $jsonCompany = file_get_contents('php://input');
        // echo $companyDao->update(Company::fromJson($jsonCompany));
        echo $jsonCompany;
        break;
}