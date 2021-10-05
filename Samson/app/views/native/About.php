<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/4/18
 * Time: 3:07 AM
 */ ?>
<div class="widget-content">
    <div class="row-fluid">
        <div class="span6">
            <table class="table table-bordered table-invoice">
                <tbody>
                <tr>
                <tr>
                    <td class="width30">Progiciel</td>
                    <td class="width70"><strong>Samson &trade;</strong></td>
                </tr>
                <tr>
                    <td class="width30">Version</td>
                    <td class="width70"><strong>1.0</strong></td>
                </tr>
                <tr>
                    <td>Copyright © :</td>
                    <td><strong>Decembre 2018 </strong></td>
                </tr>
                <tr>
                    <td>Client ID:</td>
                    <td><strong><?php echo $_SESSION['sign'];?></strong></td>
                </tr>
                </tbody>

            </table>
        </div>
        <div class="span4 panel panel-content " style="margin-top: 0%;float: right" >
           <h1 style="font-size: 50px">Samson &trade;</h1>
        </div>
    </div>
</div>
