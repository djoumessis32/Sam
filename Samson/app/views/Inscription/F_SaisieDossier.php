<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */
$l=1;
$chaine="";

if(isset($_POST['anneeAcad'])){
  $anneeAcad = $_POST['anneeAcad'];
  //$photoEt=$function->SaveFile('assets/img/etudiant/','photoEt');
  $specialite = $_POST['specialite'];
  $semestreAcad = $_POST['semestreAcad'];
 // $matriculetud = $_POST['matriculetud'];
  $nometud = $_POST['nometud'];
  $prenometud = $_POST['prenometud'];
  $joursaisi = $_POST['journersaisi'];
  $lieunais = $_POST['lieunais'];
  $nationaliteetud = $_POST['nationaliteetud'];
  $region = $_POST['region'];
  $sexe = $_POST['sexe'];
  $numcni = $_POST['numcni'];
  $handicape = $_POST['handicape'];
  $telephone = $_POST['telephone'];
  $adresse = $_POST['adresse'];
  //print_r($_POST);
  
   function generenumdoc($idetudiant,$con)
   {
	   $numdoc = null;
	@$R_selectcodeannee="SELECT a.codeannee,a.id
	FROM annee_academique a
	WHERE a.statut=1";
	$rep=$con->query($R_selectcodeannee);
	while($resultat=$rep->fetch()){
		$idannee=$resultat['id']; 
		$code=$resultat['codeannee']; 
		}
		
	@$R_verifienumserie="SELECT g.numserie
	FROM generedoc g, annee_academique a
	WHERE g.idanneeacademique='$idannee' 
	AND g.idanneeacademique=a.id";
	//echo $R_verifienumserie;
	$nbr = null;
	$repverif=$con->query($R_verifienumserie);
	while($resultat=$repverif->fetch()){$nbr=$resultat['numserie']; }
	$NumSerie = (int) $nbr + 1;
	
	$updategenere=$con->exec("UPDATE generedoc SET numserie = numserie + 1 WHERE idanneeacademique='$idannee'");
	
	if($NumSerie < 10)  $NumSerie = '000'.$NumSerie;
	elseif($NumSerie < 100)  $NumSerie = '00'.$NumSerie;
	elseif($NumSerie < 1000)  $NumSerie = '0'.$NumSerie;	
	else $NumSerie = $NumSerie;
	
	$numdoc .=  strtoupper($code.$NumSerie);
	$updateetudiant=$con->exec("UPDATE etudiant SET numdossier = '$numdoc' WHERE id='$idetudiant'");
	if($updateetudiant==true){
             echo '<script language="javascript">alert("Dossier Enregistrer Avec Success, Numéro Dossier :  '.$numdoc.' "); </script>';
				}else {
        echo '<script language="javascript">alert("Dossier non Enregistrer !!"); </script>';
   }
   }
   // Récupération de id de la région;
  $reqregion="select idregion from region where libelleregion ='$region'";
  $valider=$con->query($reqregion);  
  while($resultat=$valider->fetch()){$idregion=$resultat['idregion']; }
  
	   $tes=$con->exec("INSERT INTO etudiant(nomEt,prenomEt,nationaliteEt,sexeEt,dateNaissEt,lieuNaissEt,
	   adresseEt,telephoneEt,handicape,numcni,idregion)VALUES ('$nometud','$prenometud','$nationaliteetud','$sexe','$joursaisi','$lieunais',
	   '$adresse','$telephone','$handicape','$numcni',$idregion);");
	   
//Sélection du dernier élément enregistré
	   $req2="select id from etudiant where id = (select max(id) from etudiant)";
	   $valider=$con->query($req2);  
       while($resultat=$valider->fetch()){$idetudiant=$resultat['id']; }
	   $tes2=$con->exec("INSERT INTO preinscription(idetudiant,idsemestre,idspecialite,pass,idannee)VALUES($idetudiant,$semestreAcad,$specialite,1,$anneeAcad);");
	   if($tes==true and $tes2==true ){
		   generenumdoc($idetudiant,$con);
    }
  	
}
 
?>



