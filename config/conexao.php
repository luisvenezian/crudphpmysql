<?php
/*
 * Sessão de conexão com o servidor e a base das informações 
 * que deverão ser utilizadas pelo sistema
 * Luis Felipe A. Venezian (22/10/2018).
 */
    

/* Comentada antiga conexão com MYSQL
function conectaBD(){
    
    #Local do servidor
    $servidor = "localhost";
    
    #Usuário de acesso a base de dados 
     $usuario = "root";
 
    #Nome da instância em que deseja obter conexão.
    $base = "ilp"; 

    $link = mysqli_connect($servidor, $usuario,"", $base);
    return $link;
    
} */

#Constantes para conexão com banco de dados.
define('DB_HOST'        , "LAPTOP-O0KHNNPV");
define('DB_USER'        , "sa");
define('DB_PASSWORD'    , "admin");
define('DB_NAME'        , "loja");
define('DB_DRIVER'      , "sqlsrv"); //deixa o driver como está, pois já está definido para sqlsrv
     


class conexao{
    private static $connection;

    private function __construct(){}

    public static function getConnection(){
        $pdoConfig  =  DB_DRIVER . ":". "Server=" . DB_HOST . ";";
        $pdoConfig .=  "Database=".DB_NAME.";";
    

    try {
        if(!isset($connection)){
            $connection = new PDO($pdoConfig, DB_USER, DB_PASSWORD); 
            $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $connection;
    }
    catch (PDOException $e){
        $mensagem = "Drivers Disponíveis: ". implode(",",PDO::getAvailableDrivers());
        $mensagem .= "\nErro: ". $e->getMessage();
        throw new Exception($mensagem);
    }
    
    }//fim métod getConnection
}


/*Fim de sessão.*/
?>