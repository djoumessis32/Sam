<?php
/**
 * Created by PhpStorm.
 * User: Befah
 * Date: 8/9/2020
 * Time: 9:17 PM
 */

//print_r($_POST);
if(isset($_POST['anneeAcad'])&& isset($_POST['sessioncad'])&& isset($_POST['typeop'])){
    $data = array(
        "idperiode"=>'',
        "idtype_operation"=>$_POST['typeop'],
        "date_debut"=>$_POST['datedebut'],
        "date_fin"=>$_POST['datefin'],
        "actif"=>$_POST['actif'],
        "idannee"=>$_POST['anneeAcad'],
        "idsession"=>$_POST['sessioncad']
    );
    $Objet = new Periode($data);
    $ObjetManager=new PeriodeManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
}
?>

<form method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser">
    <center>

        <table style="width: 55%">
            <tr>
                <td >Annee Academique</td>
                <td >
                    <?php
                    echo $function->GetListeAnneeAcad();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Session</td>
                <td id="session">
                    <select class="" name="sessioncad" id="sessioncad" required>
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Type Operation</td>
                <td >
                    <?php
                    echo $function->GetListeTypeOp();
                    ?>
                </td>
            </tr>
            <tr>
                <td><span>Date de Debut</span></td>
                <td><input type="date" name="datedebut" style="height: 30px;" id="datedebut" autofocus required="required"></td>
            </tr>
            <tr>
                <td><span>Date de Fin</span></td>
                <td><input type="date" name="datefin" style="height: 30px;" id="datefin" autofocus required="required"></td>
            </tr>
            <tr>
                <td>Autoriser</td>
                <td id="session">
                    <select class="" name="actif" id="actif" required>
                        <option selected value="-1">------</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </td>
            </tr>
        </table>
        <hr>
        <table style="width: 40%">
            <tr>
                <td>
                    <button class="btn btn-success" id="send">
                        Definir <span class=' icon-certificate'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
            <tr></tr>
        </table>
        <hr>
    </center>
</form>

<form method="post"  class="form-horizontal" action=""  name="editerPeriode" id="formUser">
  <center>
      <div id="listePeriodeParam" class="widget-box span12">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

              <h5>Modifier periode securiser</h5>
          </div>
          <br>
    <table style="width: 55%">
        <tr>
            <td >Annee Academique</td>
            <td >
                <?php
                echo $function->GetListeAnneeAcad();
                ?>
            </td>
        </tr>
    </table>
  </center>
</form>
