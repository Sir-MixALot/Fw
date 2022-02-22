<?php

use Fw\Core\Application;
$app = new Application;

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>
<div class="form-group">
    <fieldset class="row mb-3 <?=$result['element']['additional_class'] ?>" name="<?=$result['element']['name'] ?>" <?php foreach($result['element']['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?>>
        <legend class="col-form-label col-sm-2 pt-0"><?= $result['element']['title'] ?></legend>
        <div class="col-sm-10">
            <?php
                foreach($result['boxes'] as $elementProperties){
                    $app->includeComponent($namespace . ':' . ucfirst($elementProperties['type']) . 'Element', 'default', $elementProperties);
                }
            ?>
        </div>
    </fieldset>
</div>