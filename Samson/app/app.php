<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/19/18
 * Time: 7:49 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Samson -> Tableau de bord</title>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets\css\bootstrap.min.css" />
    <link rel="stylesheet" href="assets\css\bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="assets\css\fullcalendar.css" />
    <link rel="stylesheet" href="assets\css\matrix-style.css" />
    <link rel="stylesheet" href="assets\css\matrix-media.css" />
    <link href="assets\font-awesome\css\font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets\css\jquery.gritter.css" />
    <link href='assets\css_init\font-googlr.css' rel='stylesheet' type='text/css'>
</head>
<body onload="date_heure('date_heure');">

<!--Header-part-->
<div id="header">
    <a href="" style="background-color: #646ae3"><h1>Samson&trade;</h1></a>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-fixed-top">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>
                <span class="text">Bienvenue <?php echo $_SESSION['civilite']." ".$_SESSION['nom']." ".$_SESSION['prenom'];?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#myModal2" data-toggle="modal" ><i class="icon-flag"></i>Mon Profil</a></li>
                <li class="divider"></li>
                <li><a href="app\controllers\httpcontroller.php?folder=Parametres&page=F_ModPasswdUtilisateur.php"><i class="icon-edit"></i>Modifier parametres de connexion</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="app\controllers\Logout.php"><i class="icon icon-off"></i> <span class="text">Deconnexion</span></a></li>
      <!--  <li class=""><a href="" title="Fr"><img class="" width="70%" src="assets/img/fr.png"></a></li>
        <li class=""><a href="" title="En"><img class="" width="70%" src="assets/img/en.png"></a></li>-->
    </ul>
</div>
<div id="sidebar"><a href="#" class="visible-phone">
        <i class="icon icon-home"></i> Tableau de bord</a>
    <ul>
        <li class="active"><a href="#"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<?php $function->getMenuAll();?>
    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
</div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<div class="container-fluid">
            <div id="myModal2" class="modal hide" style="background-color: rgb(208,229,242)">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Information Utilisateur</h3>
                </div>
                <div class="modal-body">
                    <p><span ><img class="img-rounded" width="100px" src="assets/img/user.jpg"/></span></p>
                    <p><span >Noms:<?php echo $_SESSION['nom'];?></span></p>
                    <p><span >Prenoms:<?php echo $_SESSION['prenom'];?></span></p>
                </div>
                <div class="modal-footer"><a data-dismiss="modal" class="btn btn-inverse" href="#">Cancel</a> </div>
            </div>
<div class="quick-actions_homepage">
    <div class="center">
        <ul class="stat-boxes2">
            <li>
                <div style=""><a href="app/controllers/httpcontroller.php?etab=1"  class="left"><center><img src="assets/img/LOGO_ISSTY.jpg" width="66px"/></center></a><a href="app/controllers/httpcontroller.php?etab=2" class="right "><center><img src="assets/img/LOGO_ISSEG.jpg" width="66px"/></center></a> </div>
            </li>
            <li>
                <div class="span" style=""><span class="left"><center><img src="assets\img\valide.jpg" width="66px"/></center></span><span class="right "><strong class="text-success"> <?php $function->getAnneeAcade();?></strong>En cours</span> </div>
            </li>
            <li>
                <div class=""><span class="left"><center><img src="assets\img\imagesjuuii.jpg" width="48px"/></center></span><span class="right"><strong class="text-success"> <?php $function->getNbEudpreInscrit();?></strong>Pre-Inscrit(s)</div>
            </li>
            <li>
                <div class=""><span class="left"><center><img src="assets\img\imagesjuuii.jpg" width="48px"/></center></span><span class="right"><strong class="text-success"> <?php $function->getNbEudInscrit();?></strong>Inscrit(s)</div>
            </li>
<!--            <li>
                <div class="span" style=""><span class="right"><center><img src="assets\img\enseignant.jpg" width="60px"/></center></span><span class="right "><strong class="text-success"> <?php /*$function->getNbEnseignat();*/?></strong>Enseignant(s)</div>
            </li>
-->
            <!--<li>
                <div class="right"> <strong class="text-success">34</strong>Personnel(s) Enseignant(s)</div>
            </li>-->

        </ul>
    </div>
    <hr>
    <ul class="quick-actions" style="margin-left: 9%">
        <?php
        $function->getModule($_SESSION['idgroupeutilisateur']);
        ?>
       </ul>
    <hr>
    <div>

    </div>
</div>
<!--End-Action boxes-->

<!--Chart-box-->
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="<?php echo($_SESSION['iconvue']);?>"></i></span>
            <h5><?php echo $_SESSION['titrevue'];?></h5>
        </div>
        <div class="widget-content" >
            <div class="row-fluid">
                <div class="span12">
                   <?php
                        $page='app/views/'.$_SESSION['page'].'';
                        $views = explode('.', $page);
                        //echo $views;
                        require_once $views[0].".php";
                   ?>
                </div>

            </div>
        </div>
    </div>
</div>

    <div class="row" style="margin-left:10px;height: 50px;background-color: rgb(238, 238, 238);color: #2040ff;">
        <div id="" class="span10 panel-content">
            <div class="pull-right ">
                <b>Version</b>1.0
            </div>
            <center>
                <strong>Copyright &copy; <?php echo "2018" ?>
                    <span id="date_heure" ></span>
                </strong>
            </center>

        </div>
    </div>

</div>

</div>
</div>
<!--end-main-container-part-->


<script src="assets\js\jquery.min.js"></script>
<script src="assets\js\bootstrap.min.js"></script>
<script src="assets\js_init\up.js"></script>
<script src="assets\js\ajax.js"></script>
<script src="assets\js\matrix.js"></script>
<script src="assets\js\matrix.popover.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/matrix.popover.js"></script>
</body>
</html>