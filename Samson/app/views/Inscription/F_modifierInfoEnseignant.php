/**
<?php
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
 if(isset($_POST['nomEns'])&& isset($_POST['prenomEns'])){
    $data = array(
        'id'=>$_POST['id'],
        'matriculeEns'=>$_POST['matriculeEns'],
        'nomEns'=>$_POST['nomEns'],
        'prenomEns'=>$_POST['prenomEns'],
        'sexeEns'=>$_POST['sexeEns'],
        'domaineEns'=>$_POST['domaineEns'],
        'nationaliteEns'=>$_POST['nationaliteEns'],
        'dateNaissEns'=>$_POST['dateNaissEns'],
        'lieuNaissEns'=>$_POST['lieuNaissEns'],
        'adresseEns'=>$_POST['adresseEns'],
        'telephoneEns'=>$_POST['telephoneEns'],
        'etat'=>$_POST['etat']
    );
 $Objet = new Enseignant($data);
 $ObjetManager=new EnseignantManager($bdd);
 $statut =$ObjetManager->Update($Objet);
   if($statut==1){
       echo"<script> alert('Modification effectuee avec succes!')</script>";
   }else{
       echo"<script> alert('Echec Ajout !')</script>";
   }
  
 }
?>
    <center>

        <table style="width: 55%">
            <tr>
                <td><b>Matricule / Nom(s) / Prenom(s)</b></td>
                <td >
                    <input type="text" name="enseignant" id="enseignant"  value="" class="" onkeydown="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeenseignantformupdate">

        </div>

    </center>

