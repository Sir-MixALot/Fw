<?php

use Fw\Core\Application;
$app = new Application;

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>
<div name="<?=$result['element']['name'] ?>" class="<?=$result['element']['additional_class'] ?>" <?php foreach($result['element']['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?>>
    <?php
        foreach($result['fields'] as $elementProperties){
            $app->includeComponent($namespace . ':' . ucfirst($elementProperties['type']) . 'Element', 'default', $elementProperties);
        }
    ?>
</div>