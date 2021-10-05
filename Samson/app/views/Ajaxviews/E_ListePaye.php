
<link href="../../../assets/css/style.css" rel="stylesheet" media="all">
<?php
/**
 * Created by PhpStorm.
 * User: Dave MVONDO
 * Date: 12/08/2019
 * Time: 19:08
 */

require_once "../../config.php";
session_start();
if(isset($_GET["eltcles"]) && $_GET["eltcles"]!="" && isset($_GET["idanneeAcad"]) && $_GET["idanneeAcad"]!="")
{
	$idanneeAcad=$_GET["idanneeAcad"];
	//echo ("n");
	echo'<table id="listeetudiant"  class="table table-bordered table-striped">      
    <tr id="titrerubrique">
      <td align="center"><strong>#</strong></td>
      <td align="center" width="30%"><strong>Matricule</strong></td>
      <td align="center"><strong>Noms et prenoms </strong></td>
      
      <td align="center"><strong>Editer</strong></td>
   </tr>';
$i=0; $cpt = 1; $a=0;
$eltcles=$_GET["eltcles"];

@$Rselectinfoetudglob="SELECT DISTINCT Etud.id, Etud.nomEt, Etud.prenomEt, Etud.matriculeEt,
`Etud`.`dateNaissEt`,`Etud`.`lieuNaissEt`, `Etud`.`photoEt` 
 FROM etudiant Etud JOIN validepaye VP ON Etud.id=VP.idetudiant
 WHERE VP.idtranche IN (SELECT idtranche FROM `validepaye` WHERE idanneeacademique='".$idanneeAcad."') AND (VP.confirmepaye IS NULL OR VP.confirmepaye=0)
 AND (Etud.nomEt LIKE '%$eltcles%'
 OR Etud.prenomEt LIKE '%$eltcles%'
 OR Etud.matriculeEt LIKE '%$eltcles%')
 LIMIT 20";
 //echo $Rselectinfoetudglob;
$rep=$db->query($Rselectinfoetudglob);
while($row=$rep->fetch())
{
	if(($i % 2)==0)
		      echo'<tr class="trcouleur1" onClick="chargeValeurPaye('.$row["id"].');">';												
		      else
		      echo'<tr class="trcouleur2" onClick="chargeValeurPaye('.$row["id"].');">';
		  echo'<td align="center">'.$cpt.'</td>
              <td>'.$row["matriculeEt"].'</td>
              <td>'.$row["nomEt"].' '.$row["prenomEt"].'</td>';
			  ?>
			  <td align="center"><i class="icon-edit"></i></td>
			  <?php
			  echo'</tr>'; 
			  echo'<tr>';
			  echo'<td align="center" colspan="6" id="td_'.$row["id"].'"></td>';
	   		  echo'</tr>';
			  
			  $i = $i + 1;	$cpt++;  $a++;	
}
echo '</table>';
}

if(isset($_GET["chainepaye"]) && $_GET["chainepaye"]=="1")
{
	$idetudiant=$_GET["idetudiant"];
    $idanneeAcad=$_GET["idanneeAcad"];
	//echo $idetudiant;
	echo'<table id="listeetudiant"  class="table table-bordered table-striped"> ';
    echo'<tr id="titrerubrique">';
    echo'<td width="20%" align="center">#</td>';
	echo'<td width="20%" align="center">NumRecu</td>';
	echo'</tr>';
	$count=1;
	$sqlV="SELECT idvalidepaye FROM validepaye WHERE idetudiant='".$idetudiant."' AND idtranche IN (SELECT idtranche FROM `validepaye` WHERE idanneeacademique='".$idanneeAcad."') AND (validepaye.confirmepaye IS NULL OR validepaye.confirmepaye=0)";
	$req=$db->query($sqlV);
	$test=0;
	$chaineIdpaye="";
	 while($row=$req->fetch())
	 {
		 echo'<tr>';
         echo'<td width="20%" align="center">'.$count.'</td>';
		 echo'<td width="20%" align="center"><input type="text" name="'.$row["idvalidepaye"].'" value="" id="'.$row["idvalidepaye"].'" /></td>';
		 echo'</tr>';
		 if($test==0)
	   {
		   $chaineIdpaye=$row["idvalidepaye"];
		   $test=1;
	   }else{
		     $chaineIdpaye=$chaineIdpaye."/".$row["idvalidepaye"];
			}
			$count++;
	 }
	 echo'<tr id="titrerubrique">';
         	echo'<td width="20%" align="center" colspan="5"><input type="button" name="bouton" id="bouton" value="Valider" onclick="validerPaye(\''.$chaineIdpaye.'\','.$idetudiant.');" /> </td>';
	   echo'</tr>';
   echo'</table>';
}

if(isset($_GET["chaineIdpaye"]) && isset($_GET["chaineIdpayeRecu"]))
{
  $chaineIdpaye=$_GET["chaineIdpaye"];
  $chaineIdpayeRecu=$_GET["chaineIdpayeRecu"];
  $idvalidepaye=explode("/",$chaineIdpaye); 
  $numrecu=explode("/",$chaineIdpayeRecu);
  for($i=0;$i<count($idvalidepaye);$i++)
  {
	if($numrecu[$i]!="")
	{
	$sqlUpdate="UPDATE validepaye SET confirmepaye=1,numrecu='".$numrecu[$i]."' WHERE idvalidepaye=".$idvalidepaye[$i]."";
  	$req = $con->query($sqlUpdate);  
	//echo $sqlUpdate;
	}
  }  
  
  echo '<center><font size="+1" color="#00FFFF"> Mise a jour avec Succes !! </font></center><br />';
	
	
}


?>

