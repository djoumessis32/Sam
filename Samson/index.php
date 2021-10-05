<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/19/18
 * Time: 7:48 PM
 */

session_start();

if(!isset($_SESSION['lang'])){
    $_SESSION['lang']="fr";
}
require_once('app/config.php');
require_once('app/models/autoload.php');
$app=null;
$req="SELECT is_install FROM application where is_install=1";
$rep=$con->query($req);
while($etab=$rep->fetch()) {
    $app = $etab[0];
}
if($app==1){
    $function =new Functions($con);
    if(isset($_SESSION['login']) && isset($_SESSION['password'])){
        include'app/app.php';
    }
    else{
        require_once"app/views/native/login.php";
    }
}else{
    echo("Veillez installer le systeme!");
}
