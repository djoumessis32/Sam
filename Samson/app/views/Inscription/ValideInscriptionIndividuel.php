<?php
/**
 * Created by PhpStorm.
 * User: MVONDO
 * Date: 29/08/14
 * Time: 08:49
 */
require_once'../../config.php';
 $idetudiant=$_POST['IdEtudiant'];
 	 $datejour = date("Y-m-d");
	 echo $datejour;

 $Req_UpdateMoyCand="update preinscription SET is_inscrit = 1, dateinscription = '$datejour' where idetudiant=$idetudiant;";
   $req = $con->query($Req_UpdateMoyCand);
echo $Req_UpdateMoyCand;


//$nbcand=null;


  


?>