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



function enteteEtat($an=0,$filiere=0,$specialite=0,$classelmd=0,$classe=0,PDO $con) {
		
$req="SELECT * FROM etablissement WHERE etabproprietaire=1";
$rep=$con->query($req);

while($etab=$rep->fetch()){
    $school=$etab;
}

       $sqlannee=("SELECT nomAC FROM annee_academique WHERE encours=1");
$annee = null;
        $val=$con->query($sqlannee);

      while($result=$val->fetch()){  $annee=$result["nomAC"]; }
	
	$lib_an = ($an != 0) ? getLibelle('annee_academique','id','nomAC',$an,$con) : '';
	$lib_filiere = ($filiere != 0) ? getLibelle('filiere','id','nomFil',$filiere,$con) : '';
	$lib_specialite = ($specialite != 0) ? getLibelle('specialite','id','nomSP',$specialite,$con) : '';
	$lib_classelmd = ($classelmd != 0) ? getLibelle('classelmd','idclasselmd','libelleclasselmd',$classelmd,$con) : '';
	
	
		?>	
<table align="center" class="tableEnteteLogo" border=0 cellspacing=0 cellpadding=0 width='95%' > 
 <tr>
   <td width="40%"> 
   <p class="paysfinal">République du Cameroun</p>
   <p class="paysfinal2">Republic of Cameroon</p>
   <p class="devisefinal">Peace-Work-Fatherland</p>
   <p class="univfinal">Ministère de l' Ensègnement Supérieur</p>
   <p class="univfinal2">Ministry of higher education</p>
   <p></p>
   <p class="adressefinal">BP 1500, Yaoundé-Tel/Fax:(+237)222 22 13 70</p>
   <p class="adressefinal">Website: <u>www.minesup.gov.cm</u></u></p>
   <p></p> 
   </td>
   <td align="center">
       <img  style="border-radius:5px" src="../../../assets/img/<?php echo  $school[15]?>" align="center" height="120" width="170">
   </td>
   <td  width="40%">
       <p class="facfinal"><?php echo  $school[4]?></p>
       <p class="facfinal2"><?php echo $school[3]?></p>
       <p class="fac">La Direction</p>
       <p class="devise">The Direction</p>
       <p></p>
       <p class="adressefinal"> BP : <?php echo  $school[6].""; ?></p>
       <p class="adressefinal">T&eacute;l  : <?php echo  $school[7] ?></p>
       <p class="adressefinal">Website : <u> <?php echo  $school[10] ?> </u></p>
   
   </td>
 </tr>
    
</table>
  <hr width="95%"> </hr>
 
<table align="center" class="tableEnteteLogo" border=0 cellspacing=0 cellpadding=0 width='95%' > 
 <tr><td colspan="3">
 <br  />
 <table class="tableEnteteLogo" width="100%">
     <tr>
        <td class="leftEntete" width="50%">
         <?php 
          if($lib_an!=''){echo'<p class="simple"><span class="cle">Ann&eacute;e &nbsp;Acad&eacute;mique : </span><span class="valeur">'.$lib_an .'</span></p>';}
          if($lib_filiere!=''){echo'<p class="simple"><span class="cle">Filière : </span><span class="valeur">'.ucfirst($lib_filiere).'</span></p>';}
          //$lib_semestreLMD
       echo' </td>';
        echo'<td width="33%" align="left">';
		  echo'<p></p>';
		  if($lib_specialite!=''){echo'<p class="simple"><span class="cle">Sp&eacute;cialit&eacute : </span><span class="valeur">'.$lib_specialite.'</span></p>';}
		  if($lib_classelmd!=''){echo'<p class="simple"><span class="cle">Semestre LMD : </span><span class="valeur"> '.$lib_classelmd.'</span></p>';}
          
           ?>           
        </td>
     </tr>
     <tr>

     </tr>
   </table>
 
      </td>
     </tr>
   </table>
   
     
    <?php
	// echo ' <div style="margin-right:10px; float:right">Print on/<i>Imprime le</i> '. date("d-m-Y") . '<br></div>';
}//------fin fontion entete enteteStat NEW------------
?>