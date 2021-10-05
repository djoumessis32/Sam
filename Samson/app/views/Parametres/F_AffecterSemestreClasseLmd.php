<?php

if(isset($_POST['semestrelmd']) && isset($_POST['classelmd'])){
    $data = array(
        'idclassesemestrelmd'=>'',
        'idsemestre'=>$_POST['semestrelmd'],
        'idclasselmd'=>$_POST['classelmd'],
        'ordreclassesemestrelmd'=>1
    );
    $Objet = new Classesemestrelmd($data);
    $ObjetManager=new ClassesemestrelmdManager($bdd);
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
                <td>Classe LMD</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeClasseLmd();
                        ?>
                    </td>
            </tr>
            <tr>
                 <td>Semestre</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeSemestre();
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