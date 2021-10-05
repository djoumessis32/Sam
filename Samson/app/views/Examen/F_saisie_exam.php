<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/26/18
 * Time: 8:00 PM
 */
session_start();
?>

<link href="../../../assets/css/style_New1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function getXhr()
    {
        var xhr = null;
        if(window.XMLHttpRequest) // Firefox et autres
            xhr = new XMLHttpRequest();
        else if(window.ActiveXObject){ // Internet Explorer
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e)
            {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        else { // XMLHttpRequest non support� par le navigateur
            alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
            xhr = false;
        }
        return xhr
    }


    function EnregistrementCC(cc,idetudiant,iduvmatiere)
    {

        var xhr;

        xhr = getXhr();
        // On d�fini ce qu'on va faire quand on aura la r�ponse
        xhr.onreadystatechange = function(){
            // On ne fait quelque chose que si on a tout re�u et que le serveur est ok
            if(xhr.readyState == 4 && xhr.status == 200){
                texte = xhr.responseText;//alert(texte);
                // On se sert de innerHTML pour rajouter les options a la liste
                //document.getElementById('contentForm2').innerHTML = texte;

                if(texte==1)
                {
                    $('.row_'+idetudiant).fadeOut(1000);
                }else{

                    alert("Note invalide!!");
                }
            }

        }
        xhr.open("GET","../Ajaxviews/SasieExamen_etudiant.php?cc_etudiant="+cc+"&idmatiere="+iduvmatiere+"&idetudiant="+idetudiant, true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send(null);

    }
    function InsertAn(evt,idetudiant,idepreuev) {
        //var parentClass = $(this).attr('class');
        //var ide= idetudiant;
        //var cc_etudiant = $(".ccetudiant1_" + idetud).val();
        //var idmat= idepreuev;
        var idmat;
        var cc_etudiant;
        var ide;
        var parentClass;
        var keyCode = evt.which ? evt.which : evt.keyCode;

        if(evt.keyCode == 13 || evt.keyCode== 09) {
            cc_etudiant=$(".ccetudiant1_"+idetudiant).val();
            //   alert(idetudiant + " -> " + idepreuev+" -> "+cc_etudiant);
            EnregistrementCC(cc_etudiant,idetudiant,idepreuev);
            //   alert("Entrer valide!");

        }

    }

</script>
<?php
//print_r($_SESSION);
//print_r($_POST);
require_once'../../models/autoload.php';
require_once'../../config.php';
$idgroup=$_SESSION['idgroupeutilisateur'];
$iduser=$_SESSION['idutilisateur'];

$idannneeAcad=$_POST['anneeAcad'];
$idsessionAcad=$_POST['sessioncad'];
$idfiliereAcad=$_POST['filiereAcad'];
$idspecaliteAcad=$_POST['specialite'];
$idsemestreAcad=$_POST['semestreAcad'];
$idmatiere=$_POST['matiereAcad'];

$manager = new UvmatiereManager($db);
$epreuv = $manager->GetUniqueUvmatiere($idmatiere);

//print_r($epreuv);


$reqGroupe1="select * from utilisateur WHERE idutilisateur=".$iduser."";
$repUser=$db->query($reqGroupe1);
while($InfoUser=$repUser->fetch()){
    $ideuser=$InfoUser[0];
    $codeuser=$InfoUser[1];
    $nomuser=$InfoUser[6];
    $prenomuser=$InfoUser[7];
}

echo"<center style='margin-top: 2%'>
    <table border='1'id='tableauform12' style='height: 10%;'>
    <caption id='titrerubrique' style='height: 15px;' >Information sur l'épreuve</caption>
    <tr class='titrerubrique'>
    <td>Utilisateur</td>
    <td>Epreuve</td>
    <td>Nb Credit</td>
</tr>
<tr class='trcouleur1'>
<td>".$prenomuser." ".$nomuser."</td>
<td>".$epreuv['libelle_fr_uvmatiere']." / ".$epreuv['libelle_en_uvmatiere']."</td>
<td>".$epreuv['ncredis']."</td>
</tr>
</table>
</center>";

$requete2 = ("");

$result = $db->query($requete2);

echo '<div id="">
<table  border="1" id="tableauform12" width="75%" align="center">
<caption><h2 style="text-align-last:center;color:red; "><strong>Grille de Saisie des notes d\'examen</strong></h2></caption>
<tr id="titrerubrique">
     <td Height="" width="5%">#</td>
     <td>Anonymat</td>
    <td>Note/20</td>
       </tr>';
$i = 0;
$listeetudiant = "select * from etudiant
  inner join evaluernoteetudiant on evaluernoteetudiant.idetudiant=etudiant.id
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  inner join session on session.idsession=evaluernoteetudiant.idsession
  inner join specialite on specialite.id=evaluernoteetudiant.idspecialite
  inner join semestrelmd on semestrelmd.idsemestrelmd=evaluernoteetudiant.idsemestre
  inner join annee_academique on annee_academique.id=session.idanneeacademique

  where annee_academique.id=".$idannneeAcad."
  and   session.idsession=".$idsessionAcad."
  and   semestrelmd.idsemestrelmd=".$idsemestreAcad."
  and   specialite.id=".$idspecaliteAcad."
  and   uvmatiere.iduvmatiere=".$idmatiere."
  and evaluernoteetudiant.examen=-1
  and evaluernoteetudiant.anonymat<>'@'
  order by anonymat ASC";
$result=$db->query($listeetudiant);
while ($ligne = $result->fetch()) {
    $idetudiant = $ligne[0];
    $listeetudiant .= $idetudiant;
    echo '<div> <form method="POST" border="" action="#" target="" onsubmit="">

       <tr style="display:none"><td><input type="text" class="ccetudiant_' . $idetudiant . '" name="ccetudiant_' . $idetudiant . '"  value=' . $ligne[1] . '></td></tr>
        <tr style="display:none"><td><input type="text" class="iduvmatiere_' . $idetudiant . '" name="iduvmatiere_' . $idetudiant . '"  value=' . $ligne[3] . '></td></tr>

        <script>

        </script>
                  <tr class="row_' . $idetudiant . '">
                                   <td id="tr2" width="1%">' . ($i + 1) . '</td>
                                   <td id="tr2" width="25%"><b>' . $ligne['anonymat'] . '</b></td>
                                   ';?>
    <td id="tr" width="25%"><input type="text" class="<?php echo'ccetudiant1_' . $idetudiant . '';?>"  name="<?php echo'ccetudiant1_' . $idetudiant . '';?>" size="20" onkeypress="InsertAn(event,<?php echo $idetudiant; ?>,<?php echo $idmatiere; ?>)"></td>

    <?php echo'
</tr>

</div>
    ';
    $i++;
    $listeetudiant .= ";";


}
echo '     <tr>
        <input type="hidden" name="listecandidat" value="' . $listeetudiant . '">
            <td></td><td><input type="button" name="enregistrer" class="btn"  id="effet2" value="Enregistrer" />
        </tr>
        </form>
        </table>';

?>

<script src="../../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $(".save").on('click',function(){
            var parentClass = $(this).attr('class');
            var idetudiant = parentClass.split(' ')[1].split('_')[1];
            //  var idevaluernotecandidat = parentClass.split(' ')[1].split('_')[1];

            //alert(idetudiant);
            var cc_etudiant = $(".ccetudiant1_"+idetudiant).val();
            var idccetudiant = $(".idccetudiant_"+idetudiant).val();
            var idmatiere = $(".iduvmatiere_"+idetudiant).val();

            $.post(
                "../Etats/viewsEtats/ModelAnonymeEpreuve2.php",
                {
                    cc_etudiant : ""+cc_etudiant+"",
                    idmatiere : ""+idmatiere+"",
                    ccetudiant : ""+idccetudiant+"",
                    idetudiant : ""+idetudiant+""
                },
                function(data){

                    if(data === "on"){
                        $('.row_'+idetudiant).fadeOut(1000);
                    }else{
                        alert("Mauvaise note saisie!");
                        $(".ccetudiant1_"+idetudiant).focus();

                    }
                }
            );
        });



    });

</script>
<script>
    $(document).ready(function(){
        $(".save").on('click',function(){
            var parentClass = $(this).attr('class');
            var idetudiant1 = parentClass.split(' ')[1].split('_')[1];
            //salert(idetudiant);
            var note1 = $(".note1specialitecandidat_"+idetudiant1).val();
            var idpreuve = $(".iduvmatiere").val();
            var noteSpecial = $(".idevaluernotecandidat_"+idetudiant1).val();
            //    alert(note1);
            $.post(
                "../Etats/viewsEtats/ModeltraitementNoteClair.php",
                {
                    iduvmatiere : ""+idpreuve+"",
                    note1 : ""+note1+"",
                    noteSpecial : ""+noteSpecial+"",
                    idetudiant1 : ""+idetudiant1+""
                },
                function(data){
                    //      alert(data);
                    if(data ==1){
                        $('.row_'+idetudiant1).fadeOut(1000);
                    }else{
                        alert(data);
                        // $(".note1specialitecandidat_"+idetudiant1).val('');
                        $(".note1specialitecandidat_"+idetudiant1).focus();
                    }
                }
            );
        });
    });
</script>