<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 6/6/18
 * Time: 2:06 PM
 */
session_start();
session_unset();
session_destroy();
header("location:../../");
?>