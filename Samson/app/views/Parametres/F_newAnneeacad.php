<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */

 //print_r($_POST);
 if(isset($_POST['nomAC'])&& isset($_POST['etatanneeacad'])){
 $data = array(
   "id"=>'',
   "nomAC"=>$_POST['nomAC'],
   "statut"=>$_POST['etatanneeacad'],
   "ordre"=>1
 );
 $Objet = new Annee_academique($data);
 $ObjetManager=new Annee_academiqueManager($bdd);
 $statut =$ObjetManager->Add($Objet);
   if($statut==1){
       echo"<script> alert('Ajout effectuer avec succes!')</script>";
   }else{
       echo"<script> alert('Echec Ajout !')</script>";
   }
 }
?>

<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td>Annee Academique</td>
                <td><input class="" type="text" name="nomAC" id="nomAC" value="" required=""></td>
            </tr>
            <tr>
                <td>Statut</td>
                <td>
                    <select class="" name="etatanneeacad" id="etatanneeacad" required="">
                        <option selected value="-1">--------------------</option>
                        <option value="0">Desactif</option>
                        <option value="1">Actif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" id="send">
                        Enregistrer<span class=' icon-ok'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
        </table>

        <div id="message">
            
        </div>
    </center>
</form>
 <?php
         if(isset($_POST['activeaneeacad'])){
             $data = array(
               "id"=>'',
               "nomAC"=>'',
               "statut"=>'',
               "ordre"=>1
             );
             $Objet = new Annee_academique($data);
             $ObjetManager=new Annee_academiqueManager($bdd);
             $ObjetManager->UpdateStatut('active');
         }

            echo $function->GetListeAnneeAcadParam();
        ?>
