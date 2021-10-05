<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 6/6/18
 * Time: 6:25 PM
 */
session_start();
require_once "../models/autoload.php";
require_once('../config.php');
require('../models/Class/Functions.php');
$function  = new Functions($bdd);


/************************************************************************************************************************
 *                         Chargement des menus en fonction du Module correspondant                                     *
 ***********************************************************************************************************************/

if(isset($_GET['module'])){
    $_SESSION['parent']=$_GET['module'];
    //print_r($_SESSION);
    session_destroy($_GET['module']);
    header("location:../../");

}

if(isset($_GET['etab'])){
    $idetab=$_GET['etab'];
    $req="SELECT * from campus WHERE idcampus=$idetab";
    $rep=$bdd->query($req);
    while ($e=$rep->fetch()){
        $_SESSION['campus']=$e[0];
        $_SESSION['libcampus']=$e[2];
        $_SESSION['libcampus2']=$e[3];
        $_SESSION['telcampus']=$e[4];
        $_SESSION['adrecampus']=$e[5];
    }

    header("location:../../");

}

/************************************************************************************************************************
 *                      Chargement de la vue en fonction du menu selectionner                                           *
 ***********************************************************************************************************************
 */

if(isset($_GET['page']) && isset($_GET['folder'])){

    if(empty($_GET['page'])){

        $_SESSION['page']="native/welcome.php";
        $_SESSION['titrevue']='Bienvenue';
        $_SESSION['iconvue']='icon-home';
    }else{

        $_SESSION['page']=$_GET['folder']."/".$_GET['page'];
        $_SESSION['titrevue']=$_GET['titre'];
        $_SESSION['iconvue']=$_GET['icon'];
    }
    //echo$_SESSION['page'];
    header("location:../../");
}

