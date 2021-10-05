<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
 if(isset($_POST['nomEt'])&& isset($_POST['prenomEt'])){
 $data = array(
   "id"=>$_POST['id'],
   "matriculeEt"=>$_POST['matriculeEt'],
   "nomEt"=>$_POST['nomEt'],
   "prenomEt"=>$_POST['prenomEt'],
   'sexeEt'=>$_POST['sexeEt'],
    'nationaliteEt'=>$_POST['nationaliteEt'],
    'dateNaissEt'=>$_POST['dateNaissEt'],
    'lieuNaissEt'=>$_POST['lieuNaissEt'],
    'adresseEt'=>$_POST['adresseEt'],
    'telephoneEt'=>$_POST['telephoneEt']
 );
 $Objet = new Etudiant($data);
 $ObjetManager=new EtudiantManager($bdd);
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
                    <input type="text" name="etudiant" id="etudiant"  value="" class="" onkeydown="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeetudiantformupdate">

        </div>

    </center>

