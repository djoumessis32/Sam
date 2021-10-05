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
        $tranche=$_POST["tranche"];
        $datejour = date("Y-m-d");
		if($tranche==1)
		{
			$tes=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(1,$idetudiant,$idannneeAcad);");
			
			$reqtest="select idanneeacademique from nbtranche where idanneeacademique=$idannneeAcad";
            $res=$con->query($reqtest);
            $res_info=$res->fetchAll();
            $nb=count($res_info);
			if($nb==0){$tes5=$con->exec("INSERT INTO nbtranche(idanneeacademique,nombretranche)VALUES($idannneeAcad,1);");}
	}
	else if($tranche==2)
	{
		$tes1=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(1,$idetudiant,$idannneeAcad);");
		$tes2=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(2,$idetudiant,$idannneeAcad);");
		$reqtest="select idanneeacademique from nbtranche where idanneeacademique=$idannneeAcad";
        $res=$con->query($reqtest);
        $res_info=$res->fetchAll();
        $nb=count($res_info);
	    if($nb==0){$tes5=$con->exec("INSERT INTO nbtranche(idanneeacademique,nombretranche)VALUES($idannneeAcad,2);");}
			
	}
	
	else if($tranche==3)
	{
		$tes1=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(1,$idetudiant,$idannneeAcad);");
		$tes2=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(2,$idetudiant,$idannneeAcad);");
		$tes3=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(3,$idetudiant,$idannneeAcad);");
		$reqtest="select idanneeacademique from nbtranche where idanneeacademique=$idannneeAcad";
        $res=$con->query($reqtest);
        $res_info=$res->fetchAll();
        $nb=count($res_info);
	    if($nb==0){$tes5=$con->exec("INSERT INTO nbtranche(idanneeacademique,nombretranche)VALUES($idannneeAcad,3);");}
	
	}
	
	else if($tranche==4)
	{
		$tes1=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(1,$idetudiant,$idannneeAcad);");
		$tes2=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(2,$idetudiant,$idannneeAcad);");
		$tes3=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(3,$idetudiant,$idannneeAcad);");
		$tes4=$con->exec("INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique)VALUES(4,$idetudiant,$idannneeAcad);");
		$reqtest="select idanneeacademique from nbtranche where idanneeacademique=$idannneeAcad";
        $res=$con->query($reqtest);
        $res_info=$res->fetchAll();
        $nb=count($res_info);
	    if($nb==0){$tes5=$con->exec("INSERT INTO nbtranche(idanneeacademique,nombretranche)VALUES($idannneeAcad,4);");}
		
	//	echo "INSERT INTO validepaye(idtranche,idetudiant,idanneeacademique,joursvalidation)VALUES(4,$idetudiant,$idannneeAcad,'$datejour');";
		
	}
		//echo $tranche;
           $updatetest=$con->exec("UPDATE preinscription set exist = 1 where idetudiant = $idetudiant; ");
	}
}
echo '<script language="javascript">alert("Nombre de Tranche Valider!"); </script>';
?>



  


