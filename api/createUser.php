<?php

require "config.php";
$pdo = DBConnection::GetConnection();


$fullname = $_POST['fullname'];
$cellphone = $_POST['cellphone'];
$email = $_POST['email'];
$password = $_POST['password'];
$register = $_POST['register'];

try {

  $pdo->beginTransaction();
  $insertSql = "
      INSERT INTO `person`
        (`fullname`,`cellphone`)
      VALUES
        (:fullname, :cellphone)
  ";
  $insertSql2 = "
      INSERT INTO `user`
        (`idUser`, `email`,`password`,`idrolUser`,updateDate)
      VALUES
        (:idUser, :email ,MD5(:password),:idrolUser,NOW())
  ";
  $insertSql3 = "
      INSERT INTO `clientuser`
        (`idclientuser`, `resgister`)
      VALUES
        (:idclientuser, :resgister)";

  $statement = $pdo->prepare($insertSql);
  $statement->execute(array(
      "fullname" => $fullname,
      "cellphone" => $cellphone,
  ));
  $idPerson = $pdo->lastInsertId();
  $idclient = $idPerson;
  $statement2 = $pdo->prepare($insertSql2);
  $statement2->execute(array(
      "idUser" => $idPerson,
      "email" => $email,
      "password" => $password,
      "idrolUser"=>'2',
  ));
  $statement3 = $pdo->prepare($insertSql3);
  $statement3->execute(array(
    "idclientuser" => $idclient,
    "resgister" => $register,
));

  $pdo->commit();
  echo json_encode("Success");

} catch (\Exception $e) {
  $pdo->rollback();
  echo json_encode($e);
}

?>
