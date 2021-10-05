<?php
require_once '../models/autoload.php';
require_once '../config.php';

$iao=new Functions($con);



if(isset($_POST['action']) and isset($_POST['id'])){
    $Id = $_POST['id'];
    $action = $_POST['action'];

    if($action=="getSpeciliateByFiliere"){

        $donnee = $iao->GetSpeciliateByFiliere($Id);
        echo $donnee;
    }
    if($action=="getFiliereByCampus"){

        $donnee = $iao->GetFiliereByCampus($Id);
        print_r($donnee);
      //  echo $donnee;
    }
    if($action=="getSpeciliateByFiliere1"){

        $donnee = $iao->GetSpeciliateByFiliereFin($Id);
        echo $donnee;
    }
    if($action=="getSemestreBySpecialite"){

      //  $donnee = $iao->GetSemestreBySpecialite($Id);
        //echo $donnee;
        echo "hello";
    }
    if($action=="getSessionByAnnee"){

        $donnee = $iao->GetSessionByAnnee($Id);
        echo $donnee;
    }
    if($action=="getFormEval"){
        $ids=$_POST['idsession'];

        $donnee = $iao->Getmatiere($Id,$ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="getListetudiant"){
        $ids=$_POST['idspecialite'];
        $Id=$_POST['ida'];
        $donnee = $iao->GetListEtudiant($Id,$ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="getListetudiantre"){
      //  print_r($_POST);
        $ids=$_POST['idspecialite'];
        $Ida=$_POST['ida'];
        $Idss=$_POST['idss'];
        $donnee = $iao->GetListEtudiantrequete($Id,$ids,$Idss,$Ida);
        echo $donnee;
    }
    if($action=="getsessionnormale"){
       // print_r($_POST);
         $Ida=$_POST['ida'];
        $donnee=null;
        if($Id!=1){
                $donnee = $iao->GetListSessionNormale($Id,$Ida);
            }
        echo $donnee;
    }
    if($action=="getListetudiantdoc"){
        $ids=$_POST['id'];
        $donnee = $iao->GetEtudiant($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="listeetudiantdocsc"){
        $ids=$_POST['id'];
        $donnee = $iao->GetEtudiantScolarite($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="listeetudiantupdate"){
        $ids=$_POST['id'];
        $donnee = $iao->GetEtudiantUpdate($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="listefiliereupdate"){
        $ids=$_POST['id'];
        $donnee = $iao->GetFiliereUpdate($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="listeenseignantupdate"){
        $ids=$_POST['id'];
        $donnee = $iao->GetEnseignantUpdate($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="listeueupdate"){
        $ids=$_POST['id'];
        $donnee = $iao->GetUeUpdate($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="listeprogrammeupdate"){
        $ids=$_POST['id'];
        $donnee = $iao->GetProgrammeUpdate($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="listeuvupdate"){
        $ids=$_POST['id'];
    $donnee = $iao->GetUvUpdate($ids);

        echo $donnee;
       // print_r($_POST);
    }
    if($action=="getMat"){
       // print_r($_POST);
        $Idss=$_POST['ids'];
        $donnee = $iao->Getmatiereunique($Id,$Idss);
        echo $donnee;
    }
    if($action=="getMatAll"){
//        print_r($_POST);
        $Idss=$_POST['ids'];
        $donnee = $iao->GetmatiereuniqueAll($Id,$Idss);
        echo $donnee;
    }
    if($action=="getPoidsMat"){
        print_r($_POST);
        $Idss=$_POST['ids'];
        $Idp=$_POST['idp'];
        $donnee = $iao->Getmatiere($Id,$Idp);

        echo $donnee;
    }
    if($action=="getListUserByGroupuser"){

        $donnee = $iao->GetListeUtlisateuNiveau($Id);
        echo $donnee;
    }
    if($action=="getListetatUser"){

        $donnee = $iao->GetEtatUser($Id);
        echo $donnee;
    }
    if($action=="getdroitUser"){

       // $donnee = $iao->getdroitGpUser($Id);
        $donnee = $iao->getdroit($Id);
        echo $donnee;
    }
    if($action=="getClass"){

        $donnee = $dave->GetClasse($Id);
        echo $donnee;
    }
    if($action=="getListElevePI"){

        $eleve= $_GET['eleve'];

        $donnee = $dave->GetEtudiantPreInscrits($eleve);
        echo $donnee;
    }
}
if(isset($_GET['action']) and isset($_GET['id'])){
    $Id = $_GET['id'];
    $action = $_GET['action'];
    //echo($Id.'->'.$action);
    if($action=="getlistSection"){

        $donnee = $dave->GetListSection($Id);
        echo $donnee;
    }
    if($action=="getlistCursus"){

        $donnee = $dave->GetListeCursus($Id);
        echo $donnee;
    }
    if($action=="getlistClass"){

        $donnee = $dave->GetListeClasse($Id);
        echo $donnee;
    }
    if($action=="getClass"){

        $donnee = $dave->GetClasse($Id);
        echo $donnee;
    }
    if($action=="getListElevePI"){

        $eleve= $_GET['eleve'];

        $donnee = $dave->GetEtudiantPreInscrits($eleve);
        echo $donnee;
    }
    //function franck
    if($action=="listeprogrammeupdat"){
        $ids=$_POST['id'];
        $donnee = $iao->GetProgrammeUpdate($ids);

        echo $donnee;
       // print_r($_POST);
    }
}