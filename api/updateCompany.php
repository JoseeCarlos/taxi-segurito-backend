<?php
require "config.php";
$pdo = DBConnection::GetConnection();
/*$name = isset($_POST['name']) ? $_POST['name'] : "";
$nit = isset($_POST['nit']) ? $_POST['nit'] : "";*/
$id = $_POST['id'];
$name = $_POST['name'];
$nit = $_POST['nit'];
try {
    $insertSql = "
    UPDATE `company` SET `name` = :name,`state` = 1, `NIT`= :nit 
    WHERE idCompany = :id
  ";
    $statement = $pdo->prepare($insertSql);
    $statement->execute(array(
        "name" => $name,
        "nit" => $nit,
        "id" => $id
    ));
    echo json_encode("Success");
} catch (Exception $e) {
    echo json_encode($e);
}
