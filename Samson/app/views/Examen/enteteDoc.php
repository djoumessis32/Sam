<?php
require_once'../../config.php';
//------fin fontion entete enteteEtat------------
function getLibelle($table,$champId,$champLib,$valId,PDO $con) {
  	//Cette fonction permet de retrouver le libelle d'un element connaissantr son code
 	$req = "SELECT " . $champLib . " FROM " . $table . " WHERE " . $champId ."='" . $valId. "' LIMIT 1";
 	$res =$con->query($req);
    while($data = $res->fetch(PDO::FETCH_NUM))
	return $data[0];
 }



function enteteEtatDoc(PDO $con) {
		
$req="SELECT * FROM etablissement WHERE etabproprietaire=1";
$rep=$con->query($req);

while($etab=$rep->fetch()){
    $school=$etab;
}

	
		?>	
<table align="center" class="tableEnteteLogo" border=0 cellspacing=0 cellpadding=0 width='95%' >
    <tr>
        <td>
            <p class="paysfinal">République du Cameroun</p>
            <p></p>
            <p class="devisefinal">Paix-Travail-Patrie</p>
            <p></p>
            <p class="univfinal">Ministère de l' Ensègnement Supérieur</p>
            <p class="adressefinal">BP 1500, Yaoundé-Tel/Fax:(+237)222 22 13 70</p>
        </td>
        <td></td>
        <td>
            <p class="paysfinal">Republic of Cameroon</p>
            <p></p>
            <p class="devisefinal">Peace-Work-Fatherland</p>
            <p></p>
            <p class="univfinal">Ministry of higher education</p>
            <p class="adressefinal">Website: <u>www.minesup.gov.cm</u></u></p>
        </td>
    </tr>
 <tr>
     <td align="center" style="float: right;margin-top: 1%;">
    <img  style="border-radius:5px" src="../../../assets/img/<?php echo  $school[15]?>" align="center" height="120" width="170">
   </td>
     <td width="40%">
         <p class="facfinal"><?php echo  $school[4]?></p>
         <p class="facfinal2"><?php echo $school[3]?></p>
         <p class="fac">La Direction</p>
         <p class="devise">The Direction</p>
         <p class="adressefinal"> BP : <?php echo  $school[6].""; ?></p>
         <p class="adressefinal">T&eacute;l  : <?php echo  $school[7] ?></p>
         <p class="adressefinal">Website : <u> <?php echo  $school[10] ?> </u></p>


     </td>
     <td align="center" style="float: left;margin-top: 1%;">
         <img  style="border-radius:5px" src="../../../assets/img/<?php echo  $school[15]?>" align="center" height="120" width="170">
     </td>
  </tr>
    
</table>
  <hr width="100%"> </hr>

    <?php
}
?>