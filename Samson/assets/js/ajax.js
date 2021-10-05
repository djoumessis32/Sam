/**
 * Created by Acer on 11/22/18.
 */

// retrouver les sessions par l'annee academique

$('#typesession').change(function(){
    var idtype=(this).value;
    var idac=$("#anneeAcad").val();
  /*  alert();
    alert(idac);*/
    $.ajax({
        url:'app/controllers/ControlleurAjax.php',
        type:'POST',
        dataType:'html',
        data:{
            action:'getsessionnormale',
            id:idtype,
            ida:idac
        },
        success:function(data){
        //alert(data);
        $('#sessionRtpg').html(data);
    }
    });
});
$("#anneeAcad").change(function(){
    var id=$(this).val();
    // alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getSessionByAnnee',
            id:id
        },
        success: function (data) {
            //  alert(data);
            $("#session").html(data);

        }
    })
});
$("#semestreAcad").change(function(){
    var id=$(this).val();
    var ids=$("#specialite").val();
      //alert(ids);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getMat',
            ids:ids,
            id:id
        },
        success: function (data) {
              //alert(data);
         $("#formepreuve").html(data);

        }
    })
});
$("#semestreAcad").change(function(){
    var id=$(this).val();
    var ids=$("#specialite").val();
    // alert(ids);
    $.ajax({
        url: 'app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getMatAll',
            ids:ids,
            id:id
        },
        success: function (data) {
            // alert(data);
            $("#formepreuve22").html(data);

        }
    })
});
$("#semestreAcad").change(function(){
    var id=$(this).val();
    var ids=$("#specialite").val();
    //alert(ids);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getMatReconAnon',
            ids:ids,
            id:id
        },
        success: function (data) {
            //alert(data);
            $("#formepreuve1").html(data);

        }
    })
});

/*

$("#semestreAcad").change(function(){
    var $id=(this).value;
    var ids=$("#specialite").val();

    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getMatReconAnon',
            ids:ids,
            id:id
        },
        success: function (data) {
            alert(data);
            //$("#formepreuve").html(data);

        }
    })

});
*/


