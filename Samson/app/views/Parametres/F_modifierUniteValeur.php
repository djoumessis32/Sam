<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
 if(isset($_POST['codeuvmatiere'])&& isset($_POST['libelle_fr_uvmatiere'])){
    $data = array(
        'iduvmatiere'=>$_POST['iduvmatiere'],
        'codeuvmatiere'=>$_POST['codeuvmatiere'],
        'libelle_fr_uvmatiere'=>$_POST['libelle_fr_uvmatiere'],
        'ncredis'=>$_POST['ncredis'],
        'notevaliduvmatiere'=>$_POST['notevaliduvmatiere'],
        'noteelimuvmatiere'=>$_POST['noteelimuvmatiere'],
        'vlmhoraire'=>$_POST['vlmhoraire']
    );
 $Objet = new Uvmatiere($data);
 $ObjetManager=new UvmatiereManager($bdd);
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
                    <input type="text" name="uv" id="uv"  value="" class="" onkeydown="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeuvupdate">

        </div>

    </center>

