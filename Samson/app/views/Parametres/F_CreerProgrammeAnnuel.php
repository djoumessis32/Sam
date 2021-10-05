<?php
if(isset($_POST['codeprogrammeannuel']) && isset($_POST['libelleprogrammeannuel'])){
    $data = array(
        'idprogrammeannuel'=>'',
        'codeprogrammeannuel'=>$_POST['codeprogrammeannuel'],
        'libelleprogrammeannuel'=>$_POST['libelleprogrammeannuel']
    );
    $Objet = new Programmeannuel($data);
    $ObjetManager=new ProgrammeannuelManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
}
?>


<form target="" method="post"  class="form-horizontal" action=""  name="creerprogrammeannuel" id="creerprogrammeannuel" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                 <td>code programme annuel</td>
                 <td><input class="" type="text" name="codeprogrammeannuel" id="codeprogrammeannuel" value="" required=""></td>
            </tr>
            <tr>
                <td>libelle programme annuel</td>
                    <td><input class="" type="text" name="libelleprogrammeannuel" id="libelleprogrammeannuel" value="" required=""></td>
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