<link href="../../../assets/css/style.css" rel="stylesheet" media="all"> 

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();


require_once'../../config.php';


$idannneeAcad=$_POST['anneeAcad'];
//$idfiliereAcad=$_POST['filiereAcad'];
//$specialite=$_POST['specialite'];
//$journersaisi=$_POST['journersaisi'];



$req="SELECT * FROM etudiant E INNER JOIN preinscription P ON P.idetudiant = E.id
INNER JOIN semestrelmd S ON  S.idsemestrelmd = P.idsemestre
INNER JOIN specialite SP ON SP.id = P.idspecialite
INNER JOIN specialiteclasselmd SPC ON SPC.idspecialite = SP.id
WHERE P.idannee = $idannneeAcad

AND is_inscrit =0 GROUP BY E.id
ORDER BY E.nomEt, E.prenomEt";
$rep=$con->query($req);
?>
<div class="card card-body">
     <h3><center><strong>Confirmation Inscription Etudiant</strong><br></h3>
	 
            <small></small></center>
</div>
<?php
$enli='<table id="tableauform">
<tr id="titrerubrique">
   <td>N&deg;</td>
    <td>Matricule</td>
    <td>Nom(s) & Prenom(s)</td>
    <td>Date et Lieu naissance</td>
        <td>Action</td>
       </tr>';
echo $enli;

$i=0;$listeetudiant="";
while($ligne=$rep->fetch()){
    $idetudiant=$ligne["idetudiant"];
    $listeetudiant.=$idetudiant;
    // echo $ligne[14];
    echo'<form method="POST" action="ValideInscriptionGlobal.php" target="new" name="form">
     <tr style="display:none"><td><input type="text" name="id'.$idetudiant.'"  value='.$ligne[0].'></td></tr>
	


           <tr class="row_'.$idetudiant.'" id="tr">
           <td id="tr" width="2%">'.($i+1).'</td>
		   <td id="tr" width="20%">'.$ligne['matriculeEt'].'</td>
           <td id="tr" width="25%">'.$ligne['nomEt'].' '.$ligne['prenomEt'].'</td>
           <td id="tr" width="25%">'.str_replace('/','-',$ligne['dateNaissEt']).' à '.$ligne['lieuNaissEt'].'</td> 
          <td><input type="button" value="Valider Inscription"  name="saveData_'.$idetudiant.'" class="save saveData_'.$idetudiant.'"></td>

</tr>
    ';
    $i++;$listeetudiant.=";";
    
}
echo'    <tr>
        <input type="hidden" name="listeetudiant" value="'.$listeetudiant.'">
            <td></td><td><button type="submit" name="enregistrer" class="btn" id="effet2">Enregistrer</button>
        </tr></form></table>';
?>
<script src="../../../assets/js/jquery.js"></script>
<script>
      $(".save").on('click',function(){
            var parentClass = $(this).attr('class');
            var IdEtudiant = parentClass.split(' ')[1].split('_')[1];
           // alert(IdEtudiant);
            $.post(
                "ValideInscriptionIndividuel.php",
                {
                    IdEtudiant : ""+IdEtudiant+""
                },

                function(data){
                    if(data === 'OK'){
                        $('.row_'+IdEtudiant).fadeOut(1000);
                    }else{if(data === 'ERROR'){

                        alert("Impossible d'Enregistrer");
                    }else{

                        alert("Validadion Effectue avec success!!!!");
						$('.row_'+IdEtudiant).fadeOut(1000);
                    }}
                }
            );
        });

</script><?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 23/08/16
 * Time: 21:51
 */ 