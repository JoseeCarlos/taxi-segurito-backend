<?php
    class DBConnection {
        public static function GetConnection(){
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $server = $url["host"];
            $username = $url["user"];
            $password = $url["pass"];
            $database = substr($url["path"], 1);
            
            $conn = "mysql:host=$server;dbname=$database;";
            $options=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            try{
                $pdo = new PDO($conn.'charset=utf8', $username, $password, $options);
            } catch(PDOException $e){
                throw new PDOException($e->getMessage(),(int)$e->getCode());
            }
            return $pdo;
        }
    }
?>
