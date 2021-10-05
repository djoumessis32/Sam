<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/19/18
 * Time: 7:51 PM
 */

function autoload($classe)
{
    if(file_exists(dirname(__FILE__) . "//Class//" . $classe . ".php")) {
        try {
            require(dirname(__FILE__) . "//Class//" . $classe . ".php");
        } catch (Exception $e) {

        }
    }
}

function autoloadManager($classe)
{
    if(file_exists(dirname(__FILE__) . "//ClassManager//" . $classe . ".php")) {
        try {
            require(dirname(__FILE__)."//ClassManager//".$classe.".php");
        }catch (Exception $e)
        {

        }

    }
}

spl_autoload_register("autoload");
spl_autoload_register("autoloadManager");

?>