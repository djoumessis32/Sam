<?php
/**
 * Created by DivineSoft Team.
 * User: MK
 * Date: 12/05/14
 * Time: 01:48
 */

class Functions {
    public $com;
    public function __construct($handle) {
        $this->com = $handle;
    }
    function getTranslator($code, $lang = "fr") {
        $langue = "libelle_" . $lang;
        $req = "select * from other_options where code_text='" . $code . "'";
        //echo $req;
        $rep = $this->com->query($req);
        $text = $rep->fetch();
        //print_r($text);
        if ($rep->rowCount() == 0) {
            return"No translation";
        } else {

            return @ucwords($text[$langue]);
        }
    }
    /*     * ****************************************************** Retourne un menu Déroullant contenant les Groupes D'Utilisateur ******************************* */
    function getMenuAll()
    {
        if (!isset($_SESSION['parent'])) {
            $module = 4;
        } else {
            $module = $_SESSION['parent'];
        }
        if (isset($_SESSION['idgroupeutilisateur'])) {
            $iduser = $_SESSION['idgroupeutilisateur'];
        }

        $Req_menu = "SELECT distinct menu.idmenu FROM menu
  INNER JOIN groupeutilisateurmenu ON groupeutilisateurmenu.idmenu=menu.idmenu
  INNER JOIN groupeutilisateur ON groupeutilisateur.idgroupeutilisateur = groupeutilisateurmenu.idgroupeutilisateur
  WHERE groupeutilisateur.idgroupeutilisateur=$iduser
      AND groupeutilisateurmenu.nivauaccess=1";
       // echo($Req_menu);
        $Rep_menu = $this->com->query($Req_menu);
        $Sub_menu = array();
        $k = 0;
        while ($Submenu = $Rep_menu->fetch()) {
            $Sub_menu[$k] = $Submenu[0];
            //   echo$Submenu[0];
            $k++;
        }
        $max = $Rep_menu->rowCount();
        // print_r($Sub_menu);
        //echo $max;

        $req = "SELECT * FROM menu WHERE menu.idfils=1 AND menu.idparent=" . $module . " ORDER BY libelle_fr ASC";
        $rep = $this->com->query($req);
        while ($menu = $rep->fetch(PDO::FETCH_ASSOC)) {
            $idmenu = $menu['idmenu'];
            if($this->Is_True_Parent($idmenu,$iduser)==1){
                $nombreSousMenuReq = "SELECT COUNT(menu.idmenu)  FROM menu
                inner join groupeutilisateurmenu on groupeutilisateurmenu.idmenu=menu.idmenu
                WHERE menu.idfils=2 AND menu.idparent='$idmenu' AND nivauaccess=1 and groupeutilisateurmenu.idgroupeutilisateur=$iduser ";
                $nombreSousMenuRep = $this->com->query($nombreSousMenuReq);
                $nombreSousMenu = 0;
                while ($nb = $nombreSousMenuRep->fetch()) {
                    $nombreSousMenu = $nb[0];
                }
                echo'<li class="submenu">
                    <a href="#"><i class="icon ' . $menu["icon"] . '"></i>  <span> ' . $menu["libelle_fr"] . '</span><span class="label label-success">'.$nombreSousMenu.'</span></a>
                <ul>';
                $reqMn = "SELECT * FROM menu
                inner join groupeutilisateurmenu on groupeutilisateurmenu.idmenu=menu.idmenu
                 WHERE menu.idfils=2 AND menu.idparent='$idmenu' AND nivauaccess=1 and groupeutilisateurmenu.idgroupeutilisateur=$iduser ORDER BY menu.idmenu ASC";
                $repMn = $this->com->query($reqMn);
                while ($menuMn = $repMn->fetch(PDO::FETCH_ASSOC)) {
                    $idmenuMn = $menuMn['idmenu'];
                    echo'<li id="example2" data-content="'.$menuMn['desscription'].'" data-placement="right" data-toggle="popover" data-original-title="'.$menuMn['libelle_fr'].'">
                         <a href="app\controllers\httpcontroller.php?icon='.$menu['icon'].'&titre='.$menuMn['titrevue'].'& page=' . $menuMn['fichierassocier'] . '& folder=' . $menuMn['dossierviews'] . '""><i class="icon ' . $menuMn["icon"] . '""></i>  ' . $menuMn['libelle_fr'] . '</a>';
                    echo'</li>';
                }
                echo'</ul>
        </li>';

            }
        }
    }
    function getMenu() {
        if (!isset($_SESSION['parent'])) {
            $idM = 4;
        } else {
            $idM = $_SESSION['parent'];
        }

        $reqM = "SELECT * FROM menu WHERE menu.idfils=1 and idparent=" . $idM . " ORDER BY libelle_fr ASC";
        //echo$reqM;
        $repM = $this->com->query($reqM);
        while ($menuM = $repM->fetch(PDO::FETCH_ASSOC)) {
            $idmenuM = $menuM['idmenu'];
            $nombreSousMenuReq = "SELECT COUNT(idmenu) FROM menu WHERE menu.idfils=2 AND menu.idparent='$idmenuM'";
            $nombreSousMenuRep = $this->com->query($nombreSousMenuReq);
            $nombreSousMenu = 0;
            while ($nb = $nombreSousMenuRep->fetch()) {
                $nombreSousMenu = $nb[0];
            }
            echo'<li class="submenu">
                    <a href="#"><i class="icon ' . $menuM["icon"] . '"></i>  <span> ' . $menuM["libelle_fr"] . '</span><span class="label label-success">'.$nombreSousMenu.'</span></a>
                            <ul>';

            $reqMn = "SELECT * FROM menu WHERE menu.idfils=2 AND menu.idparent='$idmenuM' ORDER BY idmenu ASC";
            $repMn = $this->com->query($reqMn);
            while ($menuMn = $repMn->fetch(PDO::FETCH_ASSOC)) {
                $idmenuMn = $menuMn['idmenu'];
                echo'<li><a href="app/controllers/httpcontroller.php?icon='.$menuM['icon'].'&titre='.$menuMn['titrevue'].'& page=' . $menuMn['fichierassocier'] . '& folder=' . $menuMn['dossierviews'] . '""><i class="icon ' . $menuMn["icon"] . '""></i>  ' . $menuMn['libelle_fr'] . '</a>';
                echo'</li>';
            }
            echo'</ul>
        </li>';
        }
    }
    function getMenu2($lang) {
        if (!isset($_SESSION['parent'])) {
            $idM = 1;
        } else {
            $idM = $_SESSION['parent'];
        }

        $reqM = "SELECT * FROM menu WHERE menu.idfils=2 and idparent=" . $idM . " ORDER BY libelle_fr ASC";
        //echo$reqM;
        $repM = $this->com->query($reqM);
        while ($menuM = $repM->fetch(PDO::FETCH_ASSOC)) {
            $idmenuM = $menuM['idmenu'];
            $nombreSousMenuReq = "SELECT COUNT(idmenu) FROM menu WHERE menu.idfils=3 AND menu.idparent='$idmenuM'";
            $nombreSousMenuRep = $this->com->query($nombreSousMenuReq);
            $nombreSousMenu = 0;
            while ($nb = $nombreSousMenuRep->fetch()) {
                $nombreSousMenu = $nb[0];
            }
            echo'<li class="submenu">
                                <a href="#"><i class="icon icon-th-list"></i> <span>' . $menuM["libelle_" . $lang] . '</span> <span class="label label-important">' . $nombreSousMenu . '</span></a>
                            <ul>';

            $reqMn = "SELECT * FROM menu WHERE menu.idfils=3 AND menu.idparent='$idmenuM' ORDER BY idmenu ASC";
            $repMn = $this->com->query($reqMn);
            while ($menuMn = $repMn->fetch(PDO::FETCH_ASSOC)) {
                $idmenuMn = $menuMn['idmenu'];
                echo'<li><a href="HttpControllers/index?page=' . $menuMn['fichierassocier'] . '& folder=' . $menuMn['dossierviews'] . '"><i class="fas ' . $menuMn["icon"] . '"></i>' . $menuMn['libelle_' . $lang] . '</a></li>';
            }
            echo'</ul>';
        }
    }
    function getModule1($lang) {
        $req = "SELECT * FROM menu WHERE menu.idfils=0 ORDER BY idmenu ASC";
        $rep = $this->com->query($req);
        while ($menu = $rep->fetch(PDO::FETCH_ASSOC)) {
            $idmenu = $menu['idmenu'];
            echo' <li class="bg_lb"> <a href="HttpControllers/index?module=' . $menu['idmenu'] . '"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> ' . $menu['libelle_' . $lang] . '</a> </li>';
        }
    }
    public function Is_True($List = array(), $nb, $v) {
        $feu = null;
        for ($i = 0; $i < $nb; $i++) {
            if ($List[$i] == $v) {
                $feu = 1;
                break;
            } else {
                $feu = 0;
            }
        }
        return $feu;
    }
    public function Is_True_Parent($idmenu, $idgroupeu) {
        $req = "SELECT count(DISTINCT menu.idmenu) FROM menu
    INNER JOIN groupeutilisateurmenu ON menu.idmenu = groupeutilisateurmenu.idmenu
    INNER JOIN groupeutilisateur ON groupeutilisateur.idgroupeutilisateur = groupeutilisateurmenu.idgroupeutilisateur
    WHERE menu.idfils=2 and menu.idparent='$idmenu'
    AND groupeutilisateur.idgroupeutilisateur='$idgroupeu'
    AND groupeutilisateurmenu.nivauaccess=1";
        $rep = $this->com->query($req);
        $max = null;
        while ($nb = $rep->fetch()) {
            $max = $nb[0];
        }
        if ($max == 0) {
            return 0;
        } else {
            return 1;
        }
    }
    public function setTitleForm($title) {
        $titre = "";
        $titre = '<div class="panel panel-info" style="color:#000000;height: 65px; background-color: #cae7ff;margin-top:-5%;">
            <center><h4>' . $title . '</h4></center>
        <center><i>Les champs comportant <span style="color: red">*</span> sont obligatoires</i></center>
        </div>';
        return $titre;
    }
    public function setTitleForm2($title) {
        $titre = "";
        $titre = '<div class="panel panel-info" style="color:#000000;height: 65px; background-color: #cae7ff;">
            <center><h4>' . $title . '</h4></center>
        <center><i>Les champs comportant <span style="color: red">*</span> sont obligatoires</i></center>
        </div>';
        return $titre;
    }
    public function setTitleForm1($title, $indication) {
        $titre = "";
        $titre = '<div class="panel panel-info" style="color:#000000;height: 80px; background-color: #cae7ff;margin-top: -2%;">
            <center><h4>' . $title . '</h4></center>
        <center><i>Les champs comportant <span style="color: red">*</span> sont obligatoires</i></center>
        <center><b>NB:</b>' . $indication . '</center>
        </div>';
        return $titre;
    }
    public function getdroit($id){
        $i=1;
        $j=0;
        $etat="";
        $re="SELECT * FROM menu WHERE idfils=0 ORDER  BY idmenu ASC ";
        $re=$this->com->query($re);
        while($menu=$re->fetch()) {
            echo"<div id='flip".$i."' style='background-color:gray;color:white;'><b>".$menu[3]."</b><span class='pull-rigth'><img></span></div>";
            $req = "SELECT * FROM menu WHERE (idfils=1 or idfils=6) and idparent='$menu[0]'";
            $rep = $this->com->query($req);
            echo '<div id="panel'.$i.'" style="padding-top: -2%;">';
            while ($menu1 = $rep->fetch()) {
                echo '<div id="sous" style="background-color: #01BDE3;color: white;">' . $menu1[3] . '</div>';
                $req1 = "SELECT DISTINCT menu.idmenu,menu.libelle_fr,groupeutilisateurmenu.nivauaccess FROM menu
  INNER JOIN groupeutilisateurmenu ON menu.idmenu = groupeutilisateurmenu.idmenu
WHERE idparent='$menu1[0]' and groupeutilisateurmenu.idgroupeutilisateur='$id' ORDER BY menu.libelle_fr asc";
                $rep1 = $this->com->query($req1);
                echo"<table id='' border='0' width='100%'>";
                echo"<tr id='trlistdroituser'>";
                while ($menu12 = $rep1->fetch()) {

                    echo"<td width='40%'>". $menu12[1] ."</td>";
                    if($menu12[2]==1){

                        echo"<td><input type='checkbox' class='droit' name='droit_".$menu12[0]."' checked/></td>";
                    }else{
                        echo"<td><input type='checkbox' class='droit' name='droit_".$menu12[0]."' /></td>";

                    }
                    if($j%2==1){
                        echo"</tr>";
                    }
                    $j++;
                }
                echo"</table>";
            }
            echo'</div>';
            echo'</div>';
            $i++;
        }
    }
    public function getModule($idg) {
        $langue = 'libelle_fr';
        $bbsm = 0;
        $Req_menu = "SELECT menu.idmenu, menu." . $langue . ", icon,lien FROM menu where menu.idfils=0 order by menu.libelle_fr";
        $Rep_menu = $this->com->query($Req_menu);
        while ($module = $Rep_menu->fetch()) {
                echo' <li class="' . $module['lien'] . '"> <a href="app\controllers\httpcontroller.php?module=' . $module['idmenu'] . '"> <i class="' . $module['icon'] . '"></i> <span class="label label-important"></span> ' . $module[$langue] . '</a> </li>';
        }
    }
    public function GetListeCampus() {
        $lg="libellecampus_".$_SESSION['lang'];
        $select = "<select name='campusAcad' id='campusAcad' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from campus order by idcampus ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idcampus'] . ">" . ucwords($data['codecampus']) . "==>" . ucwords($data[$lg]) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function getAnneeAcade() {
        $Req_menu = "SELECT * FROM annee_academique where annee_academique.statut=1";
        $Rep_menu = $this->com->query($Req_menu);
        $module = $Rep_menu->fetch(PDO::FETCH_ASSOC);
            echo$module['nomAC'];
    }
    public function getNbEudpreInscrit() {
        $Req_menu = "select count(idetudiant) as nbpe from preinscription where idannee in(
  SELECT id FROM annee_academique where annee_academique.statut=1)";
        $Rep_menu = $this->com->query($Req_menu);
        $module = $Rep_menu->fetchAll();
        echo$module[0]['nbpe'];
    }
    public function getNbEudInscrit() {
        $Req_menu = "select count(idetudiant) as nbe from preinscription where is_inscrit=1 and idannee in(
  SELECT id FROM annee_academique where annee_academique.statut=1)";
        $Rep_menu = $this->com->query($Req_menu);
        $module = $Rep_menu->fetchAll();
        echo$module[0]['nbe'];
    }
    public function getNbEnseignat() {
        $Req_menu = "select count(id) as nbe from enseignant where etat=1";
        $Rep_menu = $this->com->query($Req_menu);
        $module = $Rep_menu->fetchAll();
        echo$module[0]['nbe'];
    }
    public function GetListeGroupeUtlisateur() {
        $lang = 1;
        if ($_SESSION['lang'] == 'fr')
            $lang = 1;
        else
            $lang = 2;
        $select = "<select name='groupeU' id='groupeU' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from groupeutilisateur where etatgroupe=1";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idgroupeutilisateur'] . ">" . ucwords($data['libellegroupeutilisateur']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeCursus() {

        $select = "<select name='idcursus' id='idcursus' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from cursus ";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idcursus'] . ">" . ucwords($data['codecursus']) . "==>" . ucwords($data['libellecursus']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeAnneeAcad() {

        $select = "<select name='anneeAcad' id='anneeAcad' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from annee_academique order by id ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['nomAC']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeTypeOp() {

        $select = "<select name='typeop' id='typeop' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from type_operation order by idtype_operation ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idtype_operation'] . ">" . ucwords($data['libelletype_operation']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListePeriode() {

        $select = "<select name='codeperiode' id='codeperiode' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from periode order by Idperiode ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['Idperiode'] . ">" . ucwords($data['codeperiode']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeFiliere() {
        $id=$_SESSION['campus'];

        $select = "<select name='filiereAcad' id='filiereAcad' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from filiere 
  WHERE filiere.idcampus=$id
order by id ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['cycle']) . "==>" . ucwords($data['codeFil']) . "=>" . ucwords($data['nomFil']) . "</option>";
        }
        $select .="</select>";
        return $select;

    } public function GetListeFiliere1() {
        $id=$_SESSION['campus'];

        $select = "<select name='filiereAcad1' id='filiereAcad1' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from filiere 
  WHERE filiere.idcampus=$id
order by id ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['cycle']) . "==>" . ucwords($data['codeFil']) . "=>" . ucwords($data['nomFil']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetSClasse() {

        $select = "<select name='classelmd' id='classelmd' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from classelmd order by idclasselmd ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idclasselmd'] . ">" . ucwords($data['libelleclasselmd']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetFiliereByCampus($id) {
        $select = "<select name='filiereAcad' id='filiereAcad' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from filiere 
  INNER JOIN campusfiliere on campusfiliere.idfiliere=filiere.id
  WHERE campusfiliere.idcampus=$id
order by id ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['codeFil']) . "=>" . ucwords($data['nomFil']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetSpeciliateByFiliere($id) {
        $select = "<select name='specialite' id='specialite' required class='form-control'>";
        $select .= "<option value='-1' selected>----------------------------------------</option>";
        $requete = "select * from specialite where id_filiere = $id order by nomSP ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
          //  print_r($data);
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['codeSP']) . "=>" . ucwords($data['nomSP']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetInfoPeriode($id) {
        $select ='';
        $requete = "select * from periode where Idperiode = $id order by codeperiode ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_NUM)) {
            //  print_r($data);
            $select .= ' 
            <tr>
                <td>Date debut</td>
                <td><input class="" type="date" name="datedb" id="datedb" value="' . $data[3] . '" required=""></td>
            </tr>
            <tr>
                <td>Date fin</td>
                <td><input class="" type="date" name="datefn" id="datefn" value="' . $data[4] . '" required=""></td>
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
                        Enregistrer<span class="icon-ok"></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class="icon-remove"></span>
                    </button>
                </td>
            </tr>';
        }
        return $select;

    }
    public function GetSpeciliateByFiliereFin($id) {
        $select = "<select name='specialitefin' id='specialitefin' required class='form-control'>";
        $select .= "<option value='-1' selected>----------------------------------------</option>";
        $requete = "select * from specialite where id_filiere = $id order by nomSP ASC";
        $requete = $this->com->query($requete);
       // echo $requete;
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['codeSP']) . "=>" . ucwords($data['nomSP']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetSemestreBySpecialite($id) {

        $select = "<select name='semestreAcad' id='semestreAcad' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from semestrelmd
  inner join classesemestrelmd on classesemestrelmd.idsemestre=semestrelmd.idsemestrelmd
  inner join classelmd on classelmd.idclasselmd=classesemestrelmd.idclasselmd
  inner join specialiteclasselmd on specialiteclasselmd.idclasselmd=classelmd.idclasselmd
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
  where specialite.id=$id order by semestrelmd.libellesemestrelmd ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idsemestrelmd'] . ">" . ucwords($data['codesemestrelmd']) . "=>" . ucwords($data['libellesemestrelmd']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }  
	public function GetSemestreE() {

        $select = "<select name='semestreAcad11' id='semestreAcad11' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from semestrelmd order by semestrelmd.libellesemestrelmd ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
			if($data['idsemestrelmd']%2<>0){
            $select .= "<option value=" . $data['idsemestrelmd'] . ">" . ucwords($data['codesemestrelmd']) . "=>" . ucwords($data['libellesemestrelmd']) . "</option>";
			}
		}
        $select .="</select>";
        return $select;

    }
    public function Getmatiere($id,$ids) {

        $select = "";
        $select .= " <tr><td>Matiere</td>";
        $select .= "<td>";
        $select .= "<select name='matiereAcad' id='matiereAcad' required>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select distinct iduvmatiere, codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,nbcreditsue,notevaliduvmatiere,noteelimuvmatiere  from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
  where semestrelmd.idsemestrelmd =$id and specialite.id=$ids
  order by codeuvmatiere ASC;";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['iduvmatiere'] . ">" . ucwords($data['codeuvmatiere']) . "=>" . ucwords($data['libelle_fr_uvmatiere']) . "</option>";
        }
        $select .="</select>";
        $select .="</td></tr>";
        $select.="<tr>
            <td>Examen</td>
            <td>
                <select name='poidsexamen' id='poidsexamen'>
                    <option value='0'>0</option>
                    <option value='10'>10</option>
                    <option value='20'>20</option>
                    <option value='30'>30</option>
                    <option value='40'>40</option>
                    <option value='50'>50</option>
                    <option value='60'>60</option>
                    <option value='70' selected>70</option>
                    <option value='80'>80</option>
                    <option value='90'>90</option>
                    <option value='100'>100</option>
                </select>
            </td>
        </tr>";
        $reqs="select * from session where idsession=".$ids."";
        $reps=$this->com->query($reqs);
        $session=$reps->fetchAll();
            $select.=" <tr>
            <td>Controle continu</td>
            <td>
                <select name='poidscc' id='poidscc'>
                    <option value='0'>0</option>
                    <option value='10'>10</option>
                    <option value='20'>20</option>
                    <option value='30' selected>30</option>
                    <option value='40'>40</option>
                    <option value='50'>50</option>
                    <option value='60'>60</option>
                    <option value='70'>70</option>
                    <option value='80'>80</option>
                    <option value='90'>90</option>
                    <option value='100'>100</option>
                </select>
            </td>
        </tr>";


        return $select;

    }
    public function GetListSessionNormale($id,$ida){
        $req='select distinct idsession,codesession,libellesession from session
  inner join tlisttypesession on tlisttypesession.idtlisttypesession=session.idtypesession
  where session.idanneeacademique='.$ida.' and session.idtypesession<>'.$id.' order by libellesession ASC';
        $data='<td>session rattache</td>';
        $rep=$this->com->query($req);
        while($l=$rep->fetch()){
           $data.='
                     <th><span class="">'.$l[1].'=>'.$l[2].'</span>&nbsp;&nbsp;<input type="checkbox" name="sessionN_'.$l[0].'" id="sessionR"></th>
            ';
        }
        return $data;
    }
    public function GetListEtudiant($id,$ids) {
        $i=1;
        $listeetudiant='';
        $select = "";
        $select .= '
        <div id="listeetudiant" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des etudiants inscrit dans la classe</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeetudiant"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Matricule</th>
                        <th>Nom(s) et prenom(s)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select distinct preinscription.idetudiant,etudiant.matriculeEt,etudiant.nomEt,etudiant.prenomEt from etudiant
  inner join preinscription on preinscription.idetudiant=etudiant.id
  inner join specialite on specialite.id=preinscription.idspecialite
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join annee_academique on annee_academique.id=preinscription.idannee
  where specialite.id=$ids and annee_academique.id=$id";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeetudiant.=$data[0];

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['matriculeEt'].'</td>
                            <td>'.strtoupper($data['nomEt']).' '.ucfirst($data['prenomEt']).'</td>
                            <td class="controls"><center><input type="checkbox" class="checkboxet" name="'.$data[0].'_inscrit" /></center></td>
                    </tr>';

            $i++;
            $listeetudiant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
    public function affichenote($note){
        $valeur=null;
        if($note!=-1){
            $valeur=$note;
        }
        return$valeur;
    }
    public function affichechaine($ch){
        $valeur=null;
        if(strcmp($ch,'@')!=0){
            $valeur=$ch;
        }
        return$valeur;
    }
    public function afficheetatrequete($ch){
        $valeur=null;
        if(strcmp($ch,'NON TRAITE')==0){
            $valeur='icon icon-remove-circle';
        }else{
            $valeur='icon icon-ok';

        }
        return$valeur;
    }
    public function GetListEtudiantrequete($id,$ids,$idss,$ida) {
        $i=1;
        $listeetudiant='';
        $select = "";
        $select .= '
        <div id="" class="widget-box span12">
        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des etudiants ayant fait la requete</h5>
            </div>
            <div class="widget-content nopadding">
                <table id=""  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="20%">Matricule</th>
                        <th width="25%">Nom(s) et prenom(s)</th>
                        <th width="5%">UV / Cours</th>
                        <th width="10%">Etat</th>
                        <th colspan="4">Valeur</th>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td >CC</td>
                        <td >Examen</td>
                        <td >Anonymat</td>
                        <td >Action</td>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select distinct etudiant.id, matriculeEt,nomEt,prenomEt, uvmatiere.codeuvmatiere,uvmatiere.libelle_fr_uvmatiere,requette.statutrequette,evaluernoteetudiantpondere.cc,evaluernoteetudiantpondere.examen,evaluernoteetudiantpondere.anonymat from etudiant
  inner join requette on requette.idetudiant=etudiant.id
  inner join inscriptionacademique on inscriptionacademique.idetudiant=requette.idetudiant
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=inscriptionacademique.idcspecialiteclasse
  inner join specialite on specialite.id=inscriptionacademique.idcspecialiteclasse
  inner join annee_academique on annee_academique.id=inscriptionacademique.idanneeacademique
  inner join evaluernoteetudiantpondere on evaluernoteetudiantpondere.idetudiant=etudiant.id inner join uvmatiere on uvmatiere.iduvmatiere=requette.iduvmatiere
  where requette.idsession=$idss
        and requette.idsemestre=$id
        and inscriptionacademique.idanneeacademique=$ida
        and evaluernoteetudiantpondere.idspecialite=$ids";
        //echo($requete);
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeetudiant.=$data[0];

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['matriculeEt'].'</td>
                            <td>'.strtoupper($data['nomEt']).' '.ucfirst($data['prenomEt']).'</td>
                            <td><b>'.$data['libelle_fr_uvmatiere'].'</b></td>
                            <td class="controls"><center><i class="'.$this->afficheetatrequete($data['statutrequette']).'"></i></center></td>
                            <td class="controls"><center><input type="text" class="span4 cc_eval" name="'.$data[0].'_cc" value="'.$this->affichenote($data['cc']).'"/></center></td>
                            <td class="controls"><center><input type="text" class="span4 exam_eval" name="'.$data[0].'_exam" value="'.$this->affichenote($data['examen']).'" /></center></td>
                            <td class="controls"><center><input type="text" class="span4 anonymat_eval" name="'.$data[0].'_anonymat" value="'.$this->affichechaine($data['anonymat']).'" /></center></td>
                            <td class="controls"><center><button type="button" class="btn-success btn_valid" name="valid_'.$data[0].'"><i class="icon icon-ok"></i></button></center></td>
                    </tr>';

            $i++;
            $listeetudiant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
    public function GetEtudiant($ids) {
        $i=1;
        $listeetudiant='';
        $select = "";
        $select .= '
        <div id="listeetudiant" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des etudiants</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeetudiant"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Matricule</th>
                        <th>Nom(s) et prenom(s)</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from etudiant
  where nomEt like ('%".$ids."%') or matriculeEt like ('%".$ids."%') or prenomEt like ('%".$ids."%') order by id ASC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeetudiant.=$data[0];

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['matriculeEt'].'</td>
                            <td>'.strtoupper($data['nomEt']).' '.ucfirst($data['prenomEt']).'</td>
                            <td class="controls" style="display:none;"><input name="infoetud" id="infoetud" value="'.$data['id'].'"></td>
                            <td class="controls">';
            $reqclasse="select distinct codeclasselmd,classelmd.idclasselmd  from preinscription
  inner join etudiant on etudiant.id=preinscription.idetudiant
  inner join classesemestrelmd on classesemestrelmd.idsemestre=preinscription.idsemestre
  inner join classelmd on classelmd.idclasselmd=classesemestrelmd.idclasselmd
where etudiant.id=".$data['id']."";
          //s  echo($reqclasse);
            $repclasse = $this->com->query($reqclasse);
            while ($dataclasse = $repclasse->fetch()) {
            $select .= '<a href="app/views/Examen/E_imprimeReleves.php?idetud='.$data['id'].'&c='.$dataclasse[1].'" target="t" class=""><img src="assets/img/icons/32/survey.png"/> '.$dataclasse[0].'</a>';
            }
            //<center><button type="button" id="getdocument" name="getdocument" class="btn-primary"><i class="icon-edit"></i></button>
            $select .= '</td></tr>';

            $i++;
            $listeetudiant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
    public function getNoteUV($id){
    $note=-1;
    $req="";
    $rep=$this->com->query($req);

        return$note;
}
    public function GetEtudiantScolarite($ids) {
        $i=1;
        $listeetudiant='';
        $select = "";
        $select .= '
        <div id="listeetudiant" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des etudiants</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeetudiant"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Matricule</th>
                        <th>Nom(s) et prenom(s)</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from etudiant
  where nomEt like ('%".$ids."%') or matriculeEt like ('%".$ids."%') or prenomEt like ('%".$ids."%') order by id ASC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeetudiant.=$data[0];

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['matriculeEt'].'</td>
                            <td>'.strtoupper($data['nomEt']).' '.ucfirst($data['prenomEt']).'</td>
                            <td class="controls" style="display:none;"><input name="infoetud" id="infoetud" value="'.$data['id'].'"></td>
                            <td class="controls">';
            $reqclasse="select distinct classelmd.idclasselmd,codeclasselmd 
from classelmd 
inner JOIN classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd 
inner join preinscription on preinscription.idsemestre=classesemestrelmd.idsemestre 
inner join etudiant on etudiant.id=preinscription.idetudiant
where etudiant.id=".$data['id']." and preinscription.is_inscrit=1";
        //    echo($reqclasse);
            $repclasse = $this->com->query($reqclasse);
            while ($dataclasse = $repclasse->fetch()) {
            $select .= '<a href="app/views/Inscription/E_imprimeCertificatScolarite.php?idetud='.$data['id'].'&c='.$dataclasse[0].'" target="t" class=""><img src="assets/img/icons/32/survey.png"/> '.$dataclasse[1].'</a>';
            }
            //<center><button type="button" id="getdocument" name="getdocument" class="btn-primary"><i class="icon-edit"></i></button>
            $select .= '</td></tr>';

            $i++;
            $listeetudiant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
    public function Getmatiereunique($id,$ids) {

        $select = "";
        $select .= " <tr><td>Matiere</td>";
        $select .= "<td>";
        $select .= "<select name='matiereAcad' id='matiereAcad' required>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  where semestrelmd.idsemestrelmd =$id and specialiteclasselmd.idspecialite=$ids
  order by codeuvmatiere ASC;";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['iduvmatiere'] . ">" . ucwords($data['codeuvmatiere']) . "=>" . ucwords($data['libelle_fr_uvmatiere']) . "</option>";
        }
        $select .="</select>";
        $select .="</td></tr>";
        return $select;

    }
    public function getStatutMatiereProg($ids,$idsp,$idm){
        $statut="";

        return $statut;
    }
    public function GetmatiereuniqueAll($id,$ids) {

        $i=1;
        $select = "";
        $select .= " <tr><td colspan='5'><center><b>Matiere du programme</b></center></td></tr>";
        $requete = "select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  where semestrelmd.idsemestrelmd =$id and specialiteclasselmd.idspecialite=$ids
  order by codeuvmatiere ASC;";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch(PDO::FETCH_ASSOC)) {
            $select .="
            <tr class='text-center' style='background-color: white'>
                <td>".$i."</td>
                <td>".$data['codeuvmatiere']."</td>
                <td>".$data['libelle_fr_uvmatiere']."</td>
                <td><input class='checkbox' name='mat_".$data['iduvmatiere']."' type='checkbox'></td>
                <td></td>
            </tr>
            ";
            $i++;
        }
        return $select;

    }
    public function NombreAnonymat($idmat,$idsmtr,$idsess,$idsp){
        $req="SELECT count(idetudiant) FROM evaluernoteetudiant
WHERE idsemestre=$idsmtr
      and idsession=$idsess
      and notefinale<>-1
      and idspecialite=$idsp
      and iduvmatiere=$idmat";
      //  echo $req;
        $rep=$this->com->query($req);
        $nbA=$rep->fetchAll();
        return $nbA[0][0];
    }
    public function GetListmatiere($id,$ida,$idsp,$idss){

        $sortie="";
$sortie.='
<fieldset>
    <table class="" width="150%" border="1">
        <thead class="titreform">
        <tr style="background-color: lightblue;">
            <td colspan="5">
                <center>Informations sur les épreuves</center>
            </td>
        </tr>
        <tr>
            <td class="" width="4%"><span class=""></span>N°</td>
            <td class=""><span class=""></span>Code Matiere</td>
            <td class=""><span class=""></span>Libelle Matiere</td>
            <td class=""><span class=""></span>Nbre Anonymat</td>
            <td class=""><span class=""></span>Action</td>
        </tr>
        </thead>
        <tbody class="bodyt2">';
        $i=1;
        $r=0;
        $nba=0;
        $req_listepreuve="SELECT DISTINCT uvmatiere.iduvmatiere,uvmatiere.codeuvmatiere,uvmatiere.libelle_fr_uvmatiere
FROM uvmatiere
  INNER JOIN ue_uv ON ue_uv.iduv=uvmatiere.iduvmatiere
  INNER JOIN uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  INNER JOIN programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  INNER JOIN programmeannuel ON programmeannuel.idprogrammeannuel=programmeue.idprogramme
  INNER JOIN programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  INNER JOIN specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
WHERE programmadopte.idsemestre=$id
      and specialiteclasselmd.idspecialite=$idsp
      and programmadopte.idanneeacademique=$ida ORDER BY uvmatiere.codeuvmatiere ASC";
//echo $req_listepreuve;
        $repp=$this->com->query($req_listepreuve);
        while($mat=$repp->fetch(PDO::FETCH_NUM)){
            $nba=$this->NombreAnonymat($mat[0],$id,$idss,$idsp);
            $sortie.="<tr>
                        <td>".$i."</td>
                        <td>".$mat[1]."</td>
                        <td>".$mat[2]."</td>
                        <td>".$nba."</td>";
            if($nba>0){
                $sortie.="<td><input type='checkbox' checked></td>";
            }else{
                $sortie.="<td><input type='checkbox'></td>";
            }
            $sortie.="</tr>";
            $i++;
        }

        $sortie.='      
       </tbody>
    </table>
</fieldset>';
        return $sortie;
    }
    public function GetmatiereuniquePoids($id,$idp,$ids) {

        $select = "";
        $select .= " <tr><td>Matiere</td>";
        $select .= "<td>";
        $select .= "<select name='matiereAcad' id='matiereAcad' required>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  where semestrelmd.idsemestrelmd =$id and programmadopte.idspecialiteclasse=$idp
  order by codeuvmatiere ASC;";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['iduvmatiere'] . ">" . ucwords($data['codeuvmatiere']) . "=>" . ucwords($data['libelle_fr_uvmatiere']) . "</option>";
        }
        $select .="</select>";
        $select .="</td></tr>";
        $reqs="SELECT * FROM session
  inner join tlisttypesession on idtlisttypesession=session.idtypesession
where session.idsession=$ids";
        $reps=$this->com->query($reqs);
        $types=$reps->fetchAll();
        $select .="<tr>";
        $select .="<td>Examen</td>";
        $select .="<td><input type='text' class='span4' name='poidsexamen' id='poidsexamen'></td>";
        $select .="</tr><tr>";
        if($types[0][4]==1){
            $select .="<td>Controle Continu</td>";
            $select .="<td><input type='text' class='span4' name='poidscc' id='poidscc'></td>";
        }
        $select .="</tr>";
        return $select;

    }
    public function GetSemestre() {

        $select = "<select name='semestreAcad' id='semestreAcad' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from semestrelmd order by semestrelmd.libellesemestrelmd ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idsemestrelmd'] . ">" . ucwords($data['codesemestrelmd']) . "=>" . ucwords($data['libellesemestrelmd']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetMatiereRecond(){

    }
    public function GetSessionByAnnee($id) {

        $select = "<select name='sessioncad' id='sessioncad' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from session where session.idanneeacademique=$id order by session.idsession ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idsession'] . ">" . ucwords($data['libellesession']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeUtlisateuNiveau($idg) {

        $select = "<select name='ListUser' id='ListUser' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from utilisateur where idgroupeutilisateur=".$idg."";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idutilisateur'] . ">" . ucwords($data['nom']) . " " . ucwords($data['prenom']) . "</option>";
        }
        $select .="</select>";
        return $select;
    }
    public function GetListeUser() {
        $req="select * from utilisateur INNER JOIN groupeutilisateur on groupeutilisateur.idgroupeutilisateur=utilisateur.idgroupeutilisateur
 ORDER BY utilisateur.idgroupeutilisateur ASC ";
        $rep=$this->com->query($req);
        while ($u=$rep->fetch(PDO::FETCH_NUM)){
            echo "
<form method='post' action=''>
            <tr>
                <td>".$u[13]." ".$u[14]."</td>
                <td>".$u[6]." ".$u[7]."</td>
                <td>".$u[3]."</td>
                <td hidden><input name='iduser' type='text' value='".$u[0]."'></td>
                <td><button class='btn btn-success' type='submit'>Reset</button></td>
            </tr>
      </form>      
            ";
        }
    }
    public function GetListeUtlisateur($idg) {

        $select = "<select name='ListUser' id='ListUser' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from utilisateur where idgroupeutilisateur=".$idg."";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idutilisateur'] . ">" . ucwords($data['nom']) . " " . ucwords($data['prenom']) . "</option>";
        }
        $select .="</select>";
        return $select;
    }
    public function GetEtatUser($idg) {
        $select=null;
        $requete = "select etatcopte from utilisateur where idutilisateur=".$idg."";
        $requete = $this->com->query($requete);
        $data = $requete->fetchAll(PDO::FETCH_NUM);
            if($data[0]==1){
                $select ="Active";
            }else{
                $select ="Desactive";
            }
        return $select;

    }
    public function getdroitGpUser($id) {
        $i = 1;
        $j = 0;
        $lib="libelle_fr";
        $etat = "";
        $nombreSousMenu=null;
        $re = "SELECT distinct menu.idmenu, menu.libelle_fr FROM menu
               inner join menu m on m.idparent=menu.idmenu
               inner join menu md on md.idparent=m.idmenu
               inner join groupeutilisateurmenu on groupeutilisateurmenu.idmenu=md.idmenu
               WHERE menu.idfils=0 and groupeutilisateurmenu.idgroupeutilisateur=".$id."
               and menu.idparent=0 ORDER  BY menu.idmenu ASC";
        $re = $this->com->query($re);
        while ($menu = $re->fetch()) {
            echo"<div id='flip" . $i . "' style='background-color:gray;color:white;'><b>" . $menu[1] . "</b><span class='pull-rigth'><img></span></div>";
            $req = "SELECT * FROM menu WHERE idfils=2 and idparent='$menu[0]'";
            $rep = $this->com->query($req);
            echo '<div id="panel' . $i . '" style="padding-top: -2%;">';
            while ($menu1 = $rep->fetch()) {
                $nombreSousMenuReq = "SELECT count(distinct m.idmenu) FROM menu
                      inner join menu m on m.idparent=menu.idmenu
                      inner join groupeutilisateurmenu on groupeutilisateurmenu.idmenu=m.idmenu
                      WHERE menu.idfils=1 and groupeutilisateurmenu.idgroupeutilisateur=".$id."
                      and menu.idparent=".$menu[0]." and menu.idmenu=".$menu1['idmenu']."";
                //echo$nombreSousMenuReq;
                $nombreSousMenuRep = $this->com->query($nombreSousMenuReq);
                $nombreSousMenu = 0;
                while ($nb = $nombreSousMenuRep->fetch()) {
                    $nombreSousMenu = $nb[0];
                }
                //  echo$nombreSousMenu;
                if($nombreSousMenu!=0){
                    echo '<div id="sous" style="background-color: #01BDE3;color: white;">' . $menu1[3] . '</div>';
                    $req1 = "SELECT DISTINCT menu.idmenu,menu.libelle_fr,libelle_en,nivauaccess FROM menu
                     inner join groupeutilisateurmenu on groupeutilisateurmenu.idmenu=menu.idmenu
                     WHERE groupeutilisateurmenu.idgroupeutilisateur=".$id." and idparent=".$menu1[0]." and idfils=2 ORDER BY menu.libelle_fr asc";
                    //echo $req1 ;
                    $rep1 = $this->com->query($req1);
                    echo"<table id='' border='0' width='100%'>";
                    echo"<tr id='trlistdroituser'>";
                    while ($menu12 = $rep1->fetch()) {
                        echo"<td width='40%'>" . $menu12[$lib] . "</td>";
                        if ($menu12['nivauaccess'] == 1) {

                            echo"<td><input type='checkbox' class='droit' name='droit_" . $menu12[0] . "' checked/></td>";
                        } else {
                            echo"<td><input type='checkbox' class='droit' name='droit_" . $menu12[0] . "'/></td>";
                        }

                        if ($j % 2 == 1) {
                            echo"</tr>";
                        }
                        $j++;
                    }
                    echo"</table>";
                }
            }
            echo'</div>';
            echo'</div>';
            $i++;
        }
    }
    /*
     * Franc et Dialo
     * */
    /* function franck */
    public function GetListeUvMatiere() {
        $lang = 1;
        if ($_SESSION['lang'] == 'fr')
            $lang = 1;
        else
            $lang = 2;
        $select = "<select name='UvMatiere' id='UvMatiere' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from uvmatiere order by codeuvmatiere ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['iduvmatiere'] . ">" . ucwords($data['codeuvmatiere']) . "=>" . ucwords($data['libelle_fr_uvmatiere']) . " =>" . ucwords($data['ncredis']) . "</option>";
        }
        $select .="</select>";
        return $select;
    }
    public function GetListeUniteEnsiegnement() {
        $lang = 1;
        if ($_SESSION['lang'] == 'fr')
            $lang = 1;
        else
            $lang = 2;
        $select = "<select name='UniteEnseignement' id='UniteEnseignement' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from uniteenseignement order by codeuniteenseignement ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['iduniteenseignement'] . ">" . ucwords($data['codeuniteenseignement']) . "=>" . ucwords($data['libelleuniteenseignement']) . " =>" . ucwords($data['nbcreditsue']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeProgramme() {
        $lang = 1;
        if ($_SESSION['lang'] == 'fr')
            $lang = 1;
        else
            $lang = 2;
        $select = "<select name='programme' id='programme' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from programmeannuel";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idprogrammeannuel'] . ">" . ucwords($data['codeprogrammeannuel']) . "=>" . ucwords($data['libelleprogrammeannuel']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
	
	public function getListAttributProgramme($champs){
        $select="";
        $select.="<select>";
        $req=" SELECT distinct COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS as col
 WHERE TABLE_NAME = 'programmeannuel'  and col.column_name = 'codeprogrammeannuel'
 or col.column_name = 'libelleprogrammeannuel' 
 ";
        $attr =  $this->com->query($req);
        $attrs = array();
        while ($row = $attr->fetch()) {
            if ($row[0] === $champs) {
                $select .= "<option value=" . $row[0] . " selected>" . $row[0] . "</option>";
            } else {

                $select .= "<option value=" . $row[0] . ">" . $row[0] . "</option>";
            }
        }
        // $attrs[] = $row['Field'];
        $select.="</select>";
        return $select;
    }
	
	
	
	public function getListAttributUniteEnseignement($champs){
        $select="";
        $select.="<select>";
        $req=" SELECT distinct COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS as col
 WHERE TABLE_NAME = 'uniteenseignement'  and col.column_name = 'codeuniteenseignement'
 or col.column_name = 'libelleuniteenseignement' or col.column_name = 'nbcreditsue'
 or col.column_name = 'notevalidationue' or col.column_name = 'noteeleminerue'
 or col.column_name = 'libelleeuniteenseignementlg2'
 ";
        $attr =  $this->com->query($req);
        $attrs = array();
        while ($row = $attr->fetch()) {
            if ($row[0] === $champs) {
                $select .= "<option value=" . $row[0] . " selected>" . $row[0] . "</option>";
            } else {

                $select .= "<option value=" . $row[0] . ">" . $row[0] . "</option>";
            }
        }
        // $attrs[] = $row['Field'];
        $select.="</select>";
        return $select;
    }
	
	
	public function getListAttributMatiere($champs){
        $select="";
        $select.="<select>";
        $req=" SELECT distinct COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS as col
 WHERE TABLE_NAME = 'uvmatiere'  and col.column_name = 'codeuvmatiere'
 or col.column_name = 'libelle_fr_uvmatiere' or col.column_name = 'libelle_en_uvmatiere'
 or col.column_name = 'ncredis' or col.column_name = 'notevaliduvmatiere'
 or col.column_name = 'noteelimuvmatiere' or col.column_name = 'vlmhoraire'
 ";
        $attr =  $this->com->query($req);
        $attrs = array();
        while ($row = $attr->fetch()) {
            if ($row[0] === $champs) {
                $select .= "<option value=" . $row[0] . " selected>" . $row[0] . "</option>";
            } else {

                $select .= "<option value=" . $row[0] . ">" . $row[0] . "</option>";
            }
        }
        // $attrs[] = $row['Field'];
        $select.="</select>";
        return $select;
    }
    public function GetListeSpecialite() {

        $select = "<select name='specialite' id='specialite' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select DISTINCT specialite.id, codeSP,nomSP,codecursus from specialite 
                    INNER JOIN filiere on filiere.id=specialite.id_filiere
                    INNER JOIN cursus on cursus.idcursus=filiere.idcursus
                    order by codecursus,codeSP ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['codecursus']) . "==>" . ucwords($data['codeSP']) . "=>" . ucwords($data['nomSP']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeClasseLmd() {

        $select = "<select name='classelmd' id='classelmd' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from classelmd order by idclasselmd ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idclasselmd'] . ">" . ucwords($data['libelleclasselmd']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeSemestre() {

        $select = "<select name='semestrelmd' id='semestrelmd' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from semestrelmd order by idsemestrelmd ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idsemestrelmd'] . ">" . ucwords($data['libellesemestrelmd']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeEnseignant() {

        $select = "<select name='enseignant' id='enseignant' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from enseignant order by id ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['id'] . ">" . ucwords($data['nomEns']) . "</option>";
        }
        $select .="</select>";
        return $select;
    }
    public function GetListeSession() {

        $select = "<select name='session' id='session'  class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from session order by idsession ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idsession'] . ">" . ucwords($data['codesession']) . "=>" . ucwords($data['libellesession']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeTypeSession() {

        $select = "<select name='typesession' id='typesession' required class='form-control'>";
        $select .= "<option value='-1'>----------------------------------------</option>";
        $requete = "select * from tlisttypesession order by idtlisttypesession ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['idtlisttypesession'] . ">" . ucwords($data['libelletlisttypesession']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function GetListeNiveau() {

        $select = "<select name='niveau' id='niveau' required class='form-control'>";
        $select .= "<option value='niveau 0'>----------------------------------------</option>";
        $requete = "select * from niveau order by libelleniveau ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<option value=" . $data['libelleniveau'] . ">" . ucwords($data['libelleniveau']) . "</option>";
        }
        $select .="</select>";
        return $select;

    }
    public function getListAttributEtudiant($champs){
        $select="";
        $select.="<select>";
        $req=" SELECT distinct COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS as col
 WHERE TABLE_NAME = 'etudiant'  and col.column_name = 'matriculeEt'
 or col.column_name = 'nomEt' or col.column_name = 'prenomEt'
 or col.column_name = 'dateNaissEt' or col.column_name = 'lieuNaissEt'
 or col.column_name = 'adresseEt' or col.column_name = 'telephoneEt'
 or col.column_name = 'nationaliteEt' or col.column_name = 'sexeet' or col.column_name = 'handicape'
 or col.column_name = 'numcni'  or col.column_name = 'idregion'
 ";
        $attr =  $this->com->query($req);
        $attrs = array();
        while ($row = $attr->fetch()) {
            if ($row[0] === $champs) {
                $select .= "<option value=" . $row[0] . " selected>" . $row[0] . "</option>";
            } else {

                $select .= "<option value=" . $row[0] . ">" . $row[0] . "</option>";
            }
        }
        // $attrs[] = $row['Field'];
        $select.="</select>";
        return $select;
    }
    public function getMatricule(){
    $req="";
    $rep=$this->com->query($req);
    $dataAll=$rep->fetchAll();
        return $dataAll[0][0];
}
    public function getListAttributEvaluernote(){
        $select="";
        $select.="<select>";
        $req=" SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS as col
 WHERE TABLE_NAME = 'evaluernoteetudiant'  ";

        $attr =  $this->com->query($req);
        $attrs = array();
        while($row = $attr->fetch())
        {

            $select.="<option value=".$row[0].">".$row[0]."</option>";
        }
        // $attrs[] = $row['Field'];
        $select.="</select>";
        return $select;
    }
    //function franck
    public function GetListeAnneeAcadParam() {
        $icon="";
        $color = "";
        $blabel="";
        $select="";

        $select.='
         <div id="listeanneeacadParam" class="widget-box span9" style="margin-left: 14%">
         <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Annee Academique</h5>
                    </div>
                     <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                   <thead>
                        <tr>
                           <th width="5%">#</th>
                                <th>Annee Academique</th>
                                <th>Statut(s)</th>

                            </tr>
                     </thead>
                     <tbody>

                     ';

        $requete = "select * from annee_academique order by id DESC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            if ($data['statut']==1) {
                $blabel = "activé";
                $color="success";
                $icon="ok";
            }else{

                $blabel = "désactivé";
                $color="danger";
                $icon="";
            }
            $select .= "<tr>
                            <td>".$data['id']."</td>
                            <td>".$data['nomAC']."</td>
                            <td>
                            <center>
                                <form method='post'>
                                <input type='hidden' value='".$data['id']."' name='activeaneeacad'/>
                                <button type='submit' class='btn btn-".$color."'>".$blabel." <span class='icon-".$icon."'></span></button>
                                </form>
                            </center>
                            </td>
                        </tr>";
        }
        $select.= '</tbody>
            </table>
         </div>
         </div>';

        return $select;

    }

    public function GetListeEtudiantInsr() {

        $select="";

        $select.='
         <div id="listeetudiantinsr" class="widget-box span9" style="margin-left: 14%">
         <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Modification etudiant</h5><input type="text" aria-controls="DataTables_Table_0" id="myInput">
                    </div>
                     <div class="widget-content nopadding">
                <table class="table table-bordered table-striped data" id="myTable">
                   <thead>
                        <tr>
                           <th width="5%">#</th>
                                <th>Matricule</th>
                                <th>Nom</th>
                                 <th>Prenom</th>
                                 <th>Sexe</th>
                                 <th>Date de Naissance</th>
                                 <th>Lieu de naissance</th>
                                 <th>Action</th>
                            </tr>
                     </thead>
                     <tbody>

                     ';

        $requete = "select * from etudiant order by id asc";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<tr>
                            <td>".$data['id']."</td>
                            <td>".$data['matriculeEt']."</td>
                            <td>".$data['nomEt']."</td>
                            <td>".$data['prenomEt']."</td>
                            <td>".$data['sexeEt']."</td>
                            <td>".$data['dateNaissEt']."</td>
                            <td>".$data['lieuNaissEt']."</td>
                            <td>
                            <center>
                                <form target='t' method='post' action='app/views/Inscription/F_modificationEt.php'>
                                <input type='hidden' value='".$data['id']."' name='updateEt'/>
                                <a href='#myAlert' data-toggle='modal' class='btn btn-warning'>Modifier</a>
                                </form>
                            </center>
                            </td>
                        </tr>";
        }
        $select.= '</tbody>
            </table>
         </div>
         </div>
         ';

        return $select;

    }
    public function GetListeEnseignantParam(){

        $select = "";

        $select.='<div id="listeenseignant" class="widget-box span11" style="margin-top: 5%">
                <div class="widget-title span12"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des enseignants</h5>
                    </div>
                     <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                   <thead>
                        <tr>
                           <th >#</th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>sexe</th>
                            <th>Nationalie</th>
                            <th>Date de naissance</th>
                            <th>Lieu de naissance</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th >Domaine</th>
                         </tr>
                     </thead>
                     <tbody>

                     ';

        $requete = "select * from enseignant order by id ASC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            $select .= "<tr>
                            <td>".$data['id']."</td>
                            <td>".$data['matriculeEns']."</td>
                            <td>".$data['nomEns']."</td>
                            <td>".$data['prenomEns']."</td>
                            <td>".$data['sexeEns']."</td>
                            <td>".$data['nationaliteEns']."</td>
                            <td>".$data['dateNaissEns']."</td>
                            <td>".$data['lieuNaissEns']."</td>
                            <td>".$data['telephoneEns']."</td>
                            <td>".$data['adresseEns']."</td>
                            <td>".$data['domaineEns']."</td>
                        </tr>";
        }
        $select.= '</tbody>
            </table>
         </div>
         </div>';

        return $select;

    }
    public function SaveFile($folder,$name)
    {

        $dossier = $folder;
        $taille_maxi = 100000;
        $taille = filesize($_FILES[$name]['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES[$name]['name'], '.');
        $fichier = 'IMG-'.date('Y-m-d').'WA'.date('H:i:s').$extension;
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
            $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES[$name]['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {

            }
            else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';
            }
        }
        else
        {
            echo $erreur;
        }
        return $fichier;

    }
    //functions franck 14/02/2019
    public function GetEnseignantUpdate($ids) {
        $i=1;
        $listeenseignant='';
        $select = "";
        $select .= '
        <div id="listeenseignant" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des enseignants</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeenseignant"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Matricule</th>
                        <th>Nom(s) et prenom(s)</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from enseignant
  where nomEns like ('%".$ids."%') or matriculeEns like ('%".$ids."%') or prenomEns like ('%".$ids."%') order by id ASC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeenseignant.=$data[0];
         

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['matriculeEns'].'</td>
                            <td>'.strtoupper($data['nomEns']).' '.ucfirst($data['prenomEns']).'</td>
                            <td class="controls" style="display:none;"><input name="infoenseignant" id="infoenseignant" value="'.$data['id'].'"></td>
                            <td class="controls">
                                <a href="#'.$data['id'].'" data-toggle="modal" class="btn btn-warning">Modifier</a>
                                <form target="" method="post"  class="form-horizontal" action="">
                                <div id="'.$data['id'].'" class="modal hide">
                                <div class="modal-header">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3>Modifier information Enseignant</h3>
                                </div>
                                <div class="modal-body">
                                <center>
                                <input class="" type="hidden" value="'.$data['id'].'" name="id" id="id" required="">
                                   <table class="">
                                    <tr>
                                    <td>
                                    Matricule : </td>
                                <td><input class="" type="text" value="'.$data['matriculeEns'].'" name="matriculeEns" id="matriculeEns" required="">
                                </td></tr><td>Nom :
                                </td> <td><input class="" type="text" value="'.$data['nomEns'].'" name="nomEns" id="nomEns" required="">
                                </td></tr><td>Prenom : 
                                </td> <td><input class="" type="text" value="'.$data['prenomEns'].'" name="prenomEns" id="prenomEns" required="">
                                 </td></tr><td>Sexe : 
                                 </td> <td><input class="" type="text" value="'.$data['sexeEns'].'" name="sexeEns" id="sexeEns" required="">
                                 </td></tr><td> Domaine : 
                                 </td> <td> <input class="" type="text" value="'.$data['domaineEns'].'" name="domaineEns" id="domaineEns" required="">
                                 </td></tr><td> Nationalite : 
                                 </td> <td> <input class="" type="text" value="'.$data['nationaliteEns'].'" name="nationaliteEns" id="nationaliteEns" required="">
                                 </td></tr><td>Date de Naissance : 
                                 </td> <td><input class="" type="date" value="'.$data['dateNaissEns'].'" name="dateNaissEns" id="dateNaissEns" required="">
                                 </td></tr><td>Lieu de naissance : 
                                 </td> <td><input class="" type="text" value="'.$data['lieuNaissEns'].'" name="lieuNaissEns" id="lieuNaissEns" required=""></br>
                                 </td></tr><td>Adresse : 
                                 </td> <td><input class="" type="text" value="'.$data['adresseEns'].'" name="adresseEns" id="adresseEns" required=""></br>
                                 </td></tr><td>Telephone : 
                                 </td> <td><input class="" type="text" value="'.$data['telephoneEns'].'" name="telephoneEns" id="telephoneEns" required=""></br>
                                 </td></tr><td>etat : 
                                 </td> <td><select class="" name="etat" id="etat" required>
                                ';
                                 if($data['etat']==0)
                                 {
                                    $select .='
                                     
                                     <option value="0">Desactiver</option>
                                          <option value="1">Actif</option>
                                          </select>';
                                 }else{
                                    $select .='
                
                                    <option value="1" value="-1">Activer</option>
                                         <option value="0">Desactiver</option>
                                         ';
                                 }
                                 $select .='
                                 </select>
                                 </td></tr><td>Diplome eleve : 
                                 </td> <td><input class="" type="text" value="'.$data['diplome_eleve'].'" name="diplome_eleve" id="diplome_eleve" required=""></br>
                                 </td></tr></table></center>
                                </div>
                                <div class="modal-footer"> 
                                <input type="submit" value="Enregistrer" class="icon-ok btn btn-success" >
                                <a data-dismiss="modal" class="btn btn-danger" href="#"> Annuler </a> </div>
                            </div>
                            <form>
                           
                                </td>

                         </tr>';

            $i++;
            $listeenseignant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
//modifier unite d enseignement
    public function GetUeUpdate($ids) {
        $i=1;
        $listeenseignant='';
        $select = "";
        $select .= '
        <div id="listeue" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des unites d enseignement</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeue"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Code</th>
                        <th>Libelle(s)</th>
                        <th>Credits</th>
                        <th>Note nalidation</th>
                        <th>Note eliminee</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from uniteenseignement
  where codeuniteenseignement like ('%".$ids."%') or libelleuniteenseignement like ('%".$ids."%') order by iduniteenseignement DESC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeenseignant.=$data[0];
         

            $select .= '<tr class="odd gradeX">
            <td>'.$i.'</td>
            <td>'.$data['codeuniteenseignement'].'</td>
            <td>'.strtoupper($data['libelleuniteenseignement']).'
            <td>'.$data['nbcreditsue'].'</td>
            <td>'.$data['notevalidationue'].'</td>
            <td>'.$data['noteeleminerue'].'</td> 
            <td class="controls">
            <center><form method="post" action="">
            <input type="hidden" value="'.$data['iduniteenseignement'].'" name="iduniteenseignement"/>
            <button type="submit" class="btn btn-inverse"><i class=" icon-edit"></i> Modifier  </button>
            </form><center>
                </td>

         </tr>';

            $i++;
            $listeenseignant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
    //update unite de valeur
    public function GetUvUpdate($ids) {
        $i=1;
        $listeenseignant='';
        $select = "";
        $select .= '
        <div id="listeue" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des unites de valeur</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeue"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Code</th>
                        <th>Libelle(s)</th>
                        <th>Credits</th>
                        <th>Note validation</th>
                        <th>Note Eliminatoire</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from uvmatiere
  where codeuvmatiere like ('%".$ids."%') or libelle_fr_uvmatiere like ('%".$ids."%') order by iduvmatiere ASC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeenseignant.=$data[0];
         

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['codeuvmatiere'].'</td>
                            <td>'.strtoupper($data['libelle_fr_uvmatiere']).' </td>
                            <td>'.$data['ncredis'].' </td>
                            <td>'.$data['notevaliduvmatiere'].' </td>
                            <td>'.$data['noteelimuvmatiere'].' </td>
                            <td class="controls" style="display:none;"><input name="infoenseignant" id="infoenseignant" value="'.$data['iduvmatiere'].'"></td>
                            <td class="controls">
                                <a href="#'.$data['iduvmatiere'].'" data-toggle="modal" class="btn btn-warning">Modifier</a>
                                <form target="" method="post"  class="form-horizontal" action="">
                                <div id="'.$data['iduvmatiere'].'" class="modal hide">
                                <div class="modal-header">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3>Modifier information unite de valeur</h3>
                                </div>
                                <div class="modal-body">
                                <center>
                                <input class="" type="hidden" value="'.$data['iduvmatiere'].'" name="iduvmatiere" id="iduvmatiere" required="">
                                   <table class="">
                                    <tr>
                                    <td>
                                    Code : </td>
                                <td><input class="" type="text" value="'.$data['codeuvmatiere'].'" name="codeuvmatiere" id="codeuvmatiere" required="">
                                </td></tr><td>Libelle :
                                </td> <td><input class="" type="text" value="'.$data['libelle_fr_uvmatiere'].'" name="libelle_fr_uvmatiere" id="libelle_fr_uvmatiere" required="">
                                 </td></tr><td> Credit(s) : 
                                 </td> <td><input class="" type="text" value="'.$data['ncredis'].'" name="ncredis" id="ncredis" required="">
                                 </td></tr><td> Credit(s) : 
                                 </td> <td><input class="" type="text" value="'.$data['notevaliduvmatiere'].'" name="notevaliduvmatiere" id="notevaliduvmatiere" required="">
                                 </td></tr><td> Credit(s) : 
                                 </td> <td><input class="" type="text" value="'.$data['noteelimuvmatiere'].'" name="noteelimuvmatiere" id="noteelimuvmatiere" required="">
                                 </td></tr><td> Volume horaire: 
                                 </td> <td><input class="" type="text" value="'.$data['vlmhoraire'].'" name="vlmhoraire" id="vlmhoraire" required="">
                                
                                 </td></tr></table></center>
                                </div>
                                <div class="modal-footer"> 
                                <input type="submit" value="Enregistrer" class="icon-ok btn btn-success" >
                                <a data-dismiss="modal" class="btn btn-danger" href="#"> Annuler </a> </div>
                            </div>
                            <form>
                           
                                </td>

                         </tr>';

            $i++;
            $listeenseignant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
    // update etudiant
    public function GetEtudiantUpdate($ids) {
        $i=1;
        $listeetudiant='';
        $select = "";
        $select .= '
        <div id="listeetudiant" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des etudiants</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeetudiant"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Matricule</th>
                        <th>Nom(s) et prenom(s)</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from etudiant
  where nomEt like ('%".$ids."%') or matriculeEt like ('%".$ids."%') or prenomEt like ('%".$ids."%') order by id ASC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeetudiant.=$data[0];
         

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['matriculeEt'].'</td>
                            <td>'.strtoupper($data['nomEt']).' '.ucfirst($data['prenomEt']).'</td>
                            <td class="controls" style="display:none;"><input name="infoetud" id="infoetud" value="'.$data['id'].'"></td>
                            <td class="controls">
                                <a href="#'.$data['id'].'" data-toggle="modal" class="btn btn-warning">Modifier</a>
                                <form target="" method="post"  class="form-horizontal" action="">
                                <div id="'.$data['id'].'" class="modal hide">
                                <div class="modal-header">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3>Modifier information Etudiant</h3>
                                </div>
                                <div class="modal-body">
                                   
                                   <center>
                                    <input class="" type="hidden" value="'.$data['id'].'" name="id" id="id" required=""></br>
                                    <table>
                                    <tr>
                                    <td>
                                    Matricule : 
                                    </td><td><input class="" type="text" value="'.$data['matriculeEt'].'" name="matriculeEt" id="matriculeEt" required=""></br>
                                    </td></tr><tr><td> Nom : 
                                    </td><td><input class="" type="text" value="'.$data['nomEt'].'" name="nomEt" id="nomEt" required="">
                                    </td></tr><tr><td> Prenom : 
                                    </td><td> <input class="" type="text" value="'.$data['prenomEt'].'" name="prenomEt" id="prenomEt" required="">
                                    </td></tr><tr><td> Nationalite : 
                                    </td><td> <input class="" type="text" value="'.$data['nationaliteEt'].'" name="nationaliteEt" id="nationaliteEt" required="">
                                    </td></tr><tr><td> Sexe : 
                                    </td><td> <input class="" type="text" value="'.$data['sexeEt'].'" name="sexeEt" id="sexeEt" required="">
                                    </td></tr><tr><td> Date de naissance : 
                                    </td><td> <input class="" type="date" value="'.$data['dateNaissEt'].'" name="dateNaissEt" id="dateNaissEt" required="">
                                    </td></tr><tr><td> Lieu de naissance : 
                                    </td><td> <input class="" type="text" value="'.$data['lieuNaissEt'].'" name="lieuNaissEt" id="lieuNaissEt" required="">
                                    </td></tr><tr><td> Adresse : 
                                    </td><td> <input class="" type="text" value="'.$data['adresseEt'].'" name="adresseEt" id="adresseEt" required="">
                                    </td></tr><tr><td> Telephone : 
                                    </td><td> <input class="" type="text" value="'.$data['telephoneEt'].'" name="telephoneEt" id="telephoneEt" required="">
                                    
                                    </table>
                                    <center>
                                </div>
                                <div class="modal-footer"> 
                                <input type="submit" value="Enregistrer" class="icon-ok btn btn-success" >
                                <a data-dismiss="modal" class="btn btn-danger" href="#"> Annuler </a> </div>
                            </div>
                            <form>
                                </td>

                         </tr>';

            $i++;
            $listeetudiant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
    //update filiere
    public function GetFiliereUpdate($ids) {
        $i=1;
        $listefiliere='';
        $select = "";
        $select .= '
        <div id="listefiliere" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des filieres</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listefiliere"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="5%">Code</th>
                        <th>Libelle(s)</th>
                        <th>cycle(s)</th>
                        <th>etat(s)</th>
                        <th>cursus(s)</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from filiere
                    inner join cursus on cursus.idcursus = filiere.idcursus
                    where codeFil like ('%".$ids."%') or nomFil like ('%".$ids."%') order by id ASC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listefiliere.=$data[0];
         

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['codeFil'].'</td>
                            <td>'.strtoupper($data['nomFil']).' </td>
                            <td>'.strtoupper($data['cycle']).' </td>  
                            ';
                            if($data['etat']==0)
                            {
                               $select .='
                               <td> Desactiver </td>
                                ';
                            }else{
                               $select .='
           
                               <td> Active </td>
                                    ';
                            }
                            $select .=' 
                            <td>'.$data['libellecursus'].'</td>
                            <td class="controls">
                                <a href="#'.$data['id'].'" data-toggle="modal" class="btn btn-warning">Modifier</a>
                                <form target="" method="post"  class="form-horizontal" action="">
                                <div id="'.$data['id'].'" class="modal hide">
                                <div class="modal-header">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3>Modifier information  filiere</h3>
                                </div>
                                <div class="modal-body">
                                <center>
                                <input class="" type="hidden" value="'.$data['id'].'" name="id" id="id" required="">
                                   <table style="width:100%" class="">
                                    <tr>
                                    <td>
                                    Code : </td>
                                <td><input style="width:100%" class="" type="text" value="'.$data['codeFil'].'" name="codeFil" id="nomFil" required="">
                                </td></tr><td>Libelle :
                                </td> <td><input style="width:100%" class="" type="text" value="'.$data['nomFil'].'" name="nomFil" id="nomFil" required="">
                                </td></tr><td>Cycle :
                                </td> <td><input style="width:100%" class="" type="text" value="'.$data['cycle'].'" name="cycle" id="cycle" required="">
                                </td></tr><td>etat : 
                                </td> <td><select style="width:100%" class="" name="etat" id="etat" required>
                               ';
                                if($data['etat']==0)
                                {
                                   $select .='
                                    
                                    <option value="0">Desactiver</option>
                                         <option value="1">Actif</option>
                                         </select>';
                                }else{
                                   $select .='
               
                                   <option value="1" value="-1">Activer</option>
                                        <option value="0">Desactiver</option>
                                        ';
                                }
                                $select .='
                                </select>
                                </td></tr><td>Cursus : 
                                </td> <td><select style="width:100%" class="" name="cursus" id="cursus" required>
                               ';
                              
                                    $select .='
                                
                                     <option value="'.$data['idcursus'].'">'.$data['codecursus'].' =>'.$data['libellecursus'].'</option> ';

                                    $requete = "select * from cursus
                                    where idcursus != ".$data['idcursus']."
                                    ";
                                    $req = $this->com->query($requete);
                                    while ($data = $req->fetch()) {
                                         
                                       
                                        $select .='  <option value="'.$data['idcursus'].' ">'.$data['codecursus'].' =>'.$data['libellecursus'].'</option> ';
                                    }
                               
                                $select .='
                                </select>
                                 </td></tr></table></center>
                                </div>
                                <div class="modal-footer"> 
                                <input type="submit" value="Enregistrer" class="icon-ok btn btn-success" >
                                <a data-dismiss="modal" class="btn btn-danger" href="#"> Annuler </a> </div>
                            </div>
                            <form>
                           
                                </td>

                         </tr>';

            $i++;
            $listefiliere.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }
      //update programme
      public function GetProgrammeUpdate($ids) {
        $i=1;
        $listeenseignant='';
        $select = "";
        $select .= '
        <div id="listeue" class="widget-box span9" style="margin-left: 14%">
 <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Liste des programmes</h5>
            </div>
            <div class="widget-content nopadding">
                <table id="listeprogramme"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Code</th>
                        <th>Libelle(s)</th>
                        <th colspan="4">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
        $requete = "select * from programmeannuel
  where codeprogrammeannuel like ('%".$ids."%') or libelleprogrammeannuel like ('%".$ids."%') order by idprogrammeannuel ASC";
        $rep = $this->com->query($requete);
        while ($data = $rep->fetch()) {
            $listeenseignant.=$data[0];
         

            $select .= '<tr class="odd gradeX">
                            <td>'.$i.'</td>
                            <td>'.$data['codeprogrammeannuel'].'</td>
                            <td>'.strtoupper($data['libelleprogrammeannuel']).' 
                            <td class="controls">
                            <center><form method="post" action="">
                            <input type="hidden" value="'.$data['idprogrammeannuel'].'" name="idprogrammeannuel"/>
                            <button type="submit" class="btn btn-inverse"><i class=" icon-edit"></i> Modifier  </button>
                            </form><center>
                                </td>

                         </tr>';

            $i++;
            $listeenseignant.='$';
        }
        $select.='
                    </tbody>
                </table>
            </div></div>';


        return $select;

    }

    public function GetListePeriodeParam() {
        $icon="";
        $color = "";
        $blabel="";
        $select="";

        $select.='
         <div id="listePeriodeParam" class="widget-box span9" style="margin-left: 14%">
         <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5></h5>
                    </div>
                     <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                   <thead>
                        <tr>
                           <th width="5%">#</th>
                                <th>Annee Academique</th>
                                <th>Statut(s)</th>

                            </tr>
                     </thead>
                     <tbody>

                     ';

        $requete = "select * from annee_academique order by id DESC";
        $requete = $this->com->query($requete);
        while ($data = $requete->fetch(PDO::FETCH_ASSOC)) {
            if ($data['statut']==1) {
                $blabel = "activé";
                $color="success";
                $icon="ok";
            }else{

                $blabel = "désactivé";
                $color="danger";
                $icon="";
            }
            $select .= "<tr>
                            <td>".$data['id']."</td>
                            <td>".$data['nomAC']."</td>
                            <td>
                            <center>
                                <form method='post'>
                                <input type='hidden' value='".$data['id']."' name='activeaneeacad'/>
                                <button type='submit' class='btn btn-".$color."'>".$blabel." <span class='icon-".$icon."'></span></button>
                                </form>
                            </center>
                            </td>
                        </tr>";
        }
        $select.= '</tbody>
            </table>
         </div>
         </div>';

        return $select;

    }
}
