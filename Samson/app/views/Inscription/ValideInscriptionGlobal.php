<?php
/**
 * Created by PhpStorm.
 * User: DevineSoft
 * Date: 29/08/14
 * Time: 08:49
 */
require_once'../../config.php';
@$listeetudiant=explode(";",$_POST["listeetudiant"]);
$n=count($listeetudiant);
for($i=0;$i<$n;$i++){
    $idetudiant=$listeetudiant[$i];
    if(isset($idetudiant)and $idetudiant!=""){
        //$idetudiant=$_POST['IdEtudiant'];
        $datejour = date("Y-m-d");
           

 $Req_UpdateMoyCand="update preinscription SET is_inscrit = 1, dateinscription = '$datejour' where idetudiant=$idetudiant;";
   $req = $con->query($Req_UpdateMoyCand);
//echo $Req_UpdateMoyCand;
	}
	
}
if($Req_UpdateMoyCand==true){
            echo"<script language=\"javascript\"> alert('Validation Effectuer Avec Succes');</script>";

        }
    else{
            echo"<script language=\"javascript\"> alert('Erreur Validation');</script>";

        }

//$nbcand=null;


  


?>