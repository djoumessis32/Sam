<?php
if(isset($_POST['specialite']) && isset($_POST['classelmd'])){
    $data = array(
        'idspecialiteclasselmd'=>'',
        'idspecialite'=>$_POST['specialite'],
        'idclasselmd'=>$_POST['classelmd']
    );
    $Objet = new Specialiteclasselmd($data);
    $ObjetManager=new SpecialiteclasselmdManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
}
?>


<form target="" method="post"  class="form-horizontal" action=""  name="affecterprogrammeue" id="affecterprogrammeue" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                 <td>Specialite</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeSpecialite();
                        ?>
                    </td>
            </tr>
            <tr>
                <td>Classe LMD</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeClasseLmd();
                        ?>
                    </td>
            </tr>
            <tr>
                
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
    </center>
</form>