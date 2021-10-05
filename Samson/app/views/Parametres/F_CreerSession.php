<?php
if(isset($_POST['codesession']) && isset($_POST['libellesession'])){
 //   print_r($_POST);
    $postsession=null;
    $statut=null;
    if($_POST['typesession']!=1){

    $req='select distinct idsession from session
  inner join tlisttypesession on tlisttypesession.idtlisttypesession=session.idtypesession
  where session.idanneeacademique='.$_POST['anneeAcad'].' order by libellesession ASC';
    $rep=$db->query($req);
    while($sess=$rep->fetch()){
        $postsession='sessionN_'.$sess[0];

        if(isset($_POST[$postsession])){
            $data = array(
         'idsession'=>'',
         'idanneeacademique'=>$_POST['anneeAcad'],
         'codesession'=>$_POST['codesession'],
         'libellesession'=>$_POST['libellesession'],
         'idsessionrattache'=>$sess[0],
         'idtypesession'=>$_POST['typesession'],
     );
     $Objet = new Session($data);
     $ObjetManager=new SessionManager($bdd);
     $statut =$ObjetManager->Add($Objet);



         }
     }
    }else{
        $data = array(
            'idsession'=>'',
            'idanneeacademique'=>$_POST['anneeAcad'],
            'codesession'=>$_POST['codesession'],
            'libellesession'=>$_POST['libellesession'],
            'idsessionrattache'=>'0',
            'idtypesession'=>$_POST['typesession'],
        );
        $Objet = new Session($data);
        $ObjetManager=new SessionManager($bdd);
        $statut =$ObjetManager->Add($Objet);
    }
     if($statut==1){
         echo"<script> alert('Ajout effectuer avec succes!')</script>";
     }else{
         echo"<script> alert('Echec Ajout !')</script>";
     }
}
?>

<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUvMatiere" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td >Annee academique</td>
                     <td colspan="2">
                        <?php
                        echo $function->GetListeAnneeAcad();
                        ?>
                    </td>
            </tr>
            <tr>
                <td> type session</td>
                <td colspan="2">
                    <?php
                    echo $function->GetListeTypeSession();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Code session</td>
                <td><input class="" type="text" name="codesession" id="codesession" value="" required=""></td>
            </tr>
            <tr>
                <td>Libelle session</td>
                <td><input class="" type="text" name="libellesession" id="libellesession" value=""></td>
            </tr>

             <tr id="sessionRtpg">

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
                        Enregistrer<span class='icon-ok'></span>
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