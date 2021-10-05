<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 6/6/18
 * Time: 1:09 PM
 */
include("init.php");

session_start();
// test du username et password
if(isset($_POST['login'])&& isset($_POST['pwd'])) {
    $login = $_POST['login'];
    $password = $_POST['pwd'];
    //echo $login . "-" . $password;
    $rows = checkloginConnexion($login, $password);
    $count = count($rows);
     echo$count;
    if ($count > 0) {
        /***************************************        Initialisation des variables de sessions        ******************************************/

        $_SESSION["idutilisateur"] = $rows[0]['idutilisateur'];
        $_SESSION["idgroupeutilisateur"] = $rows[0]['idgroupeutilisateur'];
        $_SESSION["codeutilisateur"] = $rows[0]['codeutilisateur'];
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;
        $_SESSION["groupeuser"] = $rows[0]['codegroupeutilisateur'];
        $_SESSION["sexe"] = $rows[0]['sexe'];
        $_SESSION["nom"] = $rows[0]['nom'];
        $_SESSION["prenom"] = $rows[0]['prenom'];
        $_SESSION["email"] = $rows[0]['email'];
        $_SESSION['lang'] ="fr";
        $_SESSION['avatar']=$rows[0]['avatar'];
        $_SESSION['civilite']=$rows[0]['civilite'];
        $_SESSION['operation_statue']="";
        $_SESSION['page']="native/welcome.php";
        $_SESSION['campus']=1;
        $_SESSION['sign']=crypt('TeamSamson','Samson');
        $_SESSION['iconvue']="icon-home";
        //$_SESSION['parent']=1;
/************************************************************************/
        $_SESSION['titrevue']='Bienvenue';
        $_SESSION['secScol']=null;
        $_SESSION['cursusScol']=null;
        $_SESSION['statutoperation']="";
        header("location:../../");
    }
    else{
        header("location:../../");

    }

}

?>

