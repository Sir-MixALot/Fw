<?php

use Fw\Core\Application;
$app = new Application;

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>

<div class="form-group">
    <fieldset class="row mb-3 <?=$result['element']['additional_class'] ?>" name="<?=$result['element']['name'] ?>" <?php foreach($result['element']['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?>>
        <legend class="col-form-label col-sm-2 pt-0"><?= $result['element']['title'] ?></legend>
        <div class="col-sm-10">
            <?php foreach($result['boxes'] as $elementProperties): ?>
                <div class="form-check">
                    <input class="<?= $elementProperties['additional_class'] ?>" type="<?= $elementProperties['type'] ?>" name="<?= $elementProperties['name'] ?>" <?php foreach($elementProperties['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?> value="<?= $elementProperties['value'] ?>">
                    <label class="form-check-label" for="<?= $elementProperties['attr']['data-id'] ?>"><?= $elementProperties['title'] ?></label>
                </div>
            <?php endforeach;?>
        </div>
    </fieldset>
</div>

   

