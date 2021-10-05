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
        $idetud=$_POST['id'.$idetudiant];
        $idannneeAcad=$_POST["idannneeAcad"];
		$updatetest=$con->exec("UPDATE preinscription set exist = 0 where idetudiant = $idetudiant; ");
		$updatetest=$con->exec("DELETE FROM validepaye where idetudiant = $idetudiant and idanneeacademique = $idannneeAcad;");
		//echo "DELE FROM validepaye where idetudiant = $idetudiant and idanneeacademique = $idannneeAcad;";
	}
	
}

echo '<script language="javascript">alert("Annulation Tranche Effectuer!"); </script>';


?>