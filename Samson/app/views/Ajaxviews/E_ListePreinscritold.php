
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
      <td align="center"><strong>Noms et prenoms </strong></td>
      <td align="center"><strong>Editer</strong></td>
   </tr>';
$i=0; $cpt = 1; $a=0;
$eltcles=$_GET["eltcles"];

@$Rselectinfoetudglob="SELECT * FROM etudiant E INNER JOIN preinscription P ON P.idetudiant = E.id
WHERE P.idannee = $idanneeAcad
AND is_inscrit = 0
AND (E.nomEt LIKE '%$eltcles%'
OR E.prenomEt LIKE '%$eltcles%'
OR E.numdossier LIKE '%$eltcles%')
LIMIT 20";
$rep=$db->query($Rselectinfoetudglob);
while($row=$rep->fetch())
{
	if(($i % 2)==0)
		      echo'<tr class="trcouleur1" onClick="chargeValeurPaye('.$row["id"].');">';												
		      else
		      echo'<tr class="trcouleur2" onClick="chargeValeurPaye('.$row["id"].');">';
		  echo'<td align="center">'.$cpt.'</td>
              <td>'.$row["nomEt"].' '.$row["prenomEt"].'</td>';
			  ?>
			  <td align="center"> <img src="../../../assets/img/etudiant/admin.jpg" border="0" width="30" height="30" /> </td>
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
	echo'<td width="20%" align="center">Matricule</td>';
	echo'</tr>';
	$count=1;
	$sqlV="SELECT idpreinscription FROM preinscription WHERE idetudiant='".$idetudiant."' AND is_inscrit =0";
	//echo $sqlV;
	$req=$db->query($sqlV);
	$test=0;
	$chaineIdpaye="";
	 while($row=$req->fetch())
	 {
		 echo'<tr>';
         echo'<td width="20%" align="center">'.$count.'</td>';
		 echo'<td width="20%" align="center"><input type="text" name="'.$row["idpreinscription"].'" value="" id="'.$row["idpreinscription"].'" /></td>';
		 echo'</tr>';
		 if($test==0)
	   {
		   $chaineIdpaye=$row["idpreinscription"];
		   $test=1;
	   }else{
		     $chaineIdpaye=$chaineIdpaye."/".$row["idpreinscription"];
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
  function generematricule($idetudiant,$con)
   {
	$matricule = null;
	$codePays ='CM';
	//echo $codePays;
	@$R_selectcodeannee="SELECT E.codeetablissement
	FROM etablissement E ";
	$rep=$con->query($R_selectcodeannee);
	while($resultat=$rep->fetch()){
		$codeetab=$resultat['codeetablissement']; 
		}
	@$R_selectcodeannee="SELECT a.codeannee,a.id
	FROM annee_academique a
	WHERE a.statut=1";
	$rep=$con->query($R_selectcodeannee);
	while($resultat=$rep->fetch()){
		$idannee=$resultat['id']; 
		$codeannee=$resultat['codeannee']; 
		}
		
    @$R_verifienumserie="SELECT g.numserie
	FROM generer_matricule g, annee_academique a
	WHERE g.idanneeacad='$idannee' 
	AND g.idanneeacad=a.id";
	//echo $R_verifienumserie;
	$nbr = null;
	$repverif=$con->query($R_verifienumserie);
	while($resultat=$repverif->fetch()){$nbr=$resultat['numserie']; }
	$NumSerie = (int) $nbr + 1;
	$updategenere=$con->exec("UPDATE generer_matricule SET numserie = numserie + 1 WHERE idanneeacad='$idannee'");
	if($NumSerie < 10)  $NumSerie = '000'.$NumSerie;
	elseif($NumSerie < 100)  $NumSerie = '00'.$NumSerie;
	elseif($NumSerie < 1000)  $NumSerie = '0'.$NumSerie;	
	else $NumSerie = $NumSerie;
	$matricule .=  strtoupper($codePays . '-' .$codeetab . '-' .$codeannee.$NumSerie);
	//echo $matricule;
	$updateetudiant=$con->exec("UPDATE etudiant SET matriculeEt = '$matricule' WHERE id='$idetudiant'");
	if($updateetudiant==true){
             echo '<center><font size="+1" color="#00FFFF"> Mise à jour avec Succes !! </font></center><br />';
				}
	//$nummatricul .=  strtoupper($code.$NumSerie);
   }
  $idetudiant=$_GET["idetudiant"];
  $chaineIdpaye=$_GET["chaineIdpaye"];
  $chaineIdpayeRecu=$_GET["chaineIdpayeRecu"];
  $idpreinscription=explode("/",$chaineIdpaye); 
  $nummat=explode("/",$chaineIdpayeRecu);
  $datejour = date("Y-m-d");
  for($i=0;$i<count($idpreinscription);$i++)
  {
	if($nummat[$i]!="")
	{
   $sql="select infosage from etudiant where infosage='".$nummat[$i]."'";
   $valider=$con->query($sql);  
   if($valider->rowCount()==0){
	    $MatUpdate="UPDATE etudiant SET infosage='".$nummat[$i]."' WHERE id=$idetudiant";
  	    $reqMat = $con->query($MatUpdate); 
		$sqlUpdate="UPDATE preinscription SET is_inscrit=1 ,dateinscription = '$datejour'  WHERE idpreinscription=".$idpreinscription[$i]."";
  	    $req = $con->query($sqlUpdate); 
		generematricule($idetudiant,$con);
        }
else{
		 echo '<center><font size="+1" color="#00FFFF"> Impossible de Valider : Ce Matricule existe  !! </font></center><br />';
	}
	}else{echo '<center><font size="+1" color="#00FFFF">Impossible d\'enregistrer : Saisir le Matricule !! </font></center><br />';}
  }  
  	
}

?>

