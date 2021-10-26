<?php

require "config.php";

$username = $_POST['email'];
$password = $_POST['password'];

try {
  $query = "SELECT U.iduser,RU.name FROM user U
  INNER JOIN roluser RU ON RU.idrolUser=U.idrolUser
  INNER JOIN person P on P.idPerson=U.iduser
  WHERE U.email = :email AND U.password = MD5(:password) AND U.status=1 ";
  $statement = $db->prepare($query);
  $statement->execute(
       array(
            'email'=>$username,
            'password'=>$password
       ));
  $count = $statement->rowCount();
  if($count > 0)
  {
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
  }
  else
  {
    echo json_encode("Error");
  }
} catch (\Exception $e) {
  echo json_encode("Error");
}





?>
