<?php
require_once'../config.php' ;
$dbb = new db($bd,$host,$username,$password);
$errors = array();

function checkloginConnexion($login, $password)
{
    global $dbb;
    $pass=md5(md5('Samson@2018'.$password));
    //$pass=$password;
    $getrows = $dbb->getRows("select * from utilisateur inner join groupeutilisateur on groupeutilisateur.idgroupeutilisateur=utilisateur.idgroupeutilisateur where etatcopte=1 AND login=? and password=?", array($login, $pass));
    return $getrows;

}