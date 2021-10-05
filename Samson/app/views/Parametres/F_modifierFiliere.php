<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
 if(isset($_POST['codeFil'])&& isset($_POST['nomFil'])){
    $data = array(
        'id'=>$_POST['id'],
        'codeFil'=>$_POST['codeFil'],
        'nomFil'=>$_POST['nomFil'],
        'cycle'=>$_POST['cycle'],
        'etat'=>$_POST['etat'],
        'cursus'=>$_POST['cursus']
    );
 $Objet = new Filiere($data);
 $ObjetManager=new FiliereManager($bdd);
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
                <td><b>Code / Libelle </b></td>
                <td >
                    <input type="text" name="filiere" id="filiere"  value="" class="" onkeydown="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listefiliereupdate">

        </div>

    </center>

