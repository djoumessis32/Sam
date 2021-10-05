<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/19/18
 * Time: 7:51 PM
 */

@$username = 'root';
@$password = '';
@$host = 'localhost';
@$bd = 'samson_iusty';
//@$bd = 'Samson';



$con = new PDO("mysql:dbname=$bd;host=$host", $username, $password);
$bdd = new PDO("mysql:dbname=$bd;host=$host", $username, $password);
$db = new PDO("mysql:dbname=$bd;host=$host", $username, $password);



class db
{
    public $isConnected;
    public $datab;

    public function __construct($bd,$host,$username,$password){
        $this->isConnected = true;
        try {
            $this->datab = new PDO("mysql:dbname=$bd;host=$host", $username, $password);
        }
        catch(PDOException $e) {
            $this->isConnected = false;
            throw new Exception($e->getMessage());
        }
    }

    public function Disconnect(){
        $this->datab = null;
        $this->isConnected = false;
    }



    public function getRows($query, $params=array()){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){

            die('Erreur : ' . $e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

}
?>
