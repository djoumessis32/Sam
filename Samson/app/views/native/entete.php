<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/28/18
 * Time: 4:18 AM
 */
?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>pv semestre</title>
</head>
<style>
    @page
    {
        margin:0px;
        padding:10px;
    }
    body
    {
        background-color: transparent;
        background: url(../../../assets/images_init/filigranne.PNG);
        font-family: "Time new roman", Times, serif;

    }
    #bloc_page
    {
        margin:auto;
        padding:10px;
    }

    #en_tete
    {
        margin-top:30px;

    }
    #cameroun
    {
        margin-top: -3%;
        margin-left: 1%;
        font-size: 24px;
    }
    #camer
    {
        margin-top: -150px;
        text-align: center;
        /*background: url(separateur.png) repeat-x bottom;*/
    }

    #cameroon
    {
        margin-top: -21%;
        margin-left: 70%;
        font-size: 24px;


    }
    #infos
    {
        margin-top: 100px;
        text-align:left;

    }
    #infos1
    {
        margin-top: -70px;
        /*text-align:right;*/
        margin-left: 650px;
    }
    #infos_
    {
        margin-top: 47px;
        text-align:left;
        background: url(../../../assets/images_init/separateur.png) repeat-x bottom;
    }
    #infos_1
    {
        margin-top: -222px;
        /*text-align:right;*/
        margin-left: 650px;

    }

    .table-responsive
    {
        min-height: 0;
        overflow-x: auto;
    }
    table
    {
        border-collapse: collapse;
        /*margin-left: 300px;*/
        border-spacing: 0;
        width: 0%;
    }
    tbody
    {
        box-sizing: border-box;
    }
    td, th /* Mettre une bordure sur les td ET les th */
	{
        border: 1px solid black ;
        padding: 1px;
        font-size: 0.65em;
        text-transform: uppercase;
        text-align: center;
    }
    table th{
        background-color: transparent;
        color: black;
        height: 25px;
        line-height: -5;
        vertical-align: bottom;
    }
    table td
    {
    }
    #infos_01
    {
        margin-top: 47px;
        text-align:left;
    }
    #infos_11
    {
        margin-top: -160px;
        /*text-align:right;*/
        margin-left: 650px;

    }

    .rotate {
        margin: 0;
        padding: 0;
        -webkit-transform-origin: 0 0;
        -moz-transform-origin: 0 0;
        -ms-transform-origin: 0 0;
        -o-transform-origin: 0 0;
        transform-origin: 0 0;
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }


</style>
<body>
<div id="bloc_page">
    <header id="en_tete">
        <div id="titre">
            <div id="cameroun">
                <p style="font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R&eacute;publique du Cameroun</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paix-Travail-Patrie</p>
                <p>&nbsp;Minist&egrave;re de l'Enseignement sup&eacute;rieur</p>
                <p style="text-transform:uppercase; font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><em style="margin-rigth:673px; font-size:0.7em;"><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; B.P. 222 Dschang Cameroun--></em>
            </div>
            <div id="camer">
                <img src="../../../assets/img/logo.png" width="200" height="100" id="ud" title="logo isago" /><p></p>
                <p style="text-transform:uppercase; font-size:0.8em; font-weight:bold">Institut Superieur d'Agriculture et de Gestion d'Obala <br/><em style="font-size:0.75em; font-weight: 100">higher institute of agriculture  and management of obala</em></p>
                <!--<p style="text-transform:uppercase; font-size:0.8em; font-weight:bold">Faculte d'agronomie et des sciences agricoles <br/><em style="text-transform: ; font-size:0.75em; font-weight: 100">Faculty of Agronomy and Agricultural Sciences</em></p> -->
                <p style="font-size:0.8em">
                    <em>Tél. : 677-548-294 /677-872-437/ 699-148-326<br/>
                        Email: groupeiao_isago@yahoo.com  /isagoiao@gmail.com</em></p>

               <p>
                </p>
            </div>
            <div id="cameroon">
                <p style="font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Republic of Cameroon</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peace-Work-Fatherland</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ministry of Higher Education</p>
                <p style="text-transform:uppercase; font-weight:bold"></p><em style="margin-rigtht:685px; font-size:0.7em;"><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Site web: www.univ-dschang.com/fasa--></em>
            </div>
        </div>
    </header><br/><br/>

    <div>
        <div id="infos">
            <p>Ann&eacute;e acad&eacute;mique: <?php echo '<b></b>'; ?><br/>
                Filière: <?php echo '<b style="text-transform:uppercase"></b>'; ?><br/>
                Sp&eacute;cialit&eacute;: <?php echo '<b style="text-transform:uppercase"></b>'; ?><br/>
            </p>
        </div>
        <div id="infos1">

            Cycle: <?php echo '<b></b>'; ?><br/>
            Niveau: <?php echo '<b></b>'; ?> <br/>
            Semestre: <?php echo '<b></b>'; ?> <br/>

        </div>
    </div><br/>