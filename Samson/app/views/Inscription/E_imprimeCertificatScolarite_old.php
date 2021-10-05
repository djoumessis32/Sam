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
//print_r($infoacad);
enteteEtat($infoacad[0]['nomAC'],$infoacad[0]['nomFil'],$infoacad[0]['nomSP'],$infoacad[0]['libelleclasselmd'],'',$con);
?>

  
    <table width="95%" cellspacing="0" cellpadding="0" align="center" >
  <tr>
      </tr><tr>
		<td colspan="2" id="" width="90%"><div class="Style7" align="center"><font size="4"><strong>CERTIFICAT DE SCOLARITE </strong></font></div></td>
		 <td rowspan="4" id="" width="90%"><div class="Style7" align="left"><img src="../../../assets/img/etudiant/admin.jpg" class="Style1" width="100" height="100" align="middle"></div></td>
	  </tr>
	  <tr>
		<td colspan="2" id="texttitreminst"><div class="Style7" align="center"><i>REGISTRATION CERTIFICATE </i></div></td>
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
		<td colspan="2"><div class="Style7" align="left"><strong>Le President Directeur General de <span id="texttitreminst">Institut Universitaire des Science et Technologie de Yaounde</span> , atteste que :</strong></div></td>
	</tr>
	<tr>
		<td colspan="4"><div class="Style7" align="left"><i>The General President Director of the University Institute of Sciences and Technology of Yaounde certifie that :</i></div></td>
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
      <td><strong>Date et lieu de Naissance : </strong><em><?php echo $dataetudiant['dateNaissEt']." à ".$dataetudiant['lieuNaissEt'];?></em></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
		<td colspan="4"><div class="Style7" align="left"><i>Date and place of birth:</i></div></td>
	</tr>  
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
      <td><strong>Est inscrit(e) dans mon établissement sous le matricule : </strong><em><?php echo $dataetudiant['matriculeEt'];?></em></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
		<td colspan="4"><div class="Style7" align="left"><i>Is registered under the registration number :</i></div></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
    <tr>
	  <td id="misenformentetesemestre"><strong>Année académique : </strong><em><?php echo $infoacad[0]['nomAC'];?></em></td>
    <td><strong>Classe LMD :  </strong><em><?php echo $infoacad[0]['libelleclasselmd'];?></em></td>
  </tr>
  <tr>
		<td id="misenformentetesemestre"><i>Academic year :</i></td>
		<td><i>Level :</i></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr> 
  <tr>
	  <td id="misenformentetesemestre"><strong>Cursus : </strong><em><?php echo $infoacad[0]['libellecursus'];?></em></td>
    <td><strong>Filiere:</strong><em><?php echo $infoacad[0]['nomFil'];?></em></td>
  </tr>
  <tr>
		<td id="misenformentetesemestre"><i>Level degree :</i></td>
		<td><i>Filiere:</i></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td id="misenformentetesemestre"><strong>Spécialité : </strong><em><?php echo $infoacad[0]['nomSP'];?></em></td>
    <td></td>
  </tr>
  <tr>
		<td id="misenformentetesemestre"><i>Learing option : </i></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>
</tbody></table><table style="border-collapse: collapse" id="AutoNumber1" width="95%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" background="CERTIFICATS%20DE%20SCOLARITE_fichiers/BANRFASA2.jpg" align="center">
  <tbody><tr>
	  <td><strong>En foi de quoi le présent certificat de scolarité lui est délivré pour servir et valoir ce que de droit ./.
</strong></td>
  </tr>
  <tr>
	  <td><i>In testimony where of this attestation has been issued to serve wherever applicable.
</i></td>
  </tr>
  <tr>
	  <td colspan="2"><br></td>
	</tr>
	<tr>
	  <td colspan="2"><br></td>
	</tr>   
</tbody></table><table style="border-collapse: collapse" id="AutoNumber1" width="95%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" background="CERTIFICATS%20DE%20SCOLARITE_fichiers/BANRFASA2.jpg" align="center">
  <tbody><tr>
  <td width="50%">&nbsp;</td>
    <td><font size="2"><strong>Fait à Yaounde, le_____________________ </strong></font></td>
  </tr>
  <tr>
  <td width="50%">&nbsp;</td>
    <td><font size="2"><i>Done in Yaounde, on</i></font></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td><font size="2"><strong>Le President Directeur General</strong></font></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td><font size="2"><i>The General President Director </i></font></td>
  </tr>
  <tr>
	  <td colspan="2"><br></td>
	</tr>
</tbody></table></td>
 
</div>
</body>
</html>