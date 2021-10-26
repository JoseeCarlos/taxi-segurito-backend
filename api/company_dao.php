<?php
require 'config.php';
require 'company.php';

class CompanyDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = DBConnection::GetConnection();
    }

    public function insert(Company $company) {
        try {
            $query = "INSERT INTO company(name, NIT, state) VALUES (:name, :nit, 1)";
            $params = [
                "name" => $company->name,
                "nit" => $company->nit,
            ];

            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            echo json_encode("success");

        } catch (Exception $e) {
            echo json_encode($e);
        }
    }

    public function update(Company $company) {
        try {
            $query = "UPDATE company SET
                name = :name,
                `NIT` = :nit
            WHERE idCompany = :id";
            $params = [
                "name" => $company->name,
                "nit" => $company->nit,
                "id" => $company->id
            ];

            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            echo json_encode("success");

        } catch (Exception $e) {
            echo json_encode($e);
        }
    } 
}