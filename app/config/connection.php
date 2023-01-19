<?php
class Connection
{
    public $host = 'localhost';
    public $dbname = 'crud';
    public $port = '5432';
    public $user = 'postgres';
    public $password = 'postgres';
    public $driver='pgsql';
    public $connect;
public static function getConnection()
{
try {
    //code... 
    $connection = new Connection();
    $connection->connect = new PDO("{$connection->driver}:host={$connection->host};port={$connection->port};dbname={$connection->dbname}", $connection->user, $connection->password);
    $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  ///  return $connection->connect;
echo ("coneccion exitosa");
} catch (PDOException $e) {
    //throw $th;
    echo "Error:" , $e-> getMessage();

}
}
}
Connection::getConnection();