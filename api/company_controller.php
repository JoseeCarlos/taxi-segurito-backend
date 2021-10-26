<?php
header("Content-Type: application/json");
require 'company_dao.php';
require 'company.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$companyDao = new CompanyDAO();

switch($requestMethod) {
    case 'POST':
        $jsonCompany = file_get_contents('php://input');
        echo json_encode($companyDao->insert(Company::fromJson($jsonCompany)));
        break;
    case 'PUT':
        $jsonCompany = file_get_contents('php://input');
        echo $companyDao->update(Company::fromJson($jsonCompany));
        break;
}