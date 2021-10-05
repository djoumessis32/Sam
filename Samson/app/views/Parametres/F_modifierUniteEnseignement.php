<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
// 


// Modification du uniteenseignement
if(isset($_POST['iduniteenseignement1'])&& !empty($_POST['iduniteenseignement1']))
{
   $iduniteenseignement1;
   $libelleuniteenseignement;
   $nbcreditsue;
   $notevalidationue;
   $noteeleminerue;
       
   $ObjetManager = new UniteenseignementManager($bdd);
   $programme = $ObjetManager->GetUniqueUniteenseignement($_POST['iduniteenseignement1']);
   foreach ($programme as $key => $value) 
   {
       if ($key == "iduniteenseignement") {
           $iduniteenseignement1 = $value;
       }
       if ($key == "libelleuniteenseignement") {
           $libelleuniteenseignement = $value;
       }
       if ($key == "codeuniteenseignement") {
           $codeuniteenseignement = $value;
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
          <h5>Modifier  le Unite enseignement </h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
             <form target="" method="post"  class="form-horizontal" action=""  name="" id="ModifPro" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">
             <tr>
                <td></td>
                <td><input class="" type="hidden" name="iduniteenseignement1" id="iduniteenseignement1" value="'.$iduniteenseignement1.'" required=""></td>
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
                    <td><input style="width:100% " class="" type="number" step=".10" name="nbcreditsue" id="nbcreditsue" value="'.$nbcreditsue.'" required=""></td>
            </tr>
            <tr>
                <td>Note validation </td>
                    <td><input style="width:100% " class="" type="number" name="notevalidationue" id="notevalidationue" value="'.$notevalidationue.'" required=""></td>
            </tr>
            <tr>
                <td>Note Elemine </td>
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
if(isset($_POST['iduniteenseignement1'])&&isset($_POST['codeuniteenseignement'])&&isset($_POST['libelleuniteenseignement']))
{
        
   $data = array(
       'iduniteenseignement'=>$_POST['iduniteenseignement1'],
       'codeuniteenseignement'=>$_POST['codeuniteenseignement'],
       'libelleuniteenseignement'=>$_POST['libelleuniteenseignement'],
       'nbcreditsue'=>$_POST['nbcreditsue'],
       'notevalidationue'=>$_POST['notevalidationue'],
       'noteeleminerue'=>$_POST['noteeleminerue']
   );
   $Objet = new Uniteenseignement($data);
   $ObjetManager=new UniteenseignementManager($bdd);
   $statut =$ObjetManager->Update($Objet);
  if($statut==1){
     
  
   echo"<script> alert('Modification effectuee avec succes!')</script>";
   }else{
     
     
      echo"<script> alert('Echec Ajout !')</script>";
  }
}

//Ajout d un Unite de valeur a unite d enseignement

if(isset($_POST['iduniteenseignement2'])&& !empty($_POST['iduniteenseignement2']))
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
                <td><input class="" type="hidden" name="iduniteenseignement2" id="iduniteenseignement2" value="'.$_POST['iduniteenseignement2'].'" required=""></td>
            </tr>
        <tr>
        <td>Unite de valuer</td>
            <td colspan="2">';
              
                echo $function->GetListeUvMatiere();
               
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
// Ajout unite enseigment trait

if(isset($_POST['iduniteenseignement2'])&&isset($_POST['UvMatiere']))
{
        
   $data = array(
       'idue'=>$_POST['iduniteenseignement2'],
       'iduv'=>$_POST['UvMatiere']
      
   );
   $Objet = new Ue_uv($data);
   $ObjetManager=new Ue_uvManager($bdd);
   $statut =$ObjetManager->Add($Objet);
  if($statut==1){
   echo"<script> alert('Ajout effectue avec succes!')</script>";
   }else{
      
     
      echo"<script> alert('Echec Ajout !')</script>";
  }
}



// Modifier unite de valeur

if(isset($_POST['iduvmatiere']) && !empty($_POST['iduvmatiere']))
{   
  $iduvmatiere="";
  $codeuvmatiere="";
  $libelle_fr_uvmatiere="";
  $ncredis="";
  $notevaliduvmatiere="";
  $noteelimuvmatiere="";
  $vlmhoraire="";
      
  $ObjetManager = new UvmatiereManager($bdd);
  $ue = $ObjetManager->GetUniqueUvmatiere($_POST['iduvmatiere']);
  foreach ($ue as $key => $value) 
  {
      
      if ($key == "iduvmatiere") {
          $iduvmatiere = $value;
      }
      if ($key == "codeuvmatiere") {
          $codeuvmatiere = $value;
      }
      if ($key == "libelle_fr_uvmatiere") {
          $libelle_fr_uvmatiere = $value;
      }
      if ($key == "ncredis") {
       $ncredis = $value;
   }
   if ($key == "notevaliduvmatiere") {
       $notevaliduvmatiere = $value;
   }
   if ($key == "noteelimuvmatiere") {
       $noteelimuvmatiere = $value;
   }
   if ($key == "vlmhoraire") {
    $vlmhoraire = $value;
}
      
  }

           echo '
                <!--Chart-box-->   
              
   <div class="row-fluid" style="width: 80%;margin-left:7%;margin-right:5%">
     <div class="widget-box">
       <div class="widget-title bg_lg"><span class="icon"><i class="icon-home"></i></span>
         <h5>Modifier  l unite de valuer matiere </h5>
       </div>
       <div class="widget-content" >
         <div class="row-fluid">
           <div class="span9">
            <form target="" method="post"  class="form-horizontal" action=""  name="" id="ModifPro" enctype="multipart/form-data">
   <center>
       <table style="width: 70%">
            <tr>
               <td></td>
               <td><input class="" type="hidden" name="iduvmatieres" id="iduvmatieres" value="'.$iduvmatiere.'" required=""></td>
           </tr>
           <tr>
               <td>Code </td>
               <td><input style="width:100% " class="" type="text" name="codeuvmatiere" id="codeuvmatiere" value="'.$codeuvmatiere.'" required=""></td>
               
           </tr>
           <tr>
               <td>Libelle </td>
                   <td><input style="width:100% " class="" type="text" name="libelle_fr_uvmatiere" id="libelle_fr_uvmatiere" value="'.$libelle_fr_uvmatiere.'" required=""></td>
           </tr>
           <tr>
               <td>Credit </td>
                   <td><input style="width:100% " class="" step=".10" type="number" name="ncredis" id="ncredis" value="'.$ncredis.'" required=""></td>
           </tr>
           <tr>
               <td>Note Validaion </td>
                   <td><input style="width:100% " class="" type="number" name="notevaliduvmatiere" id="notevaliduvmatiere" value="'.$notevaliduvmatiere.'" required=""></td>
           </tr>
           <tr>
               <td>Note Eliminee </td>
                   <td><input style="width:100% " class="" type="number" name="noteelimuvmatiere" id="noteelimuvmatiere" value="'.$noteelimuvmatiere.'" required=""></td>
           </tr>
           <tr>
           <td>Volume horaire </td>
               <td><input style="width:100% " class="" type="number" name="vlmhoraire" id="vlmhoraire" value="'.$vlmhoraire.'" required=""></td>
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


//Modifier unite valeur trait
if(isset($_POST['iduvmatieres'])&&isset($_POST['codeuvmatiere'])&&isset($_POST['libelle_fr_uvmatiere']))
{
       
  $data = array(
      'iduvmatiere'=>$_POST['iduvmatieres'],
      'codeuvmatiere'=>$_POST['codeuvmatiere'],
      'libelle_fr_uvmatiere'=>$_POST['libelle_fr_uvmatiere'],
      'ncredis'=>$_POST['ncredis'],
      'notevaliduvmatiere'=>$_POST['notevaliduvmatiere'],
      'noteelimuvmatiere'=>$_POST['noteelimuvmatiere'],
      'vlmhoraire'=>$_POST['vlmhoraire'],
  );
 $_POST =[];

  $Objet = new Uvmatiere($data);
  $ObjetManager=new UvmatiereManager($bdd);
  $statut =$ObjetManager->Update($Objet);
 
 if($statut==1){
   
  echo"<script> alert('Modification effectuee avec succes!')</script>";
  }else{
    
    
     echo"<script> alert('Echec Ajout !')</script>";
 }
}


//Supprimer unite de valeur trait
if(isset($_POST['iduvmatieres']))
{
   $ObjetManager=new Ue_uvManager($bdd);
   $statut =$ObjetManager->Delete($_POST['iduvmatieres'],$_SESSION['iduniteenseignement']);
  if($statut==1){
  
   echo"<script> alert('Suppression effectuee avec succes!')</script>";
   }else{
      echo"<script> alert('Echec de suppression !')</script>";
  }
}


if(isset($_POST['iduniteenseignement'])){
    $_SESSION['iduniteenseignement'] = $_POST['iduniteenseignement'];
 }

 if(isset($_POST['iduniteenseignement']) || isset($_SESSION['iduniteenseignement']) ){

    echo'
    <div id="listeue" class="widget-box span19" >
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              
               </div>
               <div class="widget-content nopadding">
                   <table id="listue"  class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th colspan="1">Code</th>
                           <th colspan="3">Libelle(s)</th>
                           <th colspan="1">Credit(s)</th>
                           <th colspan="1">Note validation(s)</th>
                           <th colspan="1">Note eliminee(s)</th>
                           <th colspan="1"><i class="icon-plus-sign" ></th>
                           <th colspan="2"><i class=" icon-edit"></i></th>
                       </tr>
                       </thead>
                       
                       <tbody>';
                       $iduniteenseignement;
                       $libelleuniteenseignement;
                       $codeuniteenseignement;
                       $nbcreditsue;
                       $notevalidationue;
                       $noteeleminerue;

                       
                    $ObjetManager = new UniteenseignementManager($bdd);
                    $programme = $ObjetManager->GetUniqueUniteenseignement($_SESSION['iduniteenseignement']);
                    foreach ($programme as $key => $value) 
                    {
                        if ($key == "iduniteenseignement") {
                            $iduniteenseignement = $value;
                        }
                        if ($key == "libelleuniteenseignement") {
                            $libelleuniteenseignement = $value;
                        }
                        if ($key == "codeuniteenseignement") {
                            $codeuniteenseignement = $value;
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


                                echo '<tr class="odd gradeX">
                           
                            <td colspan="1">'. $codeuniteenseignement.'</td>
                            <td colspan="3">'.strtoupper($libelleuniteenseignement).' 
                            <td colspan="1">'. $nbcreditsue.'</td>    
                            <td colspan="1">'. $notevalidationue.'</td>
                            <td colspan="1">'. $noteeleminerue.'</td>
                            <td colspan="1" class="controls">
                            <center><form method="post" action="">
                            <input type="hidden" value="'.$iduniteenseignement.'" name="iduniteenseignement2"/>
                            <button type="submit" class="btn btn-success"><i class=" icon-edit"></i> Ajouter une UV  </button>
                            </form><center>
                                </td>
                                <td colspan="2" class="controls">
                            <center><form method="post" action="">
                            <input type="hidden" value="'.$iduniteenseignement.'" name="iduniteenseignement1"/>
                            <button type="submit" class="btn btn-inverse"><i class=" icon-edit"></i> Modifier  </button>
                            </form><center>
                                </td>
                                </tr>
                                
                                <tr >
                           <th colspan="9" >Unités de valeur Affectées au programme</th>
                           
                           
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
                            <th>Volume horaire </th>
                            <th><i class=" icon-edit"></i> </th>
                            <th><i class=" icon-remove"></i> </th>
                             </tr>';
                            
                          $ObjetManager = new UvmatiereManager($bdd);
                          $ue = $ObjetManager->GetListUe_uv($_SESSION['iduniteenseignement']);
                          $compteur=0;
                          
                          for ($i=0; $i <count($ue) ; $i++) { 
                               $data = array();
                      
                              echo ' <tr>';
                              foreach ($ue[$i] as $key => $value) 
                              {
                                  if($key == "iduvmatiere")
                                  {
                                      // enregistre les identifiants des unite d enseignement dans le tableau Data
                                          $data[$i]=$value;
                                          $compteur ++;
                                          echo' <td>'.$compteur.'</td>';
                                  }
                    
                                  if($key == "codeuvmatiere")
                                  {
                                      echo' <td>'.$value.'</td>';
                                  }
                                  if($key == "libelle_fr_uvmatiere")
                                  {
                                      echo' <td>'.$value.'</td>';
                                  }
                                  if($key == "ncredis")
                                  {
                                      echo' <td>'.$value.'</td>';
                                  }
                                  
                                  if($key == "notevaliduvmatiere")
                                  {
                                    echo' <td>'.$value.'</td>';
                                  }
                                  if($key == "noteelimuvmatiere")
                                  {
                                    echo' <td>'.$value.'</td>';
                                  }
                                  if($key == "vlmhoraire")
                                  {
                                    echo' <td>'.$value.'</td>';
                                  }
                      
                              }

                            echo '   <td>
                              <center>
                                                  <form method="post" action="">
                                                  <input type="hidden" value="'.$data[$i].'" name="iduvmatiere"/>
                                                  <button type="submit" class="btn btn-inverse"><i class=" icon-edit"></i> Modifier  </button>
                                                  </form>
                                              </center>
                                              </td>
                                  <td>
                              <center>
                                                  <form method="post" action="">
                                                  <input type="hidden" value="'.$data[$i].'" name="iduvmatieres"/>
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
                    <input type="text" name="ue" id="ue"  value="" class="" onkeydown="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeueupdate">

        </div>

    </center>

