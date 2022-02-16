<?php

use Fw\Core\Application;
$app = new Application;
if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>

<html>
    <head>
    <?php $app->pager->showHead(); ?>
    </head>
    <body>
    
