<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
// print_r($_POST);
    if(isset($_POST['programme']) &&  isset($_POST['semestreAcad'])){

    $classSp= new SpecialiteclasselmdManager($bdd);
        $idspclass=$classSp->GetUniqueSpecialiteclasselmdByspecialte($_POST['semestreAcad'],$_POST['specialite']);
       
	   $data = array(
            'idprogrammadopte'=>'' ,
            'idprogramme'=>$_POST['programme'],
            'idanneeacademique'=>$_POST['anneeAcad'],
            'idspecialiteclasse' =>$idspclass[0][0],
            'idsemestre' =>$_POST['semestreAcad'],
        );
        $tmp =new ProgrammadopteManager($bdd);
		
        $nb=count($tmp->GetListMultiKeysProgrammadopte($_POST['programme'],$_POST['anneeAcad'],$idspclass[0][0]));
        if($nb==0){
            $Objet = new  Programmadopte($data);
            $ObjetManager=new  ProgrammadopteManager($bdd);
            $statut =$ObjetManager->Add($Objet);
            if($statut==1){
                echo"<script> alert('Ajout effectuer avec succes!')</script>";
            }else{
                echo"<script> alert('Echec Ajout !')</script>";
            }

        }else{
            echo"<script> alert('Programme deja adopter!')</script>";
        }
}


?>

<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td>Annee academique</td>
                     <td colspan="2">
                        <?php
                        echo $function->GetListeAnneeAcad();
                        ?>
                    </td>
            </tr>

            <tr>
                <td>Filiere</td>
                <td id="filiere">
                    <?php
                    echo $function->GetListeFiliere();
                    ?>
                </td>
            <tr>
            <tr>
                <td>Specialite</td>
                <td id="specialit">
                    <label for="specialite"></label><select class="" name="specialite" id="specialite">
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Semestre</td>
                <td id="semestes">
                    <?php
                    echo $function->GetSemestre();
                    ?>
                </td>
            </tr>
            <tr>
                 <td>Programme</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeProgramme();
                        ?>
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
                <td>
                    <button type="submit" class="btn btn-success" id="send">
                        Affecter Programme <span class='icon-ok'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
        </table>
    </center>
</form>