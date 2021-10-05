<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
 if(isset($_POST['codeprogrammeannuel'])&& isset($_POST['libelleprogrammeannuel'])){
    $data = array(
        'idprogrammeannuel'=>$_POST['idprogrammeannuel'],
        'codeprogrammeannuel'=>$_POST['codeprogrammeannuel'],
        'libelleprogrammeannuel'=>$_POST['libelleprogrammeannuel']
    );
 $Objet = new Programmeannuel($data);
 $ObjetManager=new ProgrammeannuelManager($bdd);
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
                    <input type="text" name="programme" id="programme"  value="" class="">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeprogrammeupdat">

        </div>

    </center>

