<?php

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>
<div class="row mb-3">
    <label for="<?= $result['attr']['data-id'] ?>" class="col-sm-2 col-form-label"><?= $result['title'] ?> from <?= $result['min'] ?> to <?= $result['max'] ?>:</label>
    <div class="col-sm-10 number">
        <input type="<?= $result['type'] ?>" name="<?= $result['name'] ?>" class="<?= $result['additional_class'] ?>" <?php foreach($result['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?> min="<?= $result['min'] ?>" max="<?= $result['max'] ?>">
    </div>
</div>

