<?php

/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */


// Modification du programme
 if(isset($_POST['idprogrammeannuel1'])&& !empty($_POST['idprogrammeannuel1']))
 {
    $idprogrammeannuel;
    $libelleprogrammeannuel;
    $codeprogrammeannuel;
        
    $ObjetManager = new ProgrammeannuelManager($bdd);
    $programme = $ObjetManager->GetUniqueProgrammeannuel($_POST['idprogrammeannuel1']);
    foreach ($programme as $key => $value) 
    {
        if ($key == "idprogrammeannuel") {
            $idprogrammeannuel = $value;
        }
        if ($key == "libelleprogrammeannuel") {
            $libelleprogrammeannuel = $value;
        }
        if ($key == "codeprogrammeannuel") {
            $codeprogrammeannuel = $value;
        }
        
    }
 
             echo '
                  <!--Chart-box-->   
                
     <div class="row-fluid" style="width: 80%;margin-left:7%;margin-right:5%">
       <div class="widget-box">
         <div class="widget-title bg_lg"><span class="icon"><i class="icon-home"></i></span>
           <h5>Modifier  le programme </h5>
         </div>
         <div class="widget-content" >
           <div class="row-fluid">
             <div class="span9">
              <form target="" method="post"  class="form-horizontal" action=""  name="" id="ModifPro" enctype="multipart/form-data">
     <center>
         <table style="width: 70%">
              <tr>
                 <td></td>
                 <td><input class="" type="hidden" name="idprogrammeannuel1" id="idprogrammeannuel1" value="'.$idprogrammeannuel.'" required=""></td>
             </tr>
             <tr>
                 <td>Code Programme</td>
                 <td><input style="width:100% " class="" type="text" name="codeprogrammeannuel" id="codeprogrammeannuel" value="'.$codeprogrammeannuel.'" required=""></td>
                 
             </tr>
             <tr>
                 <td>Libelle Programme</td>
                     <td><input style="width:100% " class="" type="text" name="libelleprogrammeannuel" id="libelleprogrammeannuel" value="'.$libelleprogrammeannuel.'" required=""></td>
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
                     <button type="submit" class="btn btn-success">
                         Enregistrer<span class="icon-ok"></span>
                     </button>
                 </td>
                 <td>
                     <a href="#"><button type="button" class="btn btn-danger"><i class="icon-remove" ></i> Annuler  </button></a>
                 </td>
             </tr>
         </table>
     </center>
 </form>
 </div> </div> </div></div>';
 }

 //Modifier programme trait
 if(isset($_POST['idprogrammeannuel1'])&&isset($_POST['codeprogrammeannuel'])&&isset($_POST['libelleprogrammeannuel']))
 {
         
    $data = array(
        'idprogrammeannuel'=>$_POST['idprogrammeannuel1'],
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

 //Ajout d un programme
 
 if(isset($_POST['idprogrammeannuel2'])&& !empty($_POST['idprogrammeannuel2']))
 {
 
             echo '
                  <!--Chart-box-->   
                
     <div class="row-fluid" style="width: 80%;margin-left:7%;margin-right:5%">
       <div class="widget-box">
         <div class="widget-title bg_lg"><span class="icon"><i class="icon-home"></i></span>
           <h5>Ajouter  l unite d enseignement </h5>
         </div>
         <div class="widget-content" >
           <div class="row-fluid">
             <div class="span9">
              <form target="" method="post"  class="form-horizontal" action=""  name="" id="ModifPro" enctype="multipart/form-data">
     <center>
         <table style="width: 70%">
         <tr>
                 <td></td>
                 <td><input class="" type="hidden" name="idprogrammeannuel2" id="idprogrammeannuel2" value="'.$_POST['idprogrammeannuel2'].'" required=""></td>
             </tr>
         <tr>
         <td>Unite d enseignement</td>
             <td colspan="2">';
               
                 echo $function->GetListeUniteEnsiegnement();
                
            echo' </td>
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
                     <button type="submit" class="btn btn-success">
                         Enregistrer<span class="icon-ok"></span>
                     </button>
                 </td>
                 <td>
                     <a href="#"><button type="button" class="btn btn-danger"><i class="icon-remove" ></i> Annuler  </button></a>
                 </td>
             </tr>
         </table>
     </center>
 </form>
 </div> </div> </div></div>';

 }
 // Ajout programme trait
 
 if(isset($_POST['idprogrammeannuel2'])&&isset($_POST['UniteEnseignement']))
 {
         
    $data = array(
        'idprogramme'=>$_POST['idprogrammeannuel2'],
        'idue'=>$_POST['UniteEnseignement']
       
    );
    $Objet = new Programmeue($data);
    $ObjetManager=new ProgrammeueManager($bdd);
    $statut =$ObjetManager->Add($Objet);
   if($statut==1){
    echo"<script> alert('Ajout effectue avec succes!')</script>";
    }else{
       
      
       echo"<script> alert('Echec Ajout !')</script>";
   }
 }

 if(isset($_POST['idprogrammeannuel'])){
    $_SESSION['idprogrammeannuel'] = $_POST['idprogrammeannuel'];
 }


// Modifier unite d enseignement

if(isset($_POST['idue3'])&& !empty($_POST['idue3']))
{
   $idue;
   $codeuniteenseignement;
   $libelleuniteenseignement;
   $nbcreditsue;
   $notevalidationue;
   $noteeleminerue;
       
   $ObjetManager = new UniteenseignementManager($bdd);
   $ue = $ObjetManager->GetUniqueUniteenseignement($_POST['idue3']);
   foreach ($ue as $key => $value) 
   {
       if ($key == "iduniteenseignement") {
           $idue = $value;
       }
       if ($key == "codeuniteenseignement") {
           $codeuniteenseignement = $value;
       }
       if ($key == "libelleuniteenseignement") {
           $libelleuniteenseignement = $value;
       }
       if ($key == "nbcreditsue") {
        $nbcreditsue = $value;
    }
    if ($key == "notevalidationue") {
        $notevalidationue = $value;
    }
    if ($key == "noteeleminerue") {
        $noteeleminerue = $value;
    }
       
   }

            echo '
                 <!--Chart-box-->   
               
    <div class="row-fluid" style="width: 80%;margin-left:7%;margin-right:5%">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-home"></i></span>
          <h5>Modifier  l unite d enseignement </h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
             <form target="" method="post"  class="form-horizontal" action=""  name="" id="ModifPro" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">
             <tr>
                <td></td>
                <td><input class="" type="hidden" name="idue" id="idue" value="'.$idue.'" required=""></td>
            </tr>
            <tr>
                <td>Code </td>
                <td><input style="width:100% " class="" type="text" name="codeuniteenseignement" id="codeuniteenseignement" value="'.$codeuniteenseignement.'" required=""></td>
                
            </tr>
            <tr>
                <td>Libelle </td>
                    <td><input style="width:100% " class="" type="text" name="libelleuniteenseignement" id="libelleuniteenseignement" value="'.$libelleuniteenseignement.'" required=""></td>
            </tr>
            <tr>
                <td>Credit </td>
                    <td><input style="width:100% " class="" type="number" name="nbcreditsue" id="nbcreditsue" value="'.$nbcreditsue.'" required=""></td>
            </tr>
            <tr>
                <td>Note Validaion </td>
                    <td><input style="width:100% " class="" type="number" name="notevalidationue" id="notevalidationue" value="'.$notevalidationue.'" required=""></td>
            </tr>
            <tr>
                <td>Note Eliminee </td>
                    <td><input style="width:100% " class="" type="number" name="noteeleminerue" id="noteeleminerue" value="'.$noteeleminerue.'" required=""></td>
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
                    <button type="submit" class="btn btn-success">
                        Enregistrer<span class="icon-ok"></span>
                    </button>
                </td>
                <td>
                    <a href="#"><button type="button" class="btn btn-danger"><i class="icon-remove" ></i> Annuler  </button></a>
                </td>
            </tr>
        </table>
    </center>
</form>
</div> </div> </div></div>';
}


//Modifier unite enseignement trait
if(isset($_POST['idue'])&&isset($_POST['codeuniteenseignement'])&&isset($_POST['libelleuniteenseignement']))
{
        
   $data = array(
       'iduniteenseignement'=>$_POST['idue'],
       'codeuniteenseignement'=>$_POST['codeuniteenseignement'],
       'libelleuniteenseignement'=>$_POST['libelleuniteenseignement'],
       'nbcreditsue'=>$_POST['nbcreditsue'],
       'notevalidationue'=>$_POST['notevalidationue'],
       'noteeleminerue'=>$_POST['noteeleminerue'],
   );
   $Objet = new Uniteenseignement($data);
   $ObjetManager=new UniteenseignementManager($bdd);
   $statut =$ObjetManager->Update($Objet);
   $_POST =[];
  if($statut==1){
  
   echo"<script> alert('Modification effectuee avec succes!')</script>";
   }else{
     
     
      echo"<script> alert('Echec Ajout !')</script>";
  }
}


//Supprimer unite enseignement trait
if(isset($_POST['idues']))
{
   $ObjetManager=new ProgrammeueManager($bdd);
   $statut =$ObjetManager->Delete($_SESSION['idprogrammeannuel'],$_POST['idues']);
  if($statut==1){
  
   echo"<script> alert('Suppression effectuee avec succes!')</script>";
   }else{
     
     
      echo"<script> alert('Echec de suppression !')</script>";
  }
}




 if(isset($_POST['idprogrammeannuel']) || isset($_SESSION['idprogrammeannuel']) ){

    echo'
    <div id="listeue" class="widget-box span19" >
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              
               </div>
               <div class="widget-content nopadding">
                   <table id="listeprogramme"  class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th colspan="2">Code</th>
                           <th colspan="3">Libelle(s)</th>
                           <th colspan="2"><i class="icon-plus-sign" ></th>
                           <th colspan="2"><i class=" icon-edit"></i></th>
                       </tr>
                       </thead>
                       
                       <tbody>';
                       $idprogrammeannuel;
                       $libelleprogrammeannuel;
                       $codeprogrammeannuel;
                       
                    $ObjetManager = new ProgrammeannuelManager($bdd);
                    $programme = $ObjetManager->GetUniqueProgrammeannuel($_SESSION['idprogrammeannuel']);
                    foreach ($programme as $key => $value) 
                    {
                        if ($key == "idprogrammeannuel") {
                            $idprogrammeannuel = $value;
                        }
                        if ($key == "libelleprogrammeannuel") {
                            $libelleprogrammeannuel = $value;
                        }
                        if ($key == "codeprogrammeannuel") {
                            $codeprogrammeannuel = $value;
                        }
                        
                    }


                                echo '<tr class="odd gradeX">
                           
                            <td colspan="2">'. $codeprogrammeannuel.'</td>
                            <td colspan="3">'.strtoupper($libelleprogrammeannuel).' 
                            <td colspan="2" class="controls">
                            <center><form method="post" action="">
                            <input type="hidden" value="'.$idprogrammeannuel.'" name="idprogrammeannuel2"/>
                            <button type="submit" class="btn btn-success"><i class=" icon-edit"></i> Ajouter une UE  </button>
                            </form><center>
                                </td>
                                <td colspan="2" class="controls">
                            <center><form method="post" action="">
                            <input type="hidden" value="'.$idprogrammeannuel.'" name="idprogrammeannuel1"/>
                            <button type="submit" class="btn btn-inverse"><i class=" icon-edit"></i> Modifier  </button>
                            </form><center>
                                </td>
                                </tr>
                                
                                <tr >
                           <th colspan="8" >Unités d enseignement Affectées au programme</th>
                           
                           
                            </tr>
                            <tr>
                            <td> </td>
                            </tr>
                            <tr>
                            <th> # </th>
                            <th> code </th>
                            <th> libelle </th>
                            <th> credit </th>
                            <th>Note validation </th>
                            <th>Note eliminee </th>
                            <th><i class=" icon-edit"></i> </th>
                            <th><i class=" icon-remove"></i> </th>
                             </tr>';
                            
                          $ObjetManager = new UniteenseignementManager($bdd);
                          $programme = $ObjetManager->GetListUeProgramme($_SESSION['idprogrammeannuel']);
                          $compteur=0;
                          
                          for ($i=0; $i <count($programme) ; $i++) { 
                               $data = array();
                      
                              echo ' <tr>';
                              foreach ($programme[$i] as $key => $value) 
                              {
                                  if($key == "iduniteenseignement")
                                  {
                                      // enregistre les identifiants des unite d enseignement dans le tableau Data
                                          $data[$i]=$value;
                                          $compteur ++;
                                          echo' <td>'.$compteur.'</td>';
                                  }
                    
                                  if($key == "codeuniteenseignement")
                                  {
                                      echo' <td>'.$value.'</td>';
                                  }
                                  if($key == "libelleuniteenseignement")
                                  {
                                      echo' <td>'.$value.'</td>';
                                  }
                                  if($key == "nbcreditsue")
                                  {
                                      echo' <td>'.$value.'</td>';
                                  }
                                  
                                  if($key == "notevalidationue")
                                  {
                                    echo' <td>'.$value.'</td>';
                                  }
                                  if($key == "noteeleminerue")
                                  {
                                    echo' <td>'.$value.'</td>';
                                  }
                      
                              }

                            echo '   <td>
                              <center>
                                                  <form method="post" action="">
                                                  <input type="hidden" value="'.$data[$i].'" name="idue3"/>
                                                  <button type="submit" class="btn btn-inverse"><i class=" icon-edit"></i> Modifier  </button>
                                                  </form>
                                              </center>
                                              </td>
                                  <td>
                              <center>
                                                  <form method="post" action="">
                                                  <input type="hidden" value="'.$data[$i].'" name="idues"/>
                                                  <button type="submit" class="btn btn-danger"> <i class=" icon-remove"></i> Supprimer  </button>
                                                  </form>
                                              </center>
                                              </td>';
                          }
                               

                         echo'
                         </tr>
                         </tbody>
                       </table>
                       
                   </div>
                   </div>';
  
 }
?>
    <center>

        <table style="width: 55%">
            <tr>
                <td><b>Code / Libelle </b></td>
                <td >
                    <input type="text" placeholder="programme annuel" name="programme" id="programme"  value="" class="" onkeydown="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeprogrammeupdate">

        </div>

    </center>

