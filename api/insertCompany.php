<?php
require "config.php";
$pdo = DBConnection::GetConnection();
/*$name = isset($_POST['name']) ? $_POST['name'] : "";
$nit = isset($_POST['nit']) ? $_POST['nit'] : "";*/

$name = $_POST['name'];
$nit = $_POST['nit'];
try {
    $insertSql = "
    INSERT INTO `company`(`name`,`state`, `NIT`) 
    VALUES (:name, 1, :nit)
  ";
    $statement = $pdo->prepare($insertSql);
    $statement->execute(array(
        "name" => $name,
        "nit" => $nit,
    ));
    echo json_encode("Success");
} catch (Exception $e) {
    echo json_encode($e);
}
