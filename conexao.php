<?php


class Conexao
{
    private static $connection;

    private function __construct(){}

    public static function getConnection() {

        $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=".DB_NAME.";";

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
         } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
         }
     }
}





////// usage///////////

define('DB_HOST'        , "localhost");
define('DB_USER'        , "sa");
define('DB_PASSWORD'    , "unifai2022");
define('DB_NAME'        , "");
define('DB_DRIVER'      , "sqlsrv");






try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT * FROM tabela");
    $produtos   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }

?>