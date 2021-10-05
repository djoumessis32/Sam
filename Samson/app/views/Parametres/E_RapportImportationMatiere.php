<?php
header('Content-Type: text/html; charset=UTF-8');
require_once('../../config.php');
/**
 * Created by PhpStorm.
 * Date: 08/12/16
 * Time: 12:37
 */

if(isset($_POST['data'])){
//print_r($_POST);
    
	//$UniteEnseignement= $_POST['UniteEnseignement'];
    $entete=array();
    $data=array();
    $chaine_entete=$_POST['data1'];
    $chaine_data=$_POST['data'];
    $entete=explode(';',$chaine_entete);
    $data=explode('&',$chaine_data);
	
	  
    
echo '<html>
	<hr width="95%" height="4px">
<center><h1><u>Rapport d\'importation des Matières</u></h1></center>
<center><table border="1">
<tr style="background-color:rgba(82, 109, 255, 0.52);color:white;">
<td >N°</td>
<td >code</td>
<td >libelle_fr</td>
<td >libelle_en</td>
<td >ncredis</td>
<td> notevaliduvmatiere</td>
<td >noteelimuvmatiere</td>
<td >vlmhoraire</td>
<td>Etat</td>
</tr>
';
 $nbattri=count($entete);
 $nbligne=count($data);

    $datafin=null;
    $d=1;
    
    $p=0;
    $bon=0;
    $echec=0;	
	$b=1;
	foreach($data as $ligne)
	{
		$z=1;
		
        $datafin=explode(';',$ligne);
		
		$req="select codeuvmatiere from uvmatiere where codeuvmatiere LIKE '%".$datafin[0]."%'";
		//echo $req;
		$valider=$con->query($req);
		//echo ($valider->rowCount()."<br>");
		if($valider->rowCount()==0)
		{
			//echo "ok";
			$req="INSERT INTO uvmatiere(";
			foreach($entete as $t)
			{
				if($z<$nbattri){
					$req.="".strtolower($t).",";
				}else{
					$req.="".strtolower($t)."";
				}
				$z++;

			}
			$req.=")values(";
			
				$req_f=$req;
				$datafin=explode(';',$ligne);

				$d=1;
				foreach($datafin as $u)
				{

					if($d<$nbattri){
						$req_f.="'".($u)."',";
					}else{
						$req_f.="'".($u)."'";
					}
					$d++;
				}
				$req_f.=")";
				//echo $req_f;
				$test=$con->exec($req_f);
				
				if($test==true){
					echo"<tr style='background-color:aqua;'><td>".$b."</td><td>".$datafin[0]."</td><td>".$datafin[1]."</td><td>".$datafin[2]."</td><td>".$datafin[3]."</td>
	<td>".$datafin[4]."</td><td>".$datafin[5]."</td><td>".$datafin[6]."</td><td>Importer avec Succès !!</td></tr>";
					$bon++;
				}else{
					echo"<tr style='background-color:red;'><td>".$b."</td><td>".$datafin[0]."</td><td>".$datafin[1]."</td><td>".$datafin[2]."</td><td>".$datafin[3]."</td>
	<td>".$datafin[4]."</td><td>".$datafin[5]."</td><td>".$datafin[6]."</td><td>Echec</td></tr>";
					$echec++;
				}
				echo //$req_f."<br/>";
				$req_f="";
				
			$req2="select iduvmatiere from uvmatiere";
			//echo $req2;
	        $valider=$con->query($req2);  
       while($ligne=$valider->fetch()){$iduv=$ligne['iduvmatiere']; }
	   //echo "INSERT INTO preinscription(idetudiant,idsemestre,idspecialite,pass,idannee)VALUES($idetudiant,$semestreAcad,$specialite,1,$anneeAcad);";
	    if($test==true){
             echo '<script language="javascript">alert("UE Enregistrer Avec Success!"); </script>';
				}
	
	} else {echo"<tr style='background-color:red;'><td>".$b."</td><td>".$datafin[0]."</td><td>".$datafin[1]."</td><td>".$datafin[2]."</td><td>".$datafin[3]."</td>
	<td>".$datafin[4]."</td><td>".$datafin[5]."</td><td>".$datafin[6]."</td><td>Déjà Importer</td></tr>";
					$echec++;}	$b++;
	}
	echo"<tr>
<td colspan='2'>Total</td>
<td><center> <b>Succès :</b> ".$bon." / <b> Echec : </b>".$echec."</center></td>
</tr>
</table></center>";
	}