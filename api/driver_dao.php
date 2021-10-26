<?php
require 'config.php';
require 'driver.php';

class DriverDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = DBConnection::GetConnection();
    }

    public function getDrivers() {
        $query = "SELECT
            d.iddriver AS 'id',
            p.fullName AS 'fullName',
            p.cellphone AS 'phone',
            d.license AS 'license',
            d.ci AS 'ci',
            d.photo AS 'picture',
            d.status AS 'status'
        FROM driver d
        INNER JOIN person p ON d.iddriver = p.idPerson";

        $result = $this->pdo->query($query);
        return $this->getDriversAsArray($result);
    }

    public function getDriversByNameOrCi($criteria) {
        $query = "SELECT
            d.iddriver AS 'id',
            p.fullName AS 'fullName',
            p.cellphone AS 'phone',
            d.license AS 'license',
            d.ci AS 'ci',
            d.photo AS 'picture',
            d.status AS 'status'
        FROM driver d
        INNER JOIN person p ON d.iddriver = p.idPerson
        WHERE p.fullName LIKE :nameCriteria OR d.ci LIKE :ciCriteria";

        $params = [
            'nameCriteria' => '%'.$criteria.'%',
            'ciCriteria' => '%'.$criteria.'%'
        ];

        $result = $this->pdo->prepare($query);
        $result->execute($params);
        return $this->getDriversAsArray($result);
    }

    private function getDriversAsArray($queryResult) {
        $drivers = [];
        while ($row = $queryResult->fetch()) {
            array_push($drivers, new Driver(
                $row['id'],
                $row['fullName'],
                $row['phone'],
                $row['license'],
                $row['ci'],
                $row['picture'],
                $row['status']
            ));
        }

        return $drivers;
    }
}
