<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/15/18
 * Time: 10:57 PM
 */

include 'entete.php';
require_once'../../models/autoload.php';
$etudaint = new EtudiantManager($db);
$dataetudiant=$etudaint->GetUniqueEtudiant($_GET['idetud']);
$idetudiant= $dataetudiant['id'];
$idclasse=$_GET['c'];
$reqinfosacad="select distinct preinscription.idetudiant,semestrelmd.idsemestrelmd, semestrelmd.libellesemestrelmd,annee_academique.nomAC,cursus.libellecursus,filiere.nomFil, specialite.nomSP,specialite.nomSP,classelmd.libelleclasselmd,specialite.id,annee_academique.id
from preinscription
  inner join specialite on specialite.id=preinscription.idspecialite
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
  inner join semestrelmd on semestrelmd.idsemestrelmd=classesemestrelmd.idsemestre
  inner join annee_academique on annee_academique.id=preinscription.idannee
  inner join filiere on filiere.id=specialite.id_filiere
  inner join cursus on cursus.idcursus=filiere.idcursus
where preinscription.idetudiant=$idetudiant and classelmd.idclasselmd=$idclasse order by preinscription.idpreinscription DESC limit 2";
//echo$reqinfosacad;
$repinfosacad=$db->query($reqinfosacad);
$infoacad=$repinfosacad->fetchAll();
print_r($dataetudiant);
enteteEtat($infoacad[0]['nomAC'],$infoacad[0]['nomFil'],$infoacad[0]['nomSP'],$infoacad[0]['libelleclasselmd'],'',$con);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SysIpes">
    <meta name="author" content="Divine Soft">
    <meta name="keywords" content="SysIpes">

    <!-- Title Page-->
    <title>Samson</title>
    <!-- assets/vendor CSS-->
    <link href="../../../assets/css/style.css" rel="stylesheet" media="all">
</head>
<body>
<style>
	.Style7 {
    font-size: 13px;
}
</style>
    <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" >
  <tr>
      </tr>
        <tr>
		<td colspan="2" id="" width="90%"><div class="Style7" align="center"><font size="6"><strong>CERTIFICAT DE SCOLARITE </strong></font></div></td>
		 </tr>
	  <tr>
		<td colspan="2" id="texttitreminst"><div class="Style7" align="center"><font size="5"><i>REGISTRATION CERTIFICATE </i></font></div></td>
	  </tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
		<td colspan="4"><div class="Style7" align="left"><strong>Je soussigné ,____________________________________________________</strong></div></td>
	</tr>
	<tr>
		<td colspan="4"><div class="Style7" align="left"><i>I, the undersigned,</i></div></td>
	</tr> 
	 <tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
		<td colspan="2"><div class="Style7" align="left"><strong>Le Président Directeur Général de <span id="texttitreminst">l'Institut Universitaire des Sciences et Techniques de Yaounde</span> , atteste que :</strong></div></td>
	</tr>
	<tr>
		<td colspan="4"><div class="Style7" align="left"><i>The President Director General of the University Institute of Sciences and Technology of Yaounde certifie that :</i></div></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
		<td colspan="4" id="texttitreminst"><div class="Style7" align="left"><strong>M./Mme/Mlle <?php echo $dataetudiant['nomEt']." ".$dataetudiant['prenomEt'];?></strong></div></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
      <td><div class="Style7" align="left"><strong>Date et lieu de Naissance : </strong><em><?php echo $dataetudiant['dateNaissEt']." à ".$dataetudiant['lieuNaissEt'];?></em></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
		<td colspan="2"><div class="Style7" align="left"><i>Date and place of birth:</i></div></td>
	</tr>  
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
      <td><div class="Style7" align="left"><strong>Est inscrit(e) dans mon établissement sous le matricule : </strong><em><?php echo $dataetudiant['matriculeEt'];?></em></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
		<td colspan="4"><div class="Style7" align="left"><i>Is registered under the registration number :</i></div></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
    <tr>
	  <td id="misenformentetesemestre"><div class="Style7" align="left"><strong>Année académique : </strong><em><?php echo $infoacad[0]['nomAC'];?></em></td>
    <td><div class="Style7" align="left"><strong>Classe LMD :  </strong><em><?php echo $infoacad[0]['libelleclasselmd'];?></em></td>
  </tr>
  <tr>
		<td id="misenformentetesemestre"><div class="Style7" align="left"><div class="Style7" align="left"><i>Academic year :</i></td>
		<td><div class="Style7" align="left"><i>Level :</i></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr> 
  <tr>
	  <td id="misenformentetesemestre"><div class="Style7" align="left"><strong>Cursus : </strong><em><?php echo $infoacad[0]['libellecursus'];?></em></td>
    <td><strong><div class="Style7" align="left">Filiere: </strong><em><?php echo $infoacad[0]['nomFil'];?></em></td>
  </tr>
  <tr>
		<td id="misenformentetesemestre"><div class="Style7" align="left"><i>Level degree :</i></td>
		<td><div class="Style7" align="left"><i>Domain:</i></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td id="misenformentetesemestre"><div class="Style7" align="left"><strong>Spécialité : </strong><em><?php echo $infoacad[0]['nomSP'];?></em></td>
    <td></td>
  </tr>
  <tr>
		<td id="misenformentetesemestre"><div class="Style7" align="left"><i>Learing option : </i></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>

    </table>