$("#semestreAcad").change(function(){
    var id=$(this).val();
    var ids=$("#specialite").val();
    //alert(ids);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getMat',
            ids:ids,
            id:id
        },
        success: function (data) {
         //   alert(data);
            $("#listformepreuve").html(data);

        }
    })
});
$("#semestreAcad").change(function(){
    var id=$(this).val();
    var idp=$("#specialite").val();
    var ids=$("#anneeAcad").val();
    //alert(ids);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getPoidsMat',
            ids:ids,
            idp:idp,
            id:id
        },
        success: function (data) {
              //  alert(data);
            $("#Poidsformepreuve").html(data);

        }
    })
});
$("#etudiant").keydown(function(){

    var etud =$('#etudiant').val();
    var st=$('#etudiant').isEmpty;

   // alert(etud);
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getListetudiantdoc',
            id:etud
        },
        success: function (data) {
            //alert(data);
            $("#listeetudiantdoc").html(data);

        }
    })
    }
});
$("#etudiant").keydown(function(){

    var etud =$('#etudiant').val();
    var st=$('#etudiant').isEmpty;

   // alert(etud);
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listeetudiantdocsc',
            id:etud
        },
        success: function (data) {
            //alert(data);
            $("#listeetudiantdocscol").html(data);

        }
    })
    }
});
$("#etudiant").keydown(function(){

    var etud =$('#etudiant').val();
    var st=$('#etudiant').isEmpty;
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listeetudiantupdate',
            id:etud
        },
        success: function (data) {
           // alert(data);
            $("#listeetudiantformupdate").html(data);

        }
    })
    }
});
$("#enseignant").keydown(function(){
    var enseignant =$('#enseignant').val();
    var st=$('#enseignant').isEmpty;

   // alert(enseignant);
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listeenseignantupdate',
            id:enseignant
        },
        success: function (data) {
           // alert(data);
            $("#listeenseignantformupdate").html(data);

        }
    })
    }
});
$("#ue").keydown(function(){
    var ue =$('#ue').val();
    var st=$('#ue').isEmpty;

   // alert(enseignant);
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listeueupdate',
            id:ue
        },
        success: function (data) {
           // alert(data);
            $("#listeueupdate").html(data);

        }
    })
    }
});
$("#filiere").keydown(function(){
    var ue =$('#filiere').val();
    var st=$('#filiere').isEmpty;

   // alert(enseignant);
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listefiliereupdate',
            id:ue
        },
        success: function (data) {
           // alert(data);
            $("#listefiliereupdate").html(data);

        }
    })
    }
});
$("#uv").keydown(function(){
    var uv =$('#uv').val();
    var st=$('#uv').isEmpty;

   // alert(enseignant);
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listeuvupdate',
            id:uv
        },
        success: function (data) {
           // alert(data);
            $("#listeuvupdate").html(data);

        }
    })
    }
});
$("#programme").keydown(function(){
    var programme =$('#programme').val();
    var st=$('#programme').isEmpty;

   // alert(enseignant);
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listeprogrammeupdate',
            id:programme
        },
        success: function (data) {
           // alert(data);
            $("#listeprogrammeupdate").html(data);

        }
    })
    }
});
/*$("#semestreAcad").change(function(){
    var id=$(this).val();
    var ids=$("#specialite").val();
    var ida=$("#anneeAcad").val();
    var idsss=$("#sessioncad").val();
//    alert(idss);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getMatReconAnon',
            id:id,
            ida:ida,
            idsession:idsss,
            idspecialite:ids
        },
        success: function (data) {
     //             alert(data);
            $("#formepreuve_hh").html(data);

        }
    })
});*/
$("#semestreAcad").change(function(){
    var id=$(this).val();
    var ids=$("#specialite").val();
    var ida=$("#anneeAcad").val();
      //alert(ids);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getListetudiant',
            id:id,
            ida:ida,
            idspecialite:ids
        },
        success: function (data) {
           //   alert(data);
         $("#listeetudiant").html(data);

        }
    })
});
$("#semestreAcad").change(function(){
    var id=$(this).val();
    var ids=$("#specialite").val();
    var ida=$("#anneeAcad").val();
    var idss=$("#sessioncad").val();
//   alert(idss);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getListetudiantre',
            id:id,
            ida:ida,
            idss:idss,
            idspecialite:ids
        },
        success: function (data) {
         //      alert(data);
            $("#listeetudiantrequete").html(data);

        }
    })
});
$("#matiereAcad").change(function(){
    var id=$(this).val();
    alert(id);
});
$("#matiereAcad").change(function(){
    var id=$(this).val();
      alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getFormEval',
            id:id
        },
        success: function (data) {
             // alert(data);
            $("#formepreuve1").html(data);

        }
    })
});
// retrouver la specialite par la filiere
$("#filiereAcad").change(function(){
    var id=$(this).val();
     //alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getSpeciliateByFiliere',
            id:id
        },
        success: function (data) {
              // alert(data);
            $("#specialit").html(data);

        }
    })
});
$("#filiereAcad1").change(function(){
    var id=$(this).val();
     //alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getSpeciliateByFiliere1',
            id:id
        },
        success: function (data) {
             //  alert(data);
            $("#specialitfin").html(data);

        }
    })
});
// retrouver les semestres par la specialite
$("#specialite").change(function(){
    var id=$(this).val();
  //  alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getSemestreBySpecialite',
            id:id
        },
        success: function (data) {
          //  alert(data);
            $("#semestes").html(data);

        }
    })
});
$("#groupeUsr").change(function(){
    var id=$(this).val();
    //  alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getListUserByGroupuser',
            id:id
        },
        success: function (data) {
            //   alert(data);
            $("#infoPersonnel").html(data);

        }
    })
});

$("#ListUser").change(function(){
    var id=$(this).val();
    // alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getListetatUser',
            id:id
        },
        success: function (data) {
            //     alert(data);
            $("#etatcompte").html(data);

        }
    })
});

$("#groupeU").change(function () {
    var id=$(this).val();
    //alert(id);
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'getdroitUser',
            id:id
        },
        success: function (data) {
             //alert(data);
            $("#infosdroit").html(data);

        }
    })

});
$(document).ready(function(){
    $("#refreshAll").click(function(){
        //  alert("checkall!");
        $( ".droit" ).prop( "checked", true );

    });
    $("#NotrefreshAll").click(function(){
        //  alert("nocheckall!");
        $( ".droit" ).prop( "checked", false );

    });
    $( ".droit" ).prop( "checked", true );
});

// function franck

$("#programme").keydown(function(){
      // alert(programme);
    var programme =$('#programme').val();
    var st=$('#programme').isEmpty;
    if(st!=true){
    $.ajax({
        url: '/Samson/app/controllers/ControlleurAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            action:'listeprogrammeupdat',
            id:programme
        },
        success: function (data) {

            $("#listeprogrammeupdat").html(data);

        }
    })
    }
});