<form target="" method="post"  class="form-horizontal" action=""  name="saisiedoc" id="saisiedoc" enctype="multipart/form-data">
    <center>

        <table style="width: 60%">
            <tr>
                <td >Annee Academique<font color="#FF0000">*</font></td>
                <td >
                    <?php
                    echo $function->GetListeAnneeAcad();
                    ?>
                </td>
				<td width="200"></td>
                <td>Filiere<font color="#FF0000">*</font></td>
                <td id="filiere">
                    <?php
                    echo $function->GetListeFiliere();
                    ?>
                </td>

               
            </tr>
            <tr>
                <td>Specialite<font color="#FF0000">*</font></td>
                <td id="specialit">
                    <label for="specialite"></label><select class="" name="specialite" id="specialite">
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
                <td width="200"></td>
                <td>Semestre<font color="#FF0000">*</font></td>
                <td id="semestes">
                    <?php
                    echo $function->GetSemestre();
                    ?>
                </td>
            </tr>
			 <tr>
                <td><span>Nom(s)<font color="red">*</font></span></td>
                <td><input type="text" class="form-control" id="nometud" name="nometud" autofocus required="required"></td>
                <td width="200"></td>
                <td>Prénom(s)<span><font color="red">*</font></span></td>
                <td><input type="text" id="prenometud" class="form-control" name="prenometud" required="required"></td>
                </tr>
				 <tr>
                <td><span>Date de naissance<font color="red">*</font></span></td>
                <td><input type="date" name="journersaisi" style="height: 30px;" id="joursais" autofocus required="required"></td>
                <td width="200"></td>
				<td><span>Lieu de naissance<font color="red">*</font></span></td>
                <td><input type="text" class="form-control" id="lieunais" name="lieunais" autofocus required="required"></td>
                </tr>
				<tr>
                <td><span>Numéro CNI</span></td>
                 <td><input type="text" class="form-control" id="numcni" name="numcni" ></td>
                <td width="200"></td>
                <td>Nationalité<span><font color="red">*</font></span></td>
              <td ><select name="nationaliteetud" size="1" id="nationaliteetud" autofocus required="required">
              <option value="" selected="selected">--Choisir une nationalité--</option>
			  <?php
          @$R_selectsectionetab="select libelle_fr from nationalite";
          $resultat=$con->query($R_selectsectionetab);
		  while($res=$resultat->fetch())
				{
				
				 echo "<option value='$res[0]'> $res[0] </option>";
				 
				}    
		?>
                </select>
                </td>
                </tr>
				<tr>
				<td>Région<font color="red">*</font><span></span></td>
              <td ><select name="region" size="1" id="region" autofocus required="required">
              <option value="" selected="selected">--Choisir une région--</option>
			  <?php
          @$R_selectsectionetab="select libelleregion from region";
          $resultat=$con->query($R_selectsectionetab);
		  while($res=$resultat->fetch())
				{
				
				 echo "<option value='$res[0]'> $res[0] </option>";
				 
				}    
		?>
                </select>
                </td>
				 <td width="200"></td>
				<td>Sexe<font color="red">*</font><span></span></td>
              <td ><select name="sexe" size="1" id="sexe" autofocus required="required">
              <option value="" selected="selected">--Choisir une sexe--</option>
			  <?php
          @$R_selectsectionetab="select libellesexelngune from liste_sexe";
          $resultat=$con->query($R_selectsectionetab);
		  while($res=$resultat->fetch())
				{
				
				 echo "<option value='$res[0]'> $res[0] </option>";
				 
				}    
		?>
                </select>
                </td>
				</tr>
				<tr>
				<td><span>Adresse</span></td>
                <td><input type="text" class="form-control" id="adresse" name="adresse" ></td>
                <td width="200"></td>
				<td id="t3">Handicapé<span class="Style2"><font color="red">*</font></span></td>
                                <td >
                            <select name="handicape" id="handicape" class="requis">

                                <option value="" selected="selected">Choisir</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>

                            </select>
                            </td>
				</tr>
				<tr>
                <td>Telephone<span></span></td>
                <td><input type="text" id="telephone" class="form-control" name="telephone" ></td>
                
                </tr>
				 <tr>
        </table>
        <hr>
       
        <table style="width: 55%">
        <tr>
                <td>
                    <button class="btn btn-success" type="submit" id="send">
                        Enregistrer <span class=' icon-arrow-right'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
         </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
        </table>
    </center>
</form>
				
<script type="text/javascript">

$("#send").click(function(){
        var fichier=$("#uploadsql").val();
        //   alert(fichier);
        var tabextension=fichier.split('.');
        var extension=tabextension[1];
           // alert(extension);
        $("#idextension").val(extension);
    });
</script>
</body>