<br>
<br>
<table style="border-collapse: collapse" id="AutoNumber1" width="95%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" align="center">
  <tbody>
  <tr><?php
				 if(($dataetudiant['photoEt']=='')||($dataetudiant['photoEt']==null)||(empty($dataetudiant['photoEt'])==true)){
					?>
					<img class="img-rounded" src="../../../assets/img/etudiant/admin.png" height="75px">
				<?php
				}else{
					echo'<img class="img-rounded" src="../../../assets/img/etudiant/'.$dataetudiant['photoEt'].'" height="75px">';
				}
				?>
	 <td></td>
  </tr>

</tbody></table>
<table style="border-collapse: collapse" id="AutoNumber1" width="100%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0"  align="center">
  <tbody>
  <tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>		  
  <tr>
  <td width="50%">&nbsp;</td>
    <td width="50%"><font size="2"><strong>Fait à Yaoundé, le_____________________ </strong></font></td>
  </tr>
  <tr>
  <td width="50%">&nbsp;</td>
    <td><font size="2"><i>Done in Yaounde, on</i></font></td>
  </tr>
  <tr>
	  <td colspan="2"><br></td>
	</tr>
  <tr>

    <td width="70%">&nbsp;</td>
    <td><font size="2"><strong>Le Président Directeur Général</strong></font></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td><font size="2"><i>The President Director General </i></font></td>
  </tr>
  <tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr><tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr><tr>
	  <td colspan="2"><br></td>
	</tr><tr>
	  <td colspan="2"><br></td>
	</tr><tr>
	  <td colspan="2"><br></td>
	</tr>
</tbody></table></td>
 <hr>
 <center><p style="font-size: 14px;color: red;"><b>AUTORISATION N°18-10316/MINESUP/SG/DDES/SDA/OPC</b></p></center>
<center><p style="font-size: 13px;color: red;"><b>ARRETE DE CREATION N° 16-0838/MINESUP/SG/DDES/ESUP   ARRETE D'OUVERTURE N° 17/00015/MINESUP</b></p></center>
<center><p style="font-size: 12px"><b>Il est à noter que ce document ne garantit pas que l'étudiant(e) a suivi tous les cours du niveau concerne, encore moins validé les unités d'enseignement de ce niveau.</b></p></center>
<center><p style="font-size: 10.5px"><i>It should be noted that this document does not guarantee that the student has taken al the courses at the level concerned, or has validated the subjects of that level.</i></p></center>
</div>
</body>
</html>