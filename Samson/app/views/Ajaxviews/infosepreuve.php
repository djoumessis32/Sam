<?php
/**
 * Created by PhpStorm.
 * User: Erick Leroy
 * Date: 07/04/2016
 * Time: 23:54
 */

require_once "../../config.php";
require_once "../../models/autoload.php";
$t= new Functions($db);
$idSemestre = $_GET['id'];
$idSpecialite = $_GET['ids'];
$idSession = $_GET['idss'];
$idAnnee = $_GET['ida'];
$req_listepreuve="SELECT DISTINCT uvmatiere.iduvmatiere,uvmatiere.libelle_fr_uvmatiere FROM uvmatiere
INNER JOIN ue_uv ON ue_uv.iduv=uvmatiere.iduvmatiere
INNER JOIN uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
INNER JOIN programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
INNER JOIN programmeannuel ON programmeannuel.idprogrammeannuel=programmeue.idprogramme
INNER JOIN programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
INNER JOIN specialiteclasselmd ON specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
WHERE programmadopte.idsemestre=$idSemestre
and specialiteclasselmd.idspecialite=$idSpecialite
and programmadopte.idanneeacademique=$idAnnee;
";
$rep=$db->query($req_listepreuve);
$epreuv=array();
$o=0;
echo $t->setTitleForm2("Veillez cocher l'epreuve pour effectuer une reconduction d'anonymats ");
?>

<fieldset>
        <table class="" width="95%" border="1">
            <thead class="titreform">
                <tr style="background-color: lightblue;">
                    <td colspan="5">
                        <center>Informations sur les épreuves</center>
                    </td>
                </tr>
                <tr>
                    <td class="" width="4%"><span class=""></span>N°</td>
                    <td class="" width="20%"><span class=""></span>Code Matiere</td>
                    <td class=""><span class=""></span>Libelle Matiere</td>
                    <td class=""><span class=""></span>Nombre Anonymat</td>
                    <td class=""><span class=""></span>Action</td>
                </tr>
            </thead>
            <tbody class="bodyt2">
            <?php
            $i=1;
$r=0;
            while($e=$rep->fetch()){
                $req_count="SELECT count(DISTINCT idetudiant) FROM evaluernoteetudiant
WHERE evaluernoteetudiant.anonymat<>'@'
WHERE evaluernoteetudiant.idsemestre=$idSemestre
and evaluernoteetudiant.idspecialite=$idSpecialite;
";
                $rep_count=$db->query($req_count);
                while($u=$rep_count->fetch()){
                    $epreuv[$o]=$u[0];
            }
                echo"<tr>
                        <td>".$i."</td>
                        <td>".$e[1]."</td>
                        <td>".$e[2]."</td>
                        <td>".$epreuv[0]."</td>";
                if($epreuv[0]>0){
                    echo"<td><input type='checkbox' name='action_".$e[0]."' checked></td>";

                }else{

                    echo"<td><input type='checkbox' name='action_".$e[0]."'></td>";
                }
                echo"</tr>";
                $i++;
            }

            ?>
            </tbody>

        </table>
    </fieldset>