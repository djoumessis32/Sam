<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/26/18
 * Time: 9:13 PM
 */

require_once "../../config.php";
session_start();

$test=null;
$nbmax=null;
$sta=null;

$idetudiant = $_GET['idetudiant'];
$anonyme1 = $_GET['cc_etudiant'];
if (isset($idetudiant) and $idetudiant != "" and isset($anonyme1) and $anonyme1 != "") {
    $idcan = $_GET['idetudiant'];
    $idep = $_GET['idmatiere'];

    if($anonyme1>=0 && $anonyme1<=20){

        $requete = "update evaluernoteetudiant set cc=".$anonyme1." where idetudiant=".$idcan." and iduvmatiere=".$idep."";
        //$requete = "UPDATE evaluernoteetudant SET cc=".$anonyme1." WHERE idetudiant='$idcan'and iduvmatiere='$idep'";
        $test = $con->exec($requete);
        $sta=1;

    }else{
        $sta=2;
    }
    //  echo "on";


}
echo$sta;