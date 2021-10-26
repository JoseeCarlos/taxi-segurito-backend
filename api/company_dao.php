<?php
require 'config.php';
require 'company.php';

class CompanyDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = DBConnection::GetConnection();
    }

    public function insert($jsonCompany) {
        $companyArray = json_decode($jsonCompany, true);
        $company = new Company(
            0,
            $companyArray['name'],
            $companyArray['nit'],
            1
        );

        try {
            $query = "INSERT INTO company(name, `NIT`, state) VALUES (:name, :nit, 1)";
            $params = [
                "name" => $company->name,
                "nit" => $company->nit,
            ];

            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            return "success";

        } catch (Exception $e) {
            echo json_encode($e);
        }
    }

    public function update($jsonCompany) {
        $companyArray = json_decode($jsonCompany, true);
        $company = new Company(
            $companyArray['id'],
            $companyArray['name'],
            $companyArray['nit'],
            $companyArray['status']
        );

        try {
            $query = "UPDATE company SET
                name = :name,
                `NIT` = :nit,
                status = :status
            WHERE idCompany = :id";
            $params = [
                "name" => $company->name,
                "nit" => $company->nit,
                "status" => $company->status,
                "id" => $company->id
            ];

            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            return "success";

        } catch (Exception $e) {
            echo json_encode($e);
        }
    } 
